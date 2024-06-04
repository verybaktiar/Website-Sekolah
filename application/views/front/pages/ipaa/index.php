<div class="container">
    <div class="row">
        <div class="col">
            <h2>Data Ipa Terintegrasi</h2>
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



    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Guru Pendamping</th>
                    <th>Prestasi Yang Diraih</th>
                    <th>Foto</th>
         
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
                
                  
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>    
            </tbody>
        </table>
    </div>

</div>

