<html>
<head>

</head>
<?php
include "menu.php";
?>
<body>
<div class="doktorlar">
    <h1>Doktorlar</h1>
    <div>
        <?php
            include "server.php";
            $sqlBolum="SELECT * FROM bolum";
            $sorgu1=mysqli_query($baglan,$sqlBolum);
            while($bolum=mysqli_fetch_array($sorgu1,MYSQLI_ASSOC)){
                echo '<details><summary>'.$bolum["bolumAd"].'</summary><div class="doktorList">';
                    $sqlDoktor="SELECT * FROM doktorlar WHERE bolumID=".$bolum["bolumID"];
                    $sorgu2=mysqli_query($baglan,$sqlDoktor);
                    while($doktor=mysqli_fetch_array($sorgu2,MYSQLI_ASSOC)){
                        echo '<div class="doktor"><p><img src="images/doktorlar/'.$doktor["doktorID"].'.png" alt="">'.$doktor["doktorAd"].' '.$doktor["doktorSoyad"].'</p></div>';
                    }
                echo '</div></details>';
            }
        ?>
</div>
</div>
</body>
<?php
include "footer.php";
?>
</html>