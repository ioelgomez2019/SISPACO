function openModal()
{
    document.querySelector('#idRegistropoi').value ='';
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Registro POI";
    document.querySelector("#formRegistropoi").reset();
    //document.querySelector("#modalFormRegistropoi").reset();
    $('#modalFormRegistropoi').modal('show');
}
function openModalPerfil(){
    $('#modalFormPerfil').modal('show');
}