<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Banner extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','judul', 'tampilkan'];
    protected $casts = [
        'tampilkan' => 'boolean',
    ];
    protected $table = 'banners';

    public function file() : object
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function getFolderAttribute() : string
    {
        return Str::lower(Str::snake(class_basename($this), '-')).'/'.date('Y').'/'.date('m').'/'.date('d');
    }
}
