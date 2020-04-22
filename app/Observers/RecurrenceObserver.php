<?php

namespace App\Observers;

use App\Activity;
use Carbon\Carbon;

class RecurrenceObserver
{
    /**
     *
     *
     * @param  \App\Activity  $activity
     * @return void
     */
    public function created(Activity $activity)
    {
        if(!$activity->activity()->exists())
        {
            $recurrences = [
                'daily'     => [
                    'times'     => 365,
                    'function'  => 'addDay'
                ],
                'weekly'    => [
                    'times'     => 52,
                    'function'  => 'addWeek'
                ],
                'monthly'    => [
                    'times'     => 12,
                    'function'  => 'addMonth'
                ]
            ];
            $startTime = Carbon::parse($activity->start_time);

            $recurrence = $recurrences[$activity->recurrence] ?? null;

            if($recurrence)
                for($i = 0; $i < $recurrence['times']; $i++)
                {
                    $startTime->{$recurrence['function']}();
                    $activity->activities()->create([
                        'name'          => $activity->name,
                        'start_time'    => $startTime,
                        'recurrence'    => $activity->recurrence,
                        'info'          => $activity->info,
                        'venue'         => $activity->venue,
                        'area_id'       => $activity->area_id
                    ]);
                }
        }
    }

    /**
     * Handle the activity "updated" event.
     *
     * @param  \App\Activity  $activity
     * @return void
     */
    public function updated(Activity $activity)
    {
        if($activity->activities()->exists() || $activity->activity)
        {
            $startTime = Carbon::parse($activity->getOriginal('start_time'))->diffInSeconds($activity->start_time, false);
            if($activity->activity)
                $childActivities = $activity->activity->activities()->whereDate('start_time', '>', $activity->getOriginal('start_time'))->get();
            else
                $childActivities = $activity->activities;

            foreach($childActivities as $childActivity)
            {
                if($startTime)
                    $childActivity->start_time = Carbon::parse($childActivity->start_time)->addSeconds($startTime);
                if($activity->isDirty('name') && $childActivity->name == $activity->getOriginal('name'))
                    $childActivity->name = $activity->name;
                $childActivity->saveQuietly();
            }
        }

        if($activity->isDirty('recurrence') && $activity->recurrence != 'none')
            self::created($activity);
    }

    /**
     * Handle the Activity "deleted" event.
     *
     * @param  \App\Activity  $activity
     * @return void
     */
    public function deleted(Activity $activity)
    {
        if($activity->activities()->exists())
            $activities = $activity->activities()->pluck('id');
        else if($activity->activity)
            $activities = $activity->activity->activities()->whereDate('start_time', '>', $activity->start_time)->pluck('id');
        else
            $activities = [];

            Activity::whereIn('id', $activities)->delete();
    }
}
