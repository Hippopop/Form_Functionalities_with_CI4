<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form with CI</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/Source/CSS/User_Form.css">
</head>

<body>
    <div class="form_body">
        <div class="image">
            hellow
            <!-- <img src="<?= base_url(); ?>/Assets/Images/form_image.jpg" alt="Form Image"> -->
        </div>
        <div class="form">
            <?= form_open_multipart(); ?>

            <div class="form_field">
                <label for="name"> Enter Name: </label>
                <input type="text" name="name" id="name" placeholder="Your Name" value="<?= set_value('name'); ?>">
                <br>
                <span><?= e_check($e ?? null, "name"); ?></span>
                <br>
            </div>
            <div class="vspace"></div>
            <div class="form_field">
                <label for="mail"> Enter Email: </label>
                <input type="text" name="mail" id="mail" placeholder="Your email" value="<?= set_value('mail'); ?>">
                <br>
                <span><?= e_check($e ?? null, "mail"); ?></span>
                <br>
            </div>
            <div class="vspace"></div>
            <div class="form_field">
                <label for="number"> Enter Phone: </label>
                <input type="text" name="number" id="number" placeholder="Your number" value="<?= set_value('number'); ?>">
                <br>
                <span><?= e_check($e ?? null, "number"); ?></span>
                <br>
            </div>
            <div class="vspace"></div>
            <div class="form_field">
                <label for="image"> Enter Image: </label>
                <input type="file" name="image" id="image" placeholder="Your Picture" accept="image/*" value="<?= $backup ?? null ?>">
                <br>
                <span><?= e_check($e ?? null, "image"); ?></span>
                <br>
            </div>
            <div class="vspace"></div>
            <input type="submit" value="SUBMIT">

            <?= form_close(); ?>
        </div>
    </div>
</body>

</html>