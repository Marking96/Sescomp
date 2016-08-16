<!-- ==============================================
Header
=============================================== -->
<section class="header">

  <div class="container">
    <div class="row">

      <div class="span12">

        <!-- ==============================================
        Logo
        =============================================== -->

        <div class="span2 text-center logo-flisolvale">
        <a href="http://200.129.62.41/sescomp/setup"><img src="http://200.129.62.41/sescomp/images/logo.svg" alt="Ínicio"></a>
      </div>


        <!-- End Logo
        =============================================== -->

        <!-- ==============================================
        Navigation
        =============================================== -->

      <?php if(isset($_SESSION['idUsuario'])){ ?>
        <ul class="nav hidden-phone hidden-tablet">
          <li><a href="<?php echo $urlBase;?>">Inicio</a></li>
          <li><a href="<?php echo $urlBase;?>mapa">Mapa</a></li>
          <li><a href="<?php echo $urlBase;?>palestrantes">Palestrantes</a></li>
          <li><a href="<?php echo $urlBase;?>oficinas">Oficinas</a></li>
          <li><a href="<?php echo $urlBase;?>inscritos">Inscritos</a></li>
<!--	  <li><a href="<?php echo $urlBase;?>doadores">Doadores</a></li>
          <!--<li><a href="#" class="event-button">Inscrições</a></li>-->
        </ul>
        <!-- End Navigation
        =============================================== -->

        <!-- ==============================================
        Mobile Navigation
        =============================================== -->
        <form name="nav" class="float-right">
              <select class="mobile-nav hidden-desktop" data-autogenerate="true"></select>
            </form>
            <!-- End Mobile Navigation
        =============================================== -->
<?php } ?>
      </div>
    </div>
  </div>
</section>
<!-- End Header
=============================================== -->
