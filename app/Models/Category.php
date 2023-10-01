<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    /**
     * Make the (N,N) relation between Category and Product
     *
     * @return void
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
