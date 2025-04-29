<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'category_id',
        'thumb',
        'img',
        'title_th',
        'title_en',
        'caption_th',
        'caption_en',
        'desc_th',
        'desc_en',
        'slug_th',
        'slug_en',
        'is_publish'
    ];
    protected $casts = [
        'category_id' => 'integer',
        'is_publish' => 'boolean'
    ];

    public function scopePublished( $query ){
        return $query->where('is_publish', 1)
                    ->orderBy('created_at','desc');
    }

    public function getDisplayThumbAttribute(){
        if( $this->thumb && \Storage::disk('public')->get( $this->thumb ) ){
            return \Storage::url( $this->thumb );
        }
        return null;
    }

    public function getDisplayImgAttribute(){
        if( $this->img && \Storage::disk('public')->get( $this->img ) ){
            return \Storage::url( $this->img );
        }
        return null;
    }

    public function getDisplayTitleAttribute(){
        return $this->attributes['title_'.app()->getLocale()];
    }

    public function getDisplayCaptionAttribute(){
        return $this->attributes['caption_'.app()->getLocale()];
    }

    public function getDisplayDescAttribute(){
        return $this->attributes['desc_'.app()->getLocale()];
    }

    public function category(){
        return $this->belongsTo('App\Models\ServiceCategories','category_id','id');
    }
}
