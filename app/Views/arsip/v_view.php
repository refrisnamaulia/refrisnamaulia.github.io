<div class="row">
        <div class="col-md-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?= base_url('arsip')?>"><i class="fa fa-arrow-left"></i></a></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
            <table class="table table-border table-striped">
            <tr>
                <th width="30px">Tanggal Terima</th>
                <th width="10px">:</th>
                <td> <?= $arsip['tgl_terima']?></td>

                <th width="50px">Nomor Surat</th>
                <th width="10px">:</th>
                <td> <?= $arsip['no_surat']?></td>
            </tr>
            <tr>
                <th>Tanggal Surat</th>
                <th>:</th>
                <td width="100px"> <?= $arsip['tgl_surat']?></td>

                <th>Alamat Pengirim</th>
                <th>:</th>
                <td> <?= $arsip['alamat_pengirim']?></td>
            </tr>
            <tr>
                <th>Perihal</th>
                <th>:</th>
                <td width="150px"> <?= $arsip['perihal']?></td>

                <th>Lampiran</th>
                <th>:</th>
                <td> <?= $arsip['jlh_lampiran']?></td>
            </tr>
            <tr>
                <th>Kode Arsip</th>
                <th>:</th>
                <td><?php if ($arsip['kode_arsip']==1) {
                    echo 'SEKPER';
                }else if ($arsip['kode_arsip']==2) {
                    echo 'KEU';
                }else if ($arsip['kode_arsip']==3) {
                    echo 'ADM';
                }else if ($arsip['kode_arsip']==4) {
                    echo 'PJK';
                } else if ($arsip['kode_arsip']==5) {
                    echo 'LS';
                }else if ($arsip['kode_arsip']==6) {
                    echo 'SPI';
                }else if ($arsip['kode_arsip']==7) {
                    echo 'SPPD';
                }
                ?></td>

                <th>Keterangan</th>
                <th>:</th>
                <td width="100px"> <?= $arsip['keterangan']?> </td>
            </tr>
            <tr>
            <th>Diedit Oleh</th>
                <th>:</th>
                <td width="100px"><?= $arsip['nama_user']?></td>

                <th></th>
                <th></th>
                <td width="100px"></td>
            </tr>
        </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    <div class="col-sm-12">
        <iframe src="<?php echo base_url('file_arsip/' . $arsip['file_arsip']); ?>" style="border: none;" height="700px" width="100%" title="iframe example"></iframe>
    </div>
</div>