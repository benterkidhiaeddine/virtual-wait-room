<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date'];

    public function patients()
    {
        return $this->hasMany(related: Patient::class);
    }
}
