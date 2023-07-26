
document.querySelector("form").addEventListener("submit", function (event) {
    event.preventDefault();
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#inputPass").value;
    document.querySelector("#inputPass").value = "";
    login(email,password);
});

function login(email,password){

    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password); //invio cryptato della password 

    axios.post('../php/api/api_login.php', formData).then(response => {    
        if (response.data["logineseguito"]) {
            window.location.assign("../php/page/base.php");
        } else {
/*             document.querySelector("form > p").innerText = response.data["errorelogin"]; */
            console.log("login errato")
        }
    });
}