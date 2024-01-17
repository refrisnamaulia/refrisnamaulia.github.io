<div class="row">
<div class="col-md-16">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Arsip</h3>
              <?php
              if(session()->get('level')!=4) { ?>
              <div class="box-tools pull-right">
                <a href="<?= base_url('arsipkeluar/add')?>" class="btn btn-primary btn-sm btn-flat">
                  <i class="fa fa-plus"></i> Add</a>
              </div>
              <?php } ?>
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
                            <th class ="text-center">No</th>
                            <th class ="text-center">Tanggal Terima</th>
                            <th class ="text-center">Nomor Surat</th>
                            <th class ="text-center">Alamat Pengirim</th>
                            <th class ="text-center">Perihal</th>
                            <th class ="text-center">Lampiran</th>
                            <th class ="text-center">Kode Arsip</th>
                            <th class ="text-center" width="125px">Action</th>

                        </tr>
              </thead>
                        <tbody>
                            <?php $no=1;
                             foreach ($arsip as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['tgl_terima']?></td>
                                    <td><?= $value['no_surat']; ?></td> 
                                    <td><?= $value['alamat_pengirim']?></td>
                                    <td><?= $value['perihal']?></td>
                                    <td><?= $value['jlh_lampiran']?></td>
                                    <td><?php if ($value['kode_dep']==1) {
                                        echo 'SEKPER';
                                    }else if ($value['kode_dep']==2) {
                                        echo 'KEU';
                                    }else if ($value['kode_dep']==3) {
                                      echo 'ADM';
                                    }else if ($value['kode_dep']==4) {
                                      echo 'PJM';
                                    } else if ($value['kode_dep']==5) {
                                      echo 'LS';
                                    }else if ($value['kode_dep']==6) {
                                      echo 'SPI';
                                    }
                                    ?></td>                                    
                                    <td class="text-center">
                                    <a href="<?= base_url('arsip/edit/'. $value['id_arsip']) ?>" class="btn btn-xs btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-xs btn-danger" data-toggle="modal"data-target="#delete<?= $value['id_arsip']; ?>" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                    <a href="<?= base_url('arsip/view/'. $value['id_arsip']) ?>" class="btn btn-success btn-xs " data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                  </td>
                                </tr>                               
                           <?php } ?>
                        </tbody>
                </table>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- modal delete kategori -->
<?php foreach ($arsip as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_arsip']; ?>">
          <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Hapus Data</h4>
              </div>
              <div class="modal-body"> 
          Apakah Anda Yakin Ingin Hapus Data Ini?
          </div>
              <div class="modal-footer">
                <a href="<?= base_url('arsip/delete/'. $value['id_arsip']) ?>" class="btn btn-primary">Hapus</a>
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
        