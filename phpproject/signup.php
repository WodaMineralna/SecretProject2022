<?php 
    include_once 'header.php';
    ?>

<?php
        if($_SESSION["loggedin"] !== true) {
            header("location: login.php");
            exit();
        }

        if($_SESSION["useruid"] !== 'admin') {
            header("location: panel.php");
            exit();
        }

        else if($_SESSION["useruid"] === 'admin') {
            include_once 'adminpanel.php';
        }
    ?>

        <section class="main-content form-content">
            <h2 class="form-header">Dodaj użytkownika</h2>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="login" class="form-input" placeholder="Nazwa użytkownika...">
                <input type="password" name="password" class="form-input" placeholder="Hasło...">
                <input type="password" name="passwordrepeat" class="form-input" placeholder="Powtórz hasło...">
                <button type="submit" name="submit">Dodaj</button>
            </form>
    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p class=\"error-message\">Uzupełnij wszystkie pola!</p>";
            }
            else if($_GET["error"] == "invalidLogin") {
                echo "<p class=\"error-message\">Zła nazwa użytkownika!</p>";
            }
            else if(($_GET["error"] == "pwdunmatch")){
                echo "<p class=\"error-message\">Hasła się nie zgadzają!</p>";
            }
            else if($_GET["error"] == "usernametaken") {
                echo "<p class=\"error-message\">Nazwa użytkownika zajęta!</p>";
            }
            else if($_GET["error"] == "stmterror") {
                echo "<p class=\"error-message\">Nieznany błąd. Spróbuj ponownie!</p>";
            }
            else if($_GET["error"] == "none") {
                echo "<p class=\"error-message error-none\">Dodano użytkownika!</p>";
            }
        }
    ?>
        </section>


<?php
    include_once 'footer.php';
    ?>