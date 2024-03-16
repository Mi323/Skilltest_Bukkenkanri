<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BukkenKanri extends Model
{
    use HasFactory;

    protected $table = 'bukken_kanris';

    protected $fillable = [
        'number',
        'date',
        'address',
        'price',
        'pic',
        'pic2'


    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];



}
