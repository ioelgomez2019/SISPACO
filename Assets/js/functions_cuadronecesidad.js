var tableCuadrones;
document.addEventListener('DOMContentLoaded', function(){

    tableCuadrones = $('#tableCuadrones').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Cuadronecesidad/getSelectcuanes",
            "dataSrc":""
        },
        "columns":[
            {"data":"idNecesidad"},
            {"data":"nombre_act"},
            {"data":"requerimiento"},
            {"data":"espe_gas_nombre"},
            {"data":"cantidad"},
            {"data":"gastoMES"},
            {"data":"unidad_med"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });
    console.log("Hasta aqui");
    if (document.querySelector("#formCuadronecesidad")) {
        var formCuadronecesidad = document.querySelector("#formCuadronecesidad");
        formCuadronecesidad.onsubmit = function (e) {
            e.preventDefault();
            var strRequerimiento = document.querySelector('#txtRequerimiento').value;
            var strCodigocn = document.querySelector('#txtCodigocn').value;
            var strUnidadmed = document.querySelector('#txtUnidadmed').value;
            var strCant = document.querySelector('#txtCant').value;
            var strCostunit = document.querySelector('#txtCostunit').value;
            var strMes = document.querySelector('#txtMes').value;

            if (strRequerimiento == '' 
            || strCodigocn == '' 
            
            || strUnidadmed == '' || strCant == '' || strCostunit == ''||strMes== '') {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            //var ajaxUrl = base_url + '/Registropoi/putActividadestr';
            var ajaxUrl = base_url+'/Cuadronecesidad/setCuadronesesidad'; //put perfil
            var formData = new FormData(formCuadronecesidad);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    
                    var objData = JSON.parse(request.responseText);
                    //console.log(objData);
                    if (objData.status) 
                    {
                        $('#modalFormCuadronecesidad').modal("hide");
                        formCuadronecesidad.reset();
                        swal("Actividad Estrategica", objData.msg, "success");
                        tableCuadrones.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
                //divLoading.style.display = "none";
                return false;
            }
            

        }
    }

}, false);
function openModaleditcn(idregistro){

    //rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Registro De Actividad Estrategica";
    document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Cuadronecesidad/getSelectallregcuanes/' + idregistro;
    //let ajaxUrl = base_url+'/Clientes/getSelectallregistroact/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            
                //alert(objData.centrocosto);
                document.querySelector("#idCuadronecesidad").value = objData.idNecesidad;
                document.querySelector("#txtRequerimiento").value = objData.requerimiento;
                document.querySelector("#txtEspgas").value = objData.insumos_idrequerimientos;

                document.querySelector("#txtCodigocn").value = objData.espe_gas_cod;

                document.querySelector("#txtUnidadmed").value = objData.unidad_med;
                document.querySelector("#txtCant").value = objData.cantidad;
                document.querySelector("#txtCostunit").value = objData.costo_unitario;

                document.querySelector("#txtMes").value = objData.gastoMES;


                //document.querySelector("#txtResp").value = objData.responsable;                

                
                $('#txtResp').selectpicker('render');
                

            
        }
        $('#modalFormCuadronecesidad').modal('show');
    }
}
function fntInsumos() {
//$(document).on('change', '#txtOei', function (event) { 
    var ajaxUrl = base_url + '/Actividadestrategica/getSelectinsumos';
    var requestins = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    requestins.open("GET", ajaxUrl, true);
    requestins.send();
    requestins.onreadystatechange = function () {
        if (requestins.readyState == 4 && requestins.status == 200) {

            const objDatains = JSON.parse(requestins.responseText);
            
            console.log(objDatains);
            
            var cadena = "";

            for (var i = 0; i < objDatains.length; i++) {
                cadena = cadena + '<option  value=' + objDatains[i].idrequerimientos + '  >' + objDatains[i].espe_nombre + '</option>';
            }
            document.getElementById("txtEspgas").innerHTML = cadena;
            $('#txtEspgas').selectpicker('refresh');
            $('#txtEspgas').selectpicker('refresh');
            $(document).on('change', '#txtEspgas', function (event) {
                var value;
                value = $(this).val();
                objDatains[value - 1];
                document.querySelector('#txtCodigocn').value = objDatains[value - 1].espe_identificador;
            });
        }
    }
//});
}

$('#tableCuadrones').DataTable();
window.addEventListener('load', function () {
    fntInsumos();
}, false)


function openModal()
{
    document.querySelector('#idCuadronecesidad').value ='';
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Registro Ficha POI";
    document.querySelector("#formCuadronecesidad");
    $('#modalFormCuadronecesidad').modal('show');
}
function openModalCua()
{
    document.querySelector('#idCuadronecesidad').value ='';
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Bienvenido a la tienda de la DREP";
    document.querySelector("#formCuadronecesidad");
    $('#modalFormCuadronecesidad').modal('show');
}



