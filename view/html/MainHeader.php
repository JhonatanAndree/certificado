<div class="br-header">
    <div class="br-header-left">
    <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
    <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- br-header-left -->
    <div class="br-header-right">
    <nav class="nav">
        <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name hidden-md-down"><?php echo $_SESSION["usu_nom"]?></span>
            <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
            <span class="square-10 bg-success"></span>
        </a>
        <input type="hidden" id="usu_idx" value="<?php echo $_SESSION['usu_id']?>"><!-- Tenemos el usu_id del usuario. -->
        <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
            <li><a href="../UsuPerfil/"><i class="icon ion-ios-gear"></i> Perfil</a></li>
            <li><a href="../html/logout.php"><i class="icon ion-power"></i> Cerrar Sesión</a></li>
            </ul>
        </div><!-- dropdown-menu -->
        </div>
    </nav>
    </div>
</div>