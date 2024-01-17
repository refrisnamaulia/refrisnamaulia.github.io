<div class="row">
<div class="col-md-18">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data User</h3>
              <?php
              if(session()->get('level')==2) { ?>
                <div class="box-tools pull-right">
                <a href="<?= base_url('user/add')?>" class="btn btn-primary btn-sm btn-flat" style="border: 1px solid white; border-radius: 3px;">
                  <i class="fa fa-plus"></i> Add</a>
              </div>
              <?php
              }
              ?>
            </div>
            <div class="table-responsive">
            <?php
            if(session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>';
                echo session()->getFlashdata('pesan');
                echo'</div>';
            }
            ?>
            <table id="example1" class="table table-bordered table-striped table-hover" width="100%">                    
              <thead>
                        <tr>
                            <th class ="text-center" width="15px">No</th>
                            <th class ="text-center">Nama User</th>
                            <?php 
                              if(session()->get('level')==2) { ?>

                            <th class ="text-center">Email</th>
                            <th class ="text-center">Password</th>
                            <?php }?>
                            <th class ="text-center">Role</th>
                            <th class ="text-center">Dep</th>
                            <th class ="text-center">Foto</th>
                            <?php
                              if(session()->get('level')==2) { ?>
                            <th class ="text-center" width="125px">Action</th>
                            <?php
                            }?>

                        </tr>
                    </thead>
                        <tbody>
                            <?php $no=1;
                             foreach ($user as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['nama_user']; ?></td>

                                    <?php if(session()->get('level')==2) { ?>
                                    <td><?= $value['email']; ?></td>
                                    <td><?= $value['password']; ?></td>
                                    <?php }?>

                                    <td class="text-center"><?php if ($value['level']==1) {
                                        echo 'Direktur Utama';
                                    }else if ($value['level']==2) {
                                        echo 'Sekretaris';
                                    }else if ($value['level']==3) {
                                        echo 'Admin';
                                    }else if ($value['level']==4) {
                                        echo 'User';
                                    }
                                    ?></td>
                                    <td><?= $value['nama_dep']; ?></td>
                                    <td><img src="<?= base_url('foto/' .$value['foto']) ?>" width="60px"></td>
                                    <?php
                                    if(session()->get('level')==2) { ?>
                                    <td class="text-center">
                                      <a href="<?= base_url('user/edit/'. $value['id_user']) ?>" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i>Edit</a>
                                      <button class="btn btn-xs btn-danger" data-toggle="modal"data-target="#delete<?= $value['id_user']; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                  </td>
                                  <?php } ?>
                                </tr>                               
                           <?php } ?>
                        </tbody>
                </table>
            </div>
          </div>
</div>
</div>
         <!-- modal delete kategori -->
<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_user']; ?>">
          <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Hapus User</h4>
              </div>
              <div class="modal-body"> 
          Apakah Anda Yakin Ingin Hapus <b>"<?= $value['nama_user']; ?>"</b> ?
          </div>
              <div class="modal-footer">
                <a href="<?= base_url('user/delete/'. $value['id_user']) ?>" class="btn btn-primary">Hapus</a>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- end modal category -->
        <?php } ?>
        