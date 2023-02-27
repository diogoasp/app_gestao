<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'reason_id', 'message'];
    use HasFactory;
}
