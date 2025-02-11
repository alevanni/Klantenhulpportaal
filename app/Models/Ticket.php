<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'created_by',
        'title',
        'description',
        'category',
        'status',
        'assigned_to',
    ];

    public function createdBy()
    {
        return $this->belongsToMany(User::class)->where('admin', 0);
    }
    public function assignedTo()
    {
        return $this->belongsToMany(User::class)->where('admin', 1);
    }
    public function category()
    {
        return $this->balongsTo(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
