document.onreadystatechange = () => {
    if (document.readyState === "complete") {
        document.querySelector("#page-wrapper").classList.remove("loading");
        document.querySelector("#page-wrapper").classList.add("loaded");
        if(document.querySelector("#preloader").classList.contains("active")){
            console.log("working")
            document.querySelector("#preloader").classList.remove("active");
            document.querySelector("#preloader").classList.add("inactivated");
        }
    }
    else{
        document.querySelector("#page-wrapper").classList.add("loading");
        document.querySelector("#preloader").classList.add("active");
    }
}