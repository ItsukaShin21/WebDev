<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class bio extends Model
{
    protected $table = 'bio';

    protected $fillable = [
        'first_name',
        'last_name',
        'contact_info',
        'email',
        'age',
        'date_of_birth',
        'nationality',
        'gender',
        'address',
        'picture',
        'introduction',
        'likes',
        'dislikes',
        'hobbies'
    ];

    public $timestamps = false;
}
