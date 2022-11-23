<?php

    if (isset($_POST['submit'])){
        setcookie('gender', $_POST['gender'], time() + 86400);


        session_start();
        $_SESSION['name'] = $_POST['name'];
        header("Location: index.php");
    }


?>
<!doctype html>
<html lang="en">
<?php include "templates/header.php"?>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label>Your name:</label>
        <input type="text" name="name" autocomplete="off">
        <select name="gender" style="display: inline-block">
            <option selected hidden disabled>Select gender</option>
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0 center-text">
    </form>

<?php include "templates/footer.php"?>
</html>
