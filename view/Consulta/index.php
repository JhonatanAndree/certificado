<!DOCTYPE html>
<html lang="es" class="pos-relative">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="twitter:site" content="@mecertifica_">
    <meta name="twitter:creator" content="@mecertifica_">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Me Certifica Online">
    <meta name="twitter:description" content="Sistema de emisión y administración de diplomas o certificados.">
    <meta name="twitter:image" content="https://mecertifica.online//img/bracket-social.png">
    <meta property="og:url" content="https://mecertifica.online/">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Identidad profesional digital.">
    <meta property="og:image" content="https://mecertifica.online//img/bracket-social.png">
    <meta property="og:image:secure_url" content="https://mecertifica.online//img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <meta name="description" content="Consulta de certificado o diploma de tu institución.">
    <meta name="author" content="Jhonatan Andree Carrión Neyra">

    <title>Consulta</title>

    <!-- vendor css -->
    <link href="../../public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../public/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <link href="../../public/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../../public/css/bracket.css">
  </head>

  <body class="pos-relative">

    <div class="ht-100v d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h1 class="tx-45 tx-xs-50 tx-normal tx-inverse tx-roboto mg-b-0">Consultar Certificados</h1>
        <h5 class="tx-xs-24 tx-normal tx-info mg-b-30 lh-5">Ingrese DNI para Validar</h5>

        <div class="d-flex justify-content-center">
          <div class="input-group wd-xs-300">
            <input type="text" id="usu_dni" name="usu_dni" class="form-control" placeholder="DNI...">
            <div class="input-group-btn">
              <button class="btn btn-info" id="btnconsultar"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        <!-- Panel para listar certificados asignados al DNI en consulta -->
        <div class="row row-sm mg-t-20" id="divpanel">
          <div class="col-12">
            <div class="card pd-0 bd-0 shadow-base">
              <div class="pd-x-30 pd-t-30 pd-b-15">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1" id="lbldatos">Listado de Cursos</h6>
                    <p class="mg-b-0">Aquí visualiza los Certificados</p>
                  </div>
                </div>
              </div>
              <div class="pd-x-15 pd-b-15">
                <div class="table-wrapper">
                  <table id="cursos_data" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-15p">Curso</th>
                        <th class="wd-15p">Fecha Inicio</th>
                        <th class="wd-20p">Fecha Fin</th>
                        <th class="wd-15p">Profesor</th>
                        <th class="wd-10p"></th>
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

      </div>
    </div>

    <script src="../../public/lib/jquery/jquery.js"></script>
    <script src="../../public/lib/popper.js/popper.js"></script>
    <script src="../../public/lib/bootstrap/bootstrap.js"></script>

    <script src="../../public/lib/datatables/jquery.dataTables.js"></script>
    <script src="../../public/lib/datatables-responsive/dataTables.responsive.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="consulta.js"></script>
  </body>
</html>
