<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Kategori extends Model
{
    
    protected $fillable = ['nama','slug'];
    public $timestamps = true;
  
    public function Artikel()
    {
   return $this->hasMany('App\Artikel','id_kategori');
    }
    
    }

        