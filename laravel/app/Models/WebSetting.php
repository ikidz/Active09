<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebSetting extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'web_settings';
    protected $fillable = [
        'type',
        'key',
        'img',
        'value_th',
        'value_en',
        'value_shn'
    ];

    public function getValueAttribute(){
        switch( $this->type ){
            case 'text' :
                return $this->attributes['value_'.app()->getLocale()];
            break;
            case 'image' :
                $storage = \Storage::disk('public');
                if( $this->attributes['img'] && $storage->exists( $this->attributes['img'] ) === true ){
                    return $storage->url( $this->attributes['img'] );
                }
            break;
            default : 
                return $this->attributes['value_th'];
        }
    }

}
