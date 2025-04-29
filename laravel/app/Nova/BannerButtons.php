<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

use Outl1ne\NovaSortable\Traits\HasSortableRows;

class BannerButtons extends Resource
{
    use HasSortableRows;
    public static $group = 'BANNERS';
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\BannerButtons>
     */
    public static $model = \App\Models\BannerButtons::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'label_th';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'label_th',
        'label_en',
        'url_th',
        'url_en'
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
            BelongsTo::make('Banner', 'banner', 'App\Nova\Banners'),
            Text::make('Label (ไทย)', 'label_th')
                ->rules(['required']),
            Text::make('Label (En)', 'label_en')
                ->rules(['required'])
                ->hideFromIndex(),
            URL::make('URL สำหรับภาษาไทย', 'url_th')
                ->displayUsing( fn() => "ลิงก์สำหรับภาษาไทย" )
                ->hideFromIndex(),
            URL::make('URL สำหรับภาษาอังกฤษ', 'url_en')
                ->displayUsing( fn() => "Button link")
                ->hideFromIndex(),
            Boolean::make('Publish', 'is_publish')
                ->default(1)
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

    public static function authorizedToCreate(Request $request){
        return true;
    }

    public function authorizedToUpdate(Request $request){
        return true;
    }
    public function authorizedToDelete(Request $request){
        return true;
    }
    public function authorizedToForceDelete(Request $request){
        return false;
    }

    public static function availableForNavigation( Request $request ){
      return false;
    }
}
