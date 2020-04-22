<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
class CalendarController extends Controller
{
    //
    public $sources = [
        [
            'model'      => '\\App\\Activity',
            'date_field' => 'start_time',
            'field'      => 'name',
            'prefix'     => 'Activity:',
            'suffix'     => '',
            'route'      => 'activities.edit',
        ],

    ];
    public function index()
    {
        $activities = [];

        $areas = Area::all();

        foreach ($this->sources as $source) {
            $calendarActivities = $source['model']::when(request('area_id') && $source['model'] == '\App\Activity', function($query) {
                return $query->where('area_id', request('area_id'));
            })->get();
            foreach ($calendarActivities as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $activities[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('home', compact('activities', 'areas'));
    }
}
