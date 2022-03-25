<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $table = 'campaigns_component';
    public $timestamps = true;
    protected $fillable = ['id','name','x_type','convert_function','description','template','cls','pluginID','created_at'];
}
