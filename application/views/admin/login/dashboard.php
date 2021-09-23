<?php
    $id = $this->session->userdata('idpustakawan');
    $enkrip = $this->session->userdata('enid');

if($id=="" or $enkrip!=sha1($id)){
    ?>
    <script type="text/javascript">
        alert("Session habis, silahkan login.")
        document.location="<?php echo base_url('admin/login');?>";
    </script>
    <?php
}
else{
    $sqlUser = $this->ModelAdmin->getWhere(['id_pustakawan' => $id]);
    $dtUser = $sqlUser->row_array();
    ?>
    <b>Ini dashboard : </b><br /><br /}
    <b>Nama user: Daniel Nurindra</b><br /><br /}
    Nama User = <?php echo $dtUser['nama_pustakawan'];?>
<?php } ?>