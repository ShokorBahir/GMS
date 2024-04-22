<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\DepartmentMetric;
use App\Nova\Metrics\FacultyMetric;
use App\Nova\Metrics\StudentFileMetric;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        $year = now();
        return [
            new FacultyMetric(),
            new DepartmentMetric(),
            new StudentFileMetric(),


        ];
    }
    public function name() {
        return __('Dashboard');
    }

}
