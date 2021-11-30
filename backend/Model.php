<?php

include_once "./db.php";
include_once "./helpers.php";

session_start();

header("Access-Control-Allow-Origin: http://localhost:80");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, PATCH, DELETE");

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['crud_req'] == 'signup')
signup($conn);

if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['crud_req']))
logout($conn);

if($_SERVER['REQUEST_METHOD'] == 'PATCH')
update($conn);

if($_SERVER['REQUEST_METHOD'] == 'DELETE')
unSubscribe($conn);

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['crud_req'] == "login")
login($conn);

function signup($conn) {
    $fName= $_POST['fName'];
    $lName = $_POST['lName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $rPwd = $_POST['rPwd'];

     if(empty($fName) || empty($lName) || empty($userName) || empty($email) || empty($pwd) || empty($rPwd) ) {
         http_response_code(400);
         echo "All fields are mandatory!!!";
         exit(); 
     }

     if( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email address!";
        exit(); 
     }

     if( $pwd != $rPwd) {
         http_response_code(400);
         echo "Inconsistent Password!";
         exit();
     }

     $pwd = password_hash($pwd, PASSWORD_DEFAULT);
     $rPwd = $pwd;

     $sql = "INSERT INTO users(first_name, last_name, user_name, email, pwd, r_Pwd) VALUES ('$fName', '$lName', '$userName', '$email', '$pwd', '$rPwd')";

     if (mysqli_query($conn, $sql)) {
        //success
        echo "Successfuly registration";
        header('Location: ./../frontend/index.html');
    } else {
        //error
        echo 'query error: ' . mysqli_error($conn);
    }

 

}
function login($conn) {
    $userName = $_POST['userName'];
    $pwd = $_POST['pwd'];

    if(empty($userName) || empty($pwd)) 
        sendReply(400, 'All fields are mandatory!');
    
    $sql = "select pwd from users where user_name=?;";
    $stmt = $conn->stmt_init();
    if(!$stmt->prepare($sql))
    sendReply(400, "Something went wrong. Try again later");
    $stmt->bind_param('s', $userName);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0 ) {
        //.......

        $data = $result->fetch_assoc();
        $isValid = password_verify($pwd, $data['pwd']);

        if(!$isValid)
            sendReply(400, "Invalid username or password");
            
            $_SESSION['user'] = $userName; 
            sendReply(200, "Welcome ". $_SESSION['user']);
    } else {
        sendReply(400, "Invalid username or password");
    }

    
}
function logout($conn) {
    if(!isset($_SESSION['user']))
    sendReply(400, "You are not logged in");
    unset($_SESSION['user']);
    session_destroy();
    sendReply(200, "You have been logged out");

}
function update($conn) { 
    if(!isset($_SESSION['user']))
    sendReply(400, "You are not logged in");

    parse_str(file_get_contents("PHP://input"), $_PATCH);

    $fName= $_PATCH['fName'];
    $lName = $_PATCH['lName'];
    $userName = $_PATCH['userName'];
    $email = $_PATCH['email'];
    $pwd = $_PATCH['pwd'];
    $rPwd = $_PATCH['rPwd'];

     if(empty($fName) || empty($lName) || empty($userName) || empty($email) || empty($pwd) || empty($rPwd) ) {
         http_response_code(400);
         echo "All fields are mandatory!!!";
         exit(); 
     }

     if( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email address!";
        exit(); 
     }

     if( $pwd != $rPwd) {
         http_response_code(400);
         echo "Inconsistent Password!";
         exit();
     }

     $pwd = password_hash($pwd, PASSWORD_DEFAULT);
     $rPwd = $pwd;

     $sql = "update users set first_name=?, last_name=?, user_name=?, email=?, pwd=?, r_Pwd=? where user_name=?";
     $stmt = $conn->stmt_init();

     if(!$stmt->prepare($sql)) 
         sendReply(400, "Something went wrong. Try again later!!!");
 
     $stmt->bind_param('sssssss', $fName, $lName, $userName, $email, $pwd, $rPwd, $_SESSION['user']);
     $stmt->execute();


     if($stmt->affected_rows > 0 ) {
         $_SESSION['user'] = $userName;
         sendReply(200, "Congrats!!!\n You have been successfully updated your details.");
     } else {

        sendReply(400, "Something went wrong. Try again later");

     }

    }
function unSubscribe($conn) {

    if(!isset($_SESSION['user']))
    sendReply(403, "You are not authorized to perform the operation.");

    $sql = "Delete from users where user_name = '".$_SESSION['user']."';";

    if($conn->query($sql)) {
        unset($_SESSION['user']);
        session_destroy();
        sendReply(200, "You are no longer a registered member.");
    } else {
        sendReply(400, "Something went wrong, try again later");
    }
}

?>