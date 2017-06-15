<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Application;
use View;
use Validator;
Use Redirect;
use Session;
use HTML;
use DB;
use Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        // get all the applcations for user
        $userId = Auth::id()
        $applications = DB::table('applications')->where('user_id', $userId);

    }

    public function create()
    {
        //
        return View::make('applications.create');
    }

    public function store(Request $request)
    {
            $application = new Application;
            $application->user_id            = $userId = Auth::id();
            $application->job_id             = Input::get('id');
            $application->comment            = Input::get('comment');
            $application->save();

            // redirect
            Session::flash('message', 'Successfully submit for the job!');
            return Redirect::to('/jobs');

    }
    public function destroy($id)
    {
        //
    }
}
