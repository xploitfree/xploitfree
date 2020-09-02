function createObserver(thresholdValue = 1.0, classname, callback=handleObserver){

    let observer;

    targets = document.getElementsByClassName(classname);

    let options = {
        root: null,
        rootMargin: '0px',
        threshold: thresholdValue
    }

    observer = new IntersectionObserver(callback, options);

    Array.from(targets).forEach((target) => {
        observer.observe(target);
    });
}

function handleObserver(entries){
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add("animated");
        }
    })
}