<?php

namespace App\Nova;

use App\Nova\Metrics\DepartmentMetric;
use App\Nova\Metrics\FacultyMetric;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Department extends Resource
{
    public static $model = \App\Models\Department::class;
    public static $title = 'name';
    public static $search = [
        'id','name','code',
    ];
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Departments');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Department');
    }

    public function fields(NovaRequest $request)
    {
        return [
            BelongsTo::make(trans("Faculty"),'faculty',Faculty::class)->showCreateRelationButton(),
            Text::make(trans("Name"),'name')->required()->creationRules('required','unique:departments,name')->updateRules('required','unique:departments,name,{{recourceId}}'),
            Text::make(trans("Code"),'code')->required()->creationRules('required','unique:departments,code')->updateRules('required','unique:departments,code,{{recourceId}}'),
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
            new DepartmentMetric(),

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
