window.onload = init();
function init(){
    document.querySelectorAll('.cardDisplay')
        .forEach(card=>
            card.addEventListener('mouseover', cardHoverIn))
    document.querySelectorAll('.cardDisplay')
        .forEach(card=>
            card.addEventListener('mouseout', cardHoverOut))

    document.querySelectorAll('.cardAttack')
        .forEach(card=>
            card.addEventListener('mouseover', attackHoverIn))
    document.querySelectorAll('.cardAttack')
        .forEach(card=>
            card.addEventListener('mouseout', attackHoverOut))
}

function cardHoverIn(event){
    let target = event.target.closest('.cardDisplay');
    if(target.classList.contains('shiny')){
        target.style.filter = 'contrast(1.5) saturate(1.3)';
    }
    target.style.scale = '110%'
    target.style.zIndex = 10;

    target.addEventListener('mousemove', function (e) {
        let xAxis = (window.innerWidth / 2 - e.pageX) / 50;
        let yAxis = (window.innerHeight / 2 - e.pageY) / 25;
        target.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
    });
}

function cardHoverOut(event){
    let target = event.target.closest('.cardDisplay');
    if(target.classList.contains('shiny')){
        target.style.filter = 'contrast(1) saturate(1)';
    }
    target.style.scale = '100%'
    target.style.zIndex = 0;
    target.style.transform = 'rotateY(0deg) rotateX(0deg)';
}

function attackHoverIn(event){
    let target = event.target.closest('.cardAttack');
    target.style.scale = '110%'
}

function attackHoverOut(event){
    let target = event.target.closest('.cardAttack');
    target.style.scale = '100%'
}

