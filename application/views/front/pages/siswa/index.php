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
            <form action="<?= base_url('daftarsiswaa/filter') ?>" method="get">
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
        </div>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tabelPelajaran">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_siswa as $s) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $s->nama_siswa ?></td>
                        <td><?= $s->kelas ?></td>
                       
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- Modal Edit Data -->
<!-- Mod    l Edit Data -->