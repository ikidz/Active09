<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Partners extends Model implements Sortable
{
    use HasFactory, SortableTrait, SoftDeletes;
    protected $table = 'partners';
    protected $fillable = [
        'logo',
        'title_th',
        'title_en',
        'url',
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

    public function getDisplayLogoAttribute(){
        if( $this->logo && \Storage::disk('public')->get( $this->logo ) ){
            return \Storage::url( $this->logo );
        }
        return null;
    }

    public function getDisplayTitleAttribute(){
        return $this->attributes['title_'.app()->getLocale()];
    }

    public function getDisplayUrlAttribute(){
        if( !$this->url ){
            return 'javascript:void(0);';
        }
        return $this->url;
    }

}
