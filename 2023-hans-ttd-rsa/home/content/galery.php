<?php function galery($tabel,$id,$judul,$foto,$keterangan)
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
				  { 
			?>
	<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box fadeInUp animated-fast">
						<a href="#" class="blog-img-holder" style="background-image: url('admin/upload/<?= $data[$foto];?>');"></a>
						<div class="blog-text">
							<h3><a href="#"><?= $data[$judul];?></a></h3>
							<span class="posted_on"><?= format_indo($data[$tanggal]);?></span>
							<p><?= $data[$keterangan];?>.</p>
						</div> 
					</div>
				</div>
 
   <!--        <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img src="admin/upload/<?= $data[$foto];?>" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="index.php?p=Galery&Go=<?= $data[$judul];?>"><?= $data[$judul];?></a></h5>
            
                <p class="card-text"><?= $data[$keterangan];?></p>
              </div>
            </div>
          </div>
          
       
	   
	 <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
        <a
            class="thumbnail fancybox"
            rel="ligthbox"
            href="index.php?p=Galery&Go=<?= $data[$judul];?>">
            <img
                class="img-responsive"
                alt=""
                onerror="this.src='home/data/image/error/error.png'"
                src="admin/upload/<?= $data[$foto];?>"/>
            <div class='text-right'>
                <small class='text-muted'><?= $data[$judul];?></small>
            </div>
        </a>
    </div> -->
    <?php
				} ?>
</div>
		</div>
	</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <center>
                <?php Pagination_font_end($page,$dataPerPage,$querypagination); ?>
            </center>
            <br>
            <br>
        </div>
    </div>
</div>
<?php }
else {
?>
<br>
<section id="events" class="events">
      <div class="container aos-init aos-animate" data-aos="fade-up">
 
            <a href="index.php?p=Galery" class="btn btn-primary">Kembali</a>
            <br>
            <br>
            <?php 
				$sql=mysql_query("SELECT * FROM $tabel where $judul = '".mysql_real_escape_string($_GET['Go'])."'");
				$data=mysql_fetch_array($sql);
				?>
				
          <div class="col-md-12 d-flex align-items-stretch">
            <div class="card">
              <div class="card-img">
                <img width="100%" height="100%" src="admin/upload/<?= $data[$foto];?>" alt="...">
              </div>
              <div class="card-body">
			  <br>
			  <br>
                <h5 class="card-title"><a href="index.php?p=Galery&Go=<?= $data[$judul];?>"><?= $data[$judul];?></a></h5>
            <br>
                <p class="card-text"><?= $data[$keterangan];?></p>
              </div>
            </div>
          </div>
          
            <br>
            <br>
        </div>
    </section>
<?php }

}?>