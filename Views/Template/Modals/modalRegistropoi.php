<!-- Modal -->
<div class="modal fade" id="modalFormRegistropoi" class="modalFormRegistropoi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Registro  POI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
            <form id="formRegistropoi" name="formRegistropoi" class="form-horizontal">
              <input type="hidden" id="idRegistropoi" name="idRegistropoi" value="">
              <p class="text-primary">Los campos con <span class="required">*</span> son obligatorios</p>

              <div class="form-row">
                <div class="form-group col-md-6">
                   <label for="txtCc">Objetivo CENTRO DE COSTO <span class="required">*</span> </label>
                    <select class="form-control" data-none-selected-text="please select..." data-live-search="true" id="txtCc" name="txtCc" >     
                    </select>
                                 
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  
                  <label for="txtOei">Objetivo estrategico institucional <span class="required">*</span> </label>
                    <select  class="form-control " data-none-selected-text="please select..." data-live-search="true" id="txtOei" name="txtOei"  required="" onchange="cargarIndicadorOE()">
                       
                    </select>

                </div>
              </div>
              <div class="form-row">
                
                <div class="form-group col-md-6">
                  <label for="txtCoe">Codigo de Objetivo Estrategico <span class="required">*</span> </label>
                  <input type="text" class="form-control valid " id="txtCoe" name="txtCoe"  disabled="">

                    
                </div>

                <div class="form-group col-md-6">
                  <label for="txtIoe">Indicador Objetivo Estrategico <span class="required">*</span> </label>
                  <select  class="form-control" data-none-selected-text="please select..." data-live-search="true" id="txtIoe" name="txtIoe"  required="" onchange="cargarunidadmoe()">
                       
                    </select>
                  
                </div>
              </div>

              <div class="form-row">
                
                <div class="form-group col-md-6">
                  <label for="txtUmoe">Unidad de Medida de Objetivo Estratico <span class="required">*</span></label>
                  <input type="text" class="form-control valid validText" id="txtUmoe" name="txtUmoe" required="" disabled="" >
                </div>
               
                <div class="form-group col-md-6">  
                  <label for="txtMoe">Meta Objetivo Estrategico <span class="required">*</span> </label>
                  <input type="text" class="form-control valid validNumber" id="txtMoe" name="txtMoe" required="" onkeypress="return controlTag(event);" maxlength="3" >

                </div>
              </div>
              
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtAei">Accion estrategica institucional <span class="required">*</span></label>
                    <select class="form-control " data-live-search="true" id="txtAei" name="txtAei"  onchange="cargarCAE()">
                    </select>
                </div>
                </div>
               <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtCae">Codigo de accion Estrategica <span class="required">*</span></label>
                    <input type="text" class="form-control valid validText" id="txtCae" name="txtCae" required="" disabled="" >
                </div>
             </div>
           
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtIae">Indicador Accion Estrategica <span class="required">*</span> </label>
                    <select class="form-control selectpicker" data-none-selected-text="please select..." data-live-search="true"  id="txtIae" name="txtIae" onchange="cargarUMAE()" >
                      
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="txtUmae">Unidad de Medida de Accion Estrategica <span class="required">*</span></label>
                    <input type="text" class="form-control valid validText" id="txtUmae" name="txtUmae" required="" disabled="" >
                </div>
             </div>
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtMae">Meta accion estrategica <span class="required">*</span></label>
                    <input type="text" class="form-control valid validNumber" id="txtMae" name="txtMae" required="" onkeypress="return controlTag(event);" maxlength="3">
                </div>
                
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