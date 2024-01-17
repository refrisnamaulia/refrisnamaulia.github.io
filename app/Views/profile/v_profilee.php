<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Profil Anda</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group text-center">
                    <img src="<?= base_url('foto/'. session()->get('foto')) ?>" width="180px" style="border-radius: 60%;">
                </div>
                <div class="form-group">
                    <label> Nama Pengguna </label>
                    <input name="nama_user" value="<?= (session()->get('nama_user')) ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label> Email </label>
                    <input name="email" value="<?= (session()->get('email')) ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input name="password" value="<?= (session()->get('password')) ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label> Level </label>
                    <input name="password" value="<?php if(session()->get('level')==1){
                        echo 'Direktur Utama';
                    }else if (session()->get('level')==2){
                        echo 'Sekretaris';
                    }else if (session()->get('level')==3) {
                        echo 'Admin';
                    }else if (session()->get('level')==4) {
                      echo 'User';
                    }?>" class="form-control" readonly>

                </div>
                <div class="form-group">
                    <label> Departemen </label>
                    <input name="password" value="<?= (session()->get('level')) ?>" class="form-control" readonly>
                </div>
          </div>
          <!-- /.widget-user -->
        </div>
</div>
<div class="col-md-3">
</div>