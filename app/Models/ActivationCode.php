<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function activations()
    {
        return $this->hasMany(ActivatedCode::class, 'code_id');
    }
}
