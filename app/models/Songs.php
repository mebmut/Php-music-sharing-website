<?php
namespace App\Models;
use Core\Model;
use Core\Validators\RequiredValidator;

class Songs extends Model {
  public $id, $title, $artist, $genrer, $featuring, $cover, $uploader,$confirm;
  public $country, $deleted = 0,$downloads = 0,$plays = 0,$likes = 0,$location;
  protected static $_table = 'songs';
  const blackListedFormKeys = ['id','deleted'];

  public function validator(){
    $this->runValidation(new RequiredValidator($this,['field'=>'title','msg'=>'Title is required.']));
    $this->runValidation(new RequiredValidator($this,['field'=>'title','msg'=>'Title is required.']));
    $this->runValidation(new RequiredValidator($this,['field'=>'artist','msg'=>'Artist is required.']));
    $this->runValidation(new RequiredValidator($this,['field'=>'genrer','msg'=>'Genrer is required.']));
    $this->runValidation(new RequiredValidator($this,['field'=>'cover','msg'=>'Cover is required.']));
  }
  public function beforeSave(){
    $this->timeStamps();
  }
  public static function findByTitle($title,$limit) {
    return self::find(['conditions'=> "title = ?",'limit' => $limit, 'bind'=>[$title]]);
  }
  public static function getSong($id) {
    return self::findById($id);
  }
  public static function getSongs($limit=10) {
    return self::find(['conditions'=> 'deleted !=?','limit' => $limit,'order' => 'id DESC', 'bind'=>[1]]);
  }
  public static function getGenrers($id,$limit=10) {
    return self::find(['conditions'=> 'genrer = ?','limit' => $limit,'order' => 'id DESC', 'bind'=>[$id]]);
  }
  public static function trendingMusic($limit,$number) {
    return self::find(['conditions'=> 'plays >=? AND downloads >=?','limit' => $limit,'order' => 'plays DESC', 'bind'=>[$number,$number]]);
  }

  public static function recentMusic($limit) {
    return self::find(['limit' => $limit,'order' => 'id ASC']);
  }
  public static function mostDownloaded($limit,$number=10) {
    return self::find(['conditions'=>' downloads >=?','limit'=> $limit, 'order'=> 'downloads DESC', 'bind'=>[$number]]);
  }
  public static function findByArtist($artist,$limit,$exclude) {
    return self::find(['conditions'=> "artist = ? AND id !=?",'limit' => $limit, 'bind'=>[$artist,$exclude]]);
  }
  public static function findByGenrer($genrer,$limit,$exclude) {
    return self::find(['conditions'=> "genrer = ? AND id !=?",'limit' => $limit, 'bind'=>[$genrer,$exclude]]);
  }
}
