<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pl, en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/slidingText.js"></script>
</head>
<body>
    <nav class="navbar">
        <ul class="nav-ul">
            <li class="nav-li">
                <a href="index.php" class="nav-link">
                    <span>Strona główna</span>
                </a>
            </li>

            <?php
                if(isset($_SESSION["useruid"])) {
                    echo "<li class=\"nav-li\"><a href='panel.php' class=\"nav-link\"><span>Panel</span></a></li>";
                    echo "<li class=\"nav-li\"><a href='includes/logout.inc.php' class=\"nav-link\"><span>Log out</span></a></li>";
                }
                else {
                    echo "<li class=\"nav-li\"><a href='login.php' class=\"nav-link\"><span>Login</span></a></li>";
                }
            ?>
        </ul>
    </nav>