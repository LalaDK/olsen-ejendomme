<?php

class RealestateController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		Return View::make('realestates.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// var_dump(Input::All());

		$realestate = new Realestate();
		$realestate->street_name = Input::get('street_name');
		$realestate->street_number = Input::get('street_number');
		$realestate->zip_code = Input::get('zip_code');
		$realestate->city = Input::get('city');
		$realestate->leases = Input::get('leases');
		$realestate->build_date = Input::get('build_date');
		$realestate->outer_sqm = Input::get('outer_sqm');
		$realestate->inner_sqm = Input::get('inner_sqm');
		$realestate->ground_area = Input::get('ground_area');
		$realestate->purchase_value = Input::get('purchase_value');
		$realestate->save();
		Session::flash('message', 'Ejendommen blev oprettet');
		return Redirect::route('company.dashboard');
	}


}
