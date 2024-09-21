<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    // Define relationships if needed
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
