<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
							    <li><a href= "<?php echo base_url('admin/master_data_kategori');?>">Master Data Kategori</a></li>
                                <li class = "active"> edit data kategori </li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <form action="<?php echo base_url('admin/update_data_kategori');?>" method ="post">
                        <div class="form-group col-md-6">
                            <label>Nama Kategori Buku </label>
                        <input type="text" class="form-control" name="nama_kategori_buku" value="<?php echo $nama_kategori;?>" placeholder=="masukan nama kategori buku" required="required"></div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Status kategori buku</label>
                            <select class="form-control" name="status_kategori_buku" required="required">
                            <option value="">------</option>
                                <?php
                                    if($status_kategori =="Aktif"){
                                        $selA="selected";
                                        $selT ="";
                                    }
                                    elseif($status_kategori == "Tidak Aktif"){
                                        $selA="";
                                        $selT ="selected";
                                    }
                                ?>
                                <option value="Aktif" <?php echo $selA;?>>Aktif</option>
                                <option value="Tidak Aktif" <?php echo $selT;?>>Tidak Aktif</option>
                            </select>
                            </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">update</button>
                            <a href ="<?php echo base_url('admin/master_data_katgeori');?>"><button type="button" class="btn btn-danger">batal</button></a>
                            </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>