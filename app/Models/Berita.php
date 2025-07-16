<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','judul','deskripsi','tanggal','user_id'];
    protected $casts = [];
    protected $table = 'beritas';

	public function user()
	{
		return $this->belongsTo(User::class);
	}

    public function file() : object
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function getFolderAttribute() : string
    {
        return Str::lower(Str::snake(class_basename($this), '-')).'/'.date('Y').'/'.date('m').'/'.date('d');
    }
}
