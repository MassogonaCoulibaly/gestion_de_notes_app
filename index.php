<?php
include ("connexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../style/style.css">
    <title>Document</title>
</head>
<body class="bod">
<div id="loginform">
<div id="mainlogin">
    <h1>Se connecter</h1>
    <form name="connect">
      <input class="input" type="text" placeholder="Pseudo" name="user" required />
      <input class="input" type="password" placeholder="Mot de passe" name="pass" required />
      <input type="submit" name="submit" value="Connexion" class="nav_bouton_connect" />
      <div id="note"><span>Se souvenir <input class="checkbox"  type="checkbox" name="remember" /></span></div>
    </form>
    <div id="note"><a href="#">Mot de passe oublié ?</a></div>
  </div>
</div>
</body>
</html>
