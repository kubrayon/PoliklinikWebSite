<html>
<head>

</head>
<?php
include "menu.php";
$hastaTc=$_POST["hastaTc"];
?>
<body class="randevuliste">
    <form method="POST" action="randevukayit.php" autocomplete="off" class="panelbox">
        
        <table>
            <tr>
                <th colspan="6">
                <h1>Randevu Listesi</h1>
                </th>
            </tr>
            <tr>
                <th>Doktor Adı</th>
                <th>Hasta Tc</th>
                <th>Hasta Adı</th>
                <th>Randevu Tarihi</th>
                <th>Randevu Saati</th>
                <th></th>
            </tr>
            <?php
            include "server.php";
            $randevugetir="SELECT * FROM randevular INNER JOIN doktorlar ON randevular.randevuDoktor = doktorlar.doktorID WHERE randevuTc='$hastaTc'" ;
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
</body>
<?php
include "footer.php";
?>
</html>