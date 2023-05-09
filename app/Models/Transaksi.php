<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['category_id',
                            'category_detail_id',
                            'nominal',
                            'status',
                            'description',
                        ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function categoryDetail()
    {
        return $this->belongsTo(CategoryDetail::class, 'category_detail_id', 'id');
    }
}
