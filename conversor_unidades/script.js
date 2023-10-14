/*
1 meter = 3.281 feet
1 liter = 0.264 gallon
1 kilogram = 2.204 pound
*/

let userNumber = document.getElementById("input-user");
let convertButton = document.getElementById("convert");
let convLe = document.getElementById("conv-Le");
let convVo = document.getElementById("conv-Vo");
let convMa = document.getElementById("conv-Ma");

convertButton.addEventListener("click", function() {
    
    convLe.innerHTML = `${userNumber.value} meters = ${(userNumber.value * 3.281).toFixed(3)} feet | ${userNumber.value} feet = ${(userNumber.value / 3.281).toFixed(3)} meters`;
    convVo.innerHTML = `${userNumber.value} liters = ${(userNumber.value * 0.264).toFixed(3)} gallons | ${userNumber.value} gallons = ${(userNumber.value / 0.264).toFixed(3)} liters`;
    convMa.innerHTML = `${userNumber.value} kilos = ${(userNumber.value * 2.204).toFixed(3)} pounds | ${userNumber.value} pounds = ${(userNumber.value / 2.204).toFixed(3)} kilos`;

    userNumber.value = "";
});
