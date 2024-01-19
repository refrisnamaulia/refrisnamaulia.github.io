<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?= base_url('arsipkeluar')?>"><i class="fa fa-arrow-left"></i></a></h3>
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
                <?php echo form_open_multipart('arsipkeluar/insert'); ?>
                <div class="form-group">
                    <label> Nomor Surat </label>
                    <input name="no_surat" class="form-control" id="no_surat" name="no_surat" placeholder="Masukkan Nomor Surat">
                </div>
                <div class="form-group">
                    <label> Tanggal Surat </label>
                    <input name="tgl_surat" class="form-control" id="tgl_surat" name="tgl_surat" placeholder="YYYY-MM-DD">
                </div>
                <div class="form-group">
                    <label> Kepada </label>
                    <input name="kepada" class="form-control" id="kepada" name="kepada" placeholder="Masukkan Alamat Pengirim">
                </div>
                <div class="form-group">
                    <label> Perihal </label>
                    <input name="perihal" class="form-control" id="perihal" name="perihal" placeholder="Masukkan Perihal">
                </div>
                <div class="form-group">
                    <label> Lampiran </label>
                    <input name="jlh_lampiranklr" type="number" class="form-control" id="jlh_lampiranklr" name="jlh_lampiranklr" min="0" placeholder="Masukkan Jumlah Lampiran">
                </div>
                <div class="form-group">
                    <label> Keterangan </label>
                    <textarea name="keterangan_klr" class="form-control" id="keterangan_klr" name="keterangan_klr" rows="5" placeholder="Masukkan Keterangan"></textarea>
                </div>
                <div class="form-group">
                    <label> Kode Arsip </label>
                    <select name="kode_arsip" class="form-control" placeholder="Masukkan Kode Arsip">
                    <option value="">Pilih Kode Arsip</option>
                        <option value="1">SEKPER</option>
                        <option value="2">KEU</option>
                        <option value="3">ADM</option>
                        <option value="4">PJM</option>
                        <option value="5">LS</option>
                        <option value="6">SPI</option>
                        <option value="7">SPPD</option>
                    </select>
                </div>
                <div class="form-group">
                    <label> File PDF </label>
                    <input type="file" name="file_arsip" class="form-control" id="file_arsip">
                    <b class="text-danger" style="font-size: 12px;"> *File Harus Format .PDF </b>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('arsipkeluar')?>" class="btn btn-success">Close</a>
                </div>
            </div>

                <?php echo form_close() ?>
            </div>
          </div>
</div>
<div class="col-md-3">
</div>

