document.addEventListener("click", (event) => {

    if(event.target == document.querySelector(".modal-overlay")){
        if(document.querySelector("body").classList.contains("modal-active")){
            document.querySelector("body").classList.remove("modal-active");
            document.querySelector(".modal-overlay").classList.add("modal-inactive");
            document.querySelector(".form-msg").style.display = "none";
            document.querySelector(".form-msg").textContent = "";
            document.querySelector(".submit-msg").classList.remove("slide-in");
            document.querySelector(".modal-form").classList.remove("slide-out");
        }
    }

    if(event.target == document.querySelector(".modal-close") || event.target == document.querySelectorAll(".modal-close path")[0] || event.target == document.querySelectorAll(".modal-close path")[1]){
        document.querySelector("body").classList.remove("modal-active");
        document.querySelector(".modal-overlay").classList.add("modal-inactive");
        document.querySelector(".form-msg").style.display = "none";
        document.querySelector(".form-msg").textContent = "";
        document.querySelector(".submit-msg").classList.remove("slide-in");
        document.querySelector(".modal-form").classList.remove("slide-out");
    }

})

function formValidation(event){

    event.preventDefault();
    

    const emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const phnRegExp = /^[0-9]+$/;
    const nameRegExp = /^[A-Za-z]+$/;
    const urlRegExp = /^((?!-)[A-Za-z0-9-]{1, 63}(?<!-)\\.)+[A-Za-z]{2, 6}$/;

    const emailField = document.forms['registration_form']['email'];
    const phnField = document.forms['registration_form']['phn'];
    const nameField = document.forms['registration_form']['cname'];
    const domainField = document.forms['registration_form']['domain'];
    const trainingField = document.forms['registration_form']['training'];
    const serviceField = document.forms['registration_form']['service'];

    if(emailField != undefined){
        emailField.classList.remove("invalid");
    }
    if(nameField != undefined){
        nameField.classList.remove("invalid");
    }
    if(phnField != undefined){
        phnField.classList.remove("invalid");
    }
    if(domainField != undefined){
        domainField.classList.remove("invalid");
    }
    if(trainingField != undefined){
        trainingField.classList.remove("invalid");
    }
    if(serviceField != undefined){
        serviceField.classList.remove("invalid");
    }

    if(emailField != undefined && emailField.value == '' || phnField != undefined && phnField.value == '' || nameField != undefined && nameField.value == '' || domainField != undefined && domainField.value == '' || trainingField != undefined && trainingField.value == '' || serviceField != undefined && serviceField.value == ''){
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Please provide all details or else we won't be able to contact you.";
    }
    else if(emailField != undefined && !emailRegExp.test(emailField.value)){
        emailField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid email!";
    }
    else if(nameField != undefined && !nameRegExp.test(nameField.value)){
        nameField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Please enter valid name(to be printed on Certificate).";
    }
    else if(phnField != undefined && !phnRegExp.test(phnField.value)){
        phnField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid contact!";
    }
    // else if(domainField.value != undefined && !urlRegExp.test(domainField.value)){
    //     domainField.classList.add("invalid");
    //     document.querySelector(".form-msg").style.display = "block";
    //     document.querySelector(".form-msg").textContent = "Please enter valid domain or else we wont be able to perform test.";
    // }
    else if(serviceField != undefined && serviceField.value){
        serviceField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid email!";
    }
    else if(trainingField != undefined && trainingField.value){
        trainingField.classList.add("invalid");
        document.querySelector(".form-msg").style.display = "block";
        document.querySelector(".form-msg").textContent = "Enter valid email!";
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
            data.phn = phnField.value
        }
        if(domainField != undefined){
            data.domain = domainField.value
        }
        if(trainingField != undefined){
            data.training = trainingField.value
        }
        if(serviceField != undefined){
            data.service = serviceField.value
        }

        fetch('../back/registration', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
            }).then((response) => (response.json())).then((data) => console.log(data));

        document.querySelector(".submit-msg").classList.add("slide-in");
        document.querySelector(".modal-form").classList.add("slide-out");
    }
    
}

function btnClickHandler(btn, event){

    if(event != undefined){
        event.preventDefault();
    }
    document.querySelector(".modal-overlay").classList.remove("modal-inactive");
    document.querySelector("body").classList.add("modal-active");

}