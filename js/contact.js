function formValidation(event){

    event.preventDefault();
    

    const emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const phnRegExp = /^[0-9]+$/;
    const textRegExp = /^[A-Za-z0-9_ ]+$/;

    const emailField = document.forms['contact_form']['email'];
    const phnField = document.forms['contact_form']['phone'];
    const nameField = document.forms['contact_form']['yname'];
    const subjectField = document.forms['contact_form']['subject'];
    const messageField = document.forms['contact_form']['message'];

    if(emailField != undefined){
        emailField.classList.remove("invalid");
    }
    if(nameField != undefined){
        nameField.classList.remove("invalid");
    }
    if(phnField != undefined){
        phnField.classList.remove("invalid");
    }
    if(subjectField != undefined){
        subjectField.classList.remove("invalid");
    }
    if(messageField != undefined){
        messageField.classList.remove("invalid");
    }

    if(emailField != undefined && emailField.value == '' || phnField != undefined && phnField.value == '' || nameField != undefined && nameField.value == '' || subjectField != undefined && subjectField.value == '' || messageField != undefined && messageField.value == ''){
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Please provide all details or else we won't be able to contact you.";
    }
    else if(emailField != undefined && !emailRegExp.test(emailField.value)){
        emailField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid email!";
    }
    else if(nameField != undefined && !textRegExp.test(nameField.value)){
        nameField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Please enter valid name(text only).";
    }
    else if(phnField != undefined && !phnRegExp.test(phnField.value)){
        phnField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid contact!";
    }
    else{

        data = {};

        if(emailField != undefined){
            data.email = emailField.value
        }
        if(nameField != undefined){
            data.name = nameField.value
        }
        if(phnField != undefined){
            data.phone = phnField.value
        }
        if(subjectField != undefined){
            data.sub = subjectField.value
        }
        if(messageField != undefined){
            data.message = messageField.value
        }

        document.querySelector(".spinner").style.display = "inline";

        fetch('./back/contactUsApi.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
            }).then((response) => (response.json())).then((data) => {

                if(data["success"]){
                    document.querySelector(".spinner").style.display = "none";
                    document.querySelector(".form-msg").style.display = "block";
                    document.querySelector(".form-msg").classList.remove("error-msg");
                    document.querySelector(".form-msg").classList.add("success-msg");
                    document.querySelector(".form-msg").textContent = data["message"];
                }
                else{
                    document.querySelector(".spinner").style.display = "none";
                    document.querySelector(".form-msg").style.display = "block";
                    document.querySelector(".form-msg").classList.add("error-msg");
                    document.querySelector(".form-msg").classList.remove("success-msg");
                    document.querySelector(".form-msg").textContent = data["message"];
                }
                
            });
    }
    
}