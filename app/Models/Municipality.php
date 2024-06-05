<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'municipalities';

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'code', 
        'name', 
        'old_name', 
        'is_capital', 
        'district_code', 
        'province_code', 
        'region_code', 
        'island_group_code',
    ];
}