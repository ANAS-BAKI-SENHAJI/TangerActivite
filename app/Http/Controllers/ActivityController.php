<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Activity::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = Activity::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'duration_of_activity' => $request->duration_of_activity,
            'min_number_of_people' => $request->min_number_of_people,
            'max_number_of_people' => $request->max_number_of_people,
            'included_equipment' => $request->included_equipment,
            'included_transport' => $request->included_transport,
            'equipments_included' => $request->equipments_included,
            'image' => $request->image
        ]);

        return response()->json([
            'status' => (bool) $activity,
            'data'   => $activity,
            'message' => $activity ? 'Activity Created!' : 'Error Creating Activity'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return response()->json($activity,200);
    }

    public function uploadFile(Request $request)
    {
        if($request->hasFile('image')){
            $name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $name);
        }
        return response()->json(asset("images/$name"),201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $status = $activity->update(
            $request->only(['name', 'price', 'description', 'duration_of_activity', 'min_number_of_people', 'max_number_of_people', 'included_equipment', 'included_transport', 'equipments_included', 'image'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Activity Updated!' : 'Error Updating Activity'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $status = $activity->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Activity Deleted!' : 'Error Deleting Activity'
        ]);
    }
}
