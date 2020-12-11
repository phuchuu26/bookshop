<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_gold_time_frame extends Model
{
    protected $table='detail_gold_time_frame';
    //
    public $timestamps = false;

    public function getFrameGold(){
        return $this->belongsTo('App\Models\Gold_time_frame','id_gold_time_frame','gold_time_frame_id');
    }
}
