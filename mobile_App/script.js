import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js"
import { getDatabase, ref, push, onValue, remove } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-database.js";

const appSettings = {
    databaseURL: "https://playground-90d90-default-rtdb.europe-west1.firebasedatabase.app/"
}

const app = initializeApp(appSettings);
const database = getDatabase(app);
const shoppingListInDB = ref(database, "shoppingList");

const addButton = document.getElementById("add-button");
const inputField = document.getElementById("input-field");
const shoppingList = document.getElementById("shopping-list");

onValue(shoppingListInDB, function (snapshot) {
    if (snapshot.exists()) {
        let itemsArray = Object.entries(snapshot.val());

        clearShoppingListEl();

        for (let i = 0; i < itemsArray.length; i++) {
            let currentItem = itemsArray[i];
            let currentItemID = currentItem[0];
            let currentItemValue = currentItem[1];
            addListItem(currentItem);
        }
    }else {
        shoppingList.innerHTML = "No hay nada que comprar";
    }
});

addButton.addEventListener("click", function () {
    let inputValue = inputField.value;

    push(shoppingListInDB, inputValue);

    clearInputField();
})

function addListItem(item) {
    let itemID = item[0];
    let itemValue = item[1];

    let shoppingListItem = document.createElement("li");
    shoppingListItem.innerHTML = itemValue;
    shoppingList.append(shoppingListItem);

    shoppingListItem.addEventListener("dblclick", function () {
        let locationInDB = ref(database, `shoppingList/${itemID}`);
        remove(locationInDB);
    })
}

function clearInputField() {
    inputField.value = "";
}

function clearShoppingListEl() {
    shoppingList.innerHTML = "";
}