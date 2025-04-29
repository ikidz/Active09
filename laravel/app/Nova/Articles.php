<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

use Alexwenzel\DependencyContainer\HasDependencies;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Marshmallow\Tiptap\Tiptap;

class Articles extends Resource
{
    use HasDependencies;
    public static $group = 'ARTICLES';
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Articles>
     */
    public static $model = \App\Models\Articles::class;

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
        'slug_en'
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
            Image::make('Thumbnail', 'thumb')
                ->path('articles')
                ->rules(['max:2048', 'image'])
                ->help('Support *.png, *.jpg. Maximum size is 2 Mb.')
                ->indexWidth(260),
            Image::make('Image', 'img')
                ->path('articles')
                ->rules(['max:2048', 'image'])
                ->help('Support *.png, *.jpg. Maximum size is 2 Mb.')
                ->hideFromIndex(),
            Text::make('Title (ไทย)', 'title_th')
                ->rules(['required']),
            Text::make('Title (En)', 'title_en')
                ->hideFromIndex(),
            Textarea::make('Caption (ไทย)', 'caption_th')
                ->hideFromIndex(),
            Textarea::make('Caption (En)', 'caption_en')
                ->hideFromIndex(),
            Tiptap::make('Description (ไทย)','desc_th')
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
            Tiptap::make('Description (ไทย)','desc_en')
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
            Text::make('Post Date', function(){
                return $this->display_post_date;
            }),
            Date::make('Post Date', 'post_date')
                ->rules(['required'])
                ->hideFromIndex()
                ->default( now() ),
            Text::make('Period', function(){
                return $this->display_period;
            }),
            Date::make('Display At', 'start_at')
                ->rules(['required'])
                ->default( now() )
                ->hideFromIndex(),
            Date::make('Display End', 'end_at')
                ->hideFromIndex(),
            Boolean::make('Highlight', 'is_highlight'),
            DependencyContainer::make([
                Image::make('Highlight Thumbnail', 'highlight_img')
                    ->path('articles')
                    ->rules(['max:2048', 'image'])
                    ->help('Support *.png, *.jpg. Maximum size is 2 Mb.')
            ])->dependsOn('is_highlight', 1),
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
