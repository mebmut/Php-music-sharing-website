<?php
namespace Core;
use App\Models\Songs;
use App\Models\Widgets;
use App\Models\Genrers;

class SiteWidgets{

	public static $title,$limit;

    public function getWidgets($exeprtion=''){
        $widgetModel =  new Widgets();
        $widgets = $widgetModel->find();
        $widget  = '';
        if (!empty($widgets)) {
            foreach ($widgets as $called) {
                $name = $called->name;
                $title = $called->title;
                if (method_exists(get_class(), $name)) {
                    if ($called->name != $exeprtion) {
                        self::$title = $called->title;
                        self::$limit = 5;
                          $widget .= self::$name(self::$title,self::$limit);
                    }
                }
            }
        }
        return $widget;
    }

    public static function trendingMusic($title,$limit){
        $songModel = new Songs();
        $songs = $songModel->trendingMusic($limit,100);
        $widget = "";
        if ($songs) {
            $widget .= '<div class="widget">';
            $widget .= '<h2 class="widget-title">'.$title.'</h2>';
            $widget .= '<div class="widget-inner">';
            $widget .= '    <ul>';
            foreach ($songs as $song) {
                $widget .= '<li><a href=""> <span class="fa fa-music"> </span> '.$song->title.'</a></li>';
            }
            $widget .= '    </ul>';
            $widget .= '</div>';
            $widget .= '</div>';
        }
        return $widget;
    }
    public static function recentMusic($title,$limit){
        $songModel = new Songs();
        $songs = $songModel->recentMusic($limit);
        $widget = "";
        if ($songs) {
            $widget .= '<div class="widget">';
            $widget .= '<h2 class="widget-title">'.$title.'</h2>';
            $widget .= '<div class="widget-inner">';
            $widget .= '    <ul>';
            foreach ($songs as $song) {
                $widget .= '<li><a href=""> <span class="fa fa-music"> </span> '.$song->title.'</a></li>';
            }
            $widget .= '    </ul>';
            $widget .= '</div>';
            $widget .= '</div>';
        }
        return $widget;
    }
    public static function mostDownloaded($title,$limit){
        $songModel = new Songs();
        $songs = $songModel->mostDownloaded($limit);
        $widget = "";
        if ($songs) {
            $widget .= '<div class="widget">';
            $widget .= '<h2 class="widget-title">'.$title.'</h2>';
            $widget .= '<div class="widget-inner">';
            $widget .= '    <ul>';
            foreach ($songs as $song) {
                $widget .= '<li><a href=""> <span class="fa fa-music"> </span> '.$song->title.'</a></li>';
            }
            $widget .= '    </ul>';
            $widget .= '</div>';
            $widget .= '</div>';
        }
        return $widget;
    }

    public static function genrers($title,$limit){
        $genrerModel = new Genrers();
        $genrers = $genrerModel->getGenrers($limit);
        $widget = "";
        if ($genrers) {
            $widget .= '<div class="widget">';
            $widget .= '<h2 class="widget-title">'.$title.'</h2>';
            $widget .= '<div class="widget-inner">';
            $widget .= '    <ul>';
            foreach ($genrers as $genrer) {
                $widget .= '<li><a href="'.PROOT.'home/genrers/'.$genrer->id.'"> <span class="fa fa-tag"> </span> '.$genrer->name.'</a></li>';
            }
            $widget .= '    </ul>';
            $widget .= '</div>';
            $widget .= '</div>';
        }
        return $widget;
    }
}