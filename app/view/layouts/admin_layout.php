<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT;?>/app/public/assets/admin/css/main.css">
  
       <?php require_once  __DIR_ROOT.'/app/library/admin/admin.library.php'?>
</head>

<body>
    <?php
     
   $this->render('blocks/admin/header');
   $this->render('blocks/admin/aside');
   $this->render($content,$sub_content);

    ?>

   

</body>

</html>