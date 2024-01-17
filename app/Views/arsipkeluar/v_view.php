<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">
                <a href="<?= base_url('arsipkeluar')?>"><i class="fa fa-arrow-left"></i></a></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
    <div class="box-body">
    <div class="table-responsive">

    <table class="table table-border table-striped">
            <tr>
                <th width="30px">Nomor Surat</th>
                <th width="10px">:</th>
                <td> <?= $arsip['no_surat']?></td>

                <th width="50px">Kepada</th>
                <th width="10px">:</th>
                <td> <?= $arsip['kepada']?></td>
            </tr>
            <tr>
                <th>Perihal</th>
                <th>:</th>
                <td width="150px"> <?= $arsip['perihal']?></td>

                <th>Lampiran</th>
                <th>:</th>
                <td> <?= $arsip['jlh_lampiranklr']?></td>
            </tr>
            <tr>
                <th>Tanggal Surat</th>
                <th>:</th>
                <td width="150px"> <?= $arsip['tgl_surat']?></td>

                <th>Kode Arsip</th>
                <th>:</th>
                <td width="100px"><?php if ($arsip['kode_arsip']==1) {
                    echo 'SEKPER';
                }else if ($arsip['kode_arsip']==2) {
                    echo 'KEU';
                }else if ($arsip['kode_arsip']==3) {
                    echo 'ADM';
                }else if ($arsip['kode_arsip']==4) {
                    echo 'PJM';
                } else if ($arsip['kode_arsip']==5) {
                    echo 'LS';
                }else if ($arsip['kode_arsip']==6) {
                    echo 'SPI';
                }else if ($arsip['kode_arsip']==7) {
                    echo 'SPPD';
                }
                ?></td>    
            </tr>
            <tr>
                <th width="30px">Keterangan</th>
                <th width="10px">:</th>
                <td> <?= $arsip['keterangan_klr']?></td>

                <th>Diedit Oleh</th>
                <th>:</th>
                <td width="150px"> <?= $arsip['nama_user']?></td>
            </tr>
        </table>
    </div>
    </div>
    </div>
    </div>

    <div class="col-sm-12">
    <iframe src="<?php echo base_url('file_arsip/' . $arsip['file_arsip']); ?>" style="border: none;" height="1000px" width="100%" title="iframe example"></iframe>
    </div>
</div>
