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
                    <label> Role </label>
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
                    <label> Jabatan </label>
                    <input name="text" value="<?php if (session()->get('id_dep')==1) {
                        echo 'Dewan Komisaris';
                    }else if (session()->get('id_dep')==2) {
                        echo 'Direktur Utama';
                    }else if (session()->get('id_dep')==3) {
                        echo 'Direktur Penjaminan';
                    }else if (session()->get('id_dep')==4) {
                        echo 'Sekretaris Perusahaan';
                    } else if (session()->get('id_dep')==5) {
                        echo 'Kabag Legal & Subrograsi';
                    }else if (session()->get('id_dep')==6) {
                        echo 'Kabag Penjaminan & Pemasaran';
                    }else if (session()->get('id_dep')==7) {
                        echo 'Kabag Keuangan, Administrasi & Umum';
                    }else if (session()->get('id_dep')==8) {
                        echo 'Satuan Pengawas Internal';
                    }else if (session()->get('id_dep')==9) {
                        echo 'Staff Keuangan, Administrasi & Umum';
                    }else if (session()->get('id_dep')==10) {
                        echo 'Staff Penjaminan & Pemasaran';
                    } else if (session()->get('id_dep')==11) {
                        echo 'Staff Legal & Subrogasi';
                    } ?>" class="form-control" readonly>  
                </div>
          </div>
          <!-- /.widget-user -->
        </div>
</div>
<div class="col-md-3">
</div>