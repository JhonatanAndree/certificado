<!DOCTYPE html>
<html lang="es" class="pos-relative">

<head>
    <?php include '../../view/html/MainHead.php'; ?>
    <title>Certificado</title>
</head>

<body class="pos-relative">
    <div class="ht-100v d-flex align-items-center justify-content-center">
        <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
            <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">
                <canvas id="canvas" width="900" height="600" class="img-fluid" alt="Responsive image"></canvas>
                <!-- <img src="../../public/certificado.png" class="img-fluid" alt="Responsive image"> -->
            </h1>
            <br>
            <p class="tx-16 mg-b-30 text-justify" id="cur_descrip">
                <!-- Usamos un id para llamar a la descripción del curso (certificado.js) -->
            </p>
            <div class="form-layout-footer">
                <button class="btn btn-outline-info"><i class="fa fa-send mg-r-10"></i>PDF</button>
                <button class="btn btn-outline-success"><i class="fa fa-send mg-r-10"></i>PNG</button>
            </div>
        </div>
    </div>

    <?php include '../html/MainJs.php'; ?>
    <script type="text/javascript" src="certificado.js"></script>
</body>

</html>