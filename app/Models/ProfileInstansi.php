<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileInstansi extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','kata_pengantar','sejarah_singkat','visi_misi','tugas_fungsi'];
    protected $casts = [];
    protected $table = 'profile_instansis';

}
