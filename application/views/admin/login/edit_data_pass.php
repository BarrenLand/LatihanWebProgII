<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
							    <li><a href= "<?php echo base_url('admin/edit_data_pass');?>">master data pustakawan</a></li>
                                <li class = "active"> edit password </li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                        <form action="<?php echo base_url('admin/updatePassword');?>" method ="post">
                        <div class="form-group col-md-6">
                            <label>Password Lama </label>
                        <input type="text" class="form-control" name="passLama" placeholder ="masukan password lama" required="required"></div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Password Baru </label>
                        <input type="text" class="form-control" name="passBaru" placeholder ="masukan password baru" required="required"></div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">update</button>
                            <a href ="<?php echo base_url('admin/dashboard');?>"><button type="button" class="btn btn-danger">batal</button></a>
                            </div>
                    
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>