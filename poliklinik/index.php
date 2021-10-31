<html>
<head>

</head>
<?php
include "menu.php";
?>
<body>
    <section class="slide">
        <img class="mySlides" style="display: block;" src="images/foto15/foto0.png">
        <img class="mySlides" src="images/foto15/foto1.png">
        <img class="mySlides" src="images/foto15/foto2.png">
        <img class="mySlides" src="images/foto15/foto3.png">
        <img class="mySlides" src="images/foto15/foto4.png">
        <img class="mySlides" src="images/foto15/foto5.png">
        <img class="mySlides" src="images/foto15/foto6.png">
        <img class="mySlides" src="images/foto15/foto7.png">
        <img class="mySlides" src="images/foto15/foto8.png">
        <img class="mySlides" src="images/foto15/foto9.png">
        <img class="mySlides" src="images/foto15/foto10.png">
        <img class="mySlides" src="images/foto15/foto11.png">
        <img class="mySlides" src="images/foto15/foto12.png">
        <img class="mySlides" src="images/foto15/foto13.png">
        <img class="mySlides" src="images/foto15/foto14.png">
        <div class="slidebox">
            <ul>
                <li><button onclick="carousel(-1)">&#10094;</button></li>
                <li><button onclick="carousel(1)"> &#10095;</button></li>
            </ul>
        </div>
    </section>
    <div class="circles">
        <div><a href="doktor.php"><img src="images/doktor.png" alt=""><h4>Doktorlar</h4></a></div>
        <!-- <div><a href=""><img src="images/anne.png" alt=""><h4>Anne-Bebek</h4></a></div> -->
        <div><a href="https://enabiz.gov.tr/"target="_blank"><img src="images/rapor.png" alt=""><h4>Rapor Sonuçları</h4></a></div>
        <div><a href="randevu.php"><img src="images/182.png" alt=""><h4>Randevu Al</h4></a></div>
        <div><a href="iletisim.php"><img src="images/lokasyon.png" alt=""><h4>Nasıl Gidilir?</h4></a></div>
    </div>
</body>
<?php
include "footer.php";
?>
<script>
        var myIndex = 0;
        
        setInterval(myTimer, 5000);

        function myTimer() {
            carousel(1);
        }

        function carousel(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            if(n>0){
                myIndex++;
                //alert("İleri");
                if (myIndex > x.length){
                    myIndex = 1;
                }
                x[myIndex-1].style.display = "block";
            }
            else if(n<0 && myIndex>1){
                myIndex--;
                //alert("Geri");
                if (myIndex > x.length){
                    myIndex = 1;
                }
                x[myIndex-1].style.display = "block";
            }
        }
    </script>
</html>