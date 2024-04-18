<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentFile extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function department() : BelongsTo {
        return $this->belongsTo(Department::class);

    }

    public function faculty() : BelongsTo {
        return $this->belongsTo(Faculty::class);

    }
}


#return $this->hasMany(Department::class);
