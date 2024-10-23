<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['name', 'section_id'];

    /**
     * A student belongs to a section.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
