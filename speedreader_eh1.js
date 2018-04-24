var round = 0;
var speed = 350;

window.onload = function () {
    document.getElementById("startbutton").onclick = start;
    document.getElementById("stopbutton").onclick = stop;
    document.getElementById("medium").onclick = sizeMedium;
    document.getElementById("big").onclick = sizeBig;
    document.getElementById("bigger").onclick = sizeBigger;
    document.getElementById("stopbutton").disabled = true;

};

function start() {
    var text = document.getElementById("inputtext").value;
    document.getElementById("stopbutton").disabled = false;

    text = text.split(/[ \t\n]+/);
    outputtext = text;
    for(i = 0; i < outputtext.length; i++) {
        if (outputtext[i].charAt(outputtext[i].length - 1) == "." || outputtext[i].charAt(outputtext[i].length - 1) == "," || outputtext[i].charAt(outputtext[i].length - 1) == "!" || outputtext[i].charAt(outputtext[i].length - 1) == "?") {
            outputtext[i] = outputtext[i].slice(0, outputtext[i].length - 1);
            outputtext.splice(i, 0, outputtext[i]);
            console.log(outputtext);
        }
    }
    timerID = setInterval(outputIt, speed);
}

function stop() {
    clearInterval(timerID);
    round = 0;
}

function sizeMedium() {
    document.getElementById("outputhere").style.fontSize = "36pt";
}
function sizeBig() {
    document.getElementById("outputhere").style.fontSize = "48pt";
}
function sizeBigger() {
    document.getElementById("outputhere").style.fontSize = "60pt";
}

function wpm500(){
    alert("yes");
    speed = 500;
}

function wpm200(){
    speed = 200;
}

function wpm171(){
    speed = 171;
}

function wpm150(){
    speed = 150;
}

function wpm133(){
    speed = 133;
}

function wpm122(){
    speed = 122;
    console.log(speed);
}

function outputIt() {
    if (round == outputtext.length) {
        stop();
        document.getElementById("stopbutton").disabled = true;

    }
    else {
        outputhere.innerHTML = outputtext[round]
        round += 1;
    }

}