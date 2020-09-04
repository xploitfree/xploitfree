createObserver(1, "section-main");
createObserver(1, "bottom-btn");
createObserver(0.3, "section-how");
createObserver(1, "section-what", showWhatFunc);

var what = document.getElementsByClassName("what")[0];
var whatText = what.textContent.slice(0, -1);
var isWhatAnimated = false;

what.textContent = "?";


function showWhatFunc(entries){
    entries.forEach((entry) => {
        if(entry.isIntersecting && !isWhatAnimated){
            entry.target.classList.add("animated");

            var holdW = 0;
            var ptrW = 0;
        
            var showWhat = setInterval(() => {
                if(holdW == 120){
                    if(ptrW <= whatText.length){
                        what.textContent = whatText.slice(0, ptrW) + " ?";
                        ptrW++;
                    }
                    else{
                        ptrW = 0;
                        clearInterval(showWhat);
                    }
                }
                else{
                    holdW++;
                }
            }, 5);
            isWhatAnimated = true;
        }
    })
}