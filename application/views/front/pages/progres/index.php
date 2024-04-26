<div class="container">
	<div class="row">
		<div class="col">
			<h2>Data Progres Hafalan</h2>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $this->session->flashdata('success') ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>   
            </div>
         <?php endif ?>
		</div>
	</div>

	<div class="row mt-3">
      <div class="col">
         <!-- Modal Tambah Data -->
         <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <!-- Form Tambah Data -->
                     <form action="<?= base_url('progres/add') ?>" method="post">
                        <div class="form-group">
                           <label for="namaSiswa">Nama Siswa</label>
                           <input type="text" class="form-control" id="namaSiswa" name="namaSiswa" required>
                        </div>
                        <div class="form-group">
                           <label for="kelas">Kelas</label>
                           <input type="text" class="form-control" id="kelas" name="kelas" required>
                        </div>
                        <div class="form-group">
                           <label for="progresHafalan">Progres Hafalan</label>
                           <input type="text" class="form-control" id="progresHafalan" name="progresHafalan" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

        
      </div>
   </div>

	<div class="table-responsive mt-3">
      <table class="table table-striped table-bordered"  cellspacing="0" width="100%">
         <thead>
				<tr>
					<th>No</th>
					<th>Nama Siswa</th>
					<th>Kelas</th>
					<th>Progres Hafalan</th>
					
				</tr>
         </thead>
         <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_siswa as $siswa): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= htmlspecialchars($siswa->nama_siswa, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($siswa->kelas, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($siswa->progres_hafalan, ENT_QUOTES, 'UTF-8') ?></td>
                    
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>

</div>
<!-- Modal Edit Data -->
