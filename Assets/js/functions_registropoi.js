var tableRegistropoi;
let rowTable = "";
document.addEventListener('DOMContentLoaded', function () {

    tableRegistropoi = $('#tableRegistropoi').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Registropoi/getSelectregistrop",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idregistro" },
            { "data": "objestrinst" },
            { "data": "indicadoroe" },
            { "data": "metaoe" },
            { "data": "accestrinst" },
            { "data": "indicadorae" },
            { "data": "metaae" },
            { "data": "options" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
    if (document.querySelector("#formRegistropoi")) {
        var formRegistropoi = document.querySelector("#formRegistropoi");
        formRegistropoi.onsubmit = function (e) {
            e.preventDefault();
            var strCc = document.querySelector('#txtCc').value;
            var strOei = document.querySelector('#txtOei').value;
            var strCoe = document.querySelector('#txtCoe').value;
            var strIoe = document.querySelector('#txtIoe').value;
            var strUmoe = document.querySelector('#txtUmoe').value;
            var intMoe = document.querySelector('#txtMoe').value;
            var strAei = document.querySelector('#txtAei').value;
            var strCae = document.querySelector('#txtCae').value;
            var strIae = document.querySelector('#txtIae').value;
            var strUmae = document.querySelector('#txtUmae').value;
            var intMae = document.querySelector('#txtMae').value;
            if (strCc == '' 
            || strOei == '' 
            || strCoe == '' 
            || strIoe == '' || strUmoe == '' || intMoe == '' || strAei == '' || strCae == '' || strIae == '' || strUmae == '' || intMae == '') {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Registropoi/putRegistropoi';
            var formData = new FormData(formRegistropoi);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    console.log(objData);
                    var objData = JSON.parse(request.responseText);
                    //console.log(objData);
                    if (objData.status) 
                    {
                        $('#modalFormRegistropoi').modal("hide");
                        formRegistropoi.reset();
                        swal("REgistro POI", objData.msg, "success");
                        tableRegistropoi.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
                //divLoading.style.display = "none";
                return false;
            }

        }
    }

    if (document.querySelector("#formActividadestrategica")) {
        var formActividadestrategica = document.querySelector("#formActividadestrategica");
        formActividadestrategica.onsubmit = function (e) {
            e.preventDefault();



            var strNombreao = document.querySelector('#txtNombreao').value;
            var strProgp = document.querySelector('#txtProgp').value;
            var strDescao = document.querySelector('#txtDescao').value;
            var strDescma = document.querySelector('#txtDescma').value;
            var strResp = document.querySelector('#txtResp').value;

            if (strNombreao == '' 
            || strProgp == '' 
            
            || strDescao == '' || strDescma == '' || strResp == '') {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Registropoi/putActividadestr';
            var formData = new FormData(formActividadestrategica);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    console.log(objData);
                    var objData = JSON.parse(request.responseText);
                    //console.log(objData);
                    if (objData.status) 
                    {
                        $('#modalFormActividadestrategica').modal("hide");
                        formActividadestrategica.reset();
                        swal("Actividad Estrategica", objData.msg, "success");
                        tableRegistropoi.api().ajax.reload();
                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
                //divLoading.style.display = "none";
                return false;
            }

        }
    }

});

$('#tableRegistropoi').DataTable();
window.addEventListener('load', function () {
    fntCentroCosto();
    cargarIndicadorOE();
    cargaObjetivoEI();
    cargarunidadmoe();
    //segunda parte
    cargarCAE();
    cargarUMAE();
    //perteneciente a actividadoperativa
    cargarPP();

}, false)


function fntCentroCosto() { 
    var ajaxUrl = base_url + '/Registropoi/getSelectcc';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            const objData = JSON.parse(request.responseText);
            console.log(objData);
            //alert(objData.length);
            var cadena = "";

            for (var i = 0; i < objData.length; i++) {
                cadena = cadena + '<option  value=' + objData[i].idcentrocosto + '  >' + objData[i].nomcentrocosto + '</option>';
            }
            document.getElementById("txtCc").innerHTML = cadena;
            $('#txtCc').selectpicker('refresh');
            $('#txtCc').selectpicker('refresh');
        }
    }
}
 function fntCentroCosto14() {
    if (document.querySelector('#txtCc')) {
        var ajaxUrl = base_url + '/Centrocosto/getSelectCentrocosto';
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrl, true);
        request.send();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                //console.log(request.responseText);
                document.querySelector('#txtCc').innerHTML = request.responseText;
                $('#txtCc').selectpicker('render');
                $('#txtCc').selectpicker('refresh');

            }
        }
    }

}


function cargaObjetivoEI() {
    select = document.getElementById('txtOei');
    var ajaxUrl = base_url + '/Registropoi/getSelectObjetivoestricoNombre';
    //var ajaxUrl = base_url+'/Registropoi/getSelectObjetivoestricoNombre';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            const objData = JSON.parse(request.responseText);
            console.log(objData);
            //alert(objData.length);
            var cadena = "";

            for (var i = 0; i < objData.length; i++) {
                cadena = cadena + '<option  value=' + objData[i].idobjestr + '  >' + objData[i].nomobjestr + '</option>';
            }
            document.getElementById("txtOei").innerHTML = cadena;
            $('#txtOei').selectpicker('refresh');
            $('#txtUmoe').selectpicker('refresh');
            //$('#txtCoe').selectpicker('refresh');
        }
    }
}
$(document).on('change', '#txtOei', function (event) {
    var value;
    value = $(this).val();
    var ajaxUrl = base_url + '/Registropoi/getselectobjetivoestra/' + value;
    //var ajaxUrl = base_url + '/Registropoi/getSelectObjetivoestricoNombre';
    //var ajaxUrl = base_url+'/Registropoi/getSelectObjetivoestricoNombre';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if(request.readyState == 4 && request.status == 200){
             const objData = JSON.parse(request.responseText);
            document.querySelector('#txtCoe').value = objData.codoe;
        }
    }
    });

function cargarIndicadorOE() {
    $(document).on('change', '#txtOei', function (event) {
        select = document.getElementById('txtOei');
        oeiseleccionado = select.value;
        select2 = document.getElementById("txtIoe");
        select3 = document.getElementById("txtAei");
        
        var ajaxUrlioe = base_url + '/Registropoi/getSelectIndicadorOE/' + oeiseleccionado;

        var ajaxUrlaei = base_url + '/Registropoi/getSelectAccionestrategica/' + oeiseleccionado;
        

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrlioe, true);
        request.send();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                const sub = JSON.parse(request.responseText);
                var cadena = "";
                var cadena2 = "";
                cadena = cadena + '<option selected ="selected"> ㅤ⠀ㅤㅤ⠀ㅤ</option>';
                for (var i = 0; i < sub.length; i++) {

                    if (sub[i].obj_estrategico_idobjestr == oeiseleccionado) {
                        cadena = cadena + '<option  value=' + sub[i].idindicadoroei + ' >' + sub[i].nombreoei + '</option>';
                        //cadena.push(cadena);

                    }
                }
                document.getElementById("txtIoe").innerHTML = cadena;
                $('#txtIoe').selectpicker('refresh');
            }
        }
        var requestaei = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        requestaei.open("GET", ajaxUrlaei, true);
        requestaei.send();
        requestaei.onreadystatechange = function () {
            if (requestaei.readyState == 4 && requestaei.status == 200) {
                const aei = JSON.parse(requestaei.responseText);
                var cadenaaei = "";
                for (var i = 0; i < aei.length; i++) {
                    if (aei[i].obj_estrategico_idobjestr == oeiseleccionado) {
                        cadenaaei = cadenaaei + '<option  value=' + aei[i].idaccestr + '  >' + aei[i].accionestr + '</option>';
                        document.getElementById("txtAei").innerHTML = cadenaaei;
                        $('#txtAei').selectpicker('refresh');
                    }
                }
            }
        }
    });
}

$(document).on('change', '#txtIoe', function (event) {
    var value;
    value = $(this).val();
    var ajaxUrl = base_url + '/Registropoi/getSelectUnidadMOE/' + value;
    //var ajaxUrl = base_url + '/Registropoi/getSelectObjetivoestricoNombre';
    //var ajaxUrl = base_url+'/Registropoi/getSelectObjetivoestricoNombre';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if(request.readyState == 4 && request.status == 200){
             const objData = JSON.parse(request.responseText);
            document.querySelector('#txtUmoe').value = objData.nombre;
        }
    }
    });

function cargarunidadmoe() {
    $(document).on('change', '#txtIoe', function (event) {
    var value;
    value = $(this).val();
    var ajaxUrl = base_url + '/Registropoi/getSelectUnidadMOE/' + value;
    //var ajaxUrl = base_url + '/Registropoi/getSelectObjetivoestricoNombre';
    //var ajaxUrl = base_url+'/Registropoi/getSelectObjetivoestricoNombre';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if(request.readyState == 4 && request.status == 200){
             const objData = JSON.parse(request.responseText);
            document.querySelector('#txtUmoe').value = objData.nombre;
        }
    }
    });
}

function cargarCAE() {
    $(document).on('change', '#txtAei', function (event) {

        select = document.getElementById('txtAei');
        AEIseleccionado = select.value;
        var ajaxUrlioe = base_url + '/Registropoi/getSelectCAE/' + AEIseleccionado;
        var ajaxurlIAE = base_url + '/Registropoi/getSelectIAE/' + AEIseleccionado;
        //alert(AEIseleccionado);
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrlioe, true);
        request.send();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                const cadenacae = JSON.parse(request.responseText);

                var cadena3 = cadenacae.codigoaei;
                //alert(cadena3);
                document.querySelector('#txtCae').value = cadena3;
                $('#txtCae').selectpicker('refresh');
            }
        }

        var requestIAE = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        requestIAE.open("GET", ajaxurlIAE, true);
        requestIAE.send();

        requestIAE.onreadystatechange = function () {
            if (requestIAE.readyState == 4 && requestIAE.status == 200) {
                const cadenaiae = JSON.parse(requestIAE.responseText);
                var cadena4 = "";
                //alert(cadenaiae.length);
                for (var i = 0; i < cadenaiae.length; i++) {
                    cadena4 = cadena4 + '<option  value=' + cadenaiae[i].idindicadoraei + ' selected>' + cadenaiae[i].nombreaei + '</option>';
                }
                //alert(cadena4);
                document.querySelector('#txtIae').innerHTML = cadena4;
                $('#txtIae').selectpicker('refresh');
            }
        }
    });
}

function cargarUMAE() {
    $(document).on('change', '#txtIae', function (event) {
        select = document.getElementById('txtIae');
        iaeseleccionado = select.value;
        //alert(iaeseleccionado);
        var ajaxUrlumae = base_url + '/Registropoi/getSelectUnidadMAE/' + iaeseleccionado;
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrlumae, true);
        request.send();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                const sub = JSON.parse(request.responseText);

                var cadena3 = sub.nombre;
                //alert(cadena3);
                document.querySelector('#txtUmae').value = cadena3;
                $('#txtUmae').selectpicker('refresh');
            }
        }
    });
}

function cargarCAE() {
    $(document).on('change', '#txtAei', function (event) {

        select = document.getElementById('txtAei');
        AEIseleccionado = select.value;
        var ajaxUrlioe = base_url + '/Registropoi/getSelectCAE/' + AEIseleccionado;
        var ajaxurlIAE = base_url + '/Registropoi/getSelectIAE/' + AEIseleccionado;
        //alert(AEIseleccionado);
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrlioe, true);
        request.send();

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                const cadenacae = JSON.parse(request.responseText);

                var cadena3 = cadenacae.codigoaei;
                //alert(cadena3);
                document.querySelector('#txtCae').value = cadena3;
                $('#txtCae').selectpicker('refresh');
            }
        }

        var requestIAE = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        requestIAE.open("GET", ajaxurlIAE, true);
        requestIAE.send();

        requestIAE.onreadystatechange = function () {
            if (requestIAE.readyState == 4 && requestIAE.status == 200) {
                const cadenaiae = JSON.parse(requestIAE.responseText);
                var cadena4 = "";
                //alert(cadenaiae.length);
                cadena4 = cadena4 + '<option selected ="selected"> ㅤ⠀ㅤㅤ⠀ㅤ</option>';
                for (var i = 0; i < cadenaiae.length; i++) {
                    cadena4 = cadena4 + '<option   value=' + cadenaiae[i].idindicadoraei + ' >' + cadenaiae[i].nombreaei + '</option>';
                }

                //alert(cadena4);
                document.querySelector('#txtIae').innerHTML = cadena4;
                $('#txtIae').selectpicker('refresh');
            }
        }
    });
}

function openModalReg() {
    rowTable = "";
    document.querySelector('#idRegistro').value = '';
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Registro Ficha POI";
    document.querySelector("#formRegistro").reset();
    //document.querySelector("#modalFormRegistropoi").reset();
    $('#modalFormRegistro').modal('show');
}

function fntEditInfo(idregistro){

    //rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar  nuevos Rgistros";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Registropoi/getSelectallregistropoi/' + idregistro;
    //let ajaxUrl = base_url+'/Clientes/getCliente/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            
                //alert(objData.centrocosto);
                document.querySelector("#txtCcu").value = objData.centrocosto;
                document.querySelector("#txtOeiu").value = objData.objestrinst;
                document.querySelector("#txtCoeu").value = objData.codigooe;
                document.querySelector("#txtIoeu").value = objData.indicadoroe;
                document.querySelector("#txtUmoeu").value = objData.unidmedidaoe;
                document.querySelector("#txtMoeu").value = objData.metaoe;
                document.querySelector("#txtAeiu").value = objData.accestrinst;

                document.querySelector("#txtCaeu").value = objData.codigoae;
                
                document.querySelector("#txtIaeu").value = objData.indicadorae;
                document.querySelector("#txtUmaeu").value = objData.unidmedidaae;
                document.querySelector("#txtMaeu").value = objData.metaae;

            
        }
        $('#modalFormRegistro').modal('show');
    }
}

function openModal() {
    
    document.querySelector('#idRegistropoi').value = '';
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Registro Ficha POI";
    document.querySelector("#formRegistropoi").reset();
    
    $('#modalFormRegistropoi').modal('show');
}
function openModalPerfil() {
    $('#modalFormPerfil').modal('show');
}
function openModalacte() {
    document.querySelector('#idActividadestrategica').value = '';
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Registro De Actividad Estrategica";
    document.querySelector("#formActividadestrategica");
    $('#modalFormActividadestrategica').modal('show');
}
function fntGenAct(idregistro){

    //rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML = "Nuevo Registro De Actividad Estrategica";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + '/Registropoi/getSelectallregistropoi/' + idregistro;
    //let ajaxUrl = base_url+'/Clientes/getCliente/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            
                
                document.querySelector("#txtACOei").value = objData.codigooe;
                document.querySelector("#txtAOei").value = objData.objestrinst;

                document.querySelector("#txtACAei").value = objData.codigoae;
                document.querySelector("#txtCAei").value = objData.accestrinst;

                document.querySelector("#txtNumficha").value =objData.idregistro;
                //document.querySelector(".txtNumficha").id=
            
        }
        $('#modalFormActividadestrategica').modal('show');
    }
}

function cargarPP1() {
    $(document).on('change', '#txtProgp', function (event) {
        select = document.getElementById('txtProgp');
        iaeseleccionado = select.value;
        //alert(iaeseleccionado);
        var ajaxUrlumae = base_url + '/Registropoi/getSelectUnidadMAE/' + iaeseleccionado;
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrlumae, true);
        request.send();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                const sub = JSON.parse(request.responseText);

                var cadena3 = sub.nombre;
                //alert(cadena3);
                document.querySelector('#txtUmae').value = cadena3;
                $('#txtUmae').selectpicker('refresh');
            }
        }
    });
}
//preteneciente a actividad estrategica
function cargarPP() {
    select = document.getElementById('txtProgp');
    var ajaxUrl = base_url + '/Actividadestrategica/getSelectpp';
    //var ajaxUrl = base_url+'/Registropoi/getSelectObjetivoestricoNombre';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //document.querySelector('#txtCc').innerHTML = request.responseText;
            //$('#txtCc').selectpicker('refresh');
            const objData = JSON.parse(request.responseText);
            console.log(objData);
            //alert(objData.length);
            var cadena = "";

            for (var i = 0; i < objData.length; i++) {
                cadena = cadena + '<option  value=' + objData[i].idprograma_pre + '  >' + objData[i].nombre_pp + '</option>';
            }
            document.getElementById("txtProgp").innerHTML = cadena;
            $('#txtProgp').selectpicker('refresh');
            $('#txtProgp').selectpicker('refresh');
            $(document).on('change', '#txtProgp', function (event) {
                var value;
                value = $(this).val();
                objData[value - 1];

                document.querySelector('#txtCodpp').value = objData[value - 1].cod_pp;
            });
        }
    }
}