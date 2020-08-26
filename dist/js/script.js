
// click btn menu humbrger:::::::::::::

const btn = document.getElementById('btn-menu');
const menu = document.getElementById('menu');
const nav = document.getElementById('nav');


btn.addEventListener('click',openMenu);
nav.addEventListener('click',closeMenu);


function openMenu(){
    
    menu.style.display='block';  
}

function closeMenu(){
    
    menu.style.display='none';  
}





