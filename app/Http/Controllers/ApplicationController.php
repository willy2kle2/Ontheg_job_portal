<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Illuminate\Validation\Rule;

use Inertia\Inertia;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Apply/Index', [
            'filters' => Request::all('search', 'trashed'),
            'applications' => Auth::user()->account->applications()
               //  ->with('guest')
               // ->with('reservation_status')
                ->orderByName()
                ->filter(Request::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($application) => [
                    'id' => $application->id,
                    'first_name' => $application->first_name,
                    'last_name' => $application->last_name,
                    'email' => $application->email,
                    'phone' => $application->phone,
                    'position' => $application->position,
                    'qualification' => $application->qualification,
                    'location' => $application->country,
                   // 'Reservation_status' => $reservation->reservation_status ? $reservation->reservation_status->only('status_name', 'id') : null,
                ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Apply/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $email = Request::input('qualification');
        
     //   dd($email);

       // $first_name =  Request::input('still_with_them');

      //  dd($first_name);
        
        Application::create(
            Request::validate([
                'first_name' => ['required', 'max:100'],
                'last_name' => ['required', 'max:100'],
                'other_name' => ['required', 'max:100'],
                'email' => ['required', 'max:50', 'email'],
                'phone' => ['required', 'max:12'],
                'gender' => ['required', 'max:10'],
                'birth_date' => ['required', 'max:50'],
                'marital_status' => ['required', 'max:50'],
                'nation' => ['required', 'max:200'],
                'origin' => ['required', 'max:200'],
                'residence' => ['required', 'max:200'],
                'city' => ['required', 'max:200'],
                'country' => ['Required', 'max:200'],
                'skills' => ['required', 'max:200'],
                'institution' => ['required', 'max:200'],
              'start_date' => ['required', 'max:25'],
                'end_date' => ['required', 'max:25'],
              'qualification' => ['required', 'max:200'],
                'nysc' => ['required', 'max:5'],
                'company_name' => ['required', 'max:100'],
                'company_address' => ['required', 'max:200'],
                'empsdate' => ['nullable', 'max:25'],
                'empedate' => ['nullable', 'max:25'],
                'position_held' => ['nullable', 'max:25'],
                'department' => ['nullable', 'max:200'],
                'salary' => ['nullable', 'max:25'],
                'still_with_them' => ['nullable', 'max:25'],
                'why_not' => ['nullable', 'max:500'],
                'salary' => ['nullable', 'max:25'],  
                'position' => ['nullable', 'max:200'],

            ])
        );
        
        
                

        return Redirect::route('done')->with('success', 'Application Submited.');
    }


    public function done()
    {
        return Inertia::render('Apply/done');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        return Inertia::render('Apply/Edit', [
            'application' => [
                    'id' => $application->id,
                    'first_name' => $application->first_name,
                    'last_name' => $application->last_name,
                    'email' => $application->email,
                    'phone' => $application->phone,
                    'position' => $application->position,
                    'qualification' => $application->qualification,
                    'location' => $application->country,
                    'other_name' => $application->other_name,
                    'gender' => $application->gender,
                    'birth_date' => $application->birth_date,
                    'marital_status' => $application->marital_status,
                    'origin' => $application->origin,
                    'residence' => $application->residence,
                    'city' => $application->city,
                    'skills' => $application->skills,
                    'institution' => $application->institution,
                    'nysc' => $application->nysc,
                    'company_name' => $application->company_name,
                    'position_held' => $application->position_held,
               
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplicationRequest  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

   

    public function reject(Request $request, $id)
    {
 
        $affected = DB::table('applications')
              ->where('id', $id)
              ->update(['status' => "rejected"]);
        return Redirect::back()->with('success', 'Application Rejected.');
    } 


    public function accept(Request $request, $id)
    {
 
        $affected = DB::table('applications')
              ->where('id', $id)
              ->update(['status' => "accepted"]);
        return Redirect::back()->with('success', 'Application Accepted.');
    } 
}
