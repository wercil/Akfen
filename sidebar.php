<div class="col-md-3"><!--sidebar-->
	<div class="title-bg">
		<div class="title">Kategoriler</div>
	</div>
	
	<div class="categorybox">
		
		<ul>
			
					<?php 
			$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_durum=:durum order by kategori_sira ASC");
			$kategorisor->execute(array(
				'durum' => 1,
			));

 while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { 

	$kategori_id=$kategoricek['kategori_id'];
	?>


	<li><a href="kategoriler-<?=seo($kategoricek['kategori_ad'])."-".$kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?><span>(

		
	</a>
	<?php 

$urunsay=$db->prepare("SELECT COUNT(kategori_id) as say FROM urun where kategori_id=:id");
$urunsay->execute(array(
	'id' => $kategori_id
));

$saycek=$urunsay->fetch(PDO::FETCH_ASSOC);

echo $saycek['say'];

?>

)</span></a></li>


<?php } ?>
<!-- Burda Başlıyoruz ana gövde -->
		</ul>
	</div>



	<!-- Kategoriler yukarıda -->

	<div class="ads">
		<a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
	</div>

	<div class="title-bg">
		<div class="title">En Çok Satanlar</div>
	</div>
	<?php
	$urunsor=$db->prepare("SELECT * FROM urun limit 3");
	$urunsor->execute();
	while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {

		$urun_id=$uruncek['urun_id'];
		$urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id  ");
		$urunfotosor->execute(array(
			'urun_id' => $urun_id
			));

		$urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC);

	?>
	<div class="best-seller">
		<ul>
			<li class="clearfix">
				<a href="#"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive mini"></a>
				<div class="mini-meta">
					<a href="#" class="smalltitle2"><?php echo $uruncek['urun_ad'] ?></a>
					<p class="smallprice2"><?php echo $uruncek['urun_fiyat'] ?></p>
				</div>
			</li>
		
		</ul>	
	</div>			<?php } ?>	


			</div><!--sidebar-->