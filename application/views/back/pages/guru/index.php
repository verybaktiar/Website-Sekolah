<div class="container">
	<div class="row">
		<div class="col">
			<h2>Data Tenaga Kependidikan</h2>
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
                     <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Tenaga Kependidikan</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <!-- Form Tambah Data -->
                     <form action="<?= base_url('guru/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="namaSiswa">Nama Guru</label>
                           <input type="text" class="form-control" id="nama_guru" name="nama_guru" required>
                        </div>
                        <div class="form-group">
                           <label for="kelas">Jabatan</label>
                           <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="form-group">
                           <label for="progresHafalan">Tanggal Mulai Tugas</label>
                           <input type="date" class="form-control" id="daftar_pelajaran" name="daftar_pelajaran" required>
                        </div>
                        <div class="form-group">
                           <label for="fotoGuru">Foto Guru</label>
                           <input type="file" class="form-control" id="foto_guru" name="foto_guru" required>
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
					<th>Nama Guru</th>
					<th>Jabatan</th>
					<th>Tanggal Mulai Tugas</th>
                    <th>Foto Guru</th>
					<th>Aksi</th>
				</tr>
         </thead>
         <tbody>
         <?php $no = 1; ?>
            <?php foreach ($data_guru as $guru): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= htmlspecialchars($guru->nama_guru, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($guru->jabatan, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($guru->daftar_pelajaran, ENT_QUOTES, 'UTF-8') ?></td>
                   
                    <td>
                        <?php if (isset($guru->foto_guru) && $guru->foto_guru): ?>
                            <img src="<?= base_url('img/guru/' . $guru->foto_guru) ?>" class="img-fluid" style="max-width: 100px; max-height: 100px;" alt="Foto Guru">
                        <?php else: ?>
                            <img src="<?= base_url('img/guru/default.jpg') ?>" class="img-fluid" style="max-width: 100px; max-height: 100px;" alt="Foto Guru Tidak Tersedia">
                        <?php endif; ?>
                    </td>
                
                    <td>
                        <div class="btn-group" role="group" aria-label="Aksi">
                            <!-- Tombol Aksi seperti Edit atau Hapus -->
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal" onclick="setEditData(<?= $guru->id_guru ?>, '<?= $guru->nama_guru ?>', '<?= $guru->jabatan ?>', '<?= $guru->daftar_pelajaran ?>')">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmModal" onclick="setDeleteLink('<?= base_url('guru/delete/' . $guru->id_guru) ?>')">Hapus</a>
                        </div>
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
                <form action="<?= base_url('guru/update_data') ?>" method="post">
                    <input type="hidden" name="id_guru" id="editId">
                    <div class="form-group">
                        <label for="editNamaSiswa">Nama Guru</label>
                        <input type="text" class="form-control" id="editNamaGuru" name="nama_guru" required>
                    </div>
                    <div class="form-group">
                        <label for="editKelas">Jabatan</label>
                        <input type="text" class="form-control" id="editJabatan" name="jabatan" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Tanggal Mulai Tugas</label>
                        <input type="date" class="form-control" id="editDaftarPelajaran" name="daftar_pelajaran" required>
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
function setEditData(id_guru, nama_guru, jabatan, daftar_pelajaran) {
    $('#editId').val(id_guru);
    $('#editNamaGuru').val(nama_guru);
    $('#editJabatan').val(jabatan);
    $('#editDaftarPelajaran').val(daftar_pelajaran);
}

function setDeleteLink(link) {
    $('#deleteBtn').attr('href', link);
}
</script>
