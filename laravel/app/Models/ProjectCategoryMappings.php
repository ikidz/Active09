<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategoryMappings extends Model
{
    use HasFactory;
    protected $table = 'project_category_mappings';
    protected $fillable = [
        'project_id',
        'category_id'
    ];
    protected $casts = [
        'project_id' => 'integer',
        'category_id' => 'integer'
    ];

    public function project(){
        return $this->belongsTo('App\Models\Projects','project_id','id');
    }

    public function category(){
        return $this->belongsTo('App\Models\ProjectCategories','category_id','id');
    }
}
