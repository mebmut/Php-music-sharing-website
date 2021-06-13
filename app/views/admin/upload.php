<?php
use Core\FH;
?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="row align-items-center justify-content-center">
  <div class="col-md-6 bg-light p-3">
    <h3 class="text-center">Upload Song!</h3><hr>
    <form class="form" action="" method="post" enctype="multipart/form-data">
      <?= FH::csrfInput() ?>
      <div class="row">
      <?= FH::inputBlock('file','Song','title',$this->newSong->title,['class'=>'form-control input-sm cal-md-6'],['class'=>'form-group'],$this->displayErrors) ?>
      <?= FH::inputBlock('file','cover','cover',$this->newSong->cover,['class'=>'form-control input-sm cal-md-6'],['class'=>'form-group'],$this->displayErrors) ?>
      </div>
      <div class="row">
      <?= FH::inputBlock('text','Artist','artist',$this->newSong->artist,['class'=>'form-control input-sm'],['class'=>'form-group cal-md-6'],$this->displayErrors) ?>
      <?= FH::inputBlock('text','Featuring','featuring',$this->newSong->featuring,['class'=>'form-control input-sm'],['class'=>'form-group cal-md-6'],$this->displayErrors) ?>
      </div>
      
      <div class="row">
      <?= FH::inputBlock('text','Country','country',$this->newSong->title,['class'=>'form-control input-sm cal-md-6'],['class'=>'form-group'],$this->displayErrors) ?>
      <?= FH::inputBlock('text','Genrer','genrer',$this->newSong->genrer,['class'=>'form-control input-sm cal-md-6'],['class'=>'form-group'],$this->displayErrors) ?>
      </div>
     
      <?= FH::submitTag('Upload',['class'=>'btn btn-primary']) ?>
      </div>
    </form>
  </div>
</div>
<?php $this->end(); ?>
