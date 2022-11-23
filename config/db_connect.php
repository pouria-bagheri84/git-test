<?php

    $conn = mysqli_connect('sample-run.ir', 'pouria', '$4t0?YbFCZYe', '*****_DB');
    if (!$conn){
        echo "Connection Error " . mysqli_connect_error();
    }