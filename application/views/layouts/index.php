<?php 
$this->load->view("validasi_session.php");
$kriteria     = json_decode(json_encode($kriteria), True);
$siswa  	  = json_decode(json_encode($siswa), True);
?>
<!-- Custom Fonts -->
<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<div class="jumbotron" style="background-image:url(<?= base_url('assets/unive.jpg') ?>">
	<h1>Selamat Datang</h1>
	<hr>
	<h3>Sistem Pendukung Keputusan (SPK)
		Penerimaan Siswa Baru Jalur Beasiswa <br>
	SMA Muhammadiyah Wonosobo</h3>
</div>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-tasks fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?php echo $kriteria;?></div>
							<div>Jumlah Kriteria</div>
						</div>
					</div>
				</div>
				<a href="<?php echo base_url(); ?>/kriteria">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-users fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?php echo $siswa;?></div>
							<div>Jumlah Siswa</div>
						</div>
					</div>
				</div>
				<a href="<?php echo base_url(); ?>/siswa">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-6">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-users fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?php echo $panitia;?></div>
							<div>Jumlah Panitia</div>
						</div>
					</div>
				</div>
				<a href="<?php echo base_url(); ?>/panitia">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-file-word-o fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><i class="fa fa-file-word-o"></i></div>
							<div>Laporan Ranking</div>
						</div>
					</div>
				</div>
				<a href="<?php echo base_url(); ?>/rangking">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

	</div>
	<!-- /.row -->
</div>
</div>
</div>
<!-- <p class='footer'><?php echo config_item('web_footer'); ?></p> -->

<style type="text/css">
	.panel {
		margin-bottom: 20px;
		background-color: #fff;
		border: 1px solid transparent;
		border-radius: 4px;
		-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
		box-shadow: 0 1px 1px rgba(0,0,0,.05);
	}
	.panel-heading {
		padding: 10px 15px;
		border-bottom: 1px solid transparent;
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
	}
	.huge {
		font-size: 40px;
	}

	/*set panel here*/

	.panel-green {
		border-color: #5cb85c;
	}
	.panel-green > .panel-heading {
		border-color: #5cb85c;
		color: white;
		background-color: #5cb85c;
	}
	.panel-green > a {
		color: #5cb85c;
	}


	.panel-yellow {
		border-color: #f0ad4e;
	}
	.panel-yellow > .panel-heading {
		border-color: #f0ad4e;
		color: white;
		background-color: #f0ad4e;
	}
	.panel-yellow > a {
		color: #f0ad4e;
	}

	.panel-red {
		border-color: #d9534f;
	}
	.panel-red > .panel-heading {
		border-color: #d9534f;
		color: white;
		background-color: #d9534f;
	}
	.panel-red > a {
		color: #d9534f;
	}

	.panel-primary {
		border-color: #337ab7;
	}
	.panel-primary > .panel-heading {
		border-color: #337ab7;
		color: white;
		background-color: #337ab7;
	}
	.panel-primary > a {
		color: #337ab7;
	}
</style>

