function loadVideo(){
    myMovie=document.getElementById('menuVideo');
    myMovie.addEventListener('click', playOrPause, false);
    myMovie.play();
}

function playOrPause() {
    if (!myMovie.paused && !myMovie.ended){
        myMovie.pause();
    } else {
        myMovie.play();
    }
}
function detect(box){
    if(box.style.opacity === "1"){
        
    }else{
        setTimeout(() => {box.style.visibility = "hidden";}, 700);
    }
}
function clickOnMember($name){
   var box = document.getElementById($name);
    if(box.style.opacity === "1"){
        //box.style.display = "none";
        box.style.opacity = "0";
        box.style.transition = "opacity 0.8s";   
    }else{
        //box.style.display = "block";
        box.style.opacity = "1";
        box.style.transition = "opacity 0.8s";
        box.style.visibility = "visible";
    }
    box.addEventListener("transitionend",detect(box));
}
function removeTextInput($idName){
    document.getElementById($idName).value = ' ';
    window.alert("detected");
}

function toggle(value){
    value.style.display = "none";
}
function changeBox(){
window.alert("clicked out");
documement.getElementsByClassName("presentation_box").forEach(toggle);
}

function clickFill(value){
value.addEventListener("click",changeBox, true);
}
