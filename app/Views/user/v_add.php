<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php 
                $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php  } ?>  
                        </ul>       
                    </div>
            <?php } ?>
                <?php echo form_open_multipart('user/insert'); ?>
                <div class="form-group">
                    <label> Nama User </label>
                    <input name="nama_user" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label> Email </label>
                    <input name="email" class="form-control" id="nama" name="nama" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input name="password" class="form-control" id="nama" name="nama" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label> Level </label>
                    <select name="level" class="form-control" placeholder="Masukkan Level"> 
                        <option value="">Pilih Level</option>
                        <option value="1">Direktur Utama</option>
                        <option value="2">Sekretaris</option>
                        <option value="3">Admin</option>
                        <option value="4">User</option>

                    </select>
                </div>
                <div class="form-group">
                    <label> Departemen </label>
                    <select name="id_dep" class="form-control" placeholder="Masukkan Departemen">
                    <option value="">Pilih Departemen</option>
                    <?php foreach ($dep as $key => $value) { ?>
                        <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label> Foto </label>
                    <input name="foto" type="file" class="form-control"> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('user')?>" class="btn btn-success">Close</a>

                </div>
            </div>

                <?php echo form_close() ?>
            </div>
          </div>
</div>
<div class="col-md-3">
</div>

