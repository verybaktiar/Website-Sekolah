<div class="container">
	<div class="row">
		<div class="col">
			<h2>Data Guru</h2>
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
      </div>
   </div>
	<div class="table-responsive mt-3">
      <table class="table table-striped table-bordered"  cellspacing="0" width="100%">
         <thead>
				<tr>
					<th>No</th>
					<th>Nama Guru</th>
					<th>Jabatan</th>
					<th>Daftar Pelajaran</th>
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
                 
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>

</div>