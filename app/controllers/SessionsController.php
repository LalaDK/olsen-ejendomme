<?php

class SessionsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$companies = Company::All();
		$result = [];
		foreach($companies as $company) {
			$result[$company->id] = $company->name;
		}
		return View::make('sessions.create')->with('companies', $result);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Auth::attempt(Input::only('email','password')))
		{
			Auth::user();
			return Redirect::route('company.dashboard');
		}

		Session::flash('message', "Brugernavn og/eller kodeord er forkert!");
		return Redirect::back();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return "Logged out!";
	}


}
