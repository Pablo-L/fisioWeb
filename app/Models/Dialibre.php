<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialibre extends Model
{
    use HasFactory;

    protected $table = 'diaslibres';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['dia', 'motivo'];
}
