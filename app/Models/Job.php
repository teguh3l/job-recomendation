<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'skills',              // opsional, nanti bisa kita isi
        'company_name',        // opsional
        'location',            // opsional
    ];

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }
}
