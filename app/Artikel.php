<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['judul', 'slug', 'foto', 'konten', 'id_kategori', 'id_user'];
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'artikel_tag', 'id_artikel', 'id_tag');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
