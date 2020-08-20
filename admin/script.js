// Séléctionner les aiguilles de montre
const aiguilleHr = document.querySelector("#hour");
const aiguilleMin = document.querySelector("#minute");
const aiguilleSec = document.querySelector("#second");

//Extraire l'heure actuel à l'aide de l'objet Date()
let date = new Date();


//Ajouter l'heure , minite , seconde  dans des varaiables
let hour = date.getHours();
let minuts = date.getMinutes();
let seconds = date.getSeconds();

// Calculer de degré de mouvement de l'aiguille heure, de l'aiguille minute, de l'aiguille seconde
// Hint : Tous les aiguilles doivent se déplacer chaque second selon un degré

let hourDeg = (hour*360/12)+(minuts*(360/60)/12);
let minutDeg = (minuts*360/60)+(seconds*(360/60)/60);
let secondDeg =seconds*360/60;


// Déplacer les aiguilles 
function demarrerLaMontre() {
    hourDeg = hourDeg +(3/360);
    minutDeg = minutDeg +(6/60);
    secondDeg = secondDeg+6;
      
    aiguilleHr.style.transform ="rotate(" + hourDeg +"deg)";
    aiguilleMin.style.transform ="rotate(" + minutDeg +"deg)";
    aiguilleSec.style.transform ="rotate(" + secondDeg +"deg)";

}
// Exercuter la fonction chaque second
var interval = setInterval(demarrerLaMontre, 1000);