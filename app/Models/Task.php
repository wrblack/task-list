<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Used by the static create function.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'long_description',
        'completed',
    ];

    /**
     * Sensitive fields that are not mass assignable.
     * Not as secure as fillable.
     * @var array
     */
    protected $guarded = [];

    function toggleComplete() {
        $this->completed = !$this->completed;
        $this->save();
    }
}
