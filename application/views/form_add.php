<?php $this->load->view('partials/header'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>/assets/img/post-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-heading">
					<h1>Tambah Artikel Baru</h1>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h1>Tambah Artikel</h1>
			<div class="alert alert-warning">
				<?php echo validation_errors() ?>
			</div>
			<?php echo form_open_multipart();
			echo '<div class="form-group">';
			echo form_label('Judul', 'title');
			echo form_input('title', null, 'class="form-control"');
			echo '</div>';
			echo '<div class="form-group">';
			echo form_label('URL', 'url');
			echo form_input('url', null, 'class="form-control"');
			echo '</div>';
			echo '<div class="form-group">';
			echo form_label('Konten', 'content');
			echo form_textarea('content', null, 'class="form-control"');
			echo '</div>';
			echo '<div class="form-group">';
			echo form_label('Cover', 'cover');
			echo form_upload('cover', null, 'class="form-control"');
			echo '</div>';
			echo form_submit('submit', 'Simpan Artikel', 'class="btn btn-primary"');
			echo form_close(); ?>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer'); ?>
