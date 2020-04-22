<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Area;
class ActivityController extends Controller
{
    //
    public function index()
    {
      $activities = Activity::withCount('activities')
      ->orderBy('id', 'asc')
      ->get();

      return view('activities.index', compact('activities'));
    }

    public function create()
    {
      $areas = Area::all()->pluck('name', 'id')->prepend('--Please Select--', '');

      return view('activities.create', compact('areas'));
    }

    public function store(Request $request)
    {
        Activity::create($request->all());

        return redirect()->route('activities.index');
    }
    public function show(Activity $activity)
    {
      $activity->load('area');

      return view('activities.show', compact('activity'));
    }
    public function edit(Activity $activity)
    {
        $areas = Area::all()->pluck('name', 'id')->prepend('Please Select', '');

        $activity->load('area');
        return view('activities.edit', compact('areas', 'activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        //
        $activity->update($request->all());
        return redirect()->route('activities.index');
    }


    public function destroy(Activity $activity)
    {
        $activity->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Activity::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
