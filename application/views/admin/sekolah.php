      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/ubahsekolah'); ?>
<?php echo form_hidden('id_sekolah', $ubah->id_sekolah); ?>

                <div class="form-group">
                  <label for="namasekolah">Nama Sekolah</label>
                  <!-- <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Nama Sekolah"> -->
                  <?php echo form_input('namasekolah', $ubah->namasekolah, array('class'=>'form-control form-control-border', 'id'=>'namasekolah', 'placeholder'=>'Nama Sekolah')); ?>
                  <small class="text-danger">
                    <?php echo form_error('namasekolah'); ?>
                  </small>
                </div>
                <div class="form-group">
                  <label for="npsn">NPSN</label>
                  <?php echo form_input('npsn', $ubah->npsn, array('class'=>'form-control form-control-border', 'id'=>'namasekolah', 'placeholder'=>'NPSN')); ?>
                  <small class="text-danger">
                    <?php echo form_error('npsn'); ?>
                  </small>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <?php echo form_input('alamat', $ubah->alamat, array('class'=>'form-control form-control-border', 'id'=>'alamat', 'placeholder'=>'Alamat Sekolah')); ?>
                  <small class="text-danger">
                    <?php echo form_error('alamat'); ?>
                  </small>
                </div>
                <div class="form-group">
                  <label for="kepsek">Kepala Sekolah</label>
                  <?php echo form_input('kepsek', $ubah->kepsek, array('class'=>'form-control form-control-border', 'id'=>'kepsek', 'placeholder'=>'Nama Kepala Sekolah')); ?>
                  <small class="text-danger">
                    <?php echo form_error('kepsek'); ?>
                  </small>
                </div>
                <div class="form-group">
                  <label for="nipkepsek">NIP Kepala Sekolah</label>
                  <?php echo form_input('nipkepsek', $ubah->nipkepsek, array('class'=>'form-control form-control-border', 'id'=>'nipkepsek', 'placeholder'=>'NIP Kepala Sekolah')); ?>
                  <small class="text-danger">
                    <?php echo form_error('nipkepsek'); ?>
                  </small>
                </div>

  <div class="card-footer">    
  <?php echo form_submit('save', 'Ubah', array('class'=>'btn btn-primary mr-2')); ?>
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