<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function scopeFilter($query, $filters)
    {
        $filters->apply($query);
    }

    /**
     * Get all of the orderDetail for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    /**
     * Get the customer that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
