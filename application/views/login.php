<?php $this->load->view('partials/header'); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>/assets/img/home-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Login</h1>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<?php echo $this->session->flashdata('message'); ?>
			<?php echo form_open();

			echo '<div class="form-group">';
			echo form_label('Username', 'username');
			echo form_input('username', set_value('username'), 'class="form-control"');
			echo '</div>';

			echo '<div class="form-group">';
			echo form_label('Password', 'password');
			echo form_password('password', set_value('password'), 'class="form-control"');
			echo '</div>';

			echo form_submit('submit', 'Login', 'class="btn btn-primary"');
			echo form_close(); ?>
		</div>
	</div>
</div>

<?php $this->load->view('partials/footer'); ?>
