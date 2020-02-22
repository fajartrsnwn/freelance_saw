<div class="page-header">
    <h1>Tambah siswa</h1>
</div>
<div class="col-md-12">
    <?php echo form_open() ?>
    <div class="row">
        <div class="errors">
            <?php
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
            if (isset($msg) && $_GET['nisnCheck']=='false') { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo $msg; ?>
                </div>
            <?php } ?>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('',array('class' => 'form-horizontal'))?>
                    <div class="form-group">
                        <label for="siswa">NISN</label>
                        <input name="nisn" type="text" class="form-control" id="siswa"
                               value="<?php echo isset($nilaiSiswa[0]->nisn) ? $nilaiSiswa[0]->nisn : ''?>"
                               placeholder="nisn">
                    </div>
                    <div class="form-group">
                        <label for="siswa">Nama siswa</label>
                        <input name="siswa" type="text" class="form-control" id="siswa"
                               value="<?php echo isset($nilaiSiswa[0]->siswa) ? $nilaiSiswa[0]->siswa : ''?>"
                               placeholder="nama siswa">
                    </div>
                    <div class="form-group">
                        <label for="siswa">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="date" class="form-control" id="siswa"
                               value="<?php echo isset($nilaiSiswa[0]->tanggal_lahir) ? $nilaiSiswa[0]->tanggal_lahir : ''?>"
                               placeholder="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label for="siswa">Tempat Lahir</label>
                        <input name="tempat_lahir" type="text" class="form-control" id="siswa"
                               value="<?php echo isset($nilaiSiswa[0]->tempat_lahir) ? $nilaiSiswa[0]->tempat_lahir : ''?>"
                               placeholder="Tempat lahir">
                    </div>
                    <div class="form-group">
                        <label for="siswa">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="siswa"
                               value="<?php echo isset($nilaiSiswa[0]->alamat) ? $nilaiSiswa[0]->alamat : ''?>"
                               placeholder="Alamat">
                    </div>

                    <div class="form-group">
                        <label for="siswa">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <?php if ($nilaiSiswa[0]->jenis_kelamin == 'L') { ?>
                                <option value="P">Perempuan</option>
                                <option value="L" selected="">Laki-laki</option>
                            <?php } else { ?>
                                <option value="P" selected="">Perempuan</option>
                                <option value="L">Laki-laki</option>
                            <?php }?>
                        </select>
                    </div>

                    <input type="hidden" name="sudah_di_nilai" value="1">
                <!-- </div> -->
                <?php echo form_close()?>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th class="col-md-3">Kriteria</th>
                    <th colspan="5" class="text-center col-md-9">Nilai</th>
                </tr>
                <?php

                foreach ($dataView as $item) {
                ?>
                <tr>
                    <td><?php echo $item['nama']; ?></td>
                    <?php
                    $no = 1;
                    foreach ($item['data'] as $dataItem) {

                        ?>
                        <td>
                            <input type="radio" name="nilai[<?php echo $dataItem->kdKriteria ?>]"
                                   value="<?php echo $dataItem->value ?>"
                                    <?php
                                    if(isset($nilaiSiswa)){
                                        foreach ($nilaiSiswa as $item => $value) {
                                            if($value->kdKriteria == $dataItem->kdKriteria){
                                                if($value->nilai ==  $dataItem->value ) {
                                                    ?>
                                                    checked="checked"
                                                    <?php
                                                }
                                            }
                                        }
                                    }else{
                                        if($no == 3){
                                            ?>
                                            checked="checked"
                                            <?php
                                        }
                                    }
                                    ?>
                            /> <?php echo $dataItem->subKriteria;
                            $no++;
                           ?>
                        </td>

                        <?php
                    }
                    echo '</tr>';
                    }
                    ?>

            </table>
        </div>

        <div class="pull-right">
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Save</button>
                <a class="btn btn-danger" href="<?php echo site_url('siswa');?>" role="button">Batal</a>

            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>