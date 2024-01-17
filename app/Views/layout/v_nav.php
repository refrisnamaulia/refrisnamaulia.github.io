<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?= base_url('home')?>">Home</a></li>
            <li><a href="<?= base_url('dep')?>">Departemen</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Arsip Surat <span class="caret"></span></a>
              <ul class="dropdown-menu" style="top: 0; left: 0%; margin-top: 50px;">
                <li class="dropdown-submenu" style="position: relative; top: 0; left: 0%; margin-top: -1px;">
                  <a class="test" href="#">Jenis Surat <span class="caret"></span></a>
                  <ul class="dropdown-menu" style="position: relative; top: -26px; left: 100%; margin-top: -1px;">
                    <li><a tabindex="-1" href="<?= base_url('arsip')?>">Surat Masuk</a></li>
                    <li><a tabindex="-1" href="<?= base_url('arsipkeluar')?>">Surat Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </li>
                <li><a href="<?= base_url('user')?>">User</a></li>
          </ul>
</div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= base_url('foto/'. session()->get('foto')) ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"> <?= (session()->get('nama_user')) ?> </span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header" style="height: 200px;">
                  <img src="<?= base_url('foto/'. session()->get('foto')) ?>" class="img-circle" alt="User Image" style="height: 120px; width: 115px;">
                  <p>
                  <?= (session()->get('nama_user')) ?><br>
                   <b><?php if(session()->get('id_dep')==2){
                      echo 'Direktur Utama';
                   }else if (session()->get('id_dep')==4){
                      echo 'Sekretaris Perusahaan';
                   }else if (session()->get('id_dep')==5) {
                      echo 'Kabag Legal & Subrogasi';
                   }else if (session()->get('id_dep')==6) {
                    echo 'Kabag Penjaminan & Pemasaran';
                   }else if (session()->get('id_dep')==7) {
                    echo 'Kabag Keuangan, Adminstrasi & Umum';
                   }else if (session()->get('id_dep')==9) {
                    echo 'Admin KEU ADM & Umum';
                   }else if (session()->get('id_dep')==10) {
                    echo 'Admin PJM';
                   }else if (session()->get('id_dep')==11) {
                    echo 'Admin LS';
                 }?></b>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left"> -->
                    <a href="<?= base_url('profile')?>" class="btn btn-default btn-normal" style="border-radius: 5px;">Profile</a><br>
                  <!-- </div> -->
                  <!-- <div class="pull-right"> -->
                    <a href="<?= base_url('auth/logout')?>" class="btn btn-default btn-normal" style="border-radius: 5px;">Log Out</a>
                  <!-- </div> -->
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1><?= $title;?></h1>
        <ol class="breadcrumb">
          <li><a href="<?= base_url('home')?>" style="color: steelblue;"><i class="fa fa-dashboard"></i> E-Arsip</a></li>          
          <li class="active"><?= $title ?></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
      