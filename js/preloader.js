document.onreadystatechange = () => {
    if (document.readyState === "complete") {
        document.querySelector("body").style.visibility = "visible";
        document.querySelector("body").style.overflow = "auto";
    }
    else{
        document.querySelector("#preloader").classList.add("active");
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector("body").style.overflow = "hidden";
    }
}