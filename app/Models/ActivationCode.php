<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    use HasFactory;
    protected $guarded = [];
 

      public function user() {
        return $this->belongsTo(User::class, 'pass_code', 'code');
      }

      public function activations() {
        return $this->hasMany(ActivatedCode::class, 'code_id','id');
      }
    public function scopeInactive($query) {
        return $query->where('status', 'inactive');
    }

}
