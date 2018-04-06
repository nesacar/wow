<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Click extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clicks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['newsletter_id', 'post_id', 'banner_id', 'subscriber_id'];

    public static function insertClick($newsletter_id, $post_id, $banner_id, $subscriber_id){
        $click = new Click();
        if($post_id){
            $click->post_id = $post_id;
            $click->banner_id = 0;
        }else{
            $click->post_id = 0;
            $click->banner_id = $banner_id;
        }
        $click->newsletter_id = $newsletter_id;
        $click->subscriber_id = $subscriber_id;
        $click->save();
    }

    public static function getBannerClicks($newslellter_id, $banner_id){
        return self::select('*', DB::raw('COUNT(*) as click', 'subscribers.email as email'))
            ->join('subscribers', 'clicks.subscriber_id', '=', 'subscribers.id')
            ->where('clicks.banner_id', $banner_id)->where('clicks.newsletter_id', $newslellter_id)
            ->groupby('clicks.subscriber_id')->orderbyRaw('click DESC')
            ->paginate(50);
    }

    public static function getPostClicks($newslellter_id, $post_id){
        return self::select('*', DB::raw('COUNT(*) as click', 'subscribers.email as email'))
            ->join('subscribers', 'clicks.subscriber_id', '=', 'subscribers.id')
            ->where('clicks.post_id', $post_id)->where('clicks.newsletter_id', $newslellter_id)
            ->groupby('clicks.subscriber_id')->orderbyRaw('click DESC')
            ->paginate(50);
    }
}
