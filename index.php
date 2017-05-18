<?php
  require("Core/common.php");
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title> Trill </title>
    <link rel='stylesheet' type='text/css' href='css/index.css' />
    <link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>

  </head>
  <!-- This is my first commit -->

  <body>
      <div class="loginForm">
        <a class="trill" href="index.php"> Trill </a>
        <form action="Core/login.php" method="post" class="lform">
            <label for="uname">Username:</label></br>
            <input type="text" id="uname" name="username" autocomplete="off" placeholder="..." required/>
          </br></br>
            <label for="pword">Password:</label></br>
            <input type="password" id="pword" name="password" value="" placeholder="..." required/>
          </br></br>
            <input type="submit" id="liButton" value="Log In" />

        </form>
      </div>

    <div class="registerForm">
      <a href="index.php" ><img src="register.jpg" class="regrac" alt="Raccoon" width="400px" height="400px"></a>
      <form action="Core/register.php" method="post" class="rform">
        <h1>Sign up now</h1>
        <p>You'll love raccoons</p>
          <input type="text" name="firstname" id="firstname" placeholder="First" autocomplete="off"required/>
          <input type="text" name="lastname" placeholder="Last" autocomplete="off" required/>
        </br></br>
          <input type="text" name="username" placeholder="Username" autocomplete="off" required/>
        </br></br>
          <input type="text" name="email" placeholder="Email" autocomplete="off" required/>
        </br></br>
          <input type="password" name="password" placeholder="Password" required/>
        </br></br>
          <input type="submit" value="Register"/>
      </form>
    </div>

    <div class="footer">
      <p id="credits">Designed by <b>"the Danimal"</b></p>
      <p>Copyright (c) 2017 Copyright Holder All Rights Reserved.</p>
    </div>
  </body>
</html>
