<?php
namespace App\Models;
use Core\Model;
use Core\Validators\RequiredValidator;

class Genrers extends Model {
  public $name, $title, $position,$item_limit,$deleted=0;
  protected static $_table = 'genrers';

  public static function getGenrers($limit=5) {
    return self::find(['limit' => $limit, 'order' => 'id DESC']);
  } 
  
  public function genreName($id){
    $result = self::findFirst(['conditions'=>'id = ?','columns'=>'name','bind'=>[$id]]);
    if ($result) {
      return $result->name;
    }
  }

}


