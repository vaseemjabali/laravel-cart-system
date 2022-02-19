<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Get the comments for the blog post.
     */
    public function OrderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
