<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model{
    protected $table = 'temas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tema', 'path_url', 'descripcion', 'estado', 'usuario_id', 'subcategoria_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function usuario(){
        return $this->belongsTo('App\User');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
