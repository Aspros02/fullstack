
const characters = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9","~","`","!","@","#","$","%","^","&","*","(",")","_","-","+","=","{","[","}","]",",","|",":",";","<",">",".","?",
"/"];

let firstPass = document.getElementById("first");
let secondPass = document.getElementById("second");

let pass = "";

function generatePass() {
    firstPass.textContent = "";
    secondPass.textContent = "";

    firstPass.textContent = randomArray();
    pass = "";
    
    secondPass.textContent = randomArray();
    pass = "";
}

function randomArray() {
    for(let i = 0; i <= 15; i++) {
        pass += characters[random()];
    }
    return pass;
}


function random() {
    return Math.floor(Math.random() * characters.length);
}