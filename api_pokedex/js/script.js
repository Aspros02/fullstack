const listaPokemon = document.querySelector("#listaPokemon");
const botonesHeader = document.querySelectorAll(".btn-header");

let URL = "https://pokeapi.co/api/v2/pokemon/";

for (let index = 1; index <= 251; index++) {
    fetch(URL + index)
        .then((response) => response.json())
        .then(data => mostrarPokemon(data))

        .catch(error => {
            console.error(error);
            alert('Failed to retrieve data. Please try again later.');
          });
}


function mostrarPokemon(poke) {
    let tipos = poke.types.map(type =>
        `<p class="${type.type.name} tipe">${type.type.name}</p>`);
    tipos = tipos.join();

    let pokeId = poke.id.toString();
    if (pokeId.length === 1) {
        pokeId = "00" + pokeId;
    } else if (pokeId.length === 2) {
        pokeId = "0" + pokeId;
    }

    const div = document.createElement("div");
    div.classList.add("pokemon");
    div.innerHTML = `
    <p class="pokemon-id-back">#${pokeId}</p>
    <div class="pokemon-imagen">
        <img src="${poke.sprites.other["official-artwork"].front_default}" alt="${poke.name}">
    </div>
    <div class="pokemon-info">
        <div class="nombre-contenedor">
            <p class="pokemon-id">#${pokeId}</p>
            <h2 class="pokemon-nombre">${poke.name}</h2>
        </div>
        <div class="pokemon-tipos">
            ${tipos}
        </div>
        <div class="pokemon-stats">
            <p class="stat">${poke.height / 10} m</p>
            <p class="stat">${poke.weight / 10} kg</p>
        </div>
    </div>
    `;
    listaPokemon.append(div);
}

botonesHeader.forEach(boton => {
    boton.addEventListener("click", (event) => {
        const botonId = event.currentTarget.id;

        listaPokemon.innerHTML = '';

        for (let index = 1; index <= 251; index++) {
            fetch(URL + index)
                .then((response) => response.json())
                .then(data => {

                    if (botonId === "ver-todos") {
                        mostrarPokemon(data);
                    } else {
                        const tipos = data.types.map(type => type.type.name);
                        if (tipos.some(tipo => tipo.includes(botonId))) {
                            mostrarPokemon(data);
                        }
                    }
                })
        }
    });
});