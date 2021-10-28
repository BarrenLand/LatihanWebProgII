<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
							    <li><a href= "<?php echo base_url('admin/master_data_anggota');?>">Master Data Anggota</a></li>
                                <li class = "active"> tambah data anggota </li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <form action="<?php echo base_url('admin/simpan_data_anggota');?>" method ="post">
                        <div class="form-group col-md-6">
                            <label>Nomor identitas </label>
                        <input type="text" class="form-control" name="no_iden" placeholder="masukkan nomor identitas" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Nama Lengkap </label>
                        <input type="text" class="form-control" name="nama_anggota" placeholder="masukkan nama lengkap anggota" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Tempat Lahir </label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="masukkan tempat lahir anggota" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Tanggal Lahir </label>
                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="masukkan tanggal lahir anggota" required="required">
                        </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin </label>
                            <select class="form-control" name="jenis_kelamin" required="required">
                                <option value="">------</option>
                                <option value="L">laki-laki</option>
                                <option value="P">perempuan</option>
                            </select>
                            </div>
                        <div style="clear:both;"></div>

                        <div class="form-group col-md-6">
                            <label>Status Anggota </label>
                            <select class="form-control" name="status_anggota" required="required">
                                <option value="">------</option>
                                <option value="Guru">Guru</option>
                                <option value="Siswa">Siswa</option>
                            </select>
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











