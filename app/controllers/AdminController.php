<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$companies = Company::all();
		return View::make('dashboard.index',['companies' => $companies]);
	}


}
