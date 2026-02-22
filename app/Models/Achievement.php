<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category', 'student_name', 'achievement_image', 'year', 'achievement_date', 'user_id'];

    protected $casts = [
        'achievement_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
