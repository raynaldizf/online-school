<div class="container">

	<!-- Flasher Message -->
	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>

	<div class="row container">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
			  Tambah Data Mahasiswa
			</button>
		</div>
	</div>

	<div class="row container">
		<div class="col-lg-6">
			<form action="<?= BASEURL; ?>/mahasiswa/cari" method="POST">
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
				  </div>
				</div>
			</form>
		</div>
	</div>

	<div class="rwo">
		<div class="col-lg-6">
			<h3>Daftar Mahasiswa</h3>
			<!-- <?php foreach ($data['mhs'] as $mhs) { ?>
				<ul>
					<li><?= $mhs['nama'] ?></li>
					<li><?= $mhs['kelas'] ?></li>
					<li><?= $mhs['no'] ?></li>
				</ul>
			<?php } ?> -->
			<ul class="list-group">
				<?php foreach ($data['mhs'] as $mhs) { ?>
			  		<li class="list-group-item">
			  			<?= $mhs['nama'] ?>
			  			<a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?')">hapus</a>

			  			<!-- Menggunakan class tampilModalUbah dengan jquery sehingga Modal akan menjadi bagian ubah data(script.js) -->
			  			<!-- Membuat data-id(id bebas) untuk menangkap id mahasiswa kedalam jquery -->
			  			<a href="#" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id'] ?>">ubah</a>
			  			<a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge badge-primary float-right ml-1">detail</a>
			  		</li>
			  	<?php } ?>
			</ul>
		</div>
	</div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST" id="formAction">
      		<!-- untuk mengirimkan id ke jquery lalu ke controller -->
      		<input type="text" name="id" id="id">
      		<div class="form-group">
			    <label for="nama">Nama</label>
			    <input type="text" class="form-control" id="nama" name="nama">
			  </div>
			  <div class="form-group">
			    <label for="kelas">Kelas</label>
			    <input type="text" class="form-control" id="kelas" name="kelas">
			  </div>
			  <div class="form-group">
			    <label for="no">No</label>
			    <input type="text" class="form-control" id="no" name="no">
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary tombolTambahUbahData">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>