<?php $this->start('head')?>
<?php getStyleSheet('music');?>
<?php $this->end()?>
<?php $this->start('body'); ?>
<div class="content-wrapper">
        <main class="main">
            <audio src="" id="audioPlayer" controls></audio>
            <ul id="playList" class="playList">
                <li class="heading">
                    <span></span>
                    <span class="title">Title</span>
                    <span class="artist">Artist</span>
                    <span class="genrer">Genrer</span>
                    <span>Play</span>
                </li>
               <?php
                 if (isset($this->songs)) {
                    foreach ($this->songs as $song) { ?>
                        <li class="song">
                            <img class="song-cover" src="<?=$song->cover?>" alt="">
                            <span class="title download-song" data-link="<?=$song->location?>" data-cover="<?=$song->cover?>">
                                <span class="fa fa-music"> </span> 
                                <?=$song->title?>
                            </span> 
                            <span class="artist"><?=$song->artist?></span>
                            <span class="genrer"><?=$song->genrer?></span>
                            <a href="<?=$song->location?>" class="fa fa-play"></a>
                        </li>
                    <?php }
                 }
               ?>
   
            </ul>
        </main>
        <aside>
           <?=$this->widgets?>
        </aside>
   </div>
        </aside>
    </div>
<?php $this->end(); ?>
