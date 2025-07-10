<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeri extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','nama_kegiatan'];
    protected $casts = [];
    protected $table = 'galeris';

    public function file() : object
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
