<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bancos extends Model
{
    use HasFactory;
    protected $primaryKey = 'banco';
    protected $keyType = 'string';
    public $incrementing = false;
}