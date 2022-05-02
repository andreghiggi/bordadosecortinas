<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    use HasFactory;
    protected $table = 'lancamento';
    protected $fillable = [
        'produto_id',
        'referencia',
        'nome',
        'quantidade'
    ];


    public function produto() {
        return $this->hasMany('App\Models\Product', 'id', 'produto_id');
    }
}
