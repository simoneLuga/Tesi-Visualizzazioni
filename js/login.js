function checkRadio(e){
    if (e == document.getElementById("btnradioTester")){
        document.getElementById("inputPass").disabled = true
    }
    else
    {
        document.getElementById("inputPass").disabled = false
    }
}

document.querySelector("form").addEventListener("submit", function (event) {
    event.preventDefault();
    const nome = document.querySelector("#uname").value;
    const cognome = document.querySelector("#usurname").value;

    var checkRadio = document.querySelector(
        'input[name="btnradio"]:checked');
    const type = checkRadio.value;
    const password = null;
    if(type != "T"){
        password = document.querySelector("#inputPass").value;
    }
    document.querySelector("#password").value = "";
    login(nome, cognome, type,password);
});

function login(nome,cognome,type,password){

    const formData = new FormData();
    formData.append('nome', nome);
    formData.append('cognome', cognome);
    formData.append('type', type);
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