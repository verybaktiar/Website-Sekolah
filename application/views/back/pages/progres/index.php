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

         <!-- Tombol Tambah yang memicu modal -->
         <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahDataModal">
            <i class="fas fa-plus"></i> Tambah
         </a>
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
					<th>Aksi</th>
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
                    <td>
                        <!-- Tombol Aksi seperti Edit atau Hapus -->
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal" onclick="setEditData(<?= $siswa->id ?>, '<?= $siswa->nama_siswa ?>', '<?= $siswa->kelas ?>', '<?= $siswa->progres_hafalan ?>')">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmModal" onclick="setDeleteLink('<?= base_url('progres/delete/' . $siswa->id) ?>')">Hapus</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>

</div>
<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form action="<?= base_url('progres/update_data') ?>" method="post">
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <label for="editNamaSiswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="editNamaSiswa" name="namaSiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="editKelas">Kelas</label>
                        <input type="text" class="form-control" id="editKelas" name="kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Progres Hafalan</label>
                        <input type="text" class="form-control" id="editProgresHafalan" name="progresHafalan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Confirmation -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger" id="deleteBtn">Hapus</a>
            </div>
        </div>
    </div>
</div><script>
function setEditData(id, nama, kelas, progres) {
    $('#editId').val(id);
    $('#editNamaSiswa').val(nama);
    $('#editKelas').val(kelas);
    $('#editProgresHafalan').val(progres);
}

function setDeleteLink(link) {
    $('#deleteBtn').attr('href', link);
}
</script>
