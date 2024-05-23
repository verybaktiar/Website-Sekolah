<div class="container">
    <div class="row">
        <div class="col">
            <h2>Data Prestasi Siswa Non Akademik</h2>
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
                            <form action="<?= base_url('prestasisiswanon/add') ?>" method="post">
                                <div class="form-group">
                                    <label for="namaSiswa">Nama Siswa</label>
                                    <input type="text" class="form-control" id="namasiswa" name="namasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Bidang Lomba</label>
                                    <input type="text" class="form-control" id="bidanglomba" name="bidanglomba" required>
                                </div>
                                <div class="form-group">
                                    <label for="progresHafalan">Nama Lomba</label>
                                    <input type="text" class="form-control" id="namalomba" name="namalomba" required>
                                </div>
                                <div class="form-group">
                                    <label for="progresHafalan">Tingkat Lomba</label>
                                    <input type="text" class="form-control" id="tingkatlomba" name="tingkatlomba" required>
                                </div>
                                <div class="form-group">
                                    <label for="progresHafalan">Tanggal Pelaksana</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="progresHafalan">Penyelenggara</label>
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" required>
                                </div>
                                <div class="form-group">
                                    <label for="progresHafalan">Peringkat</label>
                                    <input type="text" class="form-control" id="peringkat" name="peringkat" required>
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
                    <th>Bidang Lomba</th>
                    <th>Nama Lomba</th>
                    <th>Tingkat Lomba</th>
                    <th>Tanggal Pelaksana</th>
                    <th>Penyelenggara</th>
                    <th>Peringkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_siswa as $prestasisiswanon) : ?>
                    <tr>
                        <td><?= $prestasisiswanon->id_siswa ?></td>
                        <td><?= $prestasisiswanon->namasiswa ?></td>
                        <td><?= $prestasisiswanon->bidanglomba ?></td>
                        <td><?= $prestasisiswanon->namalomba ?></td>
                        <td><?= $prestasisiswanon->tingkatlomba ?></td>
                        <td><?= $prestasisiswanon->tanggal ?></td>
                        <td><?= $prestasisiswanon->penyelenggara ?></td>
                        <td><?= $prestasisiswanon->peringkat ?></td>
                        <td>
                             <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal" onclick="setEditData(<?= $prestasisiswanon->id_siswa ?>, '<?= $prestasisiswanon->namasiswa ?>', '<?= $prestasisiswanon->bidanglomba ?>', '<?= $prestasisiswanon->namalomba ?>', '<?= $prestasisiswanon->tingkatlomba ?>', '<?= $prestasisiswanon->tanggal ?>', '<?= $prestasisiswanon->penyelenggara ?>', '<?= $prestasisiswanon->peringkat ?>')">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmModal" onclick="setDeleteLink('<?= base_url('prestasisiswanon/delete/' . $prestasisiswanon->id_siswa) ?>')">Hapus</a>
                           
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div><!-- Modal Edit Data -->
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
                <form action="<?= base_url('prestasisiswanon/update_data') ?>" method="post">
                    <input type="hidden" name="id_siswa" id="editId">
                    <div class="form-group">
                        <label for="editNamaSiswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="editNamaSiswa" name="namasiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="editKelas">Bidang Lomba</label>
                            <input type="text" class="form-control" id="editBidangLomba" name="bidanglomba" required>
                    </div>
                    <div class="form-group">
                            <label for="editProgresHafalan">Nama Lomba</label>
                        <input type="text" class="form-control" id="editNamaLomba" name="namalomba" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Tingkat Lomba</label>
                        <input type="text" class="form-control" id="editTingkatLomba" name="tingkatlomba" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Tanggal Pelaksana</label>
                        <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Penyelenggara</label>
                        <input type="text" class="form-control" id="editPenyelenggara" name="penyelenggara" required>
                    </div>
                    <div class="form-group">
                        <label for="editProgresHafalan">Peringkat</label>
                        <input type="text" class="form-control" id="editPeringkat" name="peringkat" required>
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
<script>
    function setEditData(id_siswa, namasiswa, bidanglomba, namalomba, tingkatlomba, tanggal, penyelenggara, peringkat) {
        $('#editId').val(id_siswa);
        $('#editNamaSiswa').val(namasiswa);
        $('#editBidangLomba').val(bidanglomba);
        $('#editNamaLomba').val(namalomba);
        $('#editTingkatLomba').val(tingkatlomba);
        $('#editTanggal').val(tanggal);
        $('#editPenyelenggara').val(penyelenggara);
        $('#editPeringkat').val(peringkat);
    }

    function setDeleteLink(link) {
        $('#deleteBtn').attr('href', link);
    }
</script>