<?php 
    headerAdmin($data); 
    

?>
  <main class="app-content">    
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
                <?php if($_SESSION['permisosMod']['w']){ ?>
                
              <?php } ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/registropoi"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableRegistropoi">
                      <thead>
                        <tr>
                         
                          <th>NRO FICHA</th>
                          <th>Centro Costo</th>
                          <th>Obj Estra Inst</th>
                          <th>Indicador OE</th>
                          <th>Accion Estrategica</th>
                          <th>indicador AE</th>
                          <th>Nombre Actividad O.</th>
                          <th>descripcion Actividad O.</th>
                          <th>Funciones</th>
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
    