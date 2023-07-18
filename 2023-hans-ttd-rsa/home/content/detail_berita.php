<?php function detail_berita($tabel,$id,$tanggal,$judul,$foto,$isi,$proses)
{
?>

<?php
$sql=mysql_query("SELECT * FROM $tabel where $id = '".mysql_real_escape_string($proses)."'");
$data=mysql_fetch_array($sql);
?>

<section id="course-details" class="course-details">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row">



<br>
<button  class="btn btn-primary" onclick="goBack()">Kembali</button> <script> function goBack() { window.history.go(-1); } </script>
<br>


    <div class="col-lg-8">
            <img src="admin/upload/<?php echo $data["$foto"]; ?>" class="img-fluid" alt="">
            <h3><?php echo (substr($data["$judul"],0,200)); ?></h3>
			<p><?php echo (format_indo($data["$tanggal"])); ?></p>
			<br>
            <p>
             <?php echo (substr($data["$isi"],0,1000000)); ?>
            </p>
          </div>
		  
		  
			<div class="">
			<h2><?php echo (substr($data["$judul"],0,200)); ?></h2>
			<h3>Tanggal : <?php echo (format_indo($data["$tanggal"])); ?></h3>
			<a href='admin/upload/<?php echo $data["$foto"]; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='500' height='300' src='admin/upload/<?php echo $data["$foto"]; ?>'></a>
			<br>
  				<?php echo (substr($data["$isi"],0,1000000)); ?>
			<br>
  			</div>
		

<!-- DETAIL BERITA -->



<!-- TERBARU -->
   <div class="col-lg-4">
<h2>BERITA TERBARU</h2>
<?php
			
			$querytabel="SELECT * FROM $tabel ORDER BY $tanggal DESC LIMIT 0 ,10";
			$proses = mysql_query($querytabel);
			while ($data = mysql_fetch_array($proses))
			  { ?>
		  
		    <div class="course-info d-flex justify-content-between align-items-center">
              <h5><?php echo format_indo($data["$tanggal"]); ?></h5>
              <p><a href="index.php?p=berita&action=detail&proses=<?php echo (substr($data["$id"],0,100)); ?>"><?php echo (substr($data["$judul"],0,200)); ?></a></p>
            </div>
			
			  <?php }?>
 </div>

      </div>
    </section>

<?php }?>