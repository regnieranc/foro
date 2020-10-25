<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{
    protected $table = 'categorias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categoria', 'descripcion', 'posicion', 'icono'
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

    public function subcategorias(){
        return $this->hasMany('App\Subcategoria');
    }
}
