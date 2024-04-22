
<?php 
    headerAdmin($data); 
    getModal('modalActividadestrategica',$data);
    getModal('modalCuadronecesidad',$data);
    //getModal('modalClientes',$data);
?>
  <main class="app-content">    
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
                <?php if($_SESSION['permisosMod']['w']){ ?>
                <!--<button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> </button>-->
              <?php } ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/actividadestrategica"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableActividad">
                      <thead>
                        <tr>
                          <th>ID_POI</th>
                          <th>ID_ACT</th>
                          <th>Centro de costo</th>
                          <th>Objetivo Estrategico</th>
                          <th>nombre act</th>
                          <th>desc_act_ope</th>
                          <th>responsable</th>
                          <th>Acciones</th>                         
                          
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>
    