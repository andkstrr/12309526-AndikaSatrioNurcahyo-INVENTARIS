<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'total',
        'repair',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lendings()
    {
        return $this->hasMany(Lending::class);
    }

    // Count of active lendings (not returned) for this item.
    public function activeLendingsCount()
    {
        return $this->lendings()->whereNull('returned_at')->count();
    }

    // Sum of total items currently being lent (not returned).
    public function activeLendingsTotal()
    {
        return $this->lendings()->whereNull('returned_at')->sum('total');
    }
}
