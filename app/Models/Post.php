<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
      'user_id',
      'image',
      'description',
    ];
    
    /**
     * user
     *
     * @return void
     */
    public function user(): BelongsTo
    { 
      return $this->belongsTo(User::class);
    }


}
