<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'regions';

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'code',
        'name',
        'region_name',
        'island_group_code'
    ];
}
