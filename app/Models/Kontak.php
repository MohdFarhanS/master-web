<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kontak extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','alamat','telp','email'];
    protected $casts = [];
    protected $table = 'kontaks';

}
