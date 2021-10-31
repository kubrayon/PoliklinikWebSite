<?php
include "server.php";

if ($_POST["islemTuru"]=="randevuVer"){
      $doktorID=$_POST["doktorID"];
      $randevuTarih=$_POST["randevuTarih"];
      $randevuSaat=$_POST["randevuSaat"];
      $randevuTarih = str_replace('-', '.', $randevuTarih);
      $hastaTc=$_POST["hastaTc"];
      $hastaAd=$_POST["hastaAd"];

      $bilgi=mysqli_query($baglan,"SELECT COUNT(randevuID) FROM randevular WHERE randevuDoktor='".$doktorID."' AND randevuTarih='".$randevuTarih."' AND randevuSaat='".$randevuSaat."'");
      if($bilgi){
            $tek=mysqli_fetch_array($bilgi);

            if ($tek[0]>0) {
                  echo '<script>alert("Bu Gün Ve Tarihte Randevu Dolu")</script>';
                  header("Refresh: 0; url=randevu.php");
            }
            else{
                  $randevukayit="INSERT INTO randevular (randevuDoktor,randevuTarih,randevuSaat,randevuTc,randevuAd) VALUES ('$doktorID','$randevuTarih','$randevuSaat','$hastaTc','$hastaAd')";
                  $sorgu=mysqli_query($baglan,$randevukayit);
                  if($sorgu){
                        echo 'Randevu Basarili';
                        header("Refresh: 3; url=randevu.php");
                  }
                  else{
                        echo "Randevu  Alınamadı<br>";
                        echo $randevukayit."<br>";
                        echo "Error updating record: " . mysqli_error($baglan);
                        header("Refresh: 8; url=randevu.php");
                  }
            }
      }      
}

if ($_POST["islemTuru"]=="randevuSil") {
      $randevusil="DELETE FROM randevular WHERE randevuID=".$_POST["randevuID"];
      $sorguD=mysqli_query($baglan,$randevusil);
      if($sorguD){
          echo 'Silme İşlemi Başarılı';
          header("Refresh: 3; url=randevu.php");
      }
      else{
            echo "Silme İşlemi Başarısız<br>";
            echo $randevusil."<br>";
            header("Refresh: 8; url=randevu.php");
      }
  }
?>