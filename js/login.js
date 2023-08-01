
function login(){
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#inputPass").value;
    document.querySelector("#inputPass").value = "";
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', hex_sha512(password)); //invio cryptato della password 
    axios.post('../php/api/api_login.php', formData).then(response => {    
        if (response.data["logineseguito"]) {
            window.location.assign("../php/page/base.php");
        } else {
/*             document.querySelector("form > p").innerText = response.data["errorelogin"]; */
            console.log(response.data["errorelogin"]);
        }
    });
}

function signin(){
    //controllo password uguali

    const email1 = document.querySelector("#email1").value;
    const password1 = document.querySelector("#inputPass1").value;
    const password2 = document.querySelector("#inputPass2").value;
    if(password1 == password2){
        const formData = new FormData();
        formData.append('email', email1);
        formData.append('password', hex_sha512(password1)); //invio cryptato della password 
        
        axios.post('../php/api/api_signin.php', formData).then(response => {
            if (response.data["signineseguito"]) {
                //gli fai fare subito il login()
                console.log("signin OK");
            } else {
                /* document.querySelector("form > p").innerText = response.data["erroresignin"]; */
                console.log(response.data["erroresignin"]);
            }
        });
    }else{
        console.log("errore signin password");
    }
    
}

function turnOnSigninForm(){
    document.getElementById("form_signin").style.display ="inline";
    document.getElementById("form_login").style.display ="none";
}

function turnOnLoginForm(){
    document.getElementById("form_signin").style.display ="none";
    document.getElementById("form_login").style.display ="inline";
}

function checkPasswordSecurity(password){
    const check_regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/; ;
    return check_regex.test(password)
}