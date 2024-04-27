<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function departments() : HasMany {
        return $this->hasMany(Department::class);
    }

    public function student_files() : HasMany {
        return $this->hasMany(StudentFile::class);
    }
}
