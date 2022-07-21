      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/simpansiskel'); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="id_kelas">Kelas</label>
      <?php echo form_dropdown('id_kelas', $kelas, '', array('class'=>'form-control', 'id'=>'id_kelas')); ?>
      <small class="text-danger">
        <?php echo form_error('id_kelas'); ?>
      </small>
    </div>
        <div class="card card-default">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Pilih Siswa</label>
                  <select name="id_siswa[]" id="id_siswa" class="duallistbox" multiple="multiple">
                  <?php foreach($siswa as $r)  { ?>
                    <option value="<?=$r->id_siswa?>"><?=$r->nis?> - <?=$r->nama_siswa?></option>
                  <?php } ?>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">    
  <?php echo form_submit('save', 'Simpan', array('class'=>'btn btn-primary mr-2')); ?>
  <a href="<?=base_url('admin/kelassiswa/')?>" class="btn btn-light">Batal</a>
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
