<?php
namespace App\Models;
use Core\Model;
use Core\Validators\RequiredValidator;

class Widgets extends Model {
  public $name, $title, $position,$item_limit,$deleted=0;
  protected static $_table = 'widgets';

}
