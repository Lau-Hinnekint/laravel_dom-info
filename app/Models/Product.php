<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * Make the (N,N) relation between Order and Product
     *
     * @return void
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('total_quantity', 'total_price');
    }


    /**
     * Make the (N,N) relation between Category and Product
     *
     * @return void
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)
            ->withPivot(
                'gene_brand',
                'gene_model',
                'proc_name',
                'proc_type',
                'proc_frequency',
                'proc_chipset',
                'memo_size',
                'memo_type',
                'memo_capacityMax',
                'stor_primary',
                'stor_secondary',
                'stor_type',
                'stor_interface',
                'disp_chipset',
                'disp_memory',
                'netw_wireless',
                'netw_wirelessNorm',
                'netw_norm',
                'conn_front',
                'conn_back'
            );
    }
}
