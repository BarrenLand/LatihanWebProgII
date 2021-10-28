<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
							    <li><a href= "<?php echo base_url('admin/master_data_buku');?>">Master Data Buku</a></li>
                                <li class = "active"> edit data buku </li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <form action="<?php echo base_url('admin/update_data_buku');?>" method ="post">
                        <div class="form-group col-md-6">
                            <label>Judul Buku </label>
                        <input type="text" class="form-control" name="judul_buku" value="<?php echo $judul_buku;?>" placeholder="masukkan judul buku" required="required">
                        </div>
                        <div style="clear:both;"></div>

                         <div class="form-group col-md-6">
                            <label>Penulis Buku </label>
                        <input type="text" class="form-control" name="penulis_buku" value="<?php echo $penulis_buku;?>" placeholder="masukkan nama penulis" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Penerbit Buku </label>
                        <input type="text" class="form-control" name="penerbit_buku" value="<?php echo $penerbit_buku;?>" placeholder="masukkan nama penerbit" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Tahun Buku </label>
                        <input type="text" class="form-control" name="tahun_terbit" value="<?php echo $tahun_terbit;?>" maxlength="4" onekeypress="return harusangka(event)" placeholder="masukkan tahun terbit buku" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Stok Buku </label>
                        <input type="text" class="form-control" name="stok_buku" value="<?php echo $stok_buku;?>" maxlength="4" onekeypress="return harusangka(event)" placeholder="masukkan stok buku" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Kategori Buku </label>
                            <select class="form-control" name="kategori" required="required">
                                <?php
                                foreach ($data_kategori as $data){
                                    if($data['id_kategori_buku']==$datakategori){
                                        $sel = "selected";
                                    }
                                    else{
                                        $sel ="";
                                    }
                                ?>
                                <option value="<?php echo $data['id_kategori_buku'];?>"<?php echo $sel;?>><?php echo $data['nama_kategori_buku'];?></option>
                                <?php } ?>
                            </select>
                            </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">update</button>
                            <a href ="<?php echo base_url('admin/master_data_buku');?>"><button type="button" class="btn btn-danger">batal</button></a>
                            </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>











