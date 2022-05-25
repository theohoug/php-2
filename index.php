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
        <input type="submit" />
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        if (empty($name)) : ?>
            <p>Name is empty</p>
        <?php else : ?>
            <p><?php echo $name; ?></p>
        <?php endif; ?>
        <?php if (empty($email)) : ?>
            <p>Email is empty</p>
        <?php else : ?>
            <p>Adresse mail : <?php echo $email; ?></p>
        <?php endif; ?>
    <?php } ?>
</body>

</html>