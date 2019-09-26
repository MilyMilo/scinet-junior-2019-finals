<?php
    if(isset($_POST['id']) && isset($_POST['pass'])){
        $id = preg_replace("/[^A-Za-z0-9 ]/", '', $_POST['id']);
        $pass = preg_replace("/[^A-Za-z0-9 ]/", '', $_POST['pass']);

        if($id == '54178912alice' && $pass == '0935612771342swordknight'){
            setcookie('logged_in', '54178912alice', time()+(60*5), '/');
            header("Location: /3315f43c-dc9b-11e9-8a34-2a2ae2dbcce4/");
        }else if($id == '6128401hearthcliff' && $pass == 'bLOODkNIGHT0913administrator'){
            setcookie('logged_in', '6128401hearthcliff', time()+(60*15), '/');
            header("Location: /404.php");
        }else{
            header("Location: /bad.php");
        }
    }

?>