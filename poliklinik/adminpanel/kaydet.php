<?php
include "../server.php";
if ($_POST["islemTuru"]=="randevuSil") {
    $randevusil="DELETE FROM randevular WHERE randevuID=".$_POST["randevuID"];
    $sorguD=mysqli_query($baglan,$randevusil);
    if($sorguD){
        echo 'Silme İşlemi Başarılı';
        header("Refresh: 4; url=admin.php");
    }
    else{
        echo 'Silme İşlemi Başarısız';
        header("Refresh: 4; url=admin.php");
    }
}
elseif ($_POST["islemTuru"]=="doktorEkle") {
    $doktorBolum="SELECT * FROM bolum WHERE bolumAd='".$_POST["bolum"]."'";
    $bolumsorgu=mysqli_query($baglan,$doktorBolum);
    while($sonucB=mysqli_fetch_array($bolumsorgu,MYSQLI_ASSOC)){
        $bolumID=$sonucB["bolumID"];
    }
    $doktorAd=$_POST["doktorAd"];
    $doktorSoyad=$_POST["doktorSoyad"];
    $doktorTc=$_POST["doktorTc"];
    $doktorEkle="INSERT INTO doktorlar (doktorAd,doktorSoyad,bolumID,doktorTc) VALUES ('$doktorAd','$doktorSoyad','$bolumID','$doktorTc')";
    $sorguE=mysqli_query($baglan,$doktorEkle);
    if($sorguE){
        echo 'Doktor ekleme başarılı';
        header("Refresh: 4; url=admin.php");
    }
    else{
        echo 'Doktor ekleme Başarısız';
        header("Refresh: 4; url=admin.php");
    }
}
elseif ($_POST["islemTuru"]=="doktorSil") {
    $doktorsil="DELETE FROM doktorlar WHERE doktorID=".$_POST["doktorID"];
    $sorguDD=mysqli_query($baglan,$doktorsil);
    if($sorguDD){
        echo 'Silme İşlemi Başarılı';
        header("Refresh: 4; url=admin.php");
    }
    else{
        echo 'Silme İşlemi Başarısız';
        header("Refresh: 4; url=admin.php");
    }
}
elseif ($_POST["islemTuru"]=="doktorGüncelle"){
    $doktorBolum="SELECT * FROM bolum WHERE bolumAd='".$_POST["bolum"]."'";
    $bolumsorgu=mysqli_query($baglan,$doktorBolum);
    while($sonucB=mysqli_fetch_array($bolumsorgu,MYSQLI_ASSOC)){
        $bolumID=$sonucB["bolumID"];
    }
    $doktorAd=$_POST["doktorAd"];
    $doktorSoyad=$_POST["doktorSoyad"];
    $doktorTc=$_POST["doktorTc"];
    $doktorguncelle="UPDATE doktorlar SET doktorAd='$doktorAd',doktorSoyad='$doktorSoyad',bolumID='$bolumID',doktorTc='$doktorTc' WHERE doktorTc='".$_POST["doktorTc"]."'";
    $sorguDD=mysqli_query($baglan,$doktorguncelle);
    if($sorguDD){
        echo 'Güncelleme İşlemi Başarılı';
        header("Refresh: 4; url=admin.php");
    }
    else{
        echo 'Güncelleme İşlemi Başarısız<br>';
        echo $doktorguncelle;
        header("Refresh: 40; url=admin.php");
    }
}
elseif ($_POST["islemTuru"]=="bolumEkle") {
    $bolumAd=$_POST["bolumAd"];
    $bilgi=mysqli_query($baglan,"SELECT COUNT(bolumAd) FROM bolum WHERE bolumAd='".$_POST["bolumAd"]."'");
    if($bilgi){
        $tek=mysqli_fetch_array($bilgi);

        if ($tek[0]>0) {
            echo  $bolumAd.' Bölümü Zaten Kayıtlı';
        }
        else{
            $bolumEkle="INSERT INTO bolum (bolumAd) VALUES ('$bolumAd')";
            $sorguE=mysqli_query($baglan,$bolumEkle);
            if($sorguE){
                echo 'Bölüm ekleme başarılı';
                header("Refresh: 4; url=admin.php");
            }
            else{
                echo 'Bölüm ekleme Başarısız';
                header("Refresh: 4; url=admin.php");
            }
        }
    }
}
elseif ($_POST["islemTuru"]=="bolumSil") {
    $bolumsil="DELETE FROM bolum WHERE bolumID=".$_POST["bolumID"];
    $sorguDD=mysqli_query($baglan,$bolumsil);
    if($sorguDD){
        echo 'Silme İşlemi Başarılı';
        header("Refresh: 4; url=admin.php");
    }
    else{
        echo 'Silme İşlemi Başarısız';
        header("Refresh: 4; url=admin.php");
    }
}
?>