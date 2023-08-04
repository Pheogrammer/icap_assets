<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'assets';

    protected $fillable = ['assetName', 'kind', 'purchase_date', 'status', 'added_by'];
    public function kind()
    {
        return $this->belongsTo(Kind::class, 'kind_id');
    }
}
