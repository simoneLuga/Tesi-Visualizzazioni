
function login(){
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#inputPass").value;
    document.querySelector("#inputPass").value = "";
/*     console.log(hex_sha512(password)); */
    if(email && password){
        const formData = new FormData();
    formData.append('email', email);
    formData.append('password', hex_sha512(password)); //invio cryptato della password 
    axios.post('../php/api/api_login.php', formData).then(response => {    
        if (response.data["logineseguito"]) {
            window.location.assign("../php/page/base.php");
        } else {
            document.getElementById("errori").innerHTML=response.data["errorelogin"];
        }
    });
    }else{
        document.getElementById("errori").innerHTML="Email o password mancanti";
    }
}

function signin(){
    const email1 = document.querySelector("#email1").value;
    const password1 = document.querySelector("#inputPass1").value;
    const password2 = document.querySelector("#inputPass2").value;
    
/*     console.log(hex_sha512(password1)); */
    //si puo aggiungere il fatto di controllare che la password sia sicura
    if(password1 == password2 /* && checkPasswordSecurity(password1) */){
        const formData = new FormData();
        formData.append('email', email1);
        formData.append('password', hex_sha512(password1)); //invio cryptato della password 
        
        axios.post('../php/api/api_signin.php', formData).then(response => {
            if (response.data["signineseguito"]) {
                //gli fai fare subito il login()
                turnOnLoginForm();
            } else {
                document.getElementById("errori").innerHTML=response.data["erroresignin"];
                document.querySelector("#email1").value = "";
                document.querySelector("#inputPass1").value = "";
                document.querySelector("#inputPass2").value = "";
            }
        });
    }else{
        document.getElementById("errori").innerHTML="Password non uguali o troppo debole";
    }
    
}

function turnOnSigninForm(){
    document.getElementById("errori").innerHTML="";
    document.getElementById("form_signin").style.display ="inline";
    document.getElementById("form_login").style.display ="none";
}

function turnOnLoginForm(){
    document.getElementById("errori").innerHTML="";
    document.getElementById("form_signin").style.display ="none";
    document.getElementById("form_login").style.display ="inline";
}

function checkPasswordSecurity(password){
    const check_regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/; ;
    return check_regex.test(password)
}