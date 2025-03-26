<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',

    ];
    protected $touches = ['tickets'];

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }
}
