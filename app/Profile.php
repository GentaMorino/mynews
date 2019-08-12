<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;
class Profile extends Model
{
    protected $guarded=array('id');
    
    public static $rules=array(
        'name'=>'required', 
        'gender'=>'required',
        'hoby'=>'required',
        'introduction'=>'required',
    );
    public function profile_histories()
    {
      return $this->hasMany('App\ProfileHistory');
    }
    
}
