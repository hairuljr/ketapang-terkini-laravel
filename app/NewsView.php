<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsView extends Model
{
  public static function createViewLog($news)
  {
    $newsViews = new NewsView();
    $newsViews->news_id = $news->id;
    $newsViews->titleslug = $news->slug;
    $newsViews->url = \Request::url();
    $newsViews->session_id = \Request::getSession()->getId();
    $newsViews->user_id = (\Auth::check()) ? \Auth::id() : null; //this check will either put the user id or null, no need to use \Auth()->user()->id as we have an inbuild function to get auth id
    $newsViews->ip = \Request::getClientIp();
    $newsViews->agent = \Request::header('User-Agent');
    $newsViews->save(); //please note to save it at lease, very important
  }
}
