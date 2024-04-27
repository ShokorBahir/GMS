<?php

namespace App\Nova;

use App\Nova\Metrics\FacultyMetric;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasManyThrough;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Faculty extends Resource
{
    public static $model = \App\Models\Faculty::class;
    public static $title = 'name';
    public static $search = [
        'name',
        'code',
        'user.name'
    ];
    public static function label()
    {
        return __('Faculties');
    }
    public static function singularLabel()
    {
        return __('Faculty');
    }
    public function fields(NovaRequest $request)
    {
        return [
            // BelongsTo::make(trans("User"), 'user', User::class)->nullable()->showCreateRelationButton(),
            Text::make(trans("Name"), 'name')->required()
                ->creationRules('required', 'unique:faculties,name')
                ->updateRules('required', 'unique:faculties,name,{{resourceId}}'),
            Text::make(trans("Code"), 'code')
                ->creationRules('required', 'unique:faculties,code')
                ->updateRules('required', 'unique:faculties,code,{{resourceId}}'),

            HasMany::make(trans("Departments"), 'departments', Department::class),
            HasMany::make(trans('Student Files'),'student_files',StudentFile::class),

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
        return [
            new FacultyMetric(),
        ];
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
