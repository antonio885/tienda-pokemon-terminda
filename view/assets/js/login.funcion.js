function readlogin(){
    fetch("../controller/validate.login.php")
    .then(response => response.json())
    .then(data=>{
        console.log(data)
        if (!data) {
            window.location.href =  "login.php"
        }
    })
}
function deletelogin(){
    fetch("../controller/delete.login.php")
    .then(response => response.json())
    .then(data=>{
        console.log(data)
        if(data){
            window.location.href = "login.php"
        }
    })
} 
readlogin()         