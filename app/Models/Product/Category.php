<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        return $this->BelongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }
}
