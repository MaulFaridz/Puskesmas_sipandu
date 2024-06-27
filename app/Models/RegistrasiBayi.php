<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiBayi extends Model
{
    use HasFactory;

    protected $table = 'registrasi_bayi';
    protected $primaryKey = 'reg_bayi_id';
    protected $guarded = [];
}
