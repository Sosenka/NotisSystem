<?php include("../methods/config.php"); ?>
<?php
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo = addslashes($haslo);
$login = addslashes($login);
$login = htmlspecialchars($login);

if ($_GET['login'] != '') { //jezeli ktos przez adres probuje kombinowac
exit;
}
if ($_GET['haslo'] != '') { //jezeli ktos przez adres probuje kombinowac
exit;
}

$haslo = md5($haslo); //szyfrowanie hasla
    if (!$login OR empty($login)) {
echo '<p class="alert">Wypełnij pole z loginem!</p>';
exit;
}
    if (!$haslo OR empty($haslo)) {
echo '<p class="alert">Wypełnij pole z hasłem!</p>';
exit;
}
$istnick = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `uzytkownicy` WHERE `nick` = '$login' AND `haslo` = '$haslo'")); // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
    if ($istnick[0] == 0) {

    } else {

$_SESSION['nick'] = $login;
$_SESSION['haslo'] = $haslo;
$nazwa = $_SESSION['nick'];
$ip = $_SERVER['HTTP_X_REAL_IP'];
$_SESSION['loged'] = 1;
$zapytanie = "UPDATE `uzytkownicy` SET `ip`='$ip' WHERE `nick`='$nazwa'";
$zap=mysql_query($zapytanie);
mysql_free_result($zap);
$zapytanie2="UPDATE `uzytkownicy` SET `zalogowany`='1' WHERE `nick`='$nazwa'";
$zap2=mysql_query($zapytanie2);

header("Location: ../admin.php");
}
?>
