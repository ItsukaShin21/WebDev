<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'elementary',
        'junior_highschool',
        'senior_highschool',
        'college'
    ];

    public $timestamps = false;
}
