<html>
<head>

</head>
<?php
include "menu.php";
?>
<body>
    <div class="randevu">
    <form method="POST" action="randevukayit.php" autocomplete="off">
        <table class="containerR">
            <tr>
            <th><h1>Randevu Kaydı</h1></th>
            </tr>
            
            <tr>
                <td>
                    <select name="doktorID" id="doktorID" required>
                        <?php
                            include "server.php";
                            $sql="SELECT * FROM bolum";
                            $sorgu=mysqli_query($baglan,$sql);
                            while($sonuc=mysqli_fetch_array($sorgu,MYSQLI_ASSOC)){
                                $sql2="SELECT * FROM doktorlar WHERE bolumID=".$sonuc["bolumID"];
                                $sorgu2=mysqli_query($baglan,$sql2);
                                while($sonuc2=mysqli_fetch_array($sorgu2,MYSQLI_ASSOC)){
                                    echo '<option value='.$sonuc2["doktorID"].'>'.$sonuc["bolumAd"].' ---> '.$sonuc2["doktorAd"].' '.$sonuc2["doktorSoyad"].'</option>';
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                        <?php 
                        $tarih = date("Y-m-d");
                        echo '<input type="date" name="randevuTarih" min="'.$tarih.'" max="2022-12-31" required>';    
                        ?>
                    
                    <select name="randevuSaat" id="randevuSaat" required>
                        <option>08:00</option>
                        <option>08:30</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                        <option>16:30</option>
                        <option>17:00</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input minlength="11" maxlength="11" type="text" name="hastaTc" placeholder="Tc Numaranız" required></td>
            </tr>
            <tr>
                <td><input type="text" name="hastaAd" placeholder="Adınız Soyadınız" required></td>
            </tr>
            <tr>
                <input type="hidden" name="islemTuru" value="randevuVer">
                <td><input type="submit" value="Randevu Al"></td>
            </tr>
        </table>
    </form>
    <form method="POST" action="randevuListe.php" autocomplete="off">
        <table class="containerR2">
            <tr>
            <th><h1>Randevuları Listele</h1></th>
            </tr>
            <tr>
                <td><input minlength="11" maxlength="11" type="text" name="hastaTc" placeholder="Tc Numaranız" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Randevularımı Getir"></td>
            </tr>
        </table>
    </form>
    </div>
    
</body>
<?php
include "footer.php";
?>
</html>