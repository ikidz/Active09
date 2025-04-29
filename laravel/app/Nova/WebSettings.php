<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;

use Alexwenzel\DependencyContainer\HasDependencies;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Manogi\Tiptap\Tiptap;

class WebSettings extends Resource
{
    use HasDependencies;
    public static $group = 'SETTINGS';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\WebSetting::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'key';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'key',
        'value_th',
        'value_en',
        // 'value_shn'
    ];

    public static $indexDefaultOrder = [
        'id' => 'asc'
    ];
    public static function indexQuery(NovaRequest $request, $query)
    {
        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];
            return $query->orderBy(key(static::$indexDefaultOrder), reset(static::$indexDefaultOrder));
        }
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            // ID::make(__('ID'), 'id')->sortable(),
            Select::make(__('Type'), 'type')
                ->options([
                    'text' => 'Text',
                    'longText' => 'Textbox',
                    'image' => 'Image',
                    'link' => 'Link',
                    'tel' => 'Telephone No.',
                    'email' => 'Email Address',
                    'map' => 'Google Map'
                ])
                ->default('text')
                ->displayUsingLabels()
                ->rules(['required']),
            Text::make(__('Key'), 'key')
                ->readonly(),
            DependencyContainer::make([
                Text::make(__('Value (ไทย)'), 'value_th')
                    ->rules(['required']),
                Text::make(__('Value (En)'), 'value_en')
                    ->rules(['required'])
            ])->dependsOn('type', 'text'),
            DependencyContainer::make([
                Tiptap::make(__('Value (ไทย)'), 'value_th')
                ->buttons([
                    'heading',
                    '|',
                    'italic',
                    'bold',
                    '|',
                    'link',
                    'code',
                    'strike',
                    'underline',
                    'highlight',
                    '|',
                    'bulletList',
                    'orderedList',
                    'br',
                    'codeBlock',
                    'blockquote',
                    '|',
                    'horizontalRule',
                    'hardBreak',
                    '|',
                    'table',
                    '|',
                    'image',
                    '|',
                    'textAlign',
                    '|',
                    'rtl',
                    '|',
                    'history',
                    '|',
                    'editHtml',
                ])
                ->fileSettings([
                    'disk' => 'public',
                    'path' => 'uploads/articles/editor',
                ])
                ->rules('required'),
            Tiptap::make(__('Value (En)'), 'value_en')
                ->buttons([
                    'heading',
                    '|',
                    'italic',
                    'bold',
                    '|',
                    'link',
                    'code',
                    'strike',
                    'underline',
                    'highlight',
                    '|',
                    'bulletList',
                    'orderedList',
                    'br',
                    'codeBlock',
                    'blockquote',
                    '|',
                    'horizontalRule',
                    'hardBreak',
                    '|',
                    'table',
                    '|',
                    'image',
                    '|',
                    'textAlign',
                    '|',
                    'rtl',
                    '|',
                    'history',
                    '|',
                    'editHtml',
                ])
                ->fileSettings([
                    'disk' => 'public',
                    'path' => 'uploads/articles/editor',
                ])
                ->rules('required'),
	            // Textarea::make(__('Value (ไทย)'), 'value_th')
	            //     ->hideFromIndex()
	            //     ->help('Optional'),
	            // Textarea::make(__('Value (En)'), 'value_en')
	            //     ->hideFromIndex()
	            //     ->help('Optional'),
            ])->dependsOn('type','longText'),
            DependencyContainer::make([
                Image::make(__('Image'), 'img')
                    ->disk(config("filesystems.default"))
                    ->path('web_settings')
                    ->rules( ( $this->key == 'SEO_FACEBOOK_IMG' ? ['required','max:1024','image', 'dimensions:width=1200,height=630'] : ['required','max:1024','image'] ) )
                    ->help("Support *.png,*.jpg, size must not exceed more than 1 Mb".( $this->key == 'SEO_FACEBOOK_IMG' ? '. Image dimension must by 1200x630 pixels only' : '' ))
                    ->hideFromIndex(),
            ])->dependsOn('type','image'),
            DependencyContainer::make([
                Text::make(__('URL'), 'value_th')
                    ->hideFromIndex()
                    ->help('Link will open new tab on browser when click'),
            ])->dependsOn('type','link'),
            DependencyContainer::make([
                Text::make(__('Telephone No.'), 'value_th')
	                ->hideFromIndex()
            ])->dependsOn('type','tel'),
            DependencyContainer::make([
                Text::make(__('Email'), 'value_th')
                    ->hideFromIndex()
	                ->help('Use "," for multiple email address')
            ])->dependsOn('type','email'),
            DependencyContainer::make([
                Text::make(__('Google Map'), 'value_th')
	                ->hideFromIndex()
	                ->help('Example : '.htmlentities('<iframe src="..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'))
            ])->dependsOn('type','map')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function label()
    {
        return __('Web Settings');
    }

    public static function singularLabel()
    {
        return __('Web Setting');
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return true;
    }
    public function authorizedToDelete(Request $request)
    {
        return false;
    }
    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }

    public static function availableForNavigation( Request $request ){
        return true;
    }
    public function authorizedToReplicate(Request $request){
        return false;
    }
}
