<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// Tambahan
use Illuminate\Support\Str;
// end

class ProfilePimpinan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','nama'];
    protected $casts = [];
    protected $table = 'profile_pimpinans';

    // Tambahan
    public function file() : object
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function getFolderAttribute() : string
    {
        return Str::lower(Str::snake(class_basename($this), '-')).'/'.date('Y').'/'.date('m').'/'.date('d');
    }
    // end

}
