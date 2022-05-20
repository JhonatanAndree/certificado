<?php
/* Llamada a conexion */
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <?php require_once '../html/MainHead.php'; ?>
        <title>Empresa::Curso</title>
    </head>

    <body>
        <?php require_once '../html/MainMenu.php'; ?>
        <?php require_once '../html/MainHeader.php'; ?>
        <div class="br-mainpanel">
            <div class="br-pageheader pd-y-15 pd-l-20">
                <nav class="breadcrumb pd-0 mg-0 tx-12">
                    <a class="breadcrumb-item" href="#">Mis Cursos</a>
                </nav>
            </div><!-- br-pageheader -->
            <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                <h4 class="tx-gray-800 mg-b-5">MIs cursos</h4>
                <p class="mg-b-0">Listado de cursos aplicados.</p>
            </div>
            <div class="br-pagebody">
                <!-- Contenido Tabla Cursos de Usuario -->
                <div class="br-section-wrapper">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Listado de mis cursos.</h6>
                    <p class="mg-b-25 mg-lg-b-50">Aquí encontrará sus cursos por certificado o diploma otorgado.</p>
                    <div class="table-wrapper">
                        <table id="cursos_data" class="table display responsive nowrap"> <!-- Usamos el nombre "id=cursos_data" para llamarlo desde usucurso.js. -->
                            <thead>
                                <tr>
                                    <th class="wd-15p">Curso</th>
                                    <th class="wd-15p">Fecha Inicio</th>
                                    <th class="wd-20p">Fecha Fin</th>
                                    <th class="wd-15p">Profesor</th>
                                    <th class="wd-10p">Ver Certificado</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div>
                <!-- Contenido Tabla Cursos de Usuario fin-->
            </div>
        </div>
        <?php require_once '../html/MainJs.php';?>
        <script type="text/javascript" src="usucurso.js"></script>"
    </body>

    </html>
<?php
} else {
    /* Redirección de no haber iniciado sesión */
    header("Location:" . conectar::ruta() . "view/404");
}
?>