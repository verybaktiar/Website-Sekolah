<div class="container">
	<div class="row">
		<div class="col">
			<h2>Data Mata Pelajaran</h2>
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
                     <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Pelajaran</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <!-- Form Tambah Data -->
                     <form action="<?= base_url('jadwalpelajaran/add') ?>" method="post">
                        <div class="form-group">
                           <label for="hari">Hari</label>
                           <select class="form-control" id="hari" name="hari" required>
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Sabtu">Sabtu</option>
                              <option value="Minggu">Minggu</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="kelas">Mata Pelajaran</label>
                           <input type="text" class="form-control" id="matapelajaran" name="matapelajaran" required>
                        </div>
                        <div class="form-group">
                           <label for="kelas">Kelas</label>
                           <select class="form-control" id="kelas" name="kelas" required>
                              <?php for ($i = 1; $i <= 6; $i++): ?>
                                 <option value="<?= $i ?>a"><?= $i ?>A</option>
                                 <option value="<?= $i ?>b"><?= $i ?>B</option>
                                 <option value="<?= $i ?>c"><?= $i ?>C</option>
                              <?php endfor; ?>
                           </select>
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

	<div class="row">
		<div class="col-md-4 mb-3">
			<select class="form-control" id="filterKelas">
				<option value="">Pilih Kelas</option>
				<?php for ($i = 1; $i <= 6; $i++): ?>
					<option value="<?= $i ?>a"><?= $i ?>A</option>
					<option value="<?= $i ?>b"><?= $i ?>B</option>
					<option value="<?= $i ?>c"><?= $i ?>C</option>
				<?php endfor; ?>
			</select>
		</div>
	</div>

	<div class="table-responsive mt-3">
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tabelPelajaran">
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_pelajaran as $pelajaran): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= htmlspecialchars($pelajaran->hari, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($pelajaran->matapelajaran, ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($pelajaran->kelas, ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Aksi">
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal" onclick="setEditData(<?= $pelajaran->id_pelajaran ?>, '<?= $pelajaran->hari ?>', '<?= $pelajaran->matapelajaran ?>', '<?= $pelajaran->kelas ?>')">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmModal" onclick="setDeleteLink('<?= base_url('jadwalpelajaran/delete/' . $pelajaran->id_pelajaran) ?>')">Hapus</a>
                    </div>
                </td>
            </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Sisipkan skrip JavaScript untuk DataTables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#tabelPelajaran').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
        }
    });

    // Event listener untuk filter berdasarkan kelas
    $('#filterKelas').on('change', function(){
        var selectedKelas = $(this).val(); // Mendapatkan nilai kelas yang dipilih
        table.column(3).search(selectedKelas).draw(); // Memfilter tabel berdasarkan kelas yang dipilih
    });
});

</script>
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
                <form action="<?= base_url('jadwalpelajaran/update_data') ?>" method="post">
                    <input type="hidden" name="id_pelajaran" id="editId">
                    <div class="form-group">
                        <label for="editHari">Hari</label>
                        <select class="form-control" id="editHari" name="hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editKelas">Matapelajaran</label>
                            <input type="text" class="form-control" id="editMataPelajaran" name="matapelajaran" required>
                    </div>
                    <div class="form-group">
                        <label for="editKelas">Kelas</label>
                        <select class="form-control" id="editKelas" name="kelas" required>
                            <?php for ($i = 1; $i <= 6; $i++): ?>
                                <option value="<?= $i ?>a"><?= $i ?>A</option>
                                <option value="<?= $i ?>b"><?= $i ?>B</option>
                                <option value="<?= $i ?>c"><?= $i ?>C</option>
                            <?php endfor; ?>
                        </select>
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
</div>
</div>
</div>
</div>
