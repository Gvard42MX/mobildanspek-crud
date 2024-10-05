<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spek extends Model
{
    use HasFactory;

    protected $fillable = ['mobil_id', 'mesin_cc' , 'transmisi'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
