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
            "url": " " + base_url + "/Pedidospoi/getSelectregistrop",
            "dataSrc": ""
        },
      //  registropoi.idregistro, 
        //            registropoi.centrocosto, 
           //         registropoi.objestrinst, 
            //        registropoi.indicadoroe, 
              //      registropoi.accestrinst, 
                //    registropoi.indicadorae, 
                 //   actividad.nombre_act, 
                  //  actividad.desc_act_ope, 
                   // actividad.responsable
        "columns": [
            { "data": "idregistro" },
            { "data": "centrocosto" },
            { "data": "objestrinst" },
            { "data": "indicadoroe" },
            { "data": "accestrinst" },
            { "data": "indicadorae" },
            { "data": "nombre_act" },
            { "data": "desc_act_ope" },
            { "data": "options" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});
function btnimdprimir(idfichapoi){
    alert(idfichapoi);

}

function btnimprimir(idregistro){
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    //let ajaxUrl = base_url + '/Pedidospoi/getSelectallregistropoi/' + idregistro;
    let ajaxUrl = base_url + '/Pedidospoi/generarPdf/' + idregistro;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            //let objData = JSON.parse(request.responseText);
            window.open(ajaxUrl, '_blank');
            //window.location.href = ajaxUrl;
            //alert("hola mindo");
            
        }
    }
}

 function functionconsutasx() {
    if (document.querySelector('#txtCc')) {
        var ajaxUrl = base_url + '/Pedidospoi/getselectpedidos';
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", ajaxUrl, true);
        request.send();
    }

}
$('#tableRegistropoi').DataTable();