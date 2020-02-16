<?php $this->load->view("validasi_session.php")?>
<div class="page-header">
    <h1>Laporan Rangking  <a href="<?php echo site_url('rangking/detail') ?>" type="button" class="btn btn-info">Detail Ranking</a></h1>
</div>


<div class="col-lg-12">

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Table Laporan Ranking <button class="mdl-button" style="background-color: blue;color: white" onclick="printPage('cetakCheckpoint')" id="btn-print">Print Laporan</button></div>
            <div class="panel-body" id="cetakCheckpoint">
                <h2>Hasil ranking Siswa</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('tableFinal');
                            foreach ($table as $item => $value) {
                                foreach ($value as $heading => $itemValue) {
                                    ?>
                                    <th class="text-center"><?php echo $heading ?></th>
                                    <?php
                                }
                                break;
                            }
                            ?>
                        </tr>
                        <?php
                        foreach ($table as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <?php
                                foreach ($value as $itemValue) {
                                    ?>
                                    <td><?php echo $itemValue ?></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>

                <?php
                $table = $this->page->getData('tableFinal');
                foreach ($table as $item => $value) {
                    if ($value->Rangking == 1) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <h4><b>Kesimpulan : </b>
                                Siswa terbaik adalah
                                <?php echo $value->Siswa ?> dengan nilai <?php echo $value->Total ?>
                            </h4>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function printPage(id)
{
   var html="<html>";
   html+= document.getElementById(id).innerHTML;

   html+="</html>";

   var printWin = window.open('','','left=0,top=0,width=1024,height=768');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
}
</script>

