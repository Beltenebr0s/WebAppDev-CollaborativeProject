let tecID_btn = document.getElementById("tec_btn");
let email_btn = document.getElementById("email_btn");

function ToTecIDLogin(){
    let label = document.getElementById("user_lbl");
    label.innerHTML = "Tec ID: ";

    let loginType = document.getElementById("loginType");
    loginType.value = 0;
}

function ToEmailLogin(){
    let label = document.getElementById("user_lbl");
    label.innerHTML = "Email: ";
    
    let loginType = document.getElementById("loginType");
    loginType.value = 1;
}