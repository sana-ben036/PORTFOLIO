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
    
    
    menuDesign.addEventListener('click',showDesign);
    menuApplication.addEventListener('click',showApplication);
    menuSite.addEventListener('click',showSite);
    menuAll.addEventListener('click',showAll);
    
    function showDesign(){
        all.classList.remove('contenair');
        all.classList.add('none');
        design.classList.remove('none');
        design.classList.add('contenair');
        application.classList.remove('contenair');
        application.classList.add('none');
        site.classList.remove('contenair');
        site.classList.add('none');
    
    }
    
    function showApplication(){
        design.classList.remove('contenair');
        design.classList.add('none');
        site.classList.remove('contenair');
        site.classList.add('none');
        application.classList.remove('none');
        application.classList.add('contenair');
    
    }
    
    function showSite(){
        application.classList.remove('contenair');
        application.classList.add('none');
        site.classList.remove('none');
        site.classList.add('contenair');
        design.classList.remove('contenair');
        design.classList.add('none');
    
    }
    
    function showAll(){
        window.location.reload(); 
    }