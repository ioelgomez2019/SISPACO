function openModal()
{
    document.querySelector('#idActividadestrategica').value ='';
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Registro Ficha POI";
    document.querySelector("#formActividadestrategica").reset();
    //document.querySelector("#modalFormRegistropoi").reset();
    $('#modalActividade').modal('show');
}

function openModalPerfil(){
    $('#modalFormPerfil').modal('show');
}
