<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroliData extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['sub_total', 'kode_promo', 'discount'];

    public function barang(): HasOne
    {
        return $this->hasOne(ItemsData::class, 'id');
    }
}
