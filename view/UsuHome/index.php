<?php
/* Llamada a conexion */
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <?php require_once('../html/MainHead.php'); ?>
        <title>Empresa::Home</title>
    </head>

    <body>
        <?php require_once('../html/MainMenu.php'); ?>
        <?php require_once('../html/MainHeader.php'); ?>
        <div class="br-mainpanel">
            <div class="br-pageheader pd-y-15 pd-l-20">
                <nav class="breadcrumb pd-0 mg-0 tx-12">
                    <a class="breadcrumb-item" href="#">Home</a>
                </nav>
            </div><!-- br-pageheader -->
            <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                <h4 class="tx-gray-800 mg-b-5">Inicio</h4>
                <p class="mg-b-0">Panel de Control</p>
            </div>
            <div class="br-pagebody mg-t-5 pd-x-30">
                <!-- Contenido -->

                <!-- Contador Resumen del total de cursos -->
                <div class="row row-sm">
                    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                        <div class="bg-br-primary rounded overflow-hidden">
                            <div class="pd-25 d-flex align-items-center">
                                <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                                <div class="mg-l-20">
                                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total de Cursos</p>
                                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1" id="lbltotal"></p>
                                    <span class="tx-11 tx-roboto tx-white-6">con Certificación o Diploma</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->

                <!-- Tabla Resumen top 10 cursos -->
                <div class="row row-sm mg-t-20">
                    <div class="col-12">
                        <div class="card pd-0 bd-0 shadow-base">
                            <div class="pd-x-30 pd-t-30 pd-b-15">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Top ultimos 10 cursos</h6>
                                        <p class="mg-b-0">Visualización de los certificados obtenidos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pd-x-15 pd-b-15">
                                <!-- Contenido Tabla Cursos de Usuario -->

                                <div class="table-wrapper">
                                    <table id="cursos_data" class="table display responsive nowrap">
                                        <!-- Usamos el nombre "id=cursos_data" para llamarlo desde usucurso.js. -->
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">Curso</th>
                                                <th class="wd-15p">Fecha Inicio</th>
                                                <th class="wd-20p">Fecha Fin</th>
                                                <th class="wd-15p">Profesor</th>
                                                <th class="wd-10p">Ver</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div><!-- table-wrapper -->

                                <!-- Contenido Tabla Cursos de Usuario fin-->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenido -->
            </div>
        </div>
        <?php require_once('../html/MainJs.php'); ?>
        <script type="text/javascript" src="usuhome.js"></script>
    </body>

    </html>
<?php
} else {
    /* Redirección de no haber iniciado sesión */
    header("Location:" . conectar::ruta() . "view/404");
}
?>