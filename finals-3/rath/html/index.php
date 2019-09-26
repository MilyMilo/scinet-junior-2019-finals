<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="login/authorize.php" method="post">
      <img class="mb-4" src="https://vignette.wikia.nocookie.net/swordartonline/images/7/72/Rath_logo.svg/revision/latest/scale-to-width-down/250?cb=20170130002407" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">関係者以外立入禁止</h1>
      <label for="inputEmail" class="sr-only">ID番号</label>
      <input type="text" id="inputEmail" class="form-control" name="id" placeholder="ID番号" required autofocus>
      <label for="inputPassword" class="sr-only">パスワード</label>
      <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="パスワード" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> 私を覚えてますか
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block type="submit">ログインする</button>
      <p class="mt-5 mb-3 text-muted">RATH&copy; 2019-2023</p>
    </form>
  </body>
</html>
