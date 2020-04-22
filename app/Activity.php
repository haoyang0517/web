<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    //
    public $table = 'activities';

    protected $dates = [
            'end_time',
            'start_time',
            'created_at',
            'updated_at',
        ];

    const RECURRENCE_RADIO = [
        'none'    => 'None',
        'daily'   => 'Daily',
        'weekly'  => 'Weekly',
        'monthly' => 'Monthly',
    ];

    protected $fillable = [
      'name',
      'info',
      'start_time',
      'area_id',
      'activity_id',
      'venue',
      'recurrence',


    ];
    public function area(){
      return $this->belongsTo(Area::class);
    }
    public function members(){
      return $this->belongsToMany(Member::class);
    }
    public function activity(){
      return $this->belongsTo(Activity::class,'activity_id');
    }
    public function activities(){
      return $this->hasMany(Activity::class,'activity_id', 'id');
    }
    public function saveQuietly()
    {
        return static::withoutEvents(function () {
            return $this->save();
          });
    }
}
