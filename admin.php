<?php require_once("methods/config.php");

$nick = $_SESSION['nick'];
$haslo = $_SESSION['haslo'];
    if ((empty($nick)) AND (empty($haslo))) {
echo '<br>Nie byłeś zalogowany albo zostałeś wylogowany<br><a href="index.php">Strona Główna</a><br>';
exit;
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM uzytkownicy WHERE `nick`='$nick' AND `haslo`='$haslo' LIMIT 1"));
    if (empty($user[id]) OR !isset($user[id])) {
echo '<br>Nieprawidłowe logowanie.<br>';
exit;
}
$_SESSION['intLastRefreshTime'] = time();
$nazwa = $user[nick];
$_SESSION['nick'] = $nazwa;
// tresc dla zalogowanego uzytkownika
?>
<!DOCTYPE html>
<html lang="pl">

<head>
      <?php include("parts/head.php"); ?>
</head>

<body>
    <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav unique-color-dark">
        <div class="breadcrumb-dn mr-auto">
            <a href="index.php"><h3 id="logo">Support Elantis.pl</h3></a>
        </div>
        <ul class="nav navbar-nav ml-auto flex-row">
            <li class="nav-item">
                <a class="nav-link" href="#dodaj"><i class="fa fa-envelope"></i> <span class="hidden-sm-down">Wyślij zgłoszenie</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="status.php"><i class="fa fa-comments-o"></i> <span class="hidden-sm-down">Status zgłoszenia</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="wyloguj.php"><i class="fa fa-user"></i> <span class="hidden-sm-down">Elantis.pl</span></a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Zalogowany jako
                        <?php echo $nazwa;
                        $zapytanie_licz="SELECT count(*) FROM `zgloszenia` WHERE `status` = 'Oczekuje';";
                        $zap_licz=mysql_query($zapytanie_licz);
                        $l=mysql_fetch_row($zap_licz);
                        if($l[0] == "0"){

                        }else{
                          echo "<span class='badge indigo'>".$l[0]."</span>";
                        }



                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="ustawienia.php" style="color: black;">Ustawienia</a>
                        <a class="dropdown-item" href="index.php" style="color: black;">Główna</a>
                        <a class="dropdown-item" href="methods/wyloguj.php" style="color: black;">Wyloguj</a>
                    </div>
                </li>
        </ul>
    </nav>
    <header></header>

    <nav class="navbar navbar-dark unique-color">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="methods/admin.php">Panel administratora</a></li>
        </ol>
    </nav><br />

    <div class="row container_after">
      <table class="table">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Temat</th>
                  <th>Powód zgłoszenia</th>
                  <th>Login konta</th>
                  <th>Data wysłania</th>
                  <th>Status</th>
                  <th>Akcje</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $zapytanie="SELECT `id_zgloszenia`, `temat`, `nazwa postaci`, `login`, `email`, `powod`, `status`, `tresc`, `data`, `ip` FROM `zgloszenia`";
            $zap=mysql_query($zapytanie);
            while($t=mysql_fetch_row($zap))
            {
              $usun = $t[0];
              $email = $t[4];
            echo "<tr>";
            echo "<th scope='row'>".$t[0]."</th>";
            echo "<td>".$t[1]."</td>";
            echo "<td>".$t[5]."</td>";
            echo "<td>".$t[3]."</td>";
            echo "<td>".$t[8]."</td>";
            echo "<td>".$t[6]."</td>";
            echo "<td>
                  <a class='blue-text' href='methods/przejecie.php?id=$usun&email=$email'><i class='fa fa-user' data-toggle='tooltip' data-placement='bottom' title='Przejmij'></i></a>
                  <a class='teal-text' href='status.php?zgloszenie=$usun'><i class='fa fa-envelope-square' data-toggle='tooltip' data-placement='top' title='Podgląd/Opdowiedz'></i></a>
                  <a class='purple-text'><i class='fa fa-lock' data-toggle='tooltip' data-placement='bottom' title='Zamknij'></i></a>
                  <a class='red-text' href='methods/delete.php?rekord=$usun'><i class='fa fa-trash' data-toggle='tooltip' data-placement='top' title='Usuń'></i></a>
                  </td>";
            echo "</tr>";
            }

            if(isset($_SESSION['intLastRefreshTime']))
            {
              $intTimeoutSeconds = 10;
            	if(($_SESSION['intLastRefreshTime']+$intTimeoutSeconds)<time())
            	{
            		session_destroy();
                header("Location: methods/wyloguj.php");
            	}
            }
            ?>

          </tbody>
      </table>
      <div class="row">
          <div class="col-md-2 col-md-offset-5">

      <nav>
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
    </li>
    <!--<li class="page-item"><a class="page-link" href="#">2</a></li>-->
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</div>
</div>


    </div>
<?php include("parts/footer.php"); ?>


</body>

</html>
