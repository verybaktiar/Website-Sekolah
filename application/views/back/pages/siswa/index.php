<div class="container">
    <div class="row">
        <div class="col">
            <h2>Data Pendidik</h2>
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
    <div class="row">
        <div class="col-md-4 mb-3">
            <form action="<?= base_url('siswa/filter') ?>" method="get">
                <label for="filterKelas">Filter Kelas:</label>
                <select class="form-control" id="filterKelas" name="kelas">
                    <option value="">Semua Kelas</option>
                    <?php for ($i = 1; $i <= 6; $i++) : ?>
                        <option value="<?= $i ?>A"><?= $i ?>A</option>
                        <option value="<?= $i ?>B"><?= $i ?>B</option>
                        <option value="<?= $i ?>C"><?= $i ?>C</option>
                    <?php endfor; ?>
                </select>
                <button type="submit" class="btn btn-primary mt-2">Filter</button>
            </form>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col">
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Pendidik</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Tambah Data -->
                            <form action="<?= base_url('siswa/add') ?>" method="post">
                                <div class="form-group">
                                    <label for="nama_siswa">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select class="form-control" id="kelas" name="kelas" required>
                                        <?php for ($i = 1; $i <= 6; $i++) : ?>
                                            <option value="<?= $i ?>A"><?= $i ?>A</option>
                                            <opwetion value="<?= $i ?>B"><?= $i ?>B</opwetion>
                                            <option value="<?= $i ?>C"><?= $i ?>C</option>
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
    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tabelPelajaran">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_siswa as $s) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $s->nama_siswa ?></td>
                        <td><?= $s->kelas ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Aksi">
                                <!-- Tombol Aksi seperti Edit atau Hapus -->
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataModal" onclick="setEditData(<?= $s->id_siswa ?>, '<?= $s->nama_siswa ?>', '<?= $s->kelas ?>')">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmModal" onclick="setDeleteLink('<?= base_url('siswa/delete/' . $s->id_siswa) ?>')">Hapus</a>
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
<!-- Mod    l Edit Data -->

<!-- Modal untuk Edit Data Siswa -->
<div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModalLabel">Edit Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('siswa/update') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_siswa" id="id_siswa" value="">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="editnamasiswa" name="nama_siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="editKelas">Kelas</label>
                        <select class="form-control" id="editKelas" name="kelas" required>
                            <!-- Options -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
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
    function setEditData(id_siswa, nama_siswa, kelas) {
        var kelas = $(this).data('kelas');
        $('#editId').val(id_siswa);
        $('#editnamasiswa').val(nama_siswa);
        $('#editKelas').val(kelas);
    }

    function setDeleteLink(link) {
        $('#deleteBtn').attr('href', link);
    }
</script>