<?php
  namespace App\Controllers;
  use Core\Router;
  use Core\Controller;
  use Core\SiteWidgets;
  use App\Models\Songs;
  use App\Models\Genrers;
  class HomeController extends Controller {

    public function indexAction() {
      $songsModel = new Songs();
      $new = $songsModel->findFirst();
      $widgets = new SiteWidgets();
      $this->view->widgets = $widgets->getWidgets();
      $trending = $songsModel->trendingMusic(10,100);
      $this->view->songs = $songsModel->find();
      $this->view->render('index');
    }
    public function uploadsAction() {
      $songsModel = new Songs();
      $widgets = new SiteWidgets();
      $this->view->pageHeading = 'Recent Uploads';
      $this->view->widgets = $widgets->getWidgets('recentMusic');
      $this->view->songs = $songsModel->getSongs();
      $this->view->render('uploads');
    }
    public function trendingAction() {
      $songsModel = new Songs();
      $widgets = new SiteWidgets();
      $this->view->pageHeading = 'Trending Music';
      $this->view->widgets = $widgets->getWidgets('trendingMusic');
      $this->view->songs = $songsModel->trendingMusic(10,100);
      $this->view->render('trending');
    }
    public function genrersAction($id) {
      $widgets = new SiteWidgets();
      $genreModel = new Genrers($id);
      $songsModel = new Songs();
      $getGenreName = $genreModel->genreName($id);
      $this->view->pageHeading = 'Genre: <span class="span">'.$getGenreName.'</span>';
      $this->view->widgets = $widgets->getWidgets();
      $this->view->songs = $songsModel->getGenrers($id,50);
      $this->view->render('genrers');
    }
    public function viewAction($id) {
      $songsModel = new Songs();
      $widgets = new SiteWidgets();
      if ($song =  $songsModel->getSong($id)) {
        if ($results = $songsModel->findByArtist($song->artist,10,$song->id)) {
          $otherSongs = $results;
        }else{
          $otherSongs = $songsModel->findByGenrer($song->genrer,10,$song->id);
        }
      }else{
         
      }

      $this->view->otherSongs = $otherSongs;
      $this->view->widgets = $widgets->getWidgets();
      $this->view->songs = $song;
      $this->view->render('view');
    }

  }
