<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?= base_url('arsip')?>"><i class="fa fa-arrow-left"></i></a></h3>
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
            <?php echo form_open_multipart('arsip/update/' . $arsip['id_arsip']); ?>
                <div class="form-group">
                    <label> Tanggal Terima </label>
                    <input name="tgl_terima" value="<?= $arsip['tgl_terima'] ?>" class="form-control" id="tgl_terima" name="tgl_terima">
                </div>
                <div class="form-group">
                    <label> Nomor Surat </label>
                    <input name="no_surat" value="<?= $arsip['no_surat'] ?>" class="form-control" id="no_surat" name="no_surat">
                </div>
                <div class="form-group">
                    <label> Tanggal Surat </label>
                    <input name="tgl_surat" value="<?= $arsip['tgl_surat'] ?>" class="form-control" id="tgl_surat" name="tgl_surat">
                </div>
                <div class="form-group">
                    <label> Alamat Pengirim </label>
                    <input name="alamat_pengirim" value="<?= $arsip['alamat_pengirim'] ?>" class="form-control" id="alamat_pengirim" name="alamat_pengirim">
                </div>
                <div class="form-group">
                    <label> Perihal </label>
                    <input name="perihal" value="<?= $arsip['perihal'] ?>" class="form-control" id="perihal" name="perihal">
                </div>
                <div class="form-group">
                    <label> Lampiran </label>
                    <input name="jlh_lampiran" value="<?= $arsip['jlh_lampiran'] ?>" type="number" class="form-control" id="jlh_lampiran" name="jlh_lampiran" min="0">
                </div>
                <div class="form-group">
                    <label> Keterangan </label>
                    <input name="keterangan" value="<?= $arsip['keterangan'] ?>" class="form-control" id="keterangan" name="keterangan">
                </div>
                <?php
                if(session()->get('level')!=1) { ?>           
                <div class="form-group">
                    <label> Kode Arsip </label>
                    <select name="kode_arsip" value="<?= $arsip['kode_arsip'] ?>" class="form-control">
                    <option value="<?= $arsip['kode_arsip'] ?>"><?php if ($arsip['kode_arsip'] == 1) {
                            echo 'SEKPER';
                        }else if ($arsip['kode_arsip'] == 2) {
                            echo 'KEU';
                        }else if ($arsip['kode_arsip'] == 3) {
                            echo 'ADM';
                        }else if ($arsip['kode_arsip'] == 4) {
                            echo 'PJK';
                        }else if ($arsip['kode_arsip'] == 5) {
                            echo 'LS';
                        }else if ($arsip['kode_arsip'] == 6) {
                            echo 'SPI';
                        }else if ($arsip['kode_arsip'] == 7) {
                            echo 'SPPD';
                        }?></option>
                        <option value="1">SEKPER</option>
                        <option value="2">ADM</option>
                        <option value="3">KEU</option>
                        <option value="4">PJK</option>
                        <option value="5">LS</option>
                        <option value="6">SPI</option>
                        <option value="7">SPPD</option>
                    </select>
                </div>
                <div class="form-group">
                    <label> File PDF </label>
                    <input type="file" name="file_arsip" class="form-control" id="file_arsip">
                    <b class="text-danger" style="font-size: 12px;">*File Saat Ini : <?php 
                    if (empty($arsip['file_arsip'])){
                        echo "File Belum Diinput";
                    }else {
                        echo $arsip['file_arsip'];
                    }?>
                    <br>*File Harus Format .PDF</b>
                </div>
                <?php } ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('arsip')?>" class="btn btn-success">Close</a>
                </div>
            </div>

                <?php echo form_close() ?>
            </div>
          </div>
</div>
<div class="col-md-3">
</div>
<script>
    function showNestedCheckboxes() {
        var didisposisikanCheckbox = document.getElementById("diteruskan_kepada");
        var nestedCheckboxesDiv = document.getElementById("nestedCheckboxes");

        if (didisposisikanCheckbox.checked) {
            nestedCheckboxesDiv.style.display = "block";
        } else {
            nestedCheckboxesDiv.style.display = "none";
        }
    }
</script>
