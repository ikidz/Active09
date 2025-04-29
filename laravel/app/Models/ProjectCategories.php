<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ProjectCategories extends Model implements Sortable
{
    use HasFactory, SoftDeletes, SortableTrait;
    protected $table = 'project_categories';
    protected $fillable = [
        'title_th',
        'title_en',
        'order',
        'is_publish'
    ];
    protected $casts = [
        'order' => 'integer',
        'is_publish' => 'boolean'
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true
    ];

    public function scopePublished( $query ){
        return $query->where('is_publish', 1)
                        ->orderBy('order','asc');
    }

    public function getDisplayTitleAttribute(){
        return $this->attributes['title_'.app()->getLocale()];
    }

    public function projects(){
        return $this->belongsToMany('App\Models\Projects','project_category_mappings','category_id','project_id');
    }
}
