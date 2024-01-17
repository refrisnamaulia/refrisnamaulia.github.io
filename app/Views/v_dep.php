<div class="row">
<div class="col-md-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Departemen</h3>
              <?php
              if(session()->get('level')==2) { ?>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-primary btn-sm btn-flat" style="border: 1px solid white; border-radius: 3px;" data-toggle="modal" data-target="#add">
                    <i class="fa fa-plus"></i> Add</button>
                </div>
                <?php }?>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
            if(session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>';
                echo session()->getFlashdata('pesan');
                echo'</div>';
            }
            ?>
            <table id="example1" class="table table-bordered table-striped">                   
              <thead>
                        <tr>
                            <th class ="text-center" width="15px">No</th>
                            <th class ="text-center">Departemen</th>
                            <?php
                            if(session()->get('level')==2) { ?>
                            <th class ="text-center" width="125px">Action</th>
                            <?php } ?>
                        </tr>
              </thead>
                        <tbody>
                            <?php $no=1;
                             foreach ($dep as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['nama_dep']; ?></td>
                                    <?php
                                    if(session()->get('level')==2) { ?>
                                    <td class="text-center">
                                      <button class="btn btn-xs btn-warning" data-toggle="modal"data-target="#edit<?= $value['id_dep']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-xs btn-danger" data-toggle="modal"data-target="#delete<?= $value['id_dep']; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                  </td>
                                  <?php } ?>
                                </tr>                               
                           <?php } ?>
                        </tbody>
                </table>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<!-- modal add kategori -->

<div class="modal fade" id="add">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Add Dep</h4>
              </div>
              <div class="modal-body">
              <?php
              echo form_open('dep/add')
              ?>

          <div class="form-group">
              <input name="nama_dep" class="form-control" id="nama" placeholder="Masukkan Departemen" required> <br>
            </div>
          </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- end modal category -->
<!-- modal edit kategori -->
<?php foreach ($dep as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_dep']; ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Edit Departemen</h4>
              </div>
              <div class="modal-body">
              <?php
              echo form_open('dep/edit/' . $value['id_dep'])
              ?>

          <div class="form-group">
              <input name="nama_dep" value="<?= $value['nama_dep']; ?>" class="form-control" id="nama" name="nama" placeholder="Ubah Kategori" required> <br>
          </div>

          </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- end modal category -->
        <?php } ?>

        <!-- modal delete kategori -->
<?php foreach ($dep as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_dep']; ?>">
          <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Hapus Departemen</h4>
              </div>
              <div class="modal-body"> 
          Apakah Anda Yakin Ingin Hapus <?= $value['nama_dep']; ?> ?
          </div>
              <div class="modal-footer">
                <a href="<?= base_url('dep/delete/'. $value['id_dep']) ?>" class="btn btn-primary">Hapus</a>
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