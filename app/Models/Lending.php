<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'borrower_name',
        'reason',
        'total',
        'handled_by',
        'returned_by',
        'date',
        'returned_at',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function handledBy()
    {
        return $this->belongsTo(User::class, 'handled_by');
    }

    public function user()
    {
        return $this->handledBy();
    }

    public function returnedBy()
    {
        return $this->belongsTo(User::class, 'returned_by');
    }
}
