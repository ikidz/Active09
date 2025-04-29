<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Banners extends Resource
{
    use HasSortableRows;
    public static $group = 'BANNERS';
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Banners>
     */
    public static $model = \App\Models\Banners::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
        'title_th',
        'title_en',
        'caption_th',
        'caption_en'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Image::make('Banner Image', 'img')
                ->path('banners')
                ->rules(['max:2048', 'image'])
                ->help('Support *.png, *.jpg. Maximum size is 2 Mb.')
                ->indexWidth(260),
            Text::make('Name', 'name')
                ->rules(['required']),
            Text::make('Title (ไทย)', 'title_th')
                ->help('ใช้ {...} เพื่อเปลี่ยนสีตัวอักษร. Example : เรามีคำตอบสำหรับทุก {อุตสาหกรรม}')
                ->rules(['required'])
                ->hideFromIndex(),
            Text::make('Title (En)', 'title_en')
                ->help('Use {...} to add color. Example : Get a Solution For all {industries}')
                ->rules(['required'])
                ->hideFromIndex(),
            Textarea::make('Caption (ไทย)', 'caption_th')
                ->hideFromIndex(),
            Textarea::make('Caption (En)', 'caption_en')
                ->hideFromIndex(),
            Text::make('Period', function(){
                return $this->period;
            })->exceptOnForms(),
            Text::make('Button amount', function(){
                if( count( $this->buttons ) > 0 ){
                    return count( $this->buttons ).' buttons';
                }
                return 'No button assigned.';
            }),
            Date::make('Start', 'start')
                ->onlyOnForms(),
            Date::make('End', 'end')
                ->onlyOnForms(),
            Boolean::make('Publish?', 'is_publish')
                ->default(1),
            HasMany::make('Buttons', 'buttons', 'App\Nova\BannerButtons')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
