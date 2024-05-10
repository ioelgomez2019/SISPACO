<!-- Modal -->
<div class="modal fade" id="modalFormRegistro" class="modalFormRegistro" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerUpdate">
        <h5 class="modal-title" id="titleModal">Actualizar Datos Registro  PACO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
            <form id="formRegistro" name="formRegistro" class="form-horizontal">
              <input type="hidden" id="idRegistro" name="idRegistro" value="">
              <p class="text-primary">Los campos con (<span class="required">*</span>) son obligatorios</p>

              <div class="form-row">
                <div class="form-group col-md-6">
                   <label for="txtCcu">Objetivo CENTRO DE COSTO <span class="required">*</span> </label>
                    <input type="text" class="form-control valid validText" id="txtCcu" name="txtCcu" required="" disabled=""  value="">
                                 
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  
                  <label for="txtOeiu">Objetivo estrategico institucional <span class="required">*</span> </label>
                    <input type="text" class="form-control valid validText" id="txtOeiu" name="txtOeiu" required="" disabled="" >

                </div>
              </div>
              <div class="form-row">
                
                <div class="form-group col-md-6">
                  <label for="txtCoeu">Codigo de Objetivo Estrategico <span class="required">*</span> </label>

                  <input type="text" class="form-control valid validText" id="txtCoeu" name="txtCoeu" required="" disabled="">

                    
                </div>

                <div class="form-group col-md-6">
                  <label for="txtIoeu">Indicador Objetivo Estrategico <span class="required">*</span> </label>
                   <input type="text" class="form-control valid validText" id="txtIoeu" name="txtIoeu" required="" disabled="" >
                  
                </div>
              </div>

              <div class="form-row">
                
                <div class="form-group col-md-6">
                  <label for="txtUmoeu">Unidad de Medida de Objetivo Estratico <span class="required">*</span></label>
                  <input type="text" class="form-control valid validText" id="txtUmoeu" name="txtUmoeu" required="" disabled="" >
                </div>
               
                <div class="form-group col-md-6">  
                  <label for="txtMoeu">Meta Objetivo Estrategico <span class="required">*</span> </label>
                  <input type="text" class="form-control valid validNumber" id="txtMoeu" name="txtMoeu" required="" onkeypress="return controlTag(event);" maxlength="3" >

                </div>
              </div>
              
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtAeiu">Accion estrategica institucional <span class="required">*</span></label>
                    <input type="text" class="form-control valid validText" id="txtAeiu" name="txtAeiu" required="" disabled="" >
                </div>
                </div>
               <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtCaeu">Codigo de accion Estrategica <span class="required">*</span></label>
                    <input type="text" class="form-control valid validText" id="txtCaeu" name="txtCaeu" required="" disabled="" >
                </div>
             </div>
           
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtIaeu">Indicador Accion Estrategica <span class="required">*</span> </label>
                    <input type="text" class="form-control valid validText" id="txtIaeu" name="txtIaeu" required="" disabled="" >
                </div>
                <div class="form-group col-md-6">
                    <label for="txtUmaeu">Unidad de Medida de Accion Estrategica <span class="required">*</span></label>
                    <input type="text" class="form-control valid validText" id="txtUmaeu" name="txtUmaeu" required="" disabled="" >
                </div>
             </div>
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtMaeu">Meta accion estrategica <span class="required">*</span></label>
                    <input type="text" class="form-control valid validNumber" id="txtMaeu" name="txtMaeu" required="" onkeypress="return controlTag(event);" maxlength="3">
                </div>
                
             </div>
             
            
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Actualizar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div> 
            </form>
      </div>
    </div>
  </div>
</div>