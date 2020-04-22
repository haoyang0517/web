<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
      'name',
      'area_id'
    ];

    // this relationship will only return one level of child items
    public function areas()
    {
      return $this->hasMany(Area::class, 'area_id');
    }
    public function childAreas()
    {
      return $this->hasMany(Area::class, 'area_id')->with('areas');
    }
    public function activities()
    {
      return $this->hasMany(Activity::class);
    }
    public function members()
    {
      return $this->hasMany(Member::class);
    }
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
