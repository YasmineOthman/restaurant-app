<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('jobvacancy.create',['restaurants' => $restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title'                     => 'required|min:4|max:255',
            'description'              => 'required|min:4',
            'end_of_vacancy'            =>'required|date',
            'restaurant_id'            => 'required|numeric|exists:restaurants,id',


        ]);
        $jobVacancy = new JobVacancy();
        $jobVacancy->title = $request->title;
        $jobVacancy->description= $request->description;
        $jobVacancy->slug = Str::slug($request->title, '-');
        $jobVacancy->end_of_vacancy = $request->end_of_vacancy;
        $jobVacancy->restaurant_id = $request->restaurant_id;
        $end_of_vacancy->save();
        return redirect()->route('jobvacancies.show', $jobVacancy);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function show(JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobVacancy $jobVacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobVacancy  $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobVacancy $jobVacancy)
    {
        //
    }
}
