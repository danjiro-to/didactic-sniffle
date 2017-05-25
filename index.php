<?php
  require("Core/common.php");
 ?>

<!--  Connection to db -->

<html>
  <head>
      <meta charset="utf-8">
      <title> Trill </title>
      <link rel='stylesheet' type='text/css' href='css/index.css' />
      <link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
  </head>

  <body>
    <div class="wrapper">

        <div class="header">
          <a class="trill" href="index.php"> Trill </a>
          <div class="loginForm">
            <form action="Core/login.php" method="post" class="lform">
                <label for="uname">Username:</label></br>
                <input id="uname" type="text" name="username" autocomplete="off" placeholder="..." required/>
              </br></br>
                <label for="pword">Password:</label></br>
                <input id="pword" type="password" name="password" value="" placeholder="..." required/>
              </br></br>
                <input id="libutton" type="submit" value="Log In" />
            </form>
          </div>
          <a href="index.php"><img src="raccoon.jpg" class="racface" alt="Raccoon Face" width="200px" height="200px"></a>
        </div>


        <div class="main">
          <iframe class="racbeer" width="560" height="315" src="https://www.youtube.com/embed/7ZNpSra5icw" frameborder="0" allowfullscreen></iframe>
          <!-- <a href="index.php" ><img src="register.jpg" class="racbeer" alt="Raccoon Beer" width="400px" height="400px"></a> -->
          <div class="registerForm">
            <form action="Core/register.php" method="post" class="rform">
              <h1>Sign up now</h1>
              <p>You'll love raccoons</p>
                <input type="text" name="firstname" id="firstname" placeholder="First" autocomplete="off"required/>
                <input type="text" name="lastname" id="lastname" placeholder="Last" autocomplete="off" required/>
              </br></br>
                <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required/>
              </br></br>
                <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required/>
              </br></br>
                <input type="password" name="password" id="password" placeholder="Password" required/>
              </br></br>
                <input type="submit" value="Register"/>
            </form>
          </div>
        </div>

        <div class="footer">
            <a href="https://github.com/gem3141/Trill" > Copyright (c) 2017 Copyright Holder All Rights Reserved. </a>
        </div>

    </div>
  </body>
</html>
