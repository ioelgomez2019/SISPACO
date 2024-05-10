<!-- Modal -->
<div class="modal fade" id="modalFormCuadronecesidad" class="modalFormCuadronecesidad" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">BIENVENIDO A LA TIENDA PACO</h5>
          <p>Techo Presupuestal 
            <span class=" badge bg-danger">470</span>
          </p>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formCuadronecesidad" name="formCuadronecesidad" class="form-horizontal">
              <input type="hidden" id="idCuadronecesidad" name="idCuadronecesidad" value="">
              <!--<p class="text-primary">Usted esta llenando los requrimientos de la ficha poi<button type="button" class="btn btn-primary" >
                Agregar  + 1
              </button>
              </p>
              <h4 id="requerimiento" >Requerimiento 1</h4>  -->      
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtRequerimiento">Requerimiento <span class="required">*</span></label>
                  <input type="text" class="form-control valid validText" id="txtRequerimiento" name="txtRequerimiento" required=""  >
                </div>
                <div class="form-group col-md-6">
                  <label for="txtEspgas">Especifica de gasto<span class="required">*</span></label>
                  <select class="form-control selectpiker" data-none-selected-text="please select..." data-live-search="true" id="txtEspgas" name="txtEspgas"  required="" >
                  
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="txtCodigocn">Codigo<span class="required">*</span></label>
                  <input type="text" class="form-control valid validText" value="" id="txtCodigocn" name="txtCodigocn" required=""  >
                </div>
                <div class="form-group col-md-3">
                  <label for="txtUnidadmed">Unidad Medida<span class="required">*</span></label>
                  <input type="text" class="form-control valid validText" id="txtUnidadmed" name="txtUnidadmed" required=""  >
                </div>
                <div class="form-group col-md-3">
                  <label for="txtCant">Cantidad <span class="required">*</span></label>
                  <input type="text" class="form-control valid validNumber" id="txtCant" name="txtCant" required=""  maxlength="3">
                </div>
                <div class="form-group col-md-3">
                  <label for="txtCostunit">Costo unitario <span class="required">*</span></label>
                  <input type="text" class="form-control valid " id="txtCostunit" name="txtCostunit" required=""  >
                </div>
              </div>
              <div class="form-row">

                <div class="form-group col-md-4">
                  <label for="txtMes">Especifica de mes<span class="required">*</span></label>
                  <input type="text" class="form-control valid " id="txtMes" name="txtMes" required=""  >
                </div>
                <input type="text" class="form-control valid " id="idactestrategica" name="idactestrategica" hidden="" >
              </div>

              <div class="form-row" id="addreq">
              </div>

              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div> 
            </form>
      </div>
    </div>
  </div>
</div>