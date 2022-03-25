<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterRecipient extends Model
{
    use HasFactory;
    
    protected $table = 'newsletter_recipient';
    public $timestamps = true;
    protected $fillable = ['email','newsletter_recipients_group_id','customer','lastmailing','lastread','sw_shops_shop_id','created_at'];
}
