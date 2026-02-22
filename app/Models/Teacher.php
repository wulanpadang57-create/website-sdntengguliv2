<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'nip', 'bio', 'photo', 'position', 'subjects', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->nullable();
    }

    public function getSubjectsArray()
    {
        return array_filter(array_map('trim', explode(',', $this->subjects ?? '')));
    }
}
