<?php

    session_start();

//    unset($_SESSION['name']);

    $name = isset($_SESSION['name'])? ($_SESSION['name'] == "")? "Guest" : $_SESSION['name'] : "Guest";

    $gender = isset($_COOKIE['gender'])? ($_COOKIE['gender'] == "")? "Unknown" : $_COOKIE['gender'] : "Unknown";

?>
<head>
     <meta charset="UTF-8">
     <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <style>
         .brand{
             background-color: #cbb09c !important;
         }
         .brand-text{
             color: #cbb09c !important;
         }
         form{
             max-width: 500px;
             margin: 20px auto;
             padding: 20px;
         }
         .pizza{
             width: 100px;
             margin: 40px auto -30px;
             display: block;
             position: relative;
             top: -30px;
         }
     </style>
</head>
 <body class="grey lighten-4">

     <nav class="white z-depth-0">
         <div class="container">
             <a href="index.php" class="brand-logo brand-text">Pizza Delivery</a>
             <ul id="nav-mobile" class="right hide-on-small-and-down">
                 <li class="grey-text">Wellcome <?php echo htmlspecialchars($name);?> </li>
                 <li class="grey-text"> (<?php echo htmlspecialchars($gender);?>)</li>
                 <li><a href="login.php" class="btn z-depth-0">Login</a></li>
                 <li><a href="add.php" class="btn brand z-depth-0">Add Pizza</a></li>
             </ul>
         </div>
     </nav>