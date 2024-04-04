<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse_Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warehouse_product';

    /**
     * Get the company.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the company.
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'warehouse_id',
        'product_id',
        'qty',
        'status',
    ];
}
