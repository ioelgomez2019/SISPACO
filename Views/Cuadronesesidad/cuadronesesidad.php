<?php 
    headerAdmin($data); 
    getModal('modalRegistropoi',$data);
    //getModal('modalClientes',$data);
?>
  <main class="app-content">    
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
                <?php if($_SESSION['permisosMod']['w']){ ?>
                <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
              <?php } ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/clientes"><?= $data['page_title'] ?></a></li>
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
                          <th>CODIGO ID</th>
                          <th>Objetivo Estrategico</th>
                          <th>Accion Estrategica</th>
                          
                          <th>SERVICIO BIEN</th>
                          <th>uNIDAD DE USO</th>
                          <th>pRECIO UNITARIO</th>
                          <th>Gasto especifico</th>
                          <th>Gasto en mes</th>
                          <th>ACCIONES</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>OAE1</td>
                          <td>MEJORAR LOS NIVELES DE LABORES DE APRENDIZAJE EN LOS ESTUDIANTES DE EDUCACOIN BASICA, TECNICO PRODUCTIVO Y NO UNIVERSITARIO</td>
                          <td>ADIESTRAMIENTO INTEGRAL Y DE CALIDAD PARA DOCENTES DE EDUCACION BASICA</td>
                          
                          <td>LAPICEROR</td>
                          <td>4</td>
                          <td>S/. 5.00</td>
                          <td>S/. 20</td>
                          <td>Enero</td>
                          
                          <td> <a href="http://localhost/tienda_poiv6/cuadronesesidad"><button class="btn btn-info btn-sm btnViewUsuario" onclick="fntView()" title="Ver usuario"><i class="far fa-eye" aria-hidden="true"></i></button></a></td>

                        </tr>
                        <tr>
                          <td>OAE1</td>
                          <td>MEJORAR LOS NIVELES DE LABORES DE APRENDIZAJE EN LOS ESTUDIANTES DE EDUCACOIN BASICA, TECNICO PRODUCTIVO Y NO UNIVERSITARIO</td>
                          <td>ADIESTRAMIENTO INTEGRAL Y DE CALIDAD PARA DOCENTES DE EDUCACION BASICA</td>
                          
                          <td>Cuadernos</td>
                          <td>10</td>
                          <td>S/. 10.00</td>
                          <td>S/. 100</td>
                          <td>Enero</td>
                          
                          <td> <a href="http://localhost/tienda_poiv6/cuadronesesidad"><button class="btn btn-info btn-sm btnViewUsuario" onclick="fntView()" title="Ver usuario"><i class="far fa-eye" aria-hidden="true"></i></button></a></td>

                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>
    