<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function student_files(): HasMany
    {
        return $this->hasMany(StudentFile::class);
    }
}
