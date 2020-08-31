function createObserver(thresholdValue = 1.0){

    let observer;

    targets = document.getElementsByClassName("scroll-animated");

    let options = {
        root: null,
        rootMargin: '0px',
        threshold: thresholdValue
    }

    observer = new IntersectionObserver(handleObserver, options);

    Array.from(targets).forEach((target) => {
        observer.observe(target);
    });
}

function handleObserver(entries){
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add("animation-active");
        }
    })
}