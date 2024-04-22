<!-- Modal -->
<div class="modal fade" id="modalFormActividadestrategica" class="modalFormActividadestrategica" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Actividad Estrategica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formActividadestrategica" name="formActividadestrategica" class="form-horizontal">
              <input type="hidden" id="idActividadestrategica" name="idActividadestrategica" value="">
              
              <div class="form-row">
                
                <div class="form-group col-md-2">
                  <label for="txtACOei">Codigo de OEI</label>
                  <input type="text" class="form-control valid validText" id="txtACOei" name="txtACOei"  placeholder="" disabled="">
                </div>
                <div class="form-group col-md-10">
                  <label for="txtAOei">Objetivo Estrategico Institucional</label>
                  <input type="text" class="form-control valid validText" id="txtAOei" name="txtAOei"  placeholder="" disabled="">
                </div>
              </div>
              <div class="form-row">
                
                <div class="form-group col-md-2">
                  <label for="txtACAei">Codigo de AEI </label>
                  <input type="text" class="form-control valid validText" id="txtACAei" name="txtACAei"  placeholder="" disabled="">
                </div>
                <div class="form-group col-md-10">
                  <label for="txtCAei">Accion Estrategica Instituciona</label>
                  <input type="text" class="form-control valid validText" id="txtCAei" name="txtCAei"  placeholder="" disabled="">
                </div>
              </div>
              <p class="text-primary">Los campos con (<span class="required">*</span>) son obligatorios</p>
              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="txtNombreao">Nombre de la Actividad Operativa <span class="required">*</span></label>
                  <input type="text" class="form-control valid validText" id="txtNombreao" name="txtNombreao" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="txtProgp">Programa presupuestal <span class="required">*</span></label>
                  <select class="form-control selectpicker" data-live-search="true" id="txtProgp" name="txtProgp" >
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="txtCodpp">Codigo PP <span class="required">*</span></label>
                  <input type="text" class="form-control valid validNumber" id="txtCodpp" name="txtCodpp" disabled maxlength="3" >
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtDescao">Breve descripcion de la actividad operativa <span class="required">*</span></label>
                  <textarea class="form-control" id="txtDescao" name="txtDescao" rows="3"></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label for="txtDescma">Decripcion meta alcanzar <span class="required">*</span></label>
                  <textarea class="form-control" id="txtDescma"  name="txtDescma" rows="3"></textarea>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtResp">Responsable <span class="required">*</span></label>
                    <select class="form-control selectpicker" data-live-search="true" id="txtResp" name="txtResp" required >
                      <option value="1" id="1"> Esp. Finanzas</option>
                      <option value="2" id="2"> Esp. Planificador</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                  
                  <input type="text" class="" id="txtNumficha" name="txtNumficha" hidden="" >
                </div>
             </div>

              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span>
                </button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div> 
            </form>
      </div>
    </div>
  </div>
</div>