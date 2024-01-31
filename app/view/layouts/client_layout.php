<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/style.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/grid.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/header.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/main.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/footer.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/home.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/account.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/detail.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/category.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/css/glider.css">


    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/app/library/node_modules/toastify-js/src/toastify.css">
    <script defer type="text/javascript" src="<?php echo _WEB_ROOT; ?>/app/library/node_modules/toastify-js/src/toastify.js"></script>
    <script defer type="module" src="<?php echo _WEB_ROOT; ?>/app/public/assets/clients/js/Notification.js"></script>
    <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script defer src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <link rel="stylesheet" href="view/assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="view/assets/css/style.css">
</head>

<body>
    <?php
    $this->render('blocks/header');
    $this->render($content, $sub_content);
    $this->render('blocks/footer');
    ?>




</body>


</html>