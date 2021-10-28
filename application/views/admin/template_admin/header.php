<?php
$id = $this->session->userdata('idpustakawan');
$enkrip =  $this->session->userdata('enid');
$namauser = $this->session->userdata('nama_pustakawan');

if($id=="" or $enkrip!=sha1($id)){
    ?>
    <script type="text/javascript">
        alert("Session habis. Silahkan login.");
        document.location="<?php echo base_url('admin/login');?>";
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Perpustakaan :: <?php echo $judul_web;?></title>

<link href="<?php echo config_item('css');?>bootstrap.min.css" rel="stylesheet">
<link href="<?php echo config_item('css');?>datepicker3.css" rel="stylesheet">
<link href="<?php echo config_item('css');?>styles.css" rel="stylesheet">
<link href="<?php echo config_item('css');?>bootstrap-table.css" rel="stylesheet">

<script type ="text/javascript">
	funcition harusangka(jumlah){
		var karakter =(jumlah.which) ? jumlah.which : event.keyCode
		if (karakter > 31 && (karakter < 48 || karakter > 57))
			return false;

		return false;
	}
</script>

<script type ="text/javascript">
	funcition getkey(e){
		if (window.event)
		return window.event.keyCode;
		else if (e)
		return e.which;
		else
		return null
	}
	funcition goodchars(e, goods, field){
		var key, keychar;
		key = getkey (e);
		if (key == null) return true;

		keychar = String.fromCharCode(key);
		keychar = keychar.toLowerCase();
		goods = goods.toLowerCase();

		if (goods.indexOf(keychar) != -1)
		return true;

		if ( key==null || key==0 || key==8 || key==9 || key==27 )
		return true;

		if (key==13) {
			var i;
			for (i=0; i < field.form.elements.length; i++)
			if (field ==  field.form.elements.length[i])
			break;
			i = (i+1) % field.form.elements.length;
			field.form.elements.length[i].focus();
			return false;
		};

		return false;
	}
</script>


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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $namauser;?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="<?php if($active_menu=='edit_data_pass'){ echo' active';} else {echo ''; } ?> ">
							<a href="<?php echo base_url('admin/edit_data_pass');?>"><span class="glyphicon glyphicon-list-alt"></span> setting</a>
							</li>
							<li><a href="<?php echo base_url('admin/logout');?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>