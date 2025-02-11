<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'created_by',
        'ticket_id',
        'body',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
}
