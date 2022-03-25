<?php 
    include_once 'header.php';
    ?>

    <?php
        if(isset($_SESSION["loggedin"])) {
            header("location: panel.php");
            exit();
        } 
    ?>

        <section class="main-content form-content">
            <h2 class="form-header">Zaloguj się</h2>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="login" class="form-input" placeholder="Login">
                <input type="password" name="password" class="form-input" placeholder="Hasło">
                <button type="submit" name="submit">Zaloguj</button>
            </form>
            
    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p class=\"error-message\">Uzupełnij wszystkie pola!</p>";
            }
            else if($_GET["error"] == "wronglogin") {
                echo "<p class=\"error-message\">Zły login lub hasło!</p>";
            }
        }
    ?>
        </section>

<?php
    include_once 'footer.php';
    ?>