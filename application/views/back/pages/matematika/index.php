<div class="container">
    <div class="row">
        <div class="col">
            <h2>Data Matematika Terintegrasi</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?php if ($this->session->flashdata('success')) : ?>
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
                            <form action="<?= base_url('matematika/add') ?>" method="post">
                                <div class="form-group">
                                    <label for="namasiswa">Nama Siswa</label>
                                    <input type="text" class="form-control" id="namasiswa" name="namasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="namaguru">Nama Guru Pendamping</label>
                                    <input type="text" class="form-control" id="namaguru" name="namaguru" required>
                                </div>
                                <div class="form-group">
                                    <label for="prestasi">Prestasi</label>
                                    <input type="text" class="form-control" id="prestasi" name="prestasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
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
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Guru Pendamping</th>
                    <th>Prestasi Yang Diraih</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php $no = 1; ?>
            <?php foreach ($data_siswa as $siswa): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= htmlspecialchars($siswa->namasiswa, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($siswa->namaguru, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($siswa->prestasi, ENT_QUOTES, 'UTF-8') ?></td>
                   
                    <td>
                        <?php if (isset($siswa->foto) && $siswa->foto): ?>
                            <img src="<?= base_url('img/guru/' . $siswa->foto) ?>" class="img-fluid" style="max-width: 100px; max-height: 100px;" alt="Foto">
                        <?php else: ?>
                            <img src="<?= base_url('img/guru/default.jpg') ?>" class="img-fluid" style="max-width: 100px; max-height: 100px;" alt="Foto Guru Tidak Tersedia">
                        <?php endif; ?>
                    </td>
                
                    <td>
                        <div class="btn-group" role="group" aria-label="Aksi">
                            <!-- Tombol Aksi seperti Edit atau Hapus -->
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal" onclick="setEditData(<?= $siswa->id ?>, '<?= $siswa->namasiswa?>', '<?= $siswa->namaguru ?>', '<?= $siswa->prestasi ?>')">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmModal" onclick="setDeleteLink('<?= base_url('ipa/delete/' . $siswa->id) ?>')">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>    
            </tbody>
        </table>
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
<script>
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