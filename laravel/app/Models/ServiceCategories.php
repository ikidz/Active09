<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ServiceCategories extends Model implements Sortable
{
    use HasFactory, SortableTrait, SoftDeletes;
    protected $table = 'service_categories';
    protected $fillable = [
        'icon',
        'name_th',
        'name_en',
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

    public function getDisplayNameAttribute(){
        return $this->attributes['name_'.app()->getLocale()];
    }

    public function services(){
        return $this->hasMany('App\Models\Services','category_id','id');
    }
}
