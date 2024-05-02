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
                     <form action="<?= base_url('prestasiguru/add') ?>" method="post">
                        <div class="form-group">
                           <label for="namaSiswa">Nama Guru</label>
                           <input type="text" class="form-control" id="namaguru" name="namaguru" required>
                        </div>
                        <div class="form-group">
                           <label for="kelas">Bidang Kegiatan</label>
                           <input type="text" class="form-control" id="bidangkegiatan" name="bidangkegiatan" required>
                        </div>
                        <div class="form-group">
                           <label for="progresHafalan">Nama Kegiatan</label>
                           <input type="text" class="form-control" id="namakegiatan" name="namakegiatan" required>
                        </div>
                        <div class="form-group">
                           <label for="progresHafalan">Tingkat Kegiatan</label>
                           <input type="text" class="form-control" id="tingkatkegiatan" name="tingkatkegiatan" required>
                        </div>
                        <div class="form-group">
                           <label for="progresHafalan">Tanggal</label>
                           <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                           <label for="progresHafalan">Penyelenggara</label>
                           <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" required>
                        </div>
                        <div class="form-group">
                           <label for="progresHafalan">Keterangan</label>
                           <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
					<th>Bidang Kegiatan</th>
					<th>Nama Kegiatan</th>
					<th>Tingkat Kegiatan</th>
					<th>Tanggal</th>
                    <th>Penyelenggara</th>
                    <th>Keterangan</th>
					<th>Aksi</th>
				</tr>
         </thead>
         <tbody>
         <?php $no = 1; ?>
            <?php foreach ($data_guru as $guru): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= htmlspecialchars($guru->namaguru, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($guru->bidangkegiatan, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($guru->namakegiatan, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($guru->tingkatkegiatan, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($guru->tanggal, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($guru->penyelenggara, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($guru->keterangan, ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Aksi">
                            <!-- Tombol Aksi seperti Edit atau Hapus -->
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal" onclick="setEditData(<?= $guru->id_guru ?>, '<?= $guru->namaguru ?>', '<?= $guru->bidangkegiatan ?>', '<?= $guru->namakegiatan ?>', '<?= $guru->tingkatkegiatan ?>', '<?= $guru->tanggal ?>', '<?= $guru->penyelenggara ?>', '<?= $guru->keterangan ?>')">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmModal" onclick="setDeleteLink('<?= base_url('prestasiguru/delete/' . $guru->id_guru) ?>')">Hapus</a>
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
                <form action="<?= base_url('prestasiguru/update_data') ?>" method="post">
                    <input type="hidden" name="id_guru" id="editId">
                    <div class="form-group">
                        <label for="editNamaSiswa">Nama Guru</label>
                        <input type="text" class="form-control" id="editNamaGuru" name="namaguru" required>
                    </div>
                    <div class="form-group">
                        <label for="editKelas">Bidang Kegiatan</label>
                            <input type="text" class="form-control" id="editBidangKegiatan" name="bidangkegiatan" required>
                    </div>
                    <div class="form-group">
                            <label for="editProgresHafalan">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="editNamaKegiatan" name="namakegiatan" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Tingkat Kegiatan</label>
                        <input type="text" class="form-control" id="editTingkatKegiatan" name="tingkatkegiatan" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Tanggal</label>
                        <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Penyelenggara</label>
                        <input type="text" class="form-control" id="editPenyelenggara" name="penyelenggara" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Keterangan</label>
                        <input type="text" class="form-control" id="editKeterangan" name="keterangan" required>
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
function setEditData(id_guru, namaguru, bidangkegiatan, namakegiatan, tingkatkegiatan, tanggal, penyelenggara, keterangan) {
    $('#editId').val(id_guru);
    $('#editNamaGuru').val(namaguru);
    $('#editBidangKegiatan').val(bidangkegiatan);
    $('#editNamaKegiatan').val(namakegiatan);
    $('#editTingkatKegiatan').val(tingkatkegiatan);
    $('#editTanggal').val(tanggal);
    $('#editPenyelenggara').val(penyelenggara);
    $('#editKeterangan').val(keterangan);
}

function setDeleteLink(link) {
    $('#deleteBtn').attr('href', link);
}
</script>
