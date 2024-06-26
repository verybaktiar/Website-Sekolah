<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php $no = 0;?>
		<?php foreach($banners as $banner) : ?>
			<?php $no++;  ?>
			<div class="carousel-item <?php if($no <= 1) { echo "active"; } ?>">
				<img src="<?= base_url("img/banner/$banner->photo") ?>" class="d-block w-100">
				<div class="carousel-caption d-none d-md-block">
					<h1><?= $banner->title ?></h1>
					<p><?= $banner->text ?></p>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- End of Carousel -->

<!-- Sambutan -->
<div class="sambutan mt-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
				<h2>Sambutan</h2>
				<hr>
				<p class="text-center"><?= $sambutan->content ?></p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-5 text-center">
				<img src="<?= base_url('img/sambutan/' . $sambutan->photo) ?>" class="img-thumbnail img-fluid">
			</div>
		</div>
	</div>
</div>
<!-- End of Sambutan -->

<!-- Jurusan -->
<div class="jumbotron jumbotron-fluid bg-cover jurusan mt-5" style="background-image: url(<?= base_url('img/background/' . $jurusan->photo) ?>)">
	<div class="container text-center">
		<div class="row">
			<div class="col">
				<h2 class="">Organisasi</h2>
			</div>
		</div>
		<hr>
		<div class="row pt-3">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4">
				<img class="" src="<?= base_url('img/jurusan/ipa.png') ?>" alt="">
				<h5 class="mt-2">Sains</h5>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4">
				<img class="" src="<?= base_url('img/jurusan/ips.png') ?>" alt="">
				<h5 class="mt-2">Pramuka</h5>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-4">
				<img class="" src="<?= base_url('img/jurusan/bahasa.png') ?>" alt="">
				<h5 class="mt-2">UKS</h5>
			</div>
		</div>
	</div>
</div>
<!-- End of Jurusan -->
<div class="video-background" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
    <div class="video-foreground" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; height: 60%;">
        <iframe src="<?= base_url('img/intro.mp4') ?>" frameborder="0" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" allowfullscreen allow="autoplay; encrypted-media"></iframe>
    </div>
</div>
<!-- Berita -->
<div class="last-news mt-5 mb-5">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col">
				<h2 class="text-center">Berita Terbaru</h2>
				<hr>
			</div>
		</div>
		<div class="row mt-4">
			<?php foreach($berita as $b) : ?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="card" style="width: 15rem; height: 24rem;">
						<img style="height:150px" src="<?= base_url('img/berita/thumbs/' . $b->photo) ?>" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title"><?= $b->title ?></h5>
							<p class="card-text"><?= character_limiter($b->content,50) ?></p>
							<a href="<?= base_url("blog/baca/$b->seo_title") ?>" class="btn btn-info btn-sm">Lanjut Membaca<i class="fa fa-angle-right ml-2"></i></a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="row mt-4">
			<div class="col text-center">
				<a href="<?= base_url('blog') ?>" class="btn btn-secondary text-light">Lihat Selengkapnya<i class="fa fa-angle-double-right ml-2"></i></a>
			</div>
		</div>
	</div>
</div>
<!-- End of Berita -->
