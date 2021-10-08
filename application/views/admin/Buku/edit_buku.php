<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a href="<?php echo base_url('admin/master_buku') ?>">Master Data Buku</a> </li>
                            <li class="active">Edit Data Buku</li>
                        </ol>
                        <br />
                    </div>
                    <form action="<?php echo base_url('admin/update_buku') ?>" method="post">
                        <div class="form-group col-md-6">
                            <label>Judul Buku</label>
                            <input class="form-control" type="text" name="judul_buku" value="<?php echo $judul ?>" placeholder="Masukkan Judul Buku" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Penulis Buku</label>
                            <input class="form-control" type="text" name="penulis_buku" value="<?php echo $penulis ?>" placeholder="Masukkan Nama Lengkap" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Penerbit Buku</label>
                            <input class="form-control" type="text" name="penerbit_buku" value="<?php echo $penerbit ?>" placeholder="Masukkan Nama Penerbit" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Tahun Terbit</label>
                            <input class="form-control" type="text" name="tahun_terbit" value="<?php echo $tahun ?>" maxlength="4" onkeypress="return harusangka(event)" placeholder="Masukkan Tahun Terbit" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Stok Buku</label>
                            <input class="form-control" type="text" name="stok_buku" value="<?php echo $tahun ?>" maxlength="5" onkeypress="return harusangka(event)" placeholder="Masukkan Stok Buku" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Kategori Buku</label>
                            <select name="kategori" class="form-control" required="required">
                                <option value="">-----</option>
                                <?php
                                foreach ($data_kategori as $data)
                                if ($data['id_kategori_buku']==$kategori){
                                    $sel = "selected";
                                } 
                                else {
                                    $sel = "";
                                }
                                ?>
                                <option value="<?php echo $data['id_kategori_buku'] ?>" <?php echo $sel ?>><?php echo $data['nama_kategori_buku']?></option>
                            </select>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo base_url('admin/master_buku') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>