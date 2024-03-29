<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    function rel_to_menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }
}
