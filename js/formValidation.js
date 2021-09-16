const nameInput = document.getElementById("name-input");
const emailInput = document.getElementById("email-input");
const numberInput = document.getElementById("number-input");
const messageInput = document.getElementById("message-input");
const submitButton = document.getElementById("form-submit-button");

const formLabels = document.getElementsByTagName("label");

const nameRegex = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
const emailRegex = /^\S+@\S+\.\S+$/;

let validName;
let validEmail;
let validNumber;
let validMessage;

function ValidateForm(event){
    event.preventDefault();
    validName = nameRegex.test(nameInput.value);
    validEmail = emailRegex.test(emailInput.value);
    validNumber = (numberInput.value.length >= 1);
    validMessage = (messageInput.value.length >= 1);
    if(validName && validEmail && validNumber && validMessage){
        SubmitForm();
        SetLabelsValid();
    }
    else{
        SetLabelsValid();
        SetLabelsInvalid();
    }
    
}

function SubmitForm(){

}

function SetLabelsInvalid(){
    if(!validName){
        formLabels[0].innerText = "Invalid Name";
        formLabels[0].style.color = "red";
    }
    if(!validEmail){
        formLabels[1].innerText = "Invalid Email Address";
        formLabels[1].style.color = "red";
    }
    if(!validNumber){
        formLabels[2].innerText = "Invalid Phone Number";
        formLabels[2].style.color = "red";
    }
    if(!validMessage){
        formLabels[3].innerText = "Your message is empty";
        formLabels[3].style.color = "red";
    }
}

function SetLabelsValid(){
    formLabels[0].innerText = "Full Name";

    formLabels[1].innerText = "Email Address";

    formLabels[2].innerText = "Phone Number";

    formLabels[3].innerText = "Message";

    for (let i = 0; i< formLabels.length; i++){
        formLabels[i].style.color = "#23224b";
    }
}

submitButton.addEventListener("click", ValidateForm);