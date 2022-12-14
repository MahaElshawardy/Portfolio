<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Error 404</title>
  <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

</head>
<style>
  body {
    background-color: #111111;
  }

  .board {
    position: absolute;
    top: 50%;
    left: 50%;
    height: 150px;
    width: 500px;
    margin: -75px 0 0 -250px;
    padding: 20px;
    font: 75px/75px Monoton, cursive;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 0 0 80px red, 0 0 30px FireBrick, 0 0 6px DarkRed;
    color: red;
  }

  #error {
    color: #fff;
    text-shadow: 0 0 80px #ffffff, 0 0 30px #008000, 0 0 6px #0000ff;
  }
</style>
<body>
<!-- partial:index.partial.html -->
<div class="board">
  <p id="error">
    error
  </p>
  <p id="code">
    404
  </p>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../../js/main404.js"></script>

</body>
</html>
