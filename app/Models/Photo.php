<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image_name','job_id', 'is_deleted', 'updated_date'];
    public function job(): BelongsTo
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }
}
