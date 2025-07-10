<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilePimpinan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','nama'];
    protected $casts = [];
    protected $table = 'profile_pimpinans';

}
