<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
