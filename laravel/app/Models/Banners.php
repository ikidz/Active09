<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Banners extends Model implements Sortable
{
    use HasFactory, SortableTrait, SoftDeletes;
    protected $table = 'banners';
    protected $fillable = [
        'name',
        'img',
        'title_th',
        'title_en',
        'caption_th',
        'caption_en',
        'order',
        'start',
        'end',
        'is_publish'
    ];
    protected $casts = [
        'order' => 'integer',
        'start' => 'date',
        'end' => 'date',
        'is_publish' => 'boolean'
    ];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true
    ];

    public function scopePublished( $query ){
        return $query->where('start','<=',now()->format('Y-m-d'))
                    ->where('is_publish', 1)
                    ->where( function( $query ){
                        $query->where("end",">=",now()->format("Y-m-d"))
                                ->orWhere("end",null);
                    })
                    ->orderBy('order','asc');
    }

    public function buttons(){
        return $this->hasMany('App\Models\BannerButtons','banner_id','id');
    }

    public function getDisplayImgAttribute(){
        if( $this->img && \Storage::disk('public')->get( $this->img ) ){
            return \Storage::url( $this->img );
        }
        return null;
    }

    public function getDisplayTitleAttribute(){
        $pattern = array('/{/', '/}/');
        $replace = array('<span class="theme_color">', '</span>');
        return preg_replace($pattern, $replace, $this->attributes['title_'.app()->getLocale()]);
    }

    public function getDisplayCaptionAttribute(){
        return $this->attributes['caption_'.app()->getLocale()];
    }

    public function getPeriodAttribute(){
        return $this->start->format('d M Y').' - '.( $this->end ? $this->end->format('d M Y') : 'Indefinite' );
    }
}
