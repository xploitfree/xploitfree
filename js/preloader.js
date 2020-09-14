document.onreadystatechange = () => {
    if (document.readyState === "complete") {
        document.querySelector("body").classList.remove("loading");
        if(document.querySelector("#preloader").classList.contains("active")){
            document.querySelector("#preloader").classList.remove("active");
            document.querySelector("#preloader").classList.add("inactive");
        }
    }
    else{
        document.querySelector("body").classList.add("loading");
        document.querySelector("#preloader").classList.add("active");
    }
}