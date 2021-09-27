<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Perpustakaan</title>

<link href="<?php echo config_item('css');?>bootstrap.min.css" rel="stylesheet">
<link href="<?php echo config_item('css');?>datepicker3.css" rel="stylesheet">
<link href="<?php echo config_item('css');?>styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Perpus</span>takaan</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'] ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>
							<li><a href="<?php echo base_url('admin/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a></li>
			<li><a href="anggota.html"><span class="glyphicon glyphicon-user"></span>Data Master Anggota</a></li>
			<li><a href="buku.html"><span class="glyphicon glyphicon-stats"></span>Data Master Buku</a></li>
			<li><a href="peminjaman.html"><span class="glyphicon glyphicon-list-alt"></span>Peraturan Peminjaman</a></li>
            <li><a href="pustakawan.html"><span class="glyphicon glyphicon-user"></span>Data Master Pustakawan</a></li>
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
							<span class="glyphicon glyphicon-share-alt"></span> Pengembalian Buku
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><span class="glyphicon glyphicon-user"></span> Halaman Masuk</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<ol class="breadcrumb">
						<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
					<li class="active">Dashboard</li>
					</ol>
				</div><!--/.row-->
				<div class="panel panel-body">
					<div class="alert alert-success" role="alert">
						<span class="glyphicon"></span> Selamat datang di halaman admin <b>sistem informasi perpustakaan</b> silahkan melakukan pengelolaan data secara berkala <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
					<div class="alert alert-danger" role="alert">
						<span class="glyphicon"></span> Jagalah kerahasiaan password anda demi keamanan sistem administrator <b>sistem infomrasi perpustakaan</b> <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="<?php echo config_item('js');?>jquery-1.11.1.min.js"></script>
	<script src="<?php echo config_item('js');?>bootstrap.min.js"></script>
	<script src="<?php echo config_item('js');?>chart.min.js"></script>
	<script src="<?php echo config_item('js');?>chart-data.js"></script>
	<script src="<?php echo config_item('js');?>easypiechart.js"></script>
	<script src="<?php echo config_item('js');?>easypiechart-data.js"></script>
	<script src="<?php echo config_item('js');?>bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
