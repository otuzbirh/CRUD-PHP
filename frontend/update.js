const signup = document.querySelector('input[type="submit"]');
var stat
signup.addEventListener('click', ()=> {
    const formData = new URLSearchParams(new FormData(document.querySelector('form')))
    fetch('http://localhost:80/CRUD/backend/Model.php', {
        method:'PATCH',
        body: formData,
        credentials: 'include'

    })
    .then(res=> {
        stat = res.status;
        return res.text()

    })
    .then(data=>{
        alert(data)
        if(stat == 200) 
        location.href="./index.html"
    })
    .catch (err => {alert(err)})
})