<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'birthdate', 'queue_id', 'added_to_queue_at'];

    public function queue()
    {
        return $this->belongsTo(Queue::class);
    }
}
