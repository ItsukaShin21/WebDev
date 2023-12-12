<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table = 'links';

    protected $fillable = [ 
        'facebook_link',
        'linkedin_link',
        'instagram_link',
        'telegram_link'
    ];

    public $timestamps = false;
}