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
              <a href="index.php"><h3>Support Elantis.pl</h3></a>
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
                          <a class="dropdown-item" href="admin.php" style="color: black;">Panel</a>
                          <a class="dropdown-item" href="index.php" style="color: black;">Główna</a>
                          <a class="dropdown-item" href="methods/wyloguj.php" style="color: black;">Wyloguj</a>
                      </div>
                  </li>
          </ul>
      </nav>
      <header></header>
      <nav class="navbar navbar-dark unique-color">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Główna</a></li>
              <li class="breadcrumb-item"><a href="index.php">Ustawienia</a></li>
          </ol>
      </nav><br />

<div class="container">
      <!-- Nav tabs -->
<div class="row">
    <div class="col-md-2">
        <ul class="nav nav-tabs md-pills pills-secondary flex-column text-center" role="tablist">
            <li class="nav-item margintop">
                <a class="nav-link active" data-toggle="tab" href="#panel41" role="tab"><i class="fa fa-user fa-2x"></i><br> Dodaj użytkownika</a>
            </li>
            <li class="nav-item margintop">
                <a class="nav-link" data-toggle="tab" href="#panel42" role="tab"><i class="fa fa-heart fa-2x"></i><br> Strona</a>
            </li>
            <li class="nav-item margintop">
                <a class="nav-link" data-toggle="tab" href="#panel43" role="tab"><i class="fa fa-envelope fa-2x"></i><br> Contact</a>
            </li>
            <li class="nav-item margintop">
                <a class="nav-link" data-toggle="tab" href="#panel44" role="tab"><i class="fa fa-ban fa-2x"></i><br> Blokada</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
        <!-- Tab panels -->
        <div class="tab-content vertical">
            <!--Panel 1-->
            <div class="tab-pane fade in show active" id="panel41" role="tabpanel">
                <br />
                <h2>Dodaj użytkownika</h2><hr>
                <form class="form-inline" action="methods/dodaj.php" method="post">

                    <div class="md-form form-group">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="form91" class="form-control validate" name="nlogin">
                        <label for="form91" data-error="wrong" data-success="right">Login</label>
                    </div>

                    <div class="md-form form-group">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="form92" class="form-control validate" name="nhaslo">
                        <label for="form92" data-error="wrong" data-success="right">Hasło</label>
                    </div><br />

                    <div class="md-form form-group">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="email" id="form93" class="form-control validate" name="nemail">
                        <label for="form93" data-error="wrong" data-success="right">Email</label>
                    </div>

                    <div class="md-form form-group">
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </div>

                </form>


              </div>
            <!--/.Panel 1-->
            <!--Panel 2-->
            <div class="tab-pane fade in" id="panel42" role="tabpanel">
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
            </div>
            <!--/.Panel 2-->
            <!--Panel 3-->
            <div class="tab-pane fade in" id="panel43" role="tabpanel">
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
            </div>
            <!--/.Panel 3-->
        </div>
    </div>
</div>
</div>


<?php include("parts/footer.php"); ?>



</body>
</html>
