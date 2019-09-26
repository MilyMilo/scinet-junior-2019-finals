<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found</title>
</head>

<body>
    <h1>Not Found</h1>
    <p>The requested URL was not found on this server.</p>
    <hr>
    <h4>Web Server at Rath Internal Server
    <?php
        if(isset($_COOKIE['logged_in'])){
            if ($_COOKIE['logged_in'] == '6128401hearthcliff'){
                echo " Congratulations, now you can try to access system - timer is going... scinet{l057_MeM0R1E5}";
            }
        }
    ?>
    </h4>
</body>

</html>