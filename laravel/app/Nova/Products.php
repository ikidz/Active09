<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

use Manogi\Tiptap\Tiptap;

class Products extends Resource
{
    public static $group = 'PRODUCTS';
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Projects>
     */
    public static $model = \App\Models\Projects::class;

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
        'desc_en'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $categories = \App\Models\ProjectCategories::Published()->get();
        $category_options = [];
        foreach( $categories as $category ){ $category_options[$category->id] = $category->title_th; }
        return [
            ID::make()->sortable(),
            // MultiSelect::make('Categories', 'category_ids')
            //     ->options( $category_options )
            //     ->rules(['required']),
            Image::make('Thumbnail', 'thumb')
                ->path('projects')
                ->rules(['max:2048', 'image'])
                ->help('Support *.png, *.jpg. Maximum size is 1 Mb.')
                ->indexWidth(260),
            // Image::make('Image', 'img')
            //     ->path('projects')
            //     ->rules(['max:2048', 'image'])
            //     ->help('Support *.png, *.jpg. Maximum size is 2 Mb.')
            //     ->hideFromIndex(),
            Text::make('Title (ไทย)', 'title_th')
                ->rules(['required']),
            Text::make('Title (En)', 'title_en')
                ->hideFromIndex(),
            // Textarea::make('Caption (ไทย)', 'caption_th'),
            // Textarea::make('Caption (En)', 'caption_en'),
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
            //         'path' => 'projects/desc',
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
            //         'path' => 'projects/desc',
            //     ])
            //     ->rules('required'),
            // Boolean::make('Highlight?', 'is_highlight')
            //     ->default(0),
            Boolean::make('Publish?', 'is_publish')
                ->default(1),
            Tag::make('Categories', 'categories', 'App\Nova\ProductCategories')
                ->showCreateRelationButton()
                ->modalSize('7xl')
                ->rules(['required'])
                ->preload(),
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
