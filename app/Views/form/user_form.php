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
    <div class="main_body">
        <div class="form_body">
            <div class="image">
            </div>
            <div class="form">
                <?= form_open_multipart(); ?>

                <div class="form_field">
                    <label for="name"> Enter Name: </label>
                    <input type="text" name="name" id="name" placeholder="Your Name" value="<?= set_value('name'); ?>">
                    <?php if(isset($e)): ?>
                    <br>
                    <span><?= e_check($e ?? null, "name"); ?></span>
                    <br>
                    <?php endif;?>
                </div>
                <div class="vspace"></div>
                <div class="form_field">
                    <label for="mail"> Enter Email: </label>
                    <input type="text" name="mail" id="mail" placeholder="Your email" value="<?= set_value('mail'); ?>">
                    <?php if(isset($e)): ?>
                    <br>
                    <span><?= e_check($e ?? null, "mail"); ?></span>
                    <br>
                    <?php endif;?>
                </div>
                <div class="vspace"></div>
                <div class="form_field">
                    <label for="number"> Enter Phone: </label>
                    <input type="text" name="number" id="number" placeholder="Your number" value="<?= set_value('number'); ?>">
                    <?php if(isset($e)): ?>
                    <br>
                    <span><?= e_check($e ?? null, "number"); ?></span>
                    <br>
                    <?php endif;?>
                </div>
                <div class="vspace"></div>
                <div class="form_field">
                    <label for="image"> Enter Image: </label>
                    <input type="file" name="image" id="image" placeholder="Your Picture" accept="image/*" value="<?= $backup ?? null ?>">
                    <?php if(isset($e)): ?>
                    <br>
                    <span><?= e_check($e ?? null, "image"); ?></span>
                    <br>
                    <?php endif;?>
                </div>
                <div class="vspace"></div>
                <div class="button_set">
                    <input type="submit" class="form_button" value="SUBMIT">
                    <!-- <div class="hspace"></div> -->
                    <?= form_close(); ?>
                    <?php if (isset($google)) : ?>
                        <a href="<?= $google; ?>">
                            <button type="button" class="form_button">Google</button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>