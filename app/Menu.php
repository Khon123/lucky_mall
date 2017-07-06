<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function subMenu(){
        return $this->hasMany('App\SubMenu');
    }

    public function image_sub_menus(){
        return $this->hasMany('App\ImageSubMenu');
    }
}
