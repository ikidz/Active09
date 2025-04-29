<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'articles';
    protected $fillable = [
        'thumb',
        'img',
        'title_th',
        'title_en',
        'caption_th',
        'caption_en',
        'desc_th',
        'desc_en',
        'post_date',
        'start_at',
        'end_at',
        'slug_th',
        'slug_en',
        'is_highlight',
        'highlight_img',
        'is_publish'
    ];
    protected $casts = [
        'post_date' => 'date',
        'start_at' => 'date',
        'end_at' => 'date',
        'is_highlight' => 'boolean',
        'is_publish' => 'boolean'
    ];

    public static function boot(){
        parent::boot();

        static::creating(function( $model ){
            if( $model->is_highlight == 1 ){
                \App\Models\Articles::Highlight()->update([
                    'is_highlight' => 0
                ]);
            }
        });

        static::updating(function( $model ){
            if( $model->is_highlight == 1 ){
                \App\Models\Articles::Highlight()->update([
                    'is_highlight' => 0
                ]);
            }
        });
    }

    public function scopePublished( $query ){
        return $query->where('is_publish', 1)
                    ->orderBy('post_date','desc');
    }

    public function scopeHighlight( $query ){
        return $query->where('is_highlight', 1);
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

    public function getDisplayHighlightImgAttribute(){
        if( $this->highlight_img && \Storage::disk('public')->get( $this->highlight_img ) ){
            return \Storage::url( $this->highlight_img );
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

    public function getDisplayPeriodAttribute(){
        return $this->start_at->format('d M Y').' - '.( $this->end_at ? $this->end_at->format('d M Y') : 'Indefinite' );
    }

    public function getDisplayPostDateAttribute(){
        return $this->post_date->format('d M Y');
    }

    public function getDisplaySlugAttribute(){
        return $this->attributes['slug_'.app()->getLocale()];
    }
}
