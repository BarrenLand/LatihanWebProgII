<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
							    <li><a href= "<?php echo base_url('admin/master_data_pustakawan');?>">Master Data Pustakawan</a></li>
                                <li class = "active"> tambah data pustakawan </li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <form action="<?php echo base_url('admin/simpan_data_pustakawan');?>" method ="post">
                        <div class="form-group col-md-6">
                            <label>Nama pustakawan </label>
                        <input type="text" class="form-control" name="nama_pustakawan" placeholder="masukkan nama pustakawan" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Username </label>
                        <input type="text" class="form-control" name="username_pustakawan" placeholder="masukkan nama username" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                            </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>