<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;

    protected $fillable = ['user_id','fuel_consumption', 'service_schedule', 'usage_history', 'driver', 'atasan_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function approval()
    {
        return $this->hasOne(OrderApproval::class);
    }
}
