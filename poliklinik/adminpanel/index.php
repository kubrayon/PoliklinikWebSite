<html>
<head>
    <link href="panelStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="panelForm">
        <form  method="POST" action="login.php" autocomplete="off">
            <h1 class="">Admin Paneli</h1>
            <div>
                <span class="required">Adınız</span> <br>
                <input type="text" class="text" name="username" placeholder="Adınız" tabindex="1" required />
            </div>
            <div>
                <span class="required">Şifreniz</span> <br>
                <input type="password" class="text" name="password" placeholder="Şifreniz" tabindex="2" required />
            </div>
            <input type="submit" value="Giriş Yap" />
        </form>
    </div>
</body>
</html>