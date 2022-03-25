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

        if($_SESSION["useruid"] === 'admin') {
            include_once 'adminpanel.php';
        }
    ?>
        
        <section class="main-content document-content">
            <div class="main-content users-list">
                <h2>Użytkownicy</h2>
                    <div class="itemsList-container">
                        <ul class="itemsList-ul nav-ul">
                            <?php
                                include_once 'includes/dbh.inc.php';

                                if(isset($_GET['usersId'])) {
                                    $ID = $_GET['usersId'];

                                    if($ID != '6') {
                                        $delete = mysqli_query($conn, "DELETE FROM users WHERE usersId = '$ID';");
                                    } 
                                }

                                $sql = "SELECT * FROM users;";
                                $result = mysqli_query($conn, $sql);
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                        if($row['usersUid'] !== 'admin') {
                                            echo "<li class=\"itemsList-li\">" . "<mark class=\"userID\">" . $row['usersId'] . "</mark>" . "<span class=\"underlined\">" . $row['usersUid'] . "</span>" . "<a href='userslist.php?usersId= ".$row['usersId']." ' class=\"itemList-btn delete-btn\">" . 'USUŃ' . "</a>" . "</li>";
                                        } else {
                                            echo "<li class=\"itemsList-li\">" . "<mark class=\"userID\">" . $row['usersId'] . "</mark>" . "<span class=\"underlined\">" . $row['usersUid'] . "</span>" . "<b class=\"itemList-btn\">" . 'ADMIN' . "</b>" . "</li>";
                                        }
                                    }
                            ?>
                        </ul>
                    </div>
            </div>
        </section>

<?php
    include_once 'footer.php';
    ?>