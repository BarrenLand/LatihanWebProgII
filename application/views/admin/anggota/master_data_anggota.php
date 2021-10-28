<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				    	    	<li class="active">Master Data Anggota</li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <a href="<?php echo base_url('admin/tambah_data_anggota');?>">
                        <button type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span>tambah anggota</button>
                    </a><br />

                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
                        <thead>
                        <tr>
                            <th data-sortable="true">#</th>
                            <th data-sortable="true">no. anggota</th>
                            <th data-sortable="true">no. identitas</th>
                            <th data-sortable="true">nama anggota</th>
                            <th data-sortable="true">tempat lahir</th>
                            <th data-sortable="true">tanggal lahir</th>
                            <th data-sortable="true">jenis kelamin</th>
                            <th data-sortable="true">status anggota</th>
                            <th data-sortable="true">opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=0;
                        foreach ($data_anggota as $dataanggota) {
                            $enkripanggota =sha1($dataanggota['no_anggota']);
                        ?>
                        <tr>
                        <td data-sortable="true"><?php echo $no=$no+1;?></td>
                        <td data-sortable="true"><?php echo $dataanggota['no_anggota'];?></td>
                        <td data-sortable="true"><?php echo $dataanggota['no_identitas'];?></td>
                        <td data-sortable="true"><?php echo $dataanggota['nama_anggota'];?></td>
                        <td data-sortable="true"><?php echo $dataanggota['tempat_lahir'];?></td>
                        <td data-sortable="true"><?php echo $dataanggota['tanggal_lahir'];?></td>
                        <td data-sortable="true"> 
                                <?php
                                if($dataanggota['jenis_kelamin']=="L"){
                                    echo "Laki-laki";
                                }
                                elseif($dataanggota['jenis_kelamin']=="P"){
                                    echo "perempuan";
                                }
                                else{
                                    echo "-";
                                }
                                ?>
                        </td>
                        <td data-sortable="true"><?php echo $dataanggota['status_anggota'];?></td>
                            <td data-sortable="true">
                                <a href ="<?php echo base_url();?>admin/edit_data_anggota/<?php echo $enkripanggota;?>" title="edit">
                                    <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
                                 </a>
                                 <a href ="<?php echo base_url();?>admin/hapus_data_anggota/<?php echo $enkripanggota;?>" title="hapus" onclick="return
                                 confirm('yakin akan dihapus?')">
                                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                 </a>
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











