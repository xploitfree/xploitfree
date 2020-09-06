document.addEventListener("click", (event) => {

    if(event.target == document.querySelector(".modal-overlay")){
        if(document.querySelector("body").classList.contains("modal-active")){
            document.querySelector("body").classList.remove("modal-active")
            document.querySelector(".modal-overlay").classList.add("modal-inactive")
        }
    }

    if(event.target == document.querySelector(".modal-close") || event.target == document.querySelectorAll(".modal-close path")[0] || event.target == document.querySelectorAll(".modal-close path")[1]){
        document.querySelector("body").classList.remove("modal-active")
        document.querySelector(".modal-overlay").classList.add("modal-inactive")
    }

})

function btnClickHandler(btn){
    document.querySelector(".modal-overlay").classList.remove("modal-inactive");
    document.querySelector("body").classList.add("modal-active");

}