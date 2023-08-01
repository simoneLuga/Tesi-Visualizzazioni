
function login(){
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#inputPass").value;
    document.querySelector("#inputPass").value = "";
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

function signin(){
}

function turnOnSigninForm(){
    document.getElementById("form_signin").style.display ="inline";
    document.getElementById("form_login").style.display ="none";
}

function turnOnLoginForm(){
    document.getElementById("form_signin").style.display ="none";
    document.getElementById("form_login").style.display ="inline";
}