<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model 
{
    use SoftDeletes;
    //Quando o padrão for diferente do nome final da tabela
    protected $table = 'suppliers';
    protected $fillable = ['name', 'site', 'uf', 'email'];
    use HasFactory;

}
