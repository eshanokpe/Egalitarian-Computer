<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'price', 'image', 'instructor_id', 'students_count', 'comments_count', 'rating'
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
