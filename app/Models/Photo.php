<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image_name','job_id', 'is_deleted', 'updated_date'];
    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }
}
