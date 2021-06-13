<?php
  namespace App\Controllers;
  use Core\Controller;
  use App\Models\Songs;
  use App\Models\Users;
  use Core\Router;
  class AdminController extends Controller {

    public function indexAction() {
      $songsModel = new Songs();
      $new = $songsModel->findFirst();
      $recent = $songsModel->find();
      $trending = $songsModel->trendingMusic(10,100);
      $this->view->render('index');
    }
    public function downloadAction($file){
      if($this->request->isPost()) {
        echo "Yes";
      }
    }
    public function uploadAction() {
      $newSong = new Songs();
      if($this->request->isPost()) {
        $this->request->csrfCheck();
        $newSong->assign($this->request->get(),Songs::blackListedFormKeys);
        $uploaded = false;
        $songName = $_FILES['title']['name'];
        $coverName = $_FILES['cover']['name'];
        $songTmpLoc = $_FILES['title']['tmp_name'];
        $coverTmpLoc = $_FILES['cover']['tmp_name'];
        $songName = preg_replace('#[^a-z.@0-9]#i',' ',$songName);
        $songExpload = explode(".",$songName);
        $coverExpload = explode(".",$coverName);
        $songExt = end($songExpload);
        $coverExt = end($coverExpload);
        $coverName = rand(10000,100).rand(10000,15).rand(10000,15).'.'.$coverExt;
        $songLocation =  ROOT.DS.'content'.DS.'music'.DS.$songName;
        $coverLocation =  ROOT.DS.'content'.DS.'covers'.DS.$coverName;
        if ($songTmpLoc) {
          if (preg_match("/\.(mp3|m4a)$/i",$songName)) {
            if (move_uploaded_file($songTmpLoc,$songLocation)) {
              $titleExpload = str_replace('.'.$songExt,' ',$songName);
              $getArtist = explode("@",$titleExpload);
              $artist = (isset($getArtist[1])) ? $getArtist[1] : "Unknown";
              $title = $getArtist[0];
              if ($coverTmpLoc) {
                if (move_uploaded_file($coverTmpLoc,$coverLocation)) {
                  $newSong->cover = PROOT.'content/covers/'.$coverName;
                }
              }
              $newSong->title = $title;
              $newSong->uploader = Users::currentUser()->id;
              $newSong->location = PROOT.'content/music/'.$songName;
              if($newSong->save()){
                Router::redirect('home/uploads');
              }
            }
          }else{
            die("File to upload must me mp3/m4a only");
          }
        }else{
          die("No Song to upload! Please chose an mp3 file");
        }

      }
      $this->view->newSong = $newSong;
      $this->view->displayErrors = $newSong->getErrorMessages();
      $this->view->render('admin/upload');
    }
    public function trendingAction() {
      $songsModel = new Songs();
      $songs = $songsModel->trendingMusic(10,100);
      $this->view->render('trending');
    }
    public function genrersAction() {
      $this->view->render('genrers');
    }
    public function chatsAction() {
      $this->view->render('chats');
    }
  }
