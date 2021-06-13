<?php
  namespace App\Controllers;
  use Core\Controller;
  use App\Models\Songs;
  use App\Models\Users;
  use Core\Router;
  use Core\SiteWidgets;
  class VideosController extends Controller {

    public function indexAction() {
      $widgets = new SiteWidgets();
      $this->view->widgets = $widgets->getWidgets();
      $this->view->render('index');
    }

  }
