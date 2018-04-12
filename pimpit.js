function clickHere() {
    alert("Whats the magic word?");
}

function biggerpimpin() {
    /* document.getElementById("texthere").style.fontSize = "24px"; */
    var txt = document.getElementById("texthere")
    var sty = window.getComputedStyle(txt, null).getPropertyValue('font-size');
    sty = parseInt(sty) + 2 + "px";
    console.log(sty);
    document.getElementById("texthere").style.fontSize = sty;
}

function bling() {
    var checkit = document.getElementById("bling").checked;
    if(checkit == true){
        document.getElementById("texthere").style.fontWeight = "bold";
        document.getElementById("texthere").style.color = "green";
        document.getElementById("texthere").style.textDecoration = "line-through";
        document.getElementById("texthere").style.textDecoration = "underline";

    }
    else{
        document.getElementById("texthere").style.fontWeight = "normal";
        document.getElementById("texthere").style.color = "black";
        document.getElementById("texthere").style.textDecoration = "none";s
    }
}

function snoopify() {
    var input = String(document.getElementById("texthere").value);
    input = input.split(".");
    input = input.join("-izzle.");
    document.getElementById("texthere").value = input;




}