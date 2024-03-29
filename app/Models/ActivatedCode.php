<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivatedCode extends Model
{
    use HasFactory;

    protected $table = 'activated_codes';



    public function activationCode() {
        return $this->belongsTo(ActivationCode::class, 'code_id');
      }

      public function user() {
        return $this->belongsTo(User::class, 'user_id');
      }
}
