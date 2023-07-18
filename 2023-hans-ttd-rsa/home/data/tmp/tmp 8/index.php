<?php 
$url = "home/data/tmp/tmp 8/education/";
$komponen = "home/data/tmp/tmp 8/";
include 'home/include/all_include.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
-->

<!-- Facebook and Twitter integration -->
<meta property="og:title" content=""/>
<meta property="og:image" content=""/>
<meta property="og:url" content=""/>
<meta property="og:site_name" content=""/>
<meta property="og:description" content=""/>
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />

<link href= "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
<link href= "https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

<!-- Animate.css -->
<link rel="stylesheet" href="<?php echo $url; ?>css/animate.css">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="<?php echo $url; ?>css/icomoon.css">
<!-- Bootstrap  -->
<link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap.css">

<!-- Magnific Popup -->
<link rel="stylesheet" href="<?php echo $url; ?>css/magnific-popup.css">

<!-- Owl Carousel  -->
<link rel="stylesheet" href="<?php echo $url; ?>css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo $url; ?>css/owl.theme.default.min.css">

<!-- Flexslider  -->
<link rel="stylesheet" href="<?php echo $url; ?>css/flexslider.css">

<!-- Pricing -->
<link rel="stylesheet" href="<?php echo $url; ?>css/pricing.css">

<!-- Theme style  -->
<link rel="stylesheet" href="<?php echo $url; ?>css/style.css">

<!-- Modernizr JS -->
<script src="<?php echo $url; ?>js/modernizr-2.6.2.min.js"></script>
<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?php echo $url; ?>js/respond.min.js"></script>
<![endif]-->

</head>
<body>

	<div class="fh5co-loader"></div>
	
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-right">
							<p class="site"><?php echo $email; ?></p>
							<p class="num">Call: <?php echo $telepon; ?></p>

						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-5">
							<div id="fh5co-logo"><i class="icon-study"></i> <?php echo $judul; ?><span>.</span></a></div>
						</div>
						<div class="col-xs-7 text-right menu-1">
							<ul>
								<!-- MENU -->
								<?php
								$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
								foreach($m as $i){if($i->t == 's' ){
									?>
									<!-- SINGLE -->
									<?php $apa = $i->n;
									if ($apa=="Login")
									{
										if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
										{
											$kodene = decrypt($_COOKIE["kodene"]);
											$ip = $_SERVER['REMOTE_ADDR']; 
											$useragent = $_SERVER['HTTP_USER_AGENT'];
											$token = sha1($ip.$useragent.$key);
											$token = crypt($token, $key);
											if ($_COOKIE['token_user'] == $token)
											{
												$token = "ada";
											}
											else
											{
												$token = "";
											}
											$kode = cek_database("","","","select * from data_pelanggan where id_pelanggan='$kodene'");
										}
										else
										{
											$token = "";
											$kode ="";
										}
										if ($kode=="ada" && $token=="ada")
										{
											?>
			<!--
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=akun">Akun</a> </li>
		-->
		<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout">Logout</a> </li>
		<?php	 
	}
	else
	{
		?>
		<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout"><?php echo $i->n;?></a> </li>
		<?php
	}
}
else
{
	?>
	<li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
<?php } ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
	?>
	<!-- MULTI -->
	<li  class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
		<ul class="dropdown-menu agile_short_dropdown">
			<?php
			$m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
			foreach($m1 as $i1) {
				if($i1->s=="$idmenu" and $i1->t=="sm" ){
					?>
					<li><li>
						<a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
							<?php echo $i1->n;?></a>
						</li></li>
					<?php }} ?>
				</ul>
			</li>
			<!-- /MULTI -->
		<?php }} ?>
		<!-- /MENU -->

		<li class="btn-cta"><a href= "admin"><span>Login Admin</span></a></li>
		<li class="btn-cta"><a href= "dosen"><span>Login Dosen</span></a></li>
		<li class="btn-cta"><a href= "mahasiswa"><span>Login Mahasiswa</span></a></li>
		<li class="btn-cta"><a href= "baak"><span>Login BAAK</span></a></li>
	</ul>
</div>
</div>

</div>
</div>
</nav>


<?php if(isset($_GET['p']) && ($_GET['p'] =="Home" or $_GET['p'] =="home")) { ?>
	<div>
	<br></br>
	<center><h3><?php sambutan(); ?></h3>
	<br>	
	<img width="1000" src="<?php echo $slide_a1;?>">
	<br>
	</center>
</div>	
			<tbody>
				<?php
				 $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi =  mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_dokumen where $berdasarkan like '%$isi%' and status='proses' LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_dokumen where $berdasarkan like '%$isi%' and status='proses'";
                } else {
                    $querytabel = "SELECT * FROM data_dokumen where status='proses' LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_dokumen";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {?>
				<tr>
					<td  width="50"><?php $no = (($no + 1));
                                                        echo $no;  ?></td>
                         
                          <td ><?php echo baca_database("", "nama", "select * from data_mahasiswa where id_mahasiswa='$data[id_mahasiswa]'") ?></td>


                        <td ><?php echo baca_database("", "nama", " select * from data_dosen where id_dosen ='$data[id_dosen]'") ?></td>
                        <td ><?php echo (format_indo($data['tanggal'])); ?></td>
                        <td ><?php echo ($data['nama']); ?></td>
                        <td ><?php echo ($data['status']); ?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
				margin-bottom: 1rem;
				font-size: 1rem;
				color: #212529;
			}

			thead th {
				background-color: #007bff;
				color: #fff;
				font-weight: bold;
				text-align: left;
			}

			tbody tr:nth-of-type(even) {
				background-color: #f2f2f2;
			}

			tbody td {
				padding: 0.75rem;
				vertical-align: top;
				border-top: 1px solid #dee2e6;
			}

			tbody td:first-child {
				font-weight: bold;
			}

			tbody td:last-child {
				text-align: right;
			}

			@media (max-width: 767.98px) {
				table {
					font-size: 0.875rem;
				}

				tbody td {
					padding: 0.5rem;
				}

				thead {
					display: none;
				}

				tbody tr {
					border-top: 1px solid #dee2e6;
					margin-bottom: 1rem;
					display: block;
				}

				tbody td:before {
					font-weight: bold;
					display: inline-block;
					width: 50%;
					margin-left: -0.5rem;
				}

				tbody td:first-child:before {
					content: "No";
				}

				tbody td:nth-child(2):before {
					content: "Nama";
				}

				tbody td:nth-child(3):before {
					content: "Alamat";
				}

				tbody td:last-child {
					text-align: left;
				}

				tbody td:last-child:before {
					content: "Telepon";
				}
			}

		</style>
	</div>
	<br>
	<br>
	<br>
		<!-- <div class="container">
		<center><h3>Dokumen Yang Sudah Verifikasi</h3></center>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Mahasiswa</th>
					<th>Nama Dosen</th>
					<th>Tanggal</th>
					<th>Nama Dokumen</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				 $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi =  mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_dokumen where $berdasarkan like '%$isi%' and status='verifikasi' LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_dokumen where $berdasarkan like '%$isi%' and status='verifikasi'";
                } else {
                    $querytabel = "SELECT * FROM data_dokumen where status='verifikasi' LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_dokumen";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {?>
				<tr>
					<td align="center" width="50"><?php $no = (($no + 1));
                                                        echo $no;  ?></td>
                         
                          <td ><?php echo baca_database("", "nama", "select * from data_mahasiswa where id_mahasiswa='$data[id_mahasiswa]'") ?></td>


                        <td ><?php echo baca_database("", "nama", " select * from data_dosen where id_dosen ='$data[id_dosen]'") ?></td>
                        <td ><?php echo (format_indo($data['tanggal'])); ?></td>
                        <td ><?php echo ($data['nama']); ?></td>
                        <td ><?php echo ($data['status']); ?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	
	</div> -->

	<div id="fh5co-course">
		<div class="container">
			<!-- <div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Our Information</h2>
					<p>Informasi terkini dari kami</p>
				</div>
			</div> -->
			<div class="row">
				<?PHP

				//$querytabel="SELECT * FROM data_berita  LIMIT 0,4";
				//$proses = mysql_query($querytabel);
				//while ($data = mysql_fetch_array($proses))
				{ ?>
						<!-- <div class="col-md-6 animate-box">
							<div class="course">
								<a href= "#" class="course-img" style="background-image: url(../../../../admin/upload/<?php echo $data['foto']; ?>);">
								</a>
								<div class="desc">
									<h3><a href= "#"><?php echo ($data['judul']); ?></a></h3>
									<p><?php echo (substr($data['isi'],0,100)); ?>..</p>

								</div>
							</div>
						</div> -->
						<?PHP } ?>
					</div>
				</div>
			</div>

		<?php } else {?>

			<aside id="fh5co-hero" style="height:200px">
				<div class="flexslider">
					<ul class="slides">
						<li style="background-image: url('home/data/image/background/slide_a.png');">
							<div class="overlay-gradient"></div>
							<div class="container">
								<div class="row">
									<div class="col-md-8 col-md-offset-2 text-center slider-text">
										<div class="slider-text-inner">
											<h1><?php echo ucwords(str_replace("_"," ",$_GET['p'])) ?></h1>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</aside>


		<?php } include 'halaman.php';?>

		
<div class="gototop js-top">
	<a href= "#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="<?php echo $url; ?>js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?php echo $url; ?>js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?php echo $url; ?>js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?php echo $url; ?>js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="<?php echo $url; ?>js/jquery.stellar.min.js"></script>
<!-- Carousel -->
<script src="<?php echo $url; ?>js/owl.carousel.min.js"></script>
<!-- Flexslider -->
<script src="<?php echo $url; ?>js/jquery.flexslider-min.js"></script>
<!-- countTo -->
<script src="<?php echo $url; ?>js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo $url; ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo $url; ?>js/magnific-popup-options.js"></script>
<!-- Count Down -->
<script src="<?php echo $url; ?>js/simplyCountdown.js"></script>
<!-- Main -->
<script src="<?php echo $url; ?>js/main.js"></script>
<script>
	var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
	simplyCountdown('.simply-countdown-one', {
		year: d.getFullYear(),
		month: d.getMonth() + 1,
		day: d.getDate()
	});

    //jQuery example
	$('#simply-countdown-losange').simplyCountdown({
		year: d.getFullYear(),
		month: d.getMonth() + 1,
		day: d.getDate(),
		enableUtc: false
	});
</script>
</body>
</html>

