<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                   <div class="panel-body">
		        	    <div class="row">
                             <ol class="breadcrumb">
							    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				    	    	<li class="active">Master Data Buku</li>
				        	</ol>
                            <br />
                        </div><!--/.row-->
                    <a href="<?php echo base_url('admin/tambah_data_buku');?>">
                        <button type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span>tambah data buku</button>
                    </a><br />

                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
                        <thead>
                        <tr>
                            <th data-sortable="true">#</th>
                            <th data-sortable="true">kode buku</th>
                            <th data-sortable="true">judul buku</th>
                            <th data-sortable="true">penulis buku</th>
                            <th data-sortable="true">penerbit buku</th>
                            <th data-sortable="true">tahun terbit</th>
                            <th data-sortable="true">stock buku</th>
                            <th data-sortable="true">kategori buku</th>
                            <th data-sortable="true">opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=0;
                        foreach ($databuku as $databuku) {
                            $enkripbuku = sha1($databuku['kode_buku']);
                        ?>
                        <tr>
                        <td data-sortable="true"><?php echo $no=$no+1;?></td>
                        <td data-sortable="true"><?php echo $databuku['kode_buku'];?></td>
                        <td data-sortable="true"><?php echo $databuku['judul_buku'];?></td>
                        <td data-sortable="true"><?php echo $databuku['penulis_buku'];?></td>
                        <td data-sortable="true"><?php echo $databuku['penerbit_buku'];?></td>
                        <td data-sortable="true"><?php echo $databuku['tahun_terbit'];?></td>
                        <td data-sortable="true"><?php echo $databuku['stok_buku'];?></td>
                        <td data-sortable="true"><?php echo $databuku['nama_kategori_buku'];?></td>

                            <td data-sortable="true">
                                <a href ="<?php echo base_url();?>admin/edit_data_buku/<?php echo $enkripbuku;?>" title="edit">
                                    <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
                                 </a>
                                 <a href ="<?php echo base_url();?>admin/hapus_data_buku/<?php echo $enkripbuku;?>" title="hapus" onclick="return
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











