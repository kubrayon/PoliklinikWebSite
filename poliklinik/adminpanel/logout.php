<html>
<style>
body{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 13px;
		}
		.info, .success, .warning, .error, .validation {
			border: 1px solid;
			margin: 10px 0px;
			padding: 15px 10px 15px 50px;
			background-repeat: no-repeat;
			background-position: 10px center;
		}
		.success {
			color: #4F8A10;
			background-color: #DFF2BF;
			background-image: url('https://i.imgur.com/Q9BGTuy.png');
		}
</style>
</html>

<?php
session_start();
ob_start();
session_destroy();
echo '<div class="success">Çıkış Yaptınız. Ana Sayfaya Yönlendiriliyorsunuz.</div>';
header("Refresh: 2; url=index.php");
ob_end_flush();
?>