<div class="row">
  <?php foreach ($user as $key => $value) { ?>
  <?php } ?>
    <div class="col-sm-12">
        <img style="height: 300px; width: 250px;" src="<?= base_url('foto/'. session()->get('foto')) ?>" class="user-image" alt="User Image">
    <div class="col-md-8 pull-right"><br><br><br>
        <table class="table table-border">
            <tr>
                <th width="35px">Nama</th>
                <th width="10px">:</th>
                <td><?= (session()->get('nama_user')) ?></td>
            </tr>
            <tr>
                <th width="35px">Email</th>
                <th>:</th>
                <td><?= (session()->get('email')) ?></td>
            </tr>
            <tr>
                <th width="35px">Level</th>
                <th>:</th>
                <td><?php if(session()->get('level')==1){
                    echo 'Admin';
                   }else{
                    echo 'User';
                   }?></td>
            </tr>
            <tr>
                <th width="35px">Departemen</th>
                <th>:</th>
                <td><?php if (session()->get('id_dep')==1) {
                        echo 'Sekretaris';
                    }else if (session()->get('id_dep')==2) {
                        echo 'Keuangan';
                    }else if (session()->get('id_dep')==3) {
                        echo 'Administrasi & Umum';
                    }else if (session()->get('id_dep')==4) {
                        echo 'Penjaminan & Pemasaran';
                    } else if (session()->get('id_dep')==5) {
                        echo 'Legal & Subrograsi';
                    }else if (session()->get('id_dep')==6) {
                        echo 'Satuan Pengawas Internal';
                    }
                ?></td>
            </tr>
        </table>
    </div>
    </div>
</div>
