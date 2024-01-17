<!DOCTYPE html>
<html lang="en">
<head>
    <title>Export</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<body>
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
            <div class="table-responsive">
            <table id="example" class="table table-bordered table-stripped table-hover"> 
              <thead>                   
                        <tr>
                            <th class ="text-center">No</th>
                            <th class ="text-center">Tanggal Terima</th>
                            <th class ="text-center">Nomor Surat</th>
                            <th class ="text-center">Tanggal Surat</th>
                            <th class ="text-center">Alamat Pengirim</th>
                            <th class ="text-center">Perihal</th>
                            <th class ="text-center">Lampiran</th>
                            <th class ="text-center">Kode Arsip</th>
                            <th class ="text-center">Status Disposisi</th>
                            <th class ="text-center" width="80px">Action</th>

                        </tr>
              </thead>
                        <tbody>
                            <?php $no=1;
                             foreach ($arsip as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['tgl_terima']?></td>
                                    <td><?= $value['no_surat']; ?></td>
                                    <td><?= $value['tgl_surat']?></td>
                                    <td><?= $value['alamat_pengirim']?></td>
                                    <td><?= $value['perihal']?></td>
                                    <td class="text-center"><?= $value['jlh_lampiran']?></td>
                                    <td class="text-center"><?php if ($value['kode_arsip']==1) {
                                        echo 'SEKPER';
                                    }else if ($value['kode_arsip']==2) {
                                        echo 'KEU';
                                    }else if ($value['kode_arsip']==3) {
                                      echo 'ADM';
                                    }else if ($value['kode_arsip']==4) {
                                      echo 'PJM';
                                    } else if ($value['kode_arsip']==5) {
                                      echo 'LS';
                                    }else if ($value['kode_arsip']==6) {
                                      echo 'SPI';
                                    }else if ($value['kode_arsip']==7) {
                                      echo 'SPPD';
                                    }
                                    ?></td>   
                                    <td class="text-center">
                                      <?php if (!empty($value['diteruskan_kepada'])) {
                                        echo '<a class="btn btn-md btn-info" style="width: 80px; height: 30px;"><i class="fas fa-check text-center"></i></a>';
                                      }else {
                                        echo '<a class="btn btn-md btn-danger" style="width: 80px; height: 30px;"><i class="fas fa-close text-center"></i></a>';
                                      }?>
                                    </td>
                                    <td class="text-center">
                                    <?php
                                    if(session()->get('level')!=4) { ?>
                                      <a href="<?= base_url('arsip/edit/'. $value['id_arsip']) ?>" class="btn btn-xs btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                      <button class="btn btn-xs btn-danger" data-toggle="modal"data-target="#delete<?= $value['id_arsip']; ?>" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                      <?php } ?>
                                    <a href="<?= base_url('arsip/view/'. $value['id_arsip']) ?>" class="btn btn-success btn-xs " title="View"><i class="fas fa-eye"></i></a>
                                  </td>
                                </tr>                               
                           <?php } ?>
                        </tbody>
                </table>
            </div>
            </div>
            <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
      </head>
</body>
</html>