<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li class="active">Master Data Buku</li>
                        </ol>
                        <br />
                    </div>
                    <a href="<?php echo base_url('admin/tambah_buku') ?>">
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Buku</button>
                    </a> <br />

                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">Kode Buku</th>
                                <th data-sortable="true">Judul Buku</th>
                                <th data-sortable="true">Penulis Buku</th>
                                <th data-sortable="true">Penerbit Buku</th>
                                <th data-sortable="true">Tahun Terbit</th>
                                <th data-sortable="true">Stok Buku</th>
                                <th data-sortable="true">Kategori Buku</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_buku as $buku) {
                                $enkripBuku = sha1($buku['kode_buku']);
                            ?>

                                <tr>
                                    <td data-sortable="true"><?php echo $no=$no+1?></td>
                                    <td data-sortable="true"><?php echo $buku['kode_buku'] ?></td>
                                    <td data-sortable="true"><?php echo $buku['judul_buku'] ?></td>
                                    <td data-sortable="true"><?php echo $buku['penulis_buku'] ?></td>
                                    <td data-sortable="true"><?php echo $buku['penerbit_buku'] ?></td>
                                    <td data-sortable="true"><?php echo $buku['tahun_terbit'] ?></td>
                                    <td data-sortable="true"><?php echo $buku['stok_buku'] ?></td>
                                    <td data-sortable="true"><?php echo $buku['nama_kategori_buku'] ?></td>
                                    <td data-sortable="true">
                                        <a href="<?php echo base_url() ?>admin/edit_buku/<?php echo $enkripBuku ?>" title="edit">
                                            <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
                                        </a>
                                        <a href="<?php echo base_url() ?>admin/hapus_buku/<?php echo $enkripBuku ?>" title="edit" onclick="return confirm('Yakin akan dihapus?')">
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