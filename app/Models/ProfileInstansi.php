<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProfileInstansi extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','kata_pengantar','sejarah_singkat','visi_misi','tugas_fungsi'];
    protected $casts = [];
    protected $table = 'profile_instansis';

    public function file() : object
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function getFolderAttribute() : string
    {
        return Str::lower(Str::snake(class_basename($this), '-')).'/'.date('Y').'/'.date('m').'/'.date('d');
    }
}
