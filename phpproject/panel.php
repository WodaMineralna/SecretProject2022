<?php 
    include_once 'header.php';
    ?>


    <?php
        if($_SESSION["loggedin"] !== true) {
            header("location: login.php");
            exit();
        } 
        else
        
        if($_SESSION["useruid"] === 'admin') {
            include_once 'adminpanel.php';
        }
        
    ?>
        
        <section class="main-content document-content">
            <div class="main-content file-rep">
            <h2>Pliki</h2>
                    <div class="itemsList-container">
                        <div class="itemsList-ul nav-ul">
                            <table class="files-table" border="1px solid #333" cellspacing="0">
                                <tr>
                                    <th>ID</th>
                                    <th>NAZWA [LINK]</th>
                                    <th>ROZMIAR [B]</th>
                                    <th>ŚCIEŻKA</th>
                                    <th>EXT</th>
                                    <th>OPIS</th">

                                    <?php
                                        if($_SESSION["useruid"] === 'admin') {
                                            echo "<th>USUŃ</th>";
                                        }
                                    ?>
                                </tr>
                            <?php
                                include_once 'includes/dbh.inc.php';

                                if($_SESSION["useruid"] === 'admin') {
                                    if(isset($_GET['filesId'])) {
                                        $ID = $_GET['filesId'];
    
                                        $delete = mysqli_query($conn, "DELETE FROM filesinfo WHERE filesId = '$ID';");
                                    }
    
                                    if(isset($_GET['filesDest'])) {
                                        $dest = $_GET['filesDest'];
    
                                        unlink($dest);
                                    }
                                }

                                $sql = "SELECT * FROM filesinfo;";
                                $result = mysqli_query($conn, $sql);
                                
                                $num = mysqli_num_rows($result);
                                    if($num > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "
                                                <tr>
                                                    <td>" . $row['filesId'] . "</td>
                                                    <td>" . "<a href='" . $row['filesDest'] . "' download>" . $row['filesName'] . "</a>" . "</td>
                                                    <td>" . $row['filesSize'] . "</td>
                                                    <td>" . $row['filesDest'] . "</td>
                                                    <td>" . $row['filesExt'] . "</td>
                                                    <td>" . $row['filesDesc'] . "</td>
                                            ";

                                            if($_SESSION["useruid"] === 'admin') {
                                                echo "<td>" . "<a href='panel.php?filesId=" . $row['filesId'] . "&filesDest=" . $row['filesDest'] . "'  class=\"file-del\">" . "USUŃ" . "</a>" . "</td>";
                                            }

                                            echo "</tr>";
                                        }
                                    }
                            ?>
                            </table>
                        </div>
            </div>
            <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data" class="form-file-input">
                <input type="file" name="file">
                <input type="text" name="description" placeholder="Podaj krótki opis pliku..." maxlength="32">
                <button type="submit" name="submit">ZAŁĄCZ</button>
            </form>

            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "filetoobig") {
                        echo "<p class=\"error-message\">Plik jest za duży!</p>";
                    }
                    else if($_GET["error"] == "fileerror") {
                        echo "<p class=\"error-message\">Błąd pliku, spróbuj ponownie!</p>";
                    }
                    else if(($_GET["error"] == "extnotallowed")){
                        echo "<p class=\"error-message\">Niedozwolone rozszerzenie pliku!</p>";
                    }
        }
    ?>
        </section>

<?php
    include_once 'footer.php';
    ?>