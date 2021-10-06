<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li class="active">Master Data Kategori</li>
                        </ol>
                        <br />
                    </div>

                    <a href="<?php echo base_url('admin/tambah_kategori') ?>">
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah kategori</button>
                    </a> <br />

                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">Nama Kategori</th>
                                <th data-sortable="true">Status Kategori</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_kategori as $kategori) {
                                $enkrip = sha1($kategori['id_kategori_buku']);
                            ?>

                                <tr>
                                    <td data-sortable="true"><?php echo $no = $no + 1 ?></td>
                                    <td data-sortable="true"><?php echo $kategori['nama_kategori_buku'] ?></td>
                                    <td data-sortable="true"><?php echo $kategori['status_kategori_buku'] ?></td>
                                    <td data-sortable="true">
                                        <a href="<?php echo base_url() ?>admin/edit_kategori/<?php echo $enkrip ?>" title="edit">
                                            <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
                                        </a>
                                        <a href="<?php echo base_url() ?>admin/hapus_kategori/<?php echo $enkrip ?>" title="edit" onclick="return confirm('Yakin akan dihapus?')">
                                            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function doDelete(idKategori) {
        swal({
                title: "Delete Data Kategori Buku?",
                text: "Data ini akan terhapus permanent",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?php echo base_url() ?>admin/hapusKategori/' + idKategori;
                } else {
                    $(this).removeAttr('disabled')
                }
            })
    }
</script>