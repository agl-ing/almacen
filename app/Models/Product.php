<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the company.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'sku',
        'image',
        'provider_id',
        'status'
    ];
}
