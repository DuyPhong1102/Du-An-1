<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= _WEB_ROOT . '/app/public/assets/admin/images/' .$_SESSION["admin"]["image"];?>" width="50px"
        alt="User Image">

      <div>
        <p style="margin:10px 0;"class="app-sidebar__user-name"><b>
            <?php echo $_SESSION["admin"]["username"];?>
        </b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>