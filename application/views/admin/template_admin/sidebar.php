<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
        <li class="<?php if($active_menu=='dashboard'){echo 'active'; } else {echo ''; } ?>">
            <a href="<?php echo base_url('admin/dashboard');?>"><span class="glyphicon glyphicon-home"> </span>Dashboard</a>
        </li>  
		<?php if ($_SESSION['akses'] == 1) { ?>      
		<li class="<?php if($active_menu=='master_data_anggota' || $active_menu=='tambah_data_anggota' || $active_menu=='edit_data_anggota'){ echo'
		active';} else {echo ''; } ?> ">
		<a href="<?php echo base_url('admin/master_data_anggota');?>"><span class="glyphicon glyphicon-user"></span> Data Master Anggota</a>
		</li>
		<li class="<?php if($active_menu=='master_data_buku' || $active_menu=='tambah_data_buku' || $active_menu=='edit_data_buku'){ echo'
		active';} else {echo ''; } ?> ">
		<a href="<?php echo base_url('admin/master_data_buku');?>"><span class="glyphicon glyphicon-list-alt"></span> Data Master Buku</a>
		</li>		
		<li class="<?php if($active_menu=='master_data_kategori' || $active_menu=='tambah_data_kategori' || $active_menu=='edit_data_kategori'){ echo'
		active';} else {echo ''; } ?> ">
		<a href="<?php echo base_url('admin/master_data_kategori');?>"><span class="glyphicon glyphicon-list-alt"></span> Data Master Kategori</a>
		</li>
		<li class="<?php if($active_menu=='master_data_pustakawan'){echo 'active'; } else {echo ''; } ?>">
            <a href="<?php echo base_url('admin/master_data_pustakawan');?>"><span class="glyphicon glyphicon-user"> </span>Data master Pustakawan</a>
        </li>
		<?php } ?>      
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> Transaksi <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span> Peminjaman Buku
						</a>
					</li>
					<li>
						<a class="" href="#">
							<span class="glyphicon glyphicon-share-alt"></span>Pengembalian
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->