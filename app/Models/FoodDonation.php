<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\DonationRequest;

class FoodDonation extends Model
{
    protected $table = 'food_donations';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'donor_id',
        'category_id',
        'title',
        'description',
        'quantity',
        'unit',
        'status',
        'photo_url',
        'expired_at',
        'pickup_address'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function requests()
    {
    return $this->hasMany(
        DonationRequest::class,
        'donation_id'
    );
    }

    public function donations()
{
    $donations = FoodDonation::latest()
        ->paginate(10);

    return view(
        'admin.donations',
        compact('donations')
    );
}

public function donor()
{
    return $this->belongsTo(
        User::class,
        'donor_id'
    );
}

}