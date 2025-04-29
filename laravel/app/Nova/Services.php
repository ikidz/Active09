<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

use Manogi\Tiptap\Tiptap;

class Services extends Resource
{
    public static $group = 'SERVICES';
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Services>
     */
    public static $model = \App\Models\Services::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title_th';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title_th',
        'title_en',
        'caption_th',
        'caption_en',
        'desc_th',
        'desc_en',
        'slug_th',
        'slug_en',
        'category.name_th',
        'category.name_en'
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
            // BelongsTo::make('Category', 'category', 'App\Nova\ServiceCategories'),
            Image::make('Thumbnail', 'thumb')
                ->path('services')
                ->rules(['max:1024', 'image'])
                ->help('Support *.png, *.jpg. Maximum size is 1 Mb.')
                ->indexWidth(260),
            Image::make('Image', 'img')
                ->path('services')
                ->rules(['max:2048', 'image'])
                ->help('Support *.png, *.jpg. Maximum size is 2 Mb.')
                ->hideFromIndex(),
            Text::make('Name (ไทย)', 'title_th')
                ->rules(['required']),
            Text::make('Name (En)', 'title_en')
                ->rules(['required'])
                ->hideFromIndex(),
            // Textarea::make('Caption (ไทย)', 'caption_th')
            //     ->rules(['required']),
            // Textarea::make('Caption (En)', 'caption_en')
            //     ->rules(['required']),
            // Tiptap::make(__('Description (ไทย)'),'desc_th')
            //     ->buttons([
            //         'heading',
            //         '|',
            //         'italic',
            //         'bold',
            //         '|',
            //         'link',
            //         'code',
            //         'strike',
            //         'underline',
            //         'highlight',
            //         '|',
            //         'bulletList',
            //         'orderedList',
            //         'br',
            //         'codeBlock',
            //         'blockquote',
            //         '|',
            //         'horizontalRule',
            //         'hardBreak',
            //         '|',
            //         'table',
            //         '|',
            //         'image',
            //         '|',
            //         'textAlign',
            //         '|',
            //         'rtl',
            //         '|',
            //         'history',
            //         '|',
            //         'editHtml',
            //     ])
            //     ->fileSettings([
            //         'disk' => 'public',
            //         'path' => 'services/desc',
            //     ])
            //     ->rules('required'),
            // Tiptap::make(__('Description (En)'),'desc_en')
            //     ->buttons([
            //         'heading',
            //         '|',
            //         'italic',
            //         'bold',
            //         '|',
            //         'link',
            //         'code',
            //         'strike',
            //         'underline',
            //         'highlight',
            //         '|',
            //         'bulletList',
            //         'orderedList',
            //         'br',
            //         'codeBlock',
            //         'blockquote',
            //         '|',
            //         'horizontalRule',
            //         'hardBreak',
            //         '|',
            //         'table',
            //         '|',
            //         'image',
            //         '|',
            //         'textAlign',
            //         '|',
            //         'rtl',
            //         '|',
            //         'history',
            //         '|',
            //         'editHtml',
            //     ])
            //     ->fileSettings([
            //         'disk' => 'public',
            //         'path' => 'services/desc',
            //     ])
            //     ->rules('required'),
            // Slug::make('URL Slug', 'slug_en')
            //     ->from('title_en')
            //     ->separator('-')
            //     ->rules(['unique:services'])
            //     ->hideFromIndex(),
            Boolean::make('Publish?', 'is_publish')
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
}
