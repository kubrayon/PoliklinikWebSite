<html>
<head>
	<link href="panelStyle.css" type="text/css" rel="stylesheet"/>
</head>


<?php
include("ayar.php");
session_start();
if(!isset($_SESSION["login"])){
echo '<div class="error">Bu sayfayı görüntüleme yetkiniz yoktur.</div>';
header("Refresh: 2; url=index.php");
}
else{
?>
<html>
	<body>
		<div class="panelMenu">
		<ul>
			<li><h3>ADMİN PANEL</h3></li>
			<li> <button onclick="carousel(1)">Randevu Listesi &#10095;</button> </li>
			<li><button onclick="carousel(2)">Doktor Ekleme &#10095;</button></li>
			<li><button onclick="carousel(3)">Doktor Güncelleme &#10095;</button></li>
			<li><button onclick="carousel(4)">Bölüm Ekle &#10095;</button></li>
			<li><button onclick="carousel(5)">Doktor Listesi &#10095;</button></li>
			<li><button onclick="carousel(6)">Bölüm Listesi &#10095;</button></li>
		</ul>
		</div>
		<div class="panelBox">
			<form method="POST" action="kaydet.php">
				<h1>Randevu Listesi</h1>
				<table>
					<tr>
						<th>Doktor Adı</th>
						<th>Hasta Tc</th>
						<th>Hasta Adı</th>
						<th>Randevu Tarihi</th>
						<th>Randevu Saati</th>
						<th></th>
					</tr>
					<?php
					include "../server.php";
					$randevugetir="SELECT * FROM randevular INNER JOIN doktorlar ON randevular.randevuDoktor = doktorlar.doktorID";
					$sorgu=mysqli_query($baglan,$randevugetir);
					while($sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC)){

						echo '<tr>';
						echo '<td>'.$sonuc["doktorAd"].' '.$sonuc["doktorSoyad"].'</td>';
						echo '<td>'.$sonuc["randevuTc"].'</td>';
						echo '<td>'.$sonuc["randevuAd"].'</td>';
						echo '<td>'.$sonuc["randevuTarih"].'</td>';
						echo '<td>'.$sonuc["randevuSaat"].'</td>';
						echo '<td>
								<input type="submit" value="Sil"/>
								<input type="hidden" name="randevuID" value="'.$sonuc["randevuID"].'">
								<input type="hidden" name="islemTuru" value="randevuSil">
							</td>';
						echo '</tr>';
					}
					?>
				</table>
			</form>
		</div>
		<div class="panelBox">
			<form method="POST" action="kaydet.php">
					<h1>Doktor Ekleme</h1>
					<table>
						<tr><td>Doktor TC No</td></tr>
						<tr><td><input minlength="11" maxlength="11" type="text" name="doktorTc" placeholder="Doktor TC numarasını Giriniz" required></td></tr>
						<tr><td>Doktor Adı</td></tr>
						<tr><td><input type="text" name="doktorAd" placeholder="Doktor Adını Giriniz" required></td></tr>
						<tr><td>Doktor Soyadı</td></tr>
						<tr><td><input type="text" name="doktorSoyad" placeholder="Doktor Soyadını Giriniz" required></td></tr>
						<tr><td>Doktor Bölümü</td></tr>
						<tr>
							<td>
								<select name="bolum">
									<?php
										$bolumgetir="SELECT * FROM bolum";
										$sorguB=mysqli_query($baglan,$bolumgetir);
										while($sonucB=mysqli_fetch_array($sorguB,MYSQLI_ASSOC)){
											echo '<option>'.$sonucB["bolumAd"].'</option>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><input type="hidden" name="islemTuru" value="doktorEkle"><input type="submit" value="Kaydet"></td>
						</tr>
					</table>
			</form>
		</div>
	

		<div class="panelBox">
			<form method="POST" action="kaydet.php">
					<h1>Doktor Güncelleme</h1>
					<table>
						<tr><td>Doktor TC No</td></tr>
						<tr><td><input minlength="11" maxlength="11" type="text" name="doktorTc" placeholder="Doktor TC numarasını Giriniz" required></td></tr>
						<tr><td>Doktor Adı</td></tr>
						<tr><td><input type="text" name="doktorAd" placeholder="Doktor Adını Giriniz" required></td></tr>
						<tr><td>Doktor Soyadı</td></tr>
						<tr><td><input type="text" name="doktorSoyad" placeholder="Doktor Soyadını Giriniz" required></td></tr>
						<tr><td>Doktor Bölümü</td></tr>
						<tr>
							<td>
								<select name="bolum">
									<?php
										$bolumgetir="SELECT * FROM bolum";
										$sorguB=mysqli_query($baglan,$bolumgetir);
										while($sonucB=mysqli_fetch_array($sorguB,MYSQLI_ASSOC)){
											echo '<option>'.$sonucB["bolumAd"].'</option>';
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><input type="hidden" name="islemTuru" value="doktorGüncelle"><input type="submit" value="Kaydet"></td>
						</tr>
					</table>
			</form>
		</div>
		<div class="panelBox">
			<form method="POST" action="kaydet.php">
					<h1>Bölüm Ekleme</h1>
					<table>
						
						<tr><td>Bölüm Adı</td></tr>
						<tr><td><input type="text" name="bolumAd" placeholder="Bölüm Adını Giriniz" required></td></tr>
						
						<!-- <tr>
							<td>
								<select name="bolum">
									<?php
										$bolumgetir="SELECT * FROM bolum";
										$sorguB=mysqli_query($baglan,$bolumgetir);
										while($sonucB=mysqli_fetch_array($sorguB,MYSQLI_ASSOC)){
											echo '<option>'.$sonucB["bolumAd"].'</option>';
										}
									?>
								</select>
							</td>
						</tr> -->
						<tr>
							<td><input type="hidden" name="islemTuru" value="bolumEkle"><input type="submit" value="Kaydet"></td>
						</tr>
					</table>
			</form>
		</div>
		<div class="panelBox">
			<form method="POST" action="kaydet.php">
					<h1>Doktor Listesi</h1>
					<table>
						<tr>
							<th>Doktor Tc Numarası</th>
							<th>Doktor Adı</th>
							<th>Doktor Bölümü</th>
							<th></th>
						</tr>
						<?php
							$doktorgetir="SELECT * FROM doktorlar INNER JOIN bolum ON doktorlar.bolumID = bolum.bolumID";
							$sorguD=mysqli_query($baglan,$doktorgetir);
							while($sonucD=mysqli_fetch_array($sorguD,MYSQLI_ASSOC)){
								echo '<tr>';
								echo '<td>'.$sonucD["doktorTc"].'</td>';
								echo '<td>'.$sonucD["doktorAd"].' '.$sonucD["doktorSoyad"].'</td>';
								echo '<td>'.$sonucD["bolumAd"].'</td>';
								echo '<td>
										<input type="submit" value="Sil"/>
										<input type="hidden" name="islemTuru" value="doktorSil">
										<input type="hidden" name="doktorID" value="'.$sonucD["doktorID"].'">
									</td>';
								echo '</tr>';
							}
						?>
					</table>
			</form>
		</div>
		<div class="panelBox">
			<form method="POST" action="kaydet.php">
				<h1>Bölüm Listesi</h1>
				<table>
					<tr>
						<th>Bölüm Adı</th>
						<th></th>
					</tr>
					<?php
						$doktorgetir="SELECT * FROM bolum ";
						$sorguD=mysqli_query($baglan,$doktorgetir);
						while($sonucD=mysqli_fetch_array($sorguD,MYSQLI_ASSOC)){
							echo '<tr>';
							echo '<td>'.$sonucD["bolumAd"].'</td>';
							echo '<td>
									<input type="submit" value="Sil"/>
									<input type="hidden" name="islemTuru" value="bolumsil">
									<input type="hidden" name="doktorID" value="'.$sonucD["bolumID"].'">
								</td>';
							echo '</tr>';
						}
					?>
				</table>
			</form>
		</div>
	</body>
</html>
<?php
}
?>
<script>
        var myIndex = 0;
        function carousel(n) {
            var i;
            var x = document.getElementsByClassName("panelBox");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
			myIndex=n;
			x[myIndex-1].style.display = "block";
        }
    </script>
</html>