const nameInput = document.getElementById("name-input");
const emailInput = document.getElementById("email-input");
const numberInput = document.getElementById("number-input");
const messageInput = document.getElementById("message-input");
const submitButton = document.getElementById("form-submit-button");
const gdprCheckbox = document.getElementById("gdpr-checkbox");

const formLabels = document.getElementsByTagName("label");

const nameRegex = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
const emailRegex = /^\S+@\S+\.\S+$/;
const numberRegex = /^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;

const originalGdprText = formLabels[4].innerHTML;
const originalTextColour = "#584096";


let validName;
let validEmail;
let validNumber;
let validMessage;
let checkedGdprBox;

function ValidateForm(event){
    validName = nameRegex.test(nameInput.value);
    validEmail = emailRegex.test(emailInput.value);
    validNumber = numberRegex.test(numberInput.value);
    validMessage = (messageInput.value.length >= 1);
    checkedGdprBox = gdprCheckbox.checked;

    if(validName && validEmail && validNumber && validMessage && checkedGdprBox){
        SetLabelsValid();
        console.log("happy happy form")
    }
    else{
        event.preventDefault();
        console.log("very unhappy form")
        SetLabelsValid();
        SetLabelsInvalid();
    }
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
    if(!checkedGdprBox){
        formLabels[4].innerHTML += " *";
        formLabels[4].style.color = "red";
    }
}

function SetLabelsValid(){
    formLabels[0].innerText = "Full Name";

    formLabels[1].innerText = "Email Address";

    formLabels[2].innerText = "Phone Number";

    formLabels[3].innerText = "Message";

    formLabels[4].innerHTML = originalGdprText;

    for (let i = 0; i< formLabels.length; i++){
        formLabels[i].style.color = originalTextColour;
    }
}

submitButton.addEventListener("click", ValidateForm);