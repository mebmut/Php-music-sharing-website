<?php $this->start('head')?>
<?php getStyleSheet('music');?>
<?php $this->end()?>
<?php $this->start('body'); ?>
<div class="content-wrapper">
        <main class="main single">
        <div class="song-content">
        <?php
                 if (isset($this->songs)) { ?>
                     <div class="song-image" style='
                      background:url("<?=$this->songs->cover?>") rgba(255,255,255,0.6);
                      background-size:cover;
                      background-position:center;
                      background-filter: blur(5px);
                      background-blend-mode: color-burn;
                     '>
                     <img src="<?=$this->songs->cover?>" alt="">
                    <audio src="" id="audioPlayer" controls></audio>
                     <form action="" method="post">
                          <input type="hidden" name="id" value="<?=$this->songs->id?>">
                          <input type="submit" name="like" value="Like">
                          <a class="BtnPlay" href="<?=$this->songs->location?>"><span>Play<span></a>
                       </form>
                     </div>
                     <div class="song-info">
                        <ul>
                            <li>Title: <span id="title">Finally</span></li>
                            <li>Artist: <span id="artist">Dj Poul G</span></li>
                            <li>Genre: <span id="genre">Kalindula</span></li>
                            <li>Featuring: <span id="featuring">Mebmut, Kas Kay, D Beatz</span></li>
                            <li>Plays: <span id="plays">200</span></li>
                            <li>Likes: <span id="likes">200</span></li>
                            <li>Downloads: <span id="downloads">150</span></li>
                        </ul>
                        <a id="download-link" href="<?=$this->songs->location?>" download="<?=$this->songs->title?>.mp3">DOWNLOAD</a>
                     </div>

                <?php }
               ?>
               </div>
               <div class="other-songs">
                 <ul> 
                    <?php
                      if (isset($this->otherSongs)) {
                          foreach ($this->otherSongs as $song) { ?>
                              <li class="other-song"><a href="<?=PROOT?>home/view/<?=$song->id?>"><?=$song->title?></a><a href="<?=PROOT?>home/artist/<?=$song->artist?>"><?=$song->artist?></a><a class="BtnPlay" href="<?=$this->songs->location?>"><span>Play<span></a></li>
                         <?php }
                      }
                    ?>
                 </ul>
               </div>
        </main>
        <aside>
           <?=$this->widgets?>
        </aside>
   </div>
        </aside>
    </div>
<?php $this->end(); ?>
