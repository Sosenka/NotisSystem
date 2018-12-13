<?php require_once("methods/config.php"); ?>
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
                <a class="nav-link" href="http://forum.elantis.pl"><i class="fa fa-user"></i> <span class="hidden-sm-down">Elantis.pl</span></a>
            </li>

            <?php
            if($_SESSION['loged']) {
              echo "<li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          Zalogowany jako ".$_SESSION['nick']."
                      </a>
                      <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownMenuLink'>
                          <a class='dropdown-item' href='ustawienia.php' style='color: black;'>Ustawienia</a>
                          <a class='dropdown-item' href='admin.php' style='color: black;'>Panel</a>
                          <a class='dropdown-item' href='methods/wyloguj.php' style='color: black;'>Wyloguj</a>
                      </div>
                  </li>";
            } else {
              echo "<li class='nav-item'>
                  <a class='nav-link' data-toggle='modal' data-target='#modal-login'>
                    Panel
                  </a>
              </li>";

            }


             ?>
        </ul>
    </nav>
    <header></header>

    <nav class="navbar navbar-dark unique-color">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Strona Główna</a></li>
        </ol>
    </nav><br />

    <div class="row container_after">
        <div class="col-md-6 text-center">
            <br />
            <h3>Administracja online</h3>
            <hr width="60%">
            <div class="text-left">
              <?php
              $zapytanie4 = "SELECT uzytkownicy.nick, uprawnienia.prefix FROM `uzytkownicy` JOIN `uprawnienia` ON uzytkownicy.id_uprawnien = uprawnienia.id_uprawnienia WHERE `zalogowany` = '1'";
              $zap4=mysql_query($zapytanie4);
              while($u=mysql_fetch_row($zap4))
              {
                echo "<i class='fa fa-user fa-2x'></i>"." ".$u[1].$u[0]."<br />";
              }
               ?>
            </div>
        </div>
        <hr>
        <div class="col-md-6 text-center">
            <br />
            <h3>Potrzebujesz pomocy?</h3>
            <hr width="60%">
            <p class="text-left">Masz problem z kontem? Potrzebujesz pomocy przy odblokowaniu postaci lub może chciałbyś zgłosić wulgarnego gracza ? To wszystko możesz zrobić na tej stronie ! W tym miejscu możesz zgłosić wszelkie wątpliwości co do konta w grze, płatności
                czy problemów technicznych. Lista najczęstszych problemów związanych z naszymi usługami na które otrzymasz pomoc: </p>
            <div class="row">
                <div class="col-md-6 text-left">
                    <i class="fa fa-check green-text" aria-hidden="true"></i>Problem z włączeniem klienta<br />
                    <i class="fa fa-check green-text" aria-hidden="true"></i>Wyrzucanie z serwera<br />
                    <i class="fa fa-check green-text" aria-hidden="true"></i>Blokady kont<br />
                </div>
                <div class="col-md-6 text-left">
                    <i class="fa fa-check green-text" aria-hidden="true"></i>Problemy z SMS<br />
                    <i class="fa fa-check green-text" aria-hidden="true"></i>Kody zwrotne<br /><br />
                    <a class="btn btn-default" href="#dodaj"><i class="fa fa-plus left"></i> Dodaj zgłoszenie</a>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <br /><br /><br />
            <h3>Centrum pomocy obejmuje</h3><br />
            <hr width="60%" />
            <section class="section feature-box">
                </br />
                <div class="row features-big">

                    <div class="col-md-3 mb-r">
                        <i class="fa fa-gamepad blue-text fa-5x rty"></i><br /><br />
                        <h4 class="feature-title">Gra</h4>
                        <!--
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                    -->
                    </div>

                    <div class="col-md-3 mb-r">
                        <i class="fa fa-book green-text fa-5x rty"></i><br /><br />
                        <h4 class="feature-title">Strona</h4>
                        <!--
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                    -->
                    </div>

                    <div class="col-md-3 mb-r">
                        <i class="fa fa-money red-text fa-5x rty"></i><br /><br />
                        <h4 class="feature-title">Płatności</h4>
                        <!--
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                  -->
                    </div>

                    <div class="col-md-3 mb-r">
                        <i class="fa fa-newspaper-o purple-text fa-5x rty"></i><br /><br />
                        <h4 class="feature-title">Forum</h4>
                        <!--
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                    -->
                    </div>
                </div>
            </section>
            <div class="row" id="dodaj"><br />
                <div class="col-md-12 text-center">
                    <h3 class="text-center">Dodaj zgłoszenie</h3>
                    <hr width="60%"><br />
                </div>
            </div>

      <div class="row">
          <div class="col-md-6 text-center">
          <form action="index.php" method="post">
          <div class="md-form">
            <input type="text" id="form9" name="temat" class="form-control validate">
            <label for="form9" data-error="wrong" data-success="right">Temat<span style="color: red;">*</span></label>
          </div>
          <div class="md-form">
            <input type="text" id="form11" name="nick" class="form-control validate">
            <label for="form11" data-error="wrong" data-success="right">Twój nick w grze<span style="color: red;">*</span></label>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <div class="md-form">
            <input type="text" id="form12" name="login" class="form-control validate">
            <label for="form12" data-error="wrong" data-success="right">Login konta</label>
          </div>
          <div class="md-form">
            <input type="email" id="form12" name="email" class="form-control validate">
            <label for="form12" data-error="wrong" data-success="right">Email<span style="color: red;">*</span></label>
          </div>
        </div>
        </div>

    <select class="mdb-select colorful-select dropdown-primary" name="lista">
    <option  disabled selected style="line-height: 40px;">Wybierz powód</option>
    <optgroup label="Gra">
      <option value="Błąd w grze">Błąd w grze</option>
      <option value="Problem z misjami">Problem z misjami</option>
      <option value="Utracone przedmioty">Utracone przedmioty</option>
      <option value="Zgłoszenie gracza">Zgłoszenie gracza</option>
    </optgroup>
      <optgroup label="Zarządzanie kontem">
        <option value="Zablokowane konto">Zablokowane konto</option>
        <option value="Błąd związany z kontem">Błąd związany z kontem</option>
    </optgroup>
      <optgroup label="Płatności">
      <option value="Promblem z przelewem">Promblem z przelewem</option>
      <option value="Problem z SMS">Problem z SMS</option>
      <option value="Problem z Paypal">Problem z Paypal</option>
      <option value="Problem z PSC">Problem z PSC</option>
      <option value="Nie otrzymałem SM">Nie otrzymałem SM</option>
    </optgroup>
    <optgroup label="ItemShop">
      <option value="Nie otrzymałem przedmiotu">Nie otrzymałem przedmiotu</option>
      <option value="Błąd w itemshopie">Błąd w itemshopie</option>
    </optgroup>
    <optgroup label="Strona/Forum">
      <option value="Błąd na stronie">Błąd na stronie</option>
      <option value="Błąd na forum">Błąd na forum</option>
      <option value="Pytanie odnośnie strony">Pytanie odnośnie strony</option>
      <option value="Pytanie odnośnie forum">Pytanie odnośnie forum</option>
      <option value="Błąd z pobieraniem">Błąd z pobieraniem</option>
    </optgroup>
    <optgroup label="Inne">
      <option value="Uwagi i opinie">Uwagi i opinie</option>
      <option value="Propozycje">Propozycje</option>
      <option value="Chęć współpracy">Chęć współpracy</option>
    </optgroup>

</select><br /><br />
        <textarea name="editor1" id="editor1" rows="15" cols="120">
          Treść.
        </textarea>
        <script type="text/javascript">
            CKEDITOR.replace('editor1');
        </script>
<br />
<button type="submit" class="btn btn-primary">Wyślij zgłoszenie</button>
    </form>
            </div>
        </div>

    </div>
<?php include("parts/footer.php"); ?>

    <div class="modal fade modal-ext" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center light-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="w-100 text-center"><i class="fa fa-user text-center"></i> Logowanie</h3>
            </div>
            <!--Body-->
            <div class="modal-body">
              <form method="POST" action="methods/login.php">
                <div class="md-form">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="text" id="form2" name="login" class="form-control">
                    <label for="form2">Login</label>
                </div>

                <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="form3" name="haslo" class="form-control">
                    <label for="form3">Hasło</label>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-lg" value="Zaloguj" />
                </div>
              </form>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <div class="options text-left">
                    <p>Zapomniałeś <a href="#">Hasła?</a></p>
                </div>
                <button type="button" class="btn btn-default ml-auto" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<?php
if(!empty($_POST))
{
   if ( (trim($_POST['temat']) == "") || (trim($_POST['nick']) == "") || (trim($_POST['email']) == "") || (trim($_POST['lista']) == "") || (trim($_POST['editor1']) == ""))
    {
        echo "<p>ERROR: All fields must be completed</p>";
        echo "<p><a href='form.php'>Return to Form</a></p>";
    }
    else
    {
      $id = rand(1, 2147483647);
      $dzisiaj = date('Y-m-d H:i:s');
      $f1 = $_POST['temat'];
      $f2 = $_POST['nick'];
      $f3 = $_POST['login'];
      $f4 = $_POST['email'];
      $f5 = $_POST['lista'];
      $f6 = '<span class="badge green">Oczekuje</span>';
      $f7 = $_POST['editor1'];
      $ip = $_SERVER['HTTP_X_REAL_IP'];
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      $zapytanie_ticket="INSERT INTO `zgloszenia`(`id_zgloszenia`, `temat`, `nazwa postaci`, `login`, `email`, `powod`, `status`, `tresc`, `data`, `ip`) VALUES ('$id', '$f1', '$f2', '$f3','$f4', '$f5', '$f6', '$f7', '$dzisiaj', '$ip')";
      $zap_ticket=mysql_query($zapytanie_ticket);
      $mail_tresc = "<html><head></head><body>Twoje zgłoszenie zostało wysłane do administracji elantis.pl, informacja o przyjęciu <br />
      podania zostanie wysłana do Ciebie w ciągu 12 godzin, już teraz możesz sprawdzić swoje zgłoszenie <a href='http://support.elantis.pl'>Status</a><br /><br />
      Kod twojego zgłoszenia: ".$id."<br /><br /> Gdy pojawi się odpowiedz od administracji, zostanie wysłana do Ciebię wiadomość informacyjna<br />
      Administrcja, elantis.pl</body></html>";
      mail($f4, 'Twoje zgłoszenie support.elantis.pl', $mail_tresc, $headers);


}
}


 ?>





</body>

</html>
