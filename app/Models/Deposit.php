<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Deposit extends Model
{
    use HasFactory, Searchable;
    //
    protected $fillable = ['received_from', 'amount', 'remarks', 'created_at'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'received_from' => $this->received_from
        ];
    }
}
