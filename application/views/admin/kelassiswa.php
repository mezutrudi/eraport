<a href="<?=base_url('admin/tambahsiskel/')?>"class="btn btn-primary">Tambah</a><br><br>
<div class="row">
	<?php foreach($kelas->result_object() as $r) { ?>
	<div class="col-lg-4 col-6">
	    <!-- small card -->
	    <a href="<?=base_url('Admin/siswakelas/'.$r->id_kelas)?>" title="<?=$r->namakls?>">
		    <div class="small-box bg-info">
		      <div class="inner">
		        <h3><?=$r->namakls?></h3>
		        <br>
		        <p>kkk</p>
		      </div>
		      <div class="icon">
		        <i class="fas fa-user-graduate"></i>
		      </div>
		    </div>
		</a>
	</div>
	<?php } ?>
</div>
<!-- <?= $kelas2 ?> -->