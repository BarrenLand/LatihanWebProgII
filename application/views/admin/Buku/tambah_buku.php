    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <ol class="breadcrumb">
                                    <li><a href='#'><span class="glyphicon glyphicon-home"></span></a></li>
                                    <li><a href="<?php echo base_url('admin/anggota/master_buku');?>">Master Data Anggota</a></li>
                                    <li class="active">Tambah Data Anggota</li>
                                </ol>
                                <br />
                            </div>
                            <form action="<?php echo base_url('admin/simpan_buku');?>" method="post">
                                <div class="form-group col-md-6">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" required="required">
                                </div>
                                <div style="clear:both;"></div>
                                
                                <div class="form-group col-md-6">
                                    <label>Penulis Buku</label>
                                    <input type="text" class="form-control" name="penulis_buku" placeholder="Masukkan Nama Penulis Buku" required="required">
                                </div>
                                <div style="clear:both;"></div>
                                
                                <div class="form-group col-md-6">
                                    <label>Penerbit Buku</label>
                                    <input type="text" class="form-control" name="penerbit_buku" placeholder="Masukkan Nama Penerbit" required="required">
                                </div>
                                <div style="clear:both;"></div>
                                
                                <div class="form-group col-md-6">
                                    <label>Tahun Terbit</label>
                                    <input type="text" class="form-control" name="tahun_terbit" maxlength="4" onkeypress="return harusangka(event)" placeholder="Masukkan Tahun Terbit Buku" required="required">
                                </div>
                                <div style="clear:both;"></div>
                                
                                <div class="form-group col-md-6">
                                    <label>Stok Buku</label>
                                    <input type="text" class="form-control" name="stok_buku" maxlength="5" onkeypress="return harusangka(event)" placeholder="Masukkan Stok Buku" required="required">
                                </div>
                                <div style="clear:both;"></div>

                                <div class="form-group col-md-6">
                                    <label>Kategori Buku</label>
                                    <select class="form-control" name="kategori" required="required">
                                        <option value="">-----</option>
                                        <?php
                                        foreach($data_kategori as $data)
                                        ?>
                                        <option value="<?php echo $data['id_kategori_buku'];?>"><?php echo $data['nama_kategori_buku'];?></option>
                                        <?php  ?>
                                    </select>
                                </div>
                                <div style="clear:both;"></div>

                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="submit" class="btn btn-danger">Batal</button>
                                <div style="clear:both;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
