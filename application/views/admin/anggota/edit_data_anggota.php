<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
							    <li><a href= "<?php echo base_url('admin/master_data_anggota');?>">Master Data Anggota</a></li>
                                <li class = "active"> edit data anggota </li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <form action="<?php echo base_url('admin/update_data_anggota');?>" method ="post">
                        <div class="form-group col-md-6">
                            <label>Nomor identitas </label>
                        <input type="text" class="form-control" name="no_iden" value="<?php echo $no_iden;?>" placeholder=="masukan nomor identitas" required="required"></div>
                        <div style="clear:both;"></div>
                        
                        <div class="form-group col-md-6">
                            <label>Nama lengkap </label>
                        <input type="text" class="form-control" name="nama_anggota" value="<?php echo $nama_anggota;?>" placeholder=="masukan nama lengkap anggota" required="required"></div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Tempat lahir </label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $tempat_lahir;?>" placeholder=="masukan tempat lahir anggota" required="required"></div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Tanggal lahir </label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" placeholder=="masukan tanggal lahir anggota" required="required"></div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Jenis kelamin </label>
                            <select class="form-control" name="jenis_kelamin" required="required">
                            <option value="">------</option>
                                <?php
                                    if($jenis_kelamin =="L"){
                                        $selL="selected";
                                        $selP ="";
                                    }
                                    elseif($jenis_kelamin == "P"){
                                        $selL="";
                                        $selP ="selected";
                                    }
                                ?>
                                <option value="L" <?php echo $selL;?>>Laki-Laki</option>
                                <option value="P" <?php echo $selP;?>>Perempuan</option>
                            </select>
                            </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Status anggota </label>
                            <select class="form-control" name="status_anggota" required="required">
                            <option value="">------</option>
                                <?php
                                    if($status_anggota =="Guru"){
                                        $selG="selected";
                                        $selS ="";
                                    }
                                    elseif($status_anggota =="Siswa"){
                                        $selG="";
                                        $selS="selected";
                                    }
                                ?>
                                <option value="Guru" <?php echo $selG;?>>Guru</option>
                                <option value="Siswa" <?php echo $selS;?>>Siswa</option>
                            </select>
                            </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">update</button>
                            <a href ="<?php echo base_url('admin/master_data_anggota');?>"><button type="button" class="btn btn-danger">batal</button></a>
                            </div>
                        <div style="clear:both;"></div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div>











