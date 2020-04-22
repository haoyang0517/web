<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   use HasApiTokens, Notifiable;

   protected $guard = 'member-api';

   protected $fillable = [
       'name',
       'email',
       'contact_no',
       'password',
       'area_id',
   ];
   protected $hidden = [
       'password', 'remember_token',
   ];
   public function area()
   {
       return $this->belongsTo(Area::class);
   }
   public function activities()
   {
      return $this->belongsToMany(Activity::class);
   }
}
