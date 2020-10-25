<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model{
    protected $table = 'subcategorias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subcategoria', 'path_url', 'descripcion', 'icono', 'posicion', 'categoria_id'
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

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function temas(){
        return $this->hasMany('App\Tema');
    }
}
