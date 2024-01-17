<div class="row">
<div class="col-md-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Kategori</h3>
              <?php
              if(in_array(session()->get('level'), [2, 3])) { ?>
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
                            <th class ="text-center">Kategori</th>
                            <th class ="text-center">Keterangan</th>
                            <?php
                                    if(in_array(session()->get('level'), [2, 3])) { ?>
                            <th class ="text-center" width="90px">Action</th>
                            <?php }?>
                        </tr>
                    </thead>
                        <tbody>
                            <?php $no=1;
                             foreach ($kategori as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['nama_kategori']; ?></td>
                                    <td><?= $value['keterangan']; ?></td>
                                    <td class="text-center">
                                    <?php
                                    if(in_array(session()->get('level'), [2, 3])) { ?>
                                      <button class="btn btn-xs btn-warning" data-toggle="modal"data-target="#edit<?= $value['id_kategori']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                      <button class="btn btn-xs btn-danger" data-toggle="modal"data-target="#delete<?= $value['id_kategori']; ?>"><i class="fas fa-trash-alt"></i> Delete</button>
                                      <?php }?>
                                  </td>
                                </tr>                               
                           <?php } ?>
                        </tbody>
                </table>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
</div>
<!-- modal add kategori -->

<div class="modal fade" id="add">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Add Kategori</h4>
              </div>
              <div class="modal-body">
              <?php
              echo form_open('kategori/add')
              ?>

          <div class="form-group">
              <input name="nama_kategori" class="form-control" id="nama" name="nama" placeholder="Masukkan Kategori" required> <br>
              <input name="keterangan" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
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
<?php foreach ($kategori as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_kategori']; ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Edit Kategori</h4>
              </div>
              <div class="modal-body">
              <?php
              echo form_open('kategori/edit/' . $value['id_kategori'])
              ?>

          <div class="form-group">
              <input name="nama_kategori" value="<?= $value['nama_kategori']; ?>" class="form-control" id="nama" name="nama" placeholder="Ubah Kategori" required> <br>
              <input name="keterangan" value="<?= $value['keterangan']; ?>" class="form-control" id="keterangan" name="keterangan" placeholder="Ubah Keterangan">
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
<?php foreach ($kategori as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_kategori']; ?>">
          <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Hapus Kategori</h4>
              </div>
              <div class="modal-body"> 
          Apakah Anda Yakin Ingin Hapus <?= $value['nama_kategori']; ?> ?
          </div>
              <div class="modal-footer">
                <a href="<?= base_url('kategori/delete/'. $value['id_kategori']) ?>" class="btn btn-primary">Hapus</a>
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