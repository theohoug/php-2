<?php function get_server_url()
{
    echo $_SERVER['PHP_SELF'];
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple formulaire</title>

</head>

<body>

    <form action="<?php get_server_url() ?>" method="post">
        <label for="name">Nom : </label>
        <input type="text" id="name" name="name" />
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
        
        <input type="radio" id="gender"
     name="gender" value="gender" checked>
    <label for="Male">Male</label>

    <input type="radio" id="gender"
     name="gender" value="gender" checked>
    <label for="Female">Female</label>

    <input type="radio" id="gender"
     name="gender" value="gender" checked>
    <label for="Other">Other</label>
    </form>

    <?php
    
    $nameErr = $emailErr = $genderErr = "";
    $name = $email = $gender = $comment = "";

    function test_input($data)

    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        $websiteErr = "Invalid URL";
        $genderErr = "Gender is required";

        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];

        if (empty($name)) : ?>
            <p>Name is empty</p>
        <?php else : ?>
            <p><?php echo $name; ?></p>
            <span> <?php echo $nameErr; ?></span>
        <?php endif; ?>
        <?php if (empty($email)) : ?>
            <p>Email is empty</p>
        <?php else : ?>
            <p>Adresse mail : <?php echo $email; ?></p>
        <?php endif; ?>
    <?php } ?>


</body>

</html>