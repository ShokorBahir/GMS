<?php

namespace App\Nova;

use App\Nova\Metrics\StudentFileMetric;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Number;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class StudentFile extends Resource
{

    public static $model = \App\Models\StudentFile::class;


    public static $title = 'year';


    public static $search = [
        'year',
        'department.name',
        'faculty.name'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Student Files');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Student File');
    }
    public function fields(NovaRequest $request)
    {
        return [
            Number::make(trans("Year"), 'year')->min(1250)->max(1550)->rules('required', 'numeric', 'between:1250,1550')->filterable(),
            BelongsTo::make(trans("Faculty"), 'faculty', Faculty::class)->filterable(),
            BelongsTo::make(trans("Department"), 'department', Department::class)->dependsOn(
                ['faculty'],
                function (BelongsTo $field, NovaRequest $request, FormData $formData) {

                    $field->relatableQueryUsing(function (NovaRequest $request, Builder $query) use ($formData) {
                        $query->where('faculty_id', $formData->faculty);
                    });

                }
            )->nullable()->filterable(),
            Boolean::make(trans("Exists"), function () {
                return file_exists(storage_path("app/public/{$this->path}"));
            }),
            File::make(trans("Student File"), 'path')->required()->rules('required', 'file'),


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
            new StudentFileMetric(),
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
