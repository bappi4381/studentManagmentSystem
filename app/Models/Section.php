<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'student_limit', 'is_active'];

    /**
     * A section has many students.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
