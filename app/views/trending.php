<?php $this->start('head')?>
<?php getStyleSheet('music');?>
<?php $this->end()?>
<?php $this->start('body'); ?>
<div class="content-wrapper">
        <main class="main">
          <div class="music-wrapper">
             <?php
                if (isset($this->pageHeading)) {
                   echo '<h2 class="pageHeading">'.$this->pageHeading.'</h2>';
                }
                if (isset($this->songs)) {
                    $html = '';
                    foreach ($this->songs as $song) {
                                     
                    $html .= '<div id="'.$song->id.'" class="song-dits">';
                        $html .= '<span class="closeIfo" onclick="closeInfo('.$song->id.')">X</span>';
                        $html .='<div class="dits-content">';
                         $html .= '<img class="song-img" src="'.$song->cover.'" alt="">';
                         $html .= '<ul>';
                            $html .= '<li>Title: <span>'.$song->title.'</span></li>';
                            $html .= '<li>Artist: <span>'.$song->artist.'</span></li>';
                            $html .= '<li>Genre: <span>'.$song->genrer.'</span></li>';
                            $html .= '<li>Likes: <span>'.$song->likes.'</span></li>';
                            $html .= '<li>Views: <span>'.$song->plays.'</span></li>';
                            $html .= '<li>Downloads: <span>'.$song->downloads.'</span></li>';
                            $html .= '<li>Uploaded: <span>'.$song->created_at.'</span></li>';
                            $html .= '<a id="downloadBtn" 
                                  class="downloadBtn" 
                                  href="'.$song->location.'" 
                                  data-downloads="'.$song->id.'" 
                                  download="'.$song->title.'.mp3">Dowbload</a>';
                         $html .= '</ul>';
                         $html .= '</div>';
                     $html .= '</div>';

                        $html .= '<div class="song-bagde" style="
                        background:url('.$song->cover.') rgba(255, 255, 255, 0.06);
                        background-size:cover;
                        background-position:center;
                        ">';
                           $html .= '<div class="cover"  style="
                           background:url('.$song->cover.') rgba(255, 255, 255, 0.282);
                           background-size:cover;
                           background-position:center;
                           ">';
                               $html .= '<a class="BtnPlay" href="'.$song->location.'">
                                      <span class="play-btn fa fa-play"><span></a>';
                           $html .= '</div>';
                           $html .= '<div class="song-title">';
                              $html .= '<span> '.$song->title.'</span>';
                           $html .= '</div>';
                           $html .= '<div class="music-span">
                                    <span class="fa fa-music"></span>
                                    </div>';
                           $html .= '<div class="manu-span">
                                     <span class="fa fa-list" onclick="openInfo('.$song->id.')">';
                                     $html .= '</span>
                                     </div>';
                        $html .= '</div>';
                    }
                    print $html;
                }
             ?>
          </div>
        </main>
        <aside>
           <?=$this->widgets?>
        </aside>
         <audio src="" id="audioPlayer" controls></audio>
</div>
<?php $this->end(); ?>
+