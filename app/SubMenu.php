<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    public function menu(){
        return $this->belongsTo('App\Menu');
    }

    public function image_sub_menus(){
        return $this->hasMany('App\ImageSubMenu');
    }
}
