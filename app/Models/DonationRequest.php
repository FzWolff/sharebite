<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodDonation;
use App\Models\User;

class DonationRequest extends Model
{
    use HasFactory;

    protected $table = 'donation_requests';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'recipient_id',
        'donation_id',
        'message',
        'quantity_requested',
        'status',
        'pickup_time'
    ];

    public function donation()
    {
        return $this->belongsTo(
            FoodDonation::class,
            'donation_id',
            'id'
        );
    }

    public function recipient()
    {
    return $this->belongsTo(
        User::class,
        'recipient_id',
        'id'
    );
    }
}