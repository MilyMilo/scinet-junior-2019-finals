<!DOCTYPE html>
<html>
<head>
    <title>Starwars</title>
    <link href="static/css/roboto.css" rel="stylesheet">
    <link href="static/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="ascii.js"></script>
    <script src="starwars.js"></script>
    <link rel="stylesheet" href="starwars/css/starwars.css">
  </head>
<body>

    <div class="container">
        <h1 class="centered">STAR WARS<small> A NEW HOPE</small></h1>
        <hr/>
        <div class="screen" id="screen"></div>
        <h3 class="centered">NOW IN 2D</h3>
        <h1 class="centered">COME TO THE DARK SIDE</h1>
        <form action="#" method="post">
            <p class="centered">Login: <input type="text" name="login" id="login" style="color:black !important"></p>
            <p class="centered">Password: <input type="password" name="password" id="password"></p>
            <p class="centered"><button type="submit"><i class="swg swg-darthvader swg-4x"></i></button></p>
        </form>

   <?php
        if(isset($_POST['login'])){
        $p = $_POST;
        if($p['login'] === "Vader" && $p['password'] === "darkside344") {
            echo '<p class="centered">Power! Unlimited power!</p>';
            echo '<form action="upload.php" method="post" enctype="multipart/form-data">
            <p class="centered">Select Holocron to upload:</p>
            <p class="centered"><input type="file" name="holocron" id="holocron"></p>
            <p class="centered"><input type="submit" value="Upload" name="submit"></p>
            </form>
            ';
        }
        else{
          echo '<p class="centered">Wrong</p>';
        }
       
    }
   ?>
       </div>

       <script type="text/javascript">
        if(film) {
          window.onload = function() { Play(); };
        } else {
          film = new Array(); //empty film to prevent js errors
        }
        
        document.addEventListener('contextmenu', event => event.preventDefault());
        var audio = new Audio('theme.mp3');
        audio.play();
    </script>
</body>
</html>