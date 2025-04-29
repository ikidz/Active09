<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'projects';
    protected $fillable = [
        'thumb',
        'img',
        'title_th',
        'title_en',
        'caption_th',
        'caption_en',
        'desc_th',
        'desc_en',
        'is_highlight',
        'is_publish'
    ];
    protected $casts = [
        'is_highlight' => 'boolean',
        'is_publish' => 'boolean'
    ];

    public function scopePublished( $query ){
        return $query->where('is_publish', 1)
                    ->orderBy('created_at','desc');
    }

    public function scopeHighlight( $query ){
        return $query->where('is_highlight', 1);
    }

    // public function categories(){
    //     return $this->belongsToMany('App\Models\ProjectCategories','','id');
    // }

    public function getDisplayThumbAttribute(){
        if( $this->thumb && \Storage::disk('public')->get( $this->thumb ) ){
            return \Storage::url( $this->thumb );
        }
        return null;
    }

    public function getDisplayImgAttribute(){
        if( $this->thumb && \Storage::disk('public')->get( $this->thumb ) ){
            return \Storage::url( $this->thumb );
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

    public function categories(){
        return $this->belongsToMany('App\Models\ProjectCategories', 'project_category_mappings', 'project_id', 'category_id');
    }

    public function getCategoryClassesAttribute(){
        $aCates = [];
        if( $this->categories ){
            foreach( $this->categories as $category ){
                array_push( $aCates, 'category-'.$category->id );
            }
        }
        return implode( ' ', $aCates );
    }

    public function getCategoryNamesAttribute(){
        $aCates = [];
        if( $this->categories ){
            foreach( $this->categories as $category ){
                array_push( $aCates, ucfirst($category->display_title) );
            }
        }
        return implode( ', ', $aCates );
    }
}
