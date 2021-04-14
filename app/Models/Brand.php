<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "slug",
    ];

    /**
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
    return 'slug';
    }

}
