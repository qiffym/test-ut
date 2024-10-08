<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product  that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // public function scopeFilterByProduct($query, $productName)
    // {
    //     return $productName ? $query->whereHas('product', function ($q) use ($productName) {
    //         $q->where('nama_produk', 'like', '%' . $productName . '%');
    //     }) : $query;
    // }

    /**
     * Get the sales that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sales(): BelongsTo
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }
    // public function scopeFilterBySalesAndMonth($query, $salesName, $month)
    // {
    //     return $salesName || $month ? $query->whereHas('sales', function ($q) use ($salesName) {
    //         $q->where('nama_sales', 'like', '%' . $salesName . '%');
    //     })
    //         ->whereMonth('tanggal', \Carbon\Carbon::parse($month)->month) : $query;
    // }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['product_name'] ?? false,
            function ($query, $product_name) {
                $query->whereHas('product', function ($query) use ($product_name) {
                    $query->where('nama_produk', 'like', '%' . $product_name . '%');
                });
            }
        );

        $query->when(
            $filters['sales_name'] ?? false,
            function ($query, $sales_name) {
                $query->whereHas('sales', function ($query) use ($sales_name) {
                    $query->where('nama_sales', 'like', '%' . $sales_name . '%');
                });
            }
        );

        $query->when(
            $filters['month'] ?? false,
            function ($query, $month) {
                $query->whereMonth('tanggal', Carbon::parse($month)->month);
            }
        );
    }
}
