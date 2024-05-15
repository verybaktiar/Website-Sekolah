<div class="container">
    <div class="row">
        <div class="col">
            <h2>Data Mata Pelajaran</h2>
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
            <form action="<?= base_url('jadwalpelajarann/filter') ?>" method="get" class="form-inline">
                <div class="form-group mb-2">
                    <label for="filterKelas" class="mr-2">Filter Kelas:</label>
                    <select class="form-control" id="filterKelas" name="kelas">
                        <option value="">Semua Kelas</option>
                        <?php for ($i = 1; $i <= 6; $i++) : ?>
                            <option value="<?= $i ?>A"><?= $i ?>A</option>
                            <option value="<?= $i ?>B"><?= $i ?>B</option>
                            <option value="<?= $i ?>C"><?= $i ?>C</option>
                        <?php endfor; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-2">Filter</button>
            </form>
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

                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_pelajaran as $pelajaran) : ?>
                    <tr data-hari="<?= $pelajaran->hari ?>" data-matapelajaran="<?= htmlspecialchars($pelajaran->matapelajaran) ?>" data-kelas="<?= $pelajaran->kelas ?>">
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($pelajaran->hari, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= nl2br($pelajaran->matapelajaran) ?></td>
                        <td><?= htmlspecialchars($pelajaran->kelas, ENT_QUOTES, 'UTF-8') ?></td>

                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#btnTampilkan').on('click', function() {
            var selectedKelas = $('#filterKelas').val(); // Mendapatkan nilai kelas yang dipilih
            $('tr[data-kelas]').each(function() {
                $(this).toggle($(this).data('kelas') === selectedKelas);
            });
        });
    });
</script>