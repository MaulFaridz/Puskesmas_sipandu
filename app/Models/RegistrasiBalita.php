<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiBalita extends Model
{
    use HasFactory;

    protected $table = 'registrasi_balita';
    protected $primaryKey = 'reg_balita_id';
    protected $guarded = [];
}
