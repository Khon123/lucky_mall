<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageSubMenu extends Model
{
    public function sub_menu(){
        return $this->belongsTo('App\SubMenu');
    }

    public function menu(){
        return $this->belongsTo('App\Menu');
    }
}
