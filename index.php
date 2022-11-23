<?php
    include "config/db_connect.php";

    $sql = "SELECT * FROM pizzas";
    $result = mysqli_query($conn , $sql);
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);


?>

<!doctype html>
<html lang="en">

    <?php include "templates/header.php"; ?>
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">

            <?php foreach ($pizzas as $pizza){?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="images/pizza.svg" class="pizza">
                    <div class="card-content center grey lighten-2">
                        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
                       <ul>
                           <?php foreach (explode(',', $pizza['ingredients']) as $ing){?>
                           <li><?php echo htmlspecialchars($ing); ?></li>
                           <?php }?>
                       </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="detail.php?id=<?php echo $pizza['id'];?>" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>
    </div>
    <?php include "templates/footer.php"; ?>

</html>
