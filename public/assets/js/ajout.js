window.onload = init();

function init() {
    document.getElementById("pokemon_specie")
        .addEventListener('change', setTypes);
    document.getElementById("pokemon_specie")
        .addEventListener('change', setPokemon);
    document.getElementById("pokemon_shiny")
        .addEventListener('change', setPokemon);
}

function setTypes(event) {
    let target = event.target.selectedOptions[0];
    let pokemon = target.innerHTML;

    let type1 = document.getElementById("type1");
    let type2 = document.getElementById("type2");

    let hiddenType1 = document.getElementById(pokemon + '_' + 0);
    let hiddenType2 = document.getElementById(pokemon + '_' + 1);
    let card = document.getElementById('pokemon_card');

    type1.innerHTML = hiddenType1.innerHTML;
    type1.style.backgroundColor = hiddenType1.className;
    if (document.getElementById(pokemon + '_' + 1) != null) {
        type2.innerHTML = hiddenType2.innerHTML;
        type2.style.backgroundColor = hiddenType2.className;
        card.style.background = 'linear-gradient(135deg, ' + hiddenType1.className + ', ' + hiddenType2.className + ')';
    } else {
        type2.innerHTML = '/';
        type2.style.backgroundColor = '#11ffee00';
        card.style.background = hiddenType1.className;

    }
}

function setPokemon(event) {
    let target = document.getElementById("pokemon_specie").selectedOptions[0];
    let pokemon = target.innerHTML.toLowerCase();
    let shiny = document.getElementById("pokemon_shiny").checked;

    let img = document.getElementById("img");
    let img2 = document.getElementById("img2");
    img.src = '/Pokemon/public/assets/img/pokemon/' + pokemon + '.gif';
    img2.src = '/Pokemon/public/assets/img/pokemon/' + pokemon + (shiny ? 'shiny' : '') + '.png';
}