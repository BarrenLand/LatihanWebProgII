<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li class="active">Master Data Pustakawan</li>
                        </ol>
                        <br />
                    </div>

                    <a href="<?php echo base_url('admin/tambah_pustakawan') ?>">
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Pustakawan</button>
                    </a> <br />

                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">Nama Pustakawan</th>
                                <th data-sortable="true">Username Pustakawan</th>
                                <th data-sortable="true">Akses Level</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_pustakawan as $pustakawan) {
                                $enkripPustakawan=sha1($pustakawan['id_pustakawan']);
                            ?>
                                <tr>
                                    <td data-sortable="true"><?php echo $no=$no+1 ?></td>
                                    <td data-sortable="true"><?php echo $pustakawan['nama_pustakawan'] ?></td>
                                    <td data-sortable="true"><?php echo $pustakawan['username_pustakawan'] ?></td>
                                    <td data-sortable="true"><?php echo $pustakawan['akses_pustakawan'] ?></td>
                                    <td data-sortable="true">
                                        <?php
                                        if ($data['id_pustakawan']!="A00001") {
                                        ?>
                                        <a href="<?php echo base_url() ?>admin/edit_pustakawan/<?php echo $enkripPustakawan ?>" title="edit">
                                            <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
                                        </a>
                                        <a href="<?php echo base_url() ?>admin/hapus_pustakawan/<?php echo $enkripPustakawan ?>" title="hapus" onclick="return confirm('Yakin akan dihapus?')">
                                            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                        </a>
                                        <?php } ?>
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