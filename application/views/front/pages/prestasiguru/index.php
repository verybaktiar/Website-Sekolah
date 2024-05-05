<div class="container">
	<div class="row">
		<div class="col">
			<h2>Data Prestasi Guru</h2>
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
				</tr>
         </thead>
         <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_guru as $guru): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= isset($guru->namaguru) ? $guru->namaguru : 'Nama Guru Tidak Ditemukan' ?></td>
                    <td><?= isset($guru->bidangkegiatan) ? $guru->bidangkegiatan : 'Bidang Kegiatan Tidak Ditemukan' ?></td>
                    <td><?= isset($guru->namakegiatan) ? $guru->namakegiatan : 'Nama Kegiatan Tidak Ditemukan' ?></td>
                    <td><?= isset($guru->tingkatkegiatan) ? $guru->tingkatkegiatan : 'Tingkat Kegiatan Tidak Ditemukan' ?></td>
                    <td><?= isset($guru->tanggal) ? $guru->tanggal : 'Tanggal Tidak Ditemukan' ?></td>
                    <td><?= isset($guru->penyelenggara) ? $guru->penyelenggara : 'Penyelenggara Tidak Ditemukan' ?></td>
                    <td><?= isset($guru->keterangan) ? $guru->keterangan : 'Keterangan Tidak Ditemukan' ?></td> 
                                   
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>

</div>
<!-- Modal Edit Data -->
