      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open_multipart('Admin/simpansiswa'); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="nis">NIS</label>
      <input type="number" name="nis" id="nis" placeholder="NIS" class="form-control">
      <!-- <?php echo form_input('nis', set_value('nis'), array('class'=>'form-control', 'id'=>'nis', 'placeholder'=>'NIS')); ?> -->
      <small class="text-danger">
        <?php echo form_error('nis'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="nisn">NISN</label>
      <!-- <?php echo form_input('nisn', set_value('nisn'), array('class'=>'form-control', 'id'=>'nisn', 'placeholder'=>'NISN')); ?> -->
      <input type="number" name="nisn" id="nisn" placeholder="NISN" class="form-control">
      <small class="text-danger">
        <?php echo form_error('nisn'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="nama_siswa">Nama</label>
      <!-- <?php echo form_input('nama_siswa', set_value('nama_siswa'), array('class'=>'form-control', 'id'=>'nama_siswa', 'placeholder'=>'Nama Siswa')); ?> -->
      <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" class="form-control">
      <small class="text-danger">
        <?php echo form_error('nama_siswa'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="jk">Jenis Kelamin</label>
      <select name="jk" id="jk" class="form-control">
        <option value="">--Pilih--</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
      <small class="text-danger">
        <?php echo form_error('jk'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="tempatlahir">Tempat Lahir</label>
      <input type="text" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir" class="form-control">
      <small class="text-danger">
        <?php echo form_error('tempatlahir'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="tgllahir">Tanggal Lahir</label>
      <input type="date" name="tgllahir" id="tgllahir" class="form-control">
      <small class="text-danger">
        <?php echo form_error('tgllahir'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="agama">Agama</label>
      <select name="agama" id="agama" class="form-control">
        <option value="">--Pilih--</option>
        <option value="Islam">Islam</option>
        <option value="Hindu">Hindu</option>
      </select>
      <small class="text-danger">
        <?php echo form_error('agama'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" placeholder="Alamat" class="form-control"></textarea>
      <small class="text-danger">
        <?php echo form_error('alamat'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="foto">Foto</label>
      <input type="file" name="foto" id="foto" class="form-control">
      <small class="text-danger">
        <?=$error; ?>
      </small>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">    
  <?php echo form_submit('save', 'Simpan', array('class'=>'btn btn-primary mr-2')); ?>
  <a href="<?=base_url('admin/siswa/')?>" class="btn btn-light">Batal</a>
  </div>
<?php echo form_close(); ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <?=$awal ?>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>        </div></div>