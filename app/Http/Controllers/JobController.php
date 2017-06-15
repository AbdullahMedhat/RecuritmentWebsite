<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Job;
use View;
use Validator;
Use Redirect;
use Session;
use HTML;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the jpbs
        $jobs = Job::all();

        // load the view and pass the jobs
        return View::make('jobs.index')
            ->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form jobs/create.blade.php
        return View::make('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'title'       => 'required',
            'description'       => 'required',
            'company'       => 'required',
            'job_type'       => 'required',
            'experience' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('jobs/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $job = new Job;
            $job->title            = Input::get('title');
            $job->description      = Input::get('description');
            $job->company          = Input::get('company');
            $job->job_type          = Input::get('job_type');            
            $job->experience       = Input::get('experience');
            $job->save();

            // redirect
            Session::flash('message', 'Successfully created job!');
            return Redirect::to('jobs');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the job
        $job = Job::find($id);

        // show the view and pass the job to it
        return View::make('jobs.show')
            ->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // get the job
        $job = Job::find($id);

        // show the edit form and pass the job
        return View::make('jobs.edit')
            ->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $rules = array(
            'title'       => 'required',
            'description'       => 'required',
            'company'       => 'required',
            'job_type'       => 'required',
            'experience' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('jobs/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $job = new Job;
            $job->title            = Input::get('title');
            $job->description      = Input::get('description');
            $job->company          = Input::get('company');
            $job->job_type          = Input::get('job_type');            
            $job->experience       = Input::get('experience');
            $job->save();

            // redirect
            Session::flash('message', 'Successfully created job!');
            return Redirect::to('jobs');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $job = Job::find($id);
        $job->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the job!');
        return Redirect::to('jobs');
    }
}
