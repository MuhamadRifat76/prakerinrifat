<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Tag extends Model
{
    protected $fillable = ['nama_tag','slug'];
    public $timestamps = true;
  
    public function Artikel()
    {
   return $this->belongsToMany('App\Artikel','artikel_tag','id_tag','id_artikel');
    }

    }