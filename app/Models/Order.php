<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    /**
     * Make the (N,N) relation between Order and Product
     *
     * @return void
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('total_quantity', 'total_price');   // Since it is a N,N relation create Pivot with foreign ID, total_quantity and total_price
    }
}
