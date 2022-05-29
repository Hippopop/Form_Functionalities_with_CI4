<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Page</title>
</head>

<body>
    <H1><?php echo $error ?? "Authentication successful!"; ?></H1>
    <?php if (isset($user_info)) : ?>
        <pre><?php print_r($user_info); ?></pre>
    <?php endif; ?>

</body>

</html>