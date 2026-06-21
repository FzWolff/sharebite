<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'reviewer_id',
        'reviewee_id',
        'request_id',
        'rating',
        'comment'
    ];
}