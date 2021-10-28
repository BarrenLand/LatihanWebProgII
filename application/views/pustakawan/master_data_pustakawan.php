<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				    	    	<li class="active">Master Data Pustakawan</li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <a href="<?php echo base_url('admin/tambah_data_pustakawan');?>">
                        <button type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span>tambah pustakawan</button>
                    </a><br />

                    <table data-toggle="table" date-url ="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
                    data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-sortable="true">#</th>
                            <th data-sortable="true">username</th>
                            <th data-sortable="true">nama pustakawan</th>
                            <th data-sortable="true">akses</th>
                            <th data-sortable="true">opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=0;
                        foreach ($data_pustakawan as $datapustakawan) {
                            $enkripPustakawan = sha1($datapustakawan['id_pustakawan']);
                        ?>
                        <tr>
                        <td data-sortable="true"><?php echo $no=$no+1;?></td>
                        <td data-sortable="true"><?php echo $datapustakawan['nama_pustakawan'];?></td>
                        <td data-sortable="true"><?php echo $datapustakawan['username_pustakawan'];?></td>
                        <td data-sortable="true"><?php echo $datapustakawan['akses_pustakawan'];?></td>
                        <td data-sortable="true"> 
                            <a href ="<?php echo base_url();?>admin/edit_data_pustakawan/<?php echo $enkripPustakawan;?>" title="edit">
                                <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
                            </a>
                            <a href ="<?php echo base_url();?>admin/hapus_data_pustakawan/<?php echo $enkripPustakawan;?>" title="hapus" onclick="return
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











