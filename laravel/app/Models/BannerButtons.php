<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class BannerButtons extends Model implements Sortable
{
    use HasFactory, SortableTrait, SoftDeletes;
    protected $table = 'banner_buttons';
    protected $fillable = [
        'banner_id',
        'label_th',
        'label_en',
        'url_th',
        'url_en',
        'order',
        'is_publish'
    ];
    protected $casts = [
        'banner_id' => 'integer',
        'order' => 'integer',
        'is_publish' => 'boolean'
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
        'sort_on_has_many' => true
    ];

    public function scopePublished( $query ){
        return $query->where('is_publish', 1)
                    ->orderBy('order','asc');
    }

    public function banner(){
        return $this->belongsTo('App\Models\Banners','banner_id','id');
    }

    public function getDisplayLabelAttribute(){
        return $this->attributes['label_'.app()->getLocale()];
    }

    public function getDisplayUrlAttribute(){
        $url = 'javascript:void(0)';
        if( app()->getLocale() == 'en' ){
            if( !$this->url_en && $this->url_th ){
                $url = $this->url_th;
            }
        }else{
            if( $this->url_th ){
                $url = $this->url_th;
            }
        }
        return $url;
    }
}
