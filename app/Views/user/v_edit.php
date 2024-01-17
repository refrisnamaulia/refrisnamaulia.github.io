<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
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
                <?php echo form_open_multipart('user/update/' . $user['id_user']); ?>
                <div class="form-group text-center">
                    <img src="<?= base_url('foto/'.$user['foto']) ?>" width="180px" style="border-radius: 60%;">
                    <div class="form-group"><br>
                        <input name="foto" type="file" class="form-control"> 
                    </div>
                </div>
                <div class="form-group">
                    <label> Nama User </label>
                    <input name="nama_user" value="<?= $user['nama_user'] ?>" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label> Email </label>
                    <input name="email" value="<?= $user['email'] ?>" class="form-control" id="nama" name="nama" readonly>
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input name="password" value="<?= $user['password'] ?>" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label> Level </label>
                    <select name="level" value="<?= $user['level'] ?>" class="form-control"> 
                        <option value="<?= $user['level'] ?>"><?php if ($user['level'] == 1) {
                            echo 'Direktur Utama';
                        }else if ($user['level'] == 2) {
                            echo 'Sekretaris';
                        }else if ($user['level'] == 3) {
                            echo 'Admin';
                        }else if ($user['level'] == 4) {
                            echo 'User';
                        }?></option>
                        <option value="1">Direktur Utama</option>
                        <option value="2">Sekretaris</option>
                        <option value="3">Admin</option>
                        <option value="4">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label> Departemen </label>
                    <select name="id_dep" class="form-control">
                    <option value="<?= $user['id_dep'] ?>"><?= $user['nama_dep'] ?></option>
                    <?php foreach ($dep as $key => $value) { ?>
                        <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
                        <?php } ?>
                    </select>
                </div>
               
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('user')?>" class="btn btn-success">Close</a>

                </div>
            </div>

                <?php echo form_close() ?>
            </div>
          </div>
</div>
<div class="col-md-3">
</div>

