<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_name',
        'city',
        'property_type',
        'sector_code',
        'block_number',
        'building_number',
        'manual_location',
        'problem_information',
        'user_id',
        'workshop_id',
        'maintenance_service_id',
        'heavy_machine_id',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function maintenance_service()
    {
        return $this->belongsTo(MaintenanceService::class);
    }

    public function heavy_machine()
    {
        return $this->belongsTo(HeavyMachine::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
