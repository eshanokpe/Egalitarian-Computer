<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title', 'slug', 'description', 'price', 'image', 'instructor_id', 'students_count', 'comments_count', 'rating'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = Str::slug($course->title);
        });

        static::updating(function ($course) {
            $course->slug = Str::slug($course->title);
        });
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
