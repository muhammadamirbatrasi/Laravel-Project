<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'description',
        'location',
        'last_date',
        'is_deleted',
        'added_date',
        'updated_date'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class, 'job_id');
    }
}
