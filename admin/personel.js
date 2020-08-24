
///////////////////////////////////////////// edit info of admin ///////////////////////

const edit = document.getElementById("edit");
const data = document.getElementById("data");


edit.addEventListener('click',showInput);

function showInput(){
    data.textContent = `<input class="form_item" type="text"  value='<?= $name  ?> ' > `;
    
    
}