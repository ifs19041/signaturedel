<?php 
function berita($tabel,$id,$tanggal,$judul,$foto,$isi)
{
	if (!(isset($_GET['Go'])))
	{
	?>

<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box fadeInUp animated-fast">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Galery</h2>
				</div>
			</div>
			<div class="row">

		<!--
        <form name="formcari" id="formcari" action="" method="get">
            <fieldset>
                <table>
                    <tbody>
                        <input name="p" value="berita" id="page" type="hidden">
                        <input
                            value="<?php echo $judul;?>"
                            type="hidden"
                            name="Berdasarkan"
                            id="Berdasarkan">

                        <tr>
                            <td>Pencarian</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="isi" value="">
                                <?php
										if (isset($_GET['Berdasarkan']))
										{
											btn_cari('Cari');
											?>
                                <a class="btn btn-primary" href="index.php?p=berita">
                                    Reset
                                </a>
                            <?php
										}
										else
										{
											?>

                                <?php
											btn_cari('Cari');
											
										}
								?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>
-->
    <?php
				if (isset($_GET['page']) && !empty($_GET['page'])){ $page = (int)$_GET['page']; }
				else { $page = 1; }
				if (isset($_GET['perPage']) && !empty($_GET['perPage'])){ $dataPerPage = (int)$_GET['perPage']; }
				else { $dataPerPage = 12; }
				
				
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan = $_GET['Berdasarkan'];
				$isi = $_GET['isi'];
				$querytabel="SELECT * FROM $tabel where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM $tabel where $berdasarkan like '%$isi%'";
				}
				else
				{
				$querytabel="SELECT * FROM $tabel  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM $tabel";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				{ ?>
        <br>

<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box fadeInUp animated-fast">
						<a href="#" class="blog-img-holder" style="background-image: url('admin/upload/<?= $data[$foto];?>');"></a>
						<div class="blog-text">
							<h3><a href="#"><?= $data[$judul];?></a></h3>
							<span class="posted_on"><?= format_indo($data[$tanggal]);?></span>
							<p><?php echo (substr($data["$isi"],0,300)); ?>.</p>
							 <a
                class="btn btn-success btn-xs"
                href="index.php?p=berita&Go=<?php echo $data[$judul];?>">BACA SELENGKAPNYA...
            </a>
						</div> 
					</div>
				</div>
	


    

        <?php } ?>
</div>
		</div>
	</div>

<div class="col-md-12">
    <div class="col-md-1 sidebar"></div>
    <div class="col-md-8 sidebar">
     <center>   <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?> </center>
        <br>
        <br><br><br>
    </div>
</div>

<?php 
} 

else {


$sql=mysql_query("SELECT * FROM $tabel where $judul = '".mysql_real_escape_string($_GET['Go'])."'");
$data=mysql_fetch_array($sql);
?>

<section id="course-details" class="course-details">
 <div style="padding-left:100px"><button class="btn btn-primary" onclick="goBack()">Kembali</button>
        <script>
            function goBack() {
                window
                    .history
                    .go(-1);
            }
        </script>
     
</div>	 <br>
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row">
       

        <div class="col-lg-8">
            <img src="admin/upload/<?php echo $data["$foto"]; ?>" class="img-fluid" alt="">
            <h3><?php echo (substr($data["$judul"],0,200)); ?></h3>
			<p><?php echo (format_indo($data["$tanggal"])); ?></p>
			<br>
            <p>
             <?php echo (substr($data["$isi"],0,1000000)); ?>
            </p>
          </div>

  <div class="col-lg-4">
<h2>BERITA TERBARU</h2>
<div class="container">
<div class="row">
<?php
			
			$querytabel="SELECT * FROM $tabel ORDER BY $tanggal DESC LIMIT 0 ,10";
			$proses = mysql_query($querytabel);
			while ($data = mysql_fetch_array($proses))
			  { ?>
		  
 <div class="course-info d-flex justify-content-between align-items-center">
		     <div class="course-info d-flex justify-content-between align-items-center">
              <span><?php echo format_indo($data["$tanggal"]); ?></span>
			  </div>
		    <div class="course-info d-flex justify-content-between align-items-center">
              <p> &nbsp;<a href="index.php?p=berita&action=detail&proses=<?php echo (substr($data["$id"],0,100)); ?>"><?php echo (substr($data["$judul"],0,200)); ?></a></p>
            </div>
            </div>
			
			  <?php }?>
 </div>
 </div>
 </div>
 </div>

      </div>
    </section>
    
<?php
}
}
?>