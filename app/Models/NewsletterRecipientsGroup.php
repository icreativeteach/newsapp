<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewsletterRecipient;


class NewsletterRecipientsGroup extends Model
{
    use HasFactory;
    protected $table = 'newsletter_recipients_group';
    public $timestamps = true;
    protected $fillable = ['name','sw_shops_shop_id','created_at'];


// public function docs(){
//     return $this->hasMany(NewsletterRecipient::class);
// }


}

