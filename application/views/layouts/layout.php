<!doctype html>
<html lang="en">
<head>
    <title>
        <?php echo $this->page->generateTitle(); ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    $this->page->generateCss();
    ?>

    <style>
        body { padding-top: 70px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top ">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand active" href="<?php echo site_url()?>welcome/index">SPK PPDB</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php if ($this->session->userdata['logged_in']['role'] == 'Administrator') { ?>
                            <ul class="nav navbar-nav">
                                <li
                                <?php if( $this->uri->segment(1) == 'kriteria'){
                                   ?>
                                   class="active"
                                   <?php
                               }?>
                               ><a href="<?php echo site_url('kriteria');?>">Kriteria</a></li>
                               <li
                               <li
                               <?php if( $this->uri->segment(1) == 'siswa'){
                                ?>
                                class="active"
                                <?php
                            }?>
                            ><a href="<?php echo site_url('siswa');?>">Siswa</a></li>
                            <li
                            <?php if( $this->uri->segment(1) == 'panitia'){
                                ?>
                                class="active"
                                <?php
                            }?>
                            ><a href="<?php echo site_url('panitia');?>">Panitia</a></li>
                            <li
                            <?php if( $this->uri->segment(1) == 'rangking'){
                                ?>
                                class="active"
                                <?php
                            }?>
                            ><a href="<?php echo site_url('rangking');?>">Laporan</a></li>

                            <li
                            <?php if( $this->uri->segment(1) == 'profile'){
                                ?>
                                class="active"
                                <?php
                            }?>
                            ><a href="<?php echo site_url('superadmin/index/');?><?php echo $this->session->userdata['logged_in']['user_id']?>"><?php echo $this->session->userdata['logged_in']['user_username']?></a></li>

                            <li>
                                <a onclick="return confirm('Apakah Anda yakin?')" href="<?php echo site_url('login/log_out');?>">Logout</a>
                            </li>

                        </ul>
                    <?php } else { ?>
                        <ul class="nav navbar-nav">
                           <li
                           <li
                           <?php if( $this->uri->segment(1) == 'siswa'){
                            ?>
                            class="active"
                            <?php
                        }?>
                        ><a href="<?php echo site_url('siswa');?>">Siswa</a></li>
                        <li
                        <?php if( $this->uri->segment(1) == 'rangking'){
                            ?>
                            class="active"
                            <?php
                        }?>
                        ><a href="<?php echo site_url('rangking');?>">Laporan</a></li>

                        <li
                        <?php if( $this->uri->segment(1) == 'profile'){
                            ?>
                            class="active"
                            <?php
                        }?>
                        ><a href="<?php echo site_url('panitia/tambah/');?><?php echo $this->session->userdata['logged_in']['user_id']?>"><?php echo $this->session->userdata['logged_in']['user_username']?></a></li>

                        <li>
                            <a onclick="return confirm('Apakah Anda yakin?')" href="<?php echo site_url('login/log_out');?>">Logout</a>
                        </li>

                    </ul>
                <?php } ?>

            </div><!-- /.navbar-collapse -->
        </div>


    </div>
</nav>
</div>

<div class="container">
    <?php $this->load->view($view,$data);?>
</div>

<script>
    var base_url = "<?php echo site_url();?>";
</script>
<?php
$this->page->generateJs();
?>

</body>
</html>