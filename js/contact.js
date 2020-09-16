function formValidation(event){

    event.preventDefault();

    document.querySelector(".form-msg").classList.add("error-msg");
    document.querySelector(".form-msg").classList.remove("success-msg");

    const emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const phnRegExp = /^[0-9]+$/;
    const textRegExp = /^[A-Za-z_ ]+$/;

    const fields = document.forms["contact_form"];

    const emailField = document.forms['contact_form']['email'];
    const phnField = document.forms['contact_form']['phone'];
    const nameField = document.forms['contact_form']['yname'];
    const subjectField = document.forms['contact_form']['subject'];
    const messageField = document.forms['contact_form']['message'];

    for(i=0; i<fields.length; i++){
        fields[i].classList.remove("invalid");
    }

    if(emailField != undefined && emailField.value == '' || phnField != undefined && phnField.value == '' || nameField != undefined && nameField.value == '' || subjectField != undefined && subjectField.value == '' || messageField != undefined && messageField.value == ''){
        for(i=0; i<fields.length; i++){
            if(fields[i].value =='' && fields[i].type != "submit")
                fields[i].classList.add("invalid");
        }
        console.log("working");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Please provide all details or else we won't be able to contact you.";
    }
    else if(emailField != undefined && !emailRegExp.test(emailField.value)){
        emailField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid email!";
    }
    else if(emailField != undefined && emailField.value > 50){
        emailField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Character limit exceeded!";
    }
    else if(nameField != undefined && !textRegExp.test(nameField.value)){
        nameField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Please enter valid name(text only).";
    }
    else if(nameField != undefined && nameField.value > 30){
        nameField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Character limit exceeded!(Limit: 30)";
    }
    else if(phnField != undefined && !phnRegExp.test(phnField.value) && phnField.value != 10){
        phnField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid contact!";
    }
    else if(subjectField != undefined && subjectField.value.length > 100){
        console.log(subjectField.value.length);
        subjectField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Subject must be less than 100 characters.";
    }
    else if(messageField != undefined && messageField.value.length > 500){
        messageField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Message must be less than 500 characters.";
    }
    else{

        data = {};

        for(i=0; i<fields.length; i++){
            data[fields[i].name] = fields[i].value;
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
                    for(i=0; i<fields.length; i++){
                        fields[i].value = '';
                    }            
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