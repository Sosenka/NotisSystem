<? require_once("../methods/config.php");
$nick = $_SESSION['nick'];
$zapytanie3="UPDATE `uzytkownicy` SET `zalogowany`='0' WHERE `nick`='$nick'";
$zap3=mysql_query($zapytanie3);
session_destroy();
//mail('sosnaorgpl@gmail.com', 'Wylogowano', 'Wylogowano pomyslnie z panelu administratora Elantis.pl.');
header("Location: ../index.php");
?>
