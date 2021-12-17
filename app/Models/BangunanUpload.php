<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangunanUpload extends Model
{
    use HasFactory;

    protected $table = 'bangunan_uploads';

    protected $fillable = [
        'nama',
        'file',
        'bangunan_id'
    ];
}
