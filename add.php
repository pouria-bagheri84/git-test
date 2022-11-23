<?php

    include "config/db_connect.php";

    $email = $title = $ingredients = '';

    $errors = array("email" => "" , "title" => "" , "ingredients" => "");

    if (isset($_POST['submit'])){

        //        Email Validation
        if (empty($_POST['email'])){
            $errors["email"] = "Email Required";
            echo "<br>";
        }else{
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors["email"] = "Email is not valid";
                echo "<br>";
            }
        }

        //        Title Validation
        if (empty($_POST['title'])){
            $errors["title"] = "Title Required";
            echo "<br>";
        }else{
            $title = $_POST['title'];
            if (!preg_match('/^[a-zA-Z\s]+$/' , $title)){
                $errors["title"] = "Title must be letters and spaces";
                echo "<br>";
            }
        }

        //        Ingredients Validation
        if (empty($_POST['ingredients'])){
            $errors["ingredients"] = "Ingredients Required";
            echo "<br>";
        }else{
            $ingredients = $_POST['ingredients'];
            if (!preg_match('/^[a-zA-Z\s]+(,\s?[a-zA-Z\s]*)*$/', $ingredients)){
                $errors["ingredients"] = "Ingredients should separated by comma or spaces";
                echo "<br>";
            }
        }

        if (!array_filter($errors)){
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES ('$title', '$email', '$ingredients')";

            if (mysqli_query($conn, $sql)){
                header('Location: index.php');
            }else{
                echo "Query Error " . mysqli_error($conn);
            }

        }

    }

?>
<!doctype html>
<html lang="en">
    <?php include "templates/header.php"?>

    <section class="container grey-text">
        <h4 class="center">Add Pizza</h4>
        <form class="white" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label>Your Email:</label>
            <input type="text" name="email" autocomplete="off" value="<?php echo htmlspecialchars($email); ?>">
            <div class="red-text">
                <?php echo $errors["email"] ?>
            </div>
            <lable>Pizza Title:</lable>
            <input type="text" name="title" autocomplete="off" value="<?php echo htmlspecialchars($title); ?>">
            <div class="red-text">
                <?php echo $errors["title"] ?>
            </div>
            <lable>Ingredients (comma separated):</lable>
            <input type="text" name="ingredients" autocomplete="off" value="<?php echo htmlspecialchars($ingredients); ?>">
            <div class="red-text">
                <?php echo $errors["ingredients"] ?>
            </div>
            <div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include "templates/footer.php"?>
</html>
