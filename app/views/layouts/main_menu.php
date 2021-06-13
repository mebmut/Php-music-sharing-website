<?php
  use Core\Router;
  use Core\H;
  use App\Models\Users;
  $menu = Router::getMenu('menu_acl');
  $userMenu = Router::getMenu('user_menu');
?>
<main class="header-wrapper">
    <header class="page-header">
        <div class="logo">
          <img src="<?=PROOT?>content/white.png" alt="">
        </div>
        <nav class="page-nav">
            <ul class="menu-items">
                <?= H::buildMenuListItems($menu); ?>
            </ul>
             <ul class="user-access">
             <?= H::buildMenuListItems($userMenu,"dropdown-menu-right"); ?>
             </ul>
        </nav>
    </header>
</main>
      

