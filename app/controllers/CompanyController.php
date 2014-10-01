<?php

class CompanyController extends \BaseController {

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

		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		Return View::make('companies.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// var_dump(Input::All());

		$company = new Company();
		$company->name = Input::get('name');
		$company->address = Input::get('address');
		$company->phonenumber = Input::get('phonenumber');
		$company->registration_number = Input::get('registration_number');
		$company->vat_number = Input::get('vat_number');
		$company->save();
		Session::flash('message', 'Selskabet blev oprettet!');
		return Redirect::route('company.dashboard');
	}

	public function deleteform(){

	}
}
