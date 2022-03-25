<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSender extends Model
{
    use HasFactory;
    protected $table = 'newsletter_sender';
    public $timestamps = true;
    protected $fillable = ['email','name','sw_shops_shop_id','created_at'];
}
