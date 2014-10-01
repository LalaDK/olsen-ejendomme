<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$companies = Company::with('realestates')->get();

		return View::make('dashboard.index', compact('companies'));
	}


}
