<?php
use Core\Session;
use Core\FH;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=$this->siteTitle(); ?></title>
    <link rel="stylesheet" href="<?=PROOT?>css/bootstrap4/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css?v=<?=VERSION?>" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/alertMsg.min.css?v=<?=VERSION?>" media="screen" title="no title" charset="utf-8">

    <?= $this->content('head'); ?>

  </head>
  <body>
    <?php include 'main_menu.php' ?>
    <div class="wrapper" style="min-height: calc(100vh - 72px);">
      <div id="holder">
          <span id="close" class="close" name="close" title="close">X</span>
          <img id="holder-img" src="<?=PROOT?>content/covers/156230521410.jpg" alt="">
          <div class="holder-inner">
             <ul>
                <li>Title: <span id="title">Finally</span></li>
                <li>Artist: <span id="artist">Dj Poul G</span></li>
                <li>Genre: <span id="genre">Kalindula</span></li>
                <li>Featuring: <span id="featuring">Mebmut, Kas Kay, D Beatz</span></li>
                <li>Plays: <span id="plays">200</span></li>
                <li>Likes: <span id="likes">200</span></li>
                <li>Downloads: <span id="downloads">150</span></li>
             </ul>
             <a id="download-link" href="" download>DOWNLOAD</a>
          </div>
      </div>
      <?= Session::displayMsg() ?>
      <?= $this->content('body'); ?>
    </div>
    <script src="<?=PROOT?>js/jQuery-3.3.1.min.js"></script>
    <script src="<?=PROOT?>js/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="<?=PROOT?>js/bootstrap4/bootstrap.min.js"></script>
    <script src="<?=PROOT?>js/alertMsg.min.js?v=<?=VERSION?>"></script>
    <script src="<?=PROOT?>js/custom.js"></script>
  </body>
</html>
