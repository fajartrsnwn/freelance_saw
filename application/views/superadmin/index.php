<div class="page-header">
    <h1>Halaman superadmin</h1>
</div>
<div class="col-md-12">
    <?php echo form_open() ?>
    <div class="row">
        <div class="errors">
            <?php
            // dump($dataView);
            $errors = $this->session->flashdata('errors');
            if (isset($errors)) {
                foreach ($errors as $error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $error; ?>
                    </div>
                    <?php
                }
            }
            ?>

            <?php
            $msg = $this->session->flashdata('message');
            if (isset($msg) && $_GET['update']=='true') {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo $msg; ?>
                </div>
                <?php
            } else if (isset($msg) && $_GET['update']=='false') { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo $msg; ?>
                </div>
            <?php } ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- <div class="form-horizontal"> -->
                    <?php echo form_open('',array('class' => 'form-horizontal'))?>
                    <div class="form-group">
                        <label for="panitia">NIP</label>
                        <input required="" name="nip" type="number" class="form-control" id="nip"
                        value="<?php echo isset($dataView[0]['nip']) ? $dataView[0]['nip'] : ''?>"
                        placeholder="nip">
                    </div>
                    *<span><i>NIP digunakan untuk login</i></span>
                    <hr>
                    <span>*Create/Update password</span>
                    <div class="form-group">
                        <label for="panitia">Password</label>
                        <input name="password" type="password" class="form-control" id="jabatan"
                        placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="panitia">Re-type Password</label>
                        <input name="password2" type="password" class="form-control" id="jabatan"
                        placeholder="Re-type Password">
                    </div>
                    <!-- </div> -->
                    <?php echo form_close()?>
                </div>
            </div>

            <div class="pull-right">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>