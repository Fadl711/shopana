<?php

namespace App\Models;

use App\Models\Sizes;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $table='products';
    protected $fillable=[
        'name',
        'quantity',
        'description',
        'price',
        'discounted_price',
        'color',
        'tags',
        'category_id',
        // size
        'small',
        'medium',
        'large',
        'xl',
        'xxl',
        'custom_size_name',
        'custom_size_quantity'
        //


    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImage(){
        return $this->hasmany(ProductImage::class,'product_id','id');
    }
  public function sizes()
{
    return $this->hasMany(Sizes::class,'product_id','id');
}

}
