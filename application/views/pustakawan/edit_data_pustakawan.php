<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
							    <li><a href= "<?php echo base_url('admin/master_data_pustakawan');?>">master data pustakawan</a></li>
                                <li class = "active"> edit data pustakawan </li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <form action="<?php echo base_url('admin/update_data_pustakawan');?>" method ="post">
                        <div class="form-group col-md-6">
                            <label>Nama </label>
                        <input type="text" class="form-control" name="nama_pustakawan" value="<?php echo $nama_pustakawan;?>" placeholder=="masukan nama kategori buku" required="required"></div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Username </label>
                        <input type="text" class="form-control" name="username_pustakawan" value="<?php echo $username_pustakawan;?>" placeholder=="masukan nama kategori buku" required="required"></div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Akses Pustakawan</label>
                            <select class="form-control" name="akses_pustakawan" required="required">
                            <option value="">------</option>
                                <?php
                                    if($akses_pustakawan ==1){
                                        $selA="selected";
                                        $selB ="";
                                    }
                                    elseif($akses_pustakawan == 2){
                                        $selA="";
                                        $selB="selected";
                                    }
                                ?>
                                <option value="1" <?php echo $selA;?>>1</option>
                                <option value="2" <?php echo $selB;?>>2</option>
                            </select>
                            </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">update</button>
                            <a href ="<?php echo base_url('admin/master_data_pustakawan');?>"><button type="button" class="btn btn-danger">batal</button></a>
                            </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>