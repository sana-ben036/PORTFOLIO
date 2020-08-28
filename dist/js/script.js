
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

// show projects by category:::::::::::::

    // menu
const menuAll = document.getElementById('menu-all');
const menuDesign = document.getElementById('menu-design');
const menuApplication = document.getElementById('menu-application');
const menuSite = document.getElementById('menu-site');

    // contenair
const all = document.getElementById('all');
const design = document.getElementById('design');
const application = document.getElementById('application');
const site = document.getElementById('website');


menuDesign.addEventListener('click',listDesign);
menuApplication.addEventListener('click',showApplication);
menuSite.addEventListener('click',showSite);
menuAll.addEventListener('click',showtAll);

function showDesign(){
    all.classList.remove('contenair');
    all.classList.add('none');
    design.classList.remove('none');
    design.classList.add('contenair');

}

function showApplication(){
    design.classList.remove('contenair');
    design.classList.add('none');
    application.classList.remove('none');
    application.classList.add('contenair');

}

function showSite(){
    application.classList.remove('contenair');
    application.classList.add('none');
    site.classList.remove('none');
    site.classList.add('contenair');

}

function showAll(){
    site.classList.remove('contenair');
    site.classList.add('none'); 
    all.classList.remove('none');
    all.classList.add('contenair');

}




