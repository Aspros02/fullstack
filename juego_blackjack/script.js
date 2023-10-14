let cards = [];
let sum = 0;

let hasBlackJack = false;
let isAlive = false;
let message = "";

let messageEl = document.getElementById("message-el");
let sumEl = document.querySelector("#sum-el");
let cardsEl = document.querySelector("#cards-el");

let player = {
    name : "Jose",
    chips : 145
}

let playerEl = document.getElementById("player-el");
playerEl.textContent = player.name + " : $" + player.chips;

function startGame() {
    isAlive = true;
    let firstCard = randomCards();
    let secondCard = randomCards();
    cards = [firstCard, secondCard];
    sum = firstCard + secondCard;

    renderGame();
}

function renderGame() {
    cardsEl.textContent = "Cards: ";

    for (let i = 0; i < cards.length; i++) {
        cardsEl.textContent += cards[i] + "  ";
    }

    sumEl.textContent = "Sum: " + sum;

    if (sum < 21) {
        message = "Almost, draw a new card?";
    } else if (sum === 21) {
        message = "You've got Blackjack!!";
        hasBlackJack = true;
    } else {
        message = "You're out of the game";
        isAlive = false;
    }
    messageEl.textContent = message;
}

function randomCards() {
    return Math.floor(Math.random() * (11 - 2 + 1) + 2);
}

function newCard() {
    if(isAlive === true && hasBlackJack === false) {
        let newCard = randomCards();
        cards.push(newCard);
        sum += newCard;
    
        renderGame();
    }
}
