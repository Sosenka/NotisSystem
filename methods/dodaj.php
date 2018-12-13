<?php include("../methods/config.php"); ?>
<?php
$nlogin = $_POST['nlogin'];
$nhaslo = $_POST['nhaslo'];
$nhaslo = addslashes($nhaslo);
$nlogin = addslashes($nlogin);
$nlogin = htmlspecialchars($nlogin);
$nemail = $_POST['nemail'];

if ($_GET['nlogin'] != '') { //jezeli ktos przez adres probuje kombinowac
exit;
}
if ($_GET['nhaslo'] != '') { //jezeli ktos przez adres probuje kombinowac
exit;
}
if ($_GET['nemail'] != '') { //jezeli ktos przez adres probuje kombinowac
exit;
}

$nhaslo = md5($nhaslo); //szyfrowanie hasla

$istnick = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `uzytkownicy` WHERE `nick` = '$nlogin' AND `haslo` = '$nhaslo'")); // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
    if ($istnick[0] == 1) {
        echo "użytkownik istnieje";
    } else {


$zapytanie_ndodaj = "INSERT INTO `uzytkownicy`(`nick`, `haslo`, `email`) VALUES ('$nlogin','$nhaslo','$nemail')";
$zap_ndodaj=mysql_query($zapytanie_ndodaj);



header("Location: ../ustawienia.php");
}
?>
