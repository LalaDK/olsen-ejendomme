<?php

class TenantController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$companies = Company::with('realestates')->get();
		foreach ($companies as $company)
		{
			foreach ($company->realestates as $realestate)
			{
				$realestate->leases = Lease::with('tenant')->where('realestate_id', $realestate->id)->get();
				
			}
		}
		return View::make('tenants.index',['companies' => $companies]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$companies = Company::with('realestates')->get();
		foreach ($companies as $company)
		{
			foreach ($company->realestates as $realestate)
			{
				$realestate->leases = Lease::with('tenant')->where('realestate_id', $realestate->id)->get();
				
			}
		}
		return $id;
		return View::make('tenants.create',['companies' => $companies]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tenant = new Tenant();
		$tenant->firstname = Input::get('firstname');
		$tenant->lastname = Input::get('lasttname');
		$tenant->street_name = Input::get('street_name');
		$tenant->street_number = Input::get('street_number');
		$tenant->zipcode = Input::get('zipcode');
		$tenant->city = Input::get('city');
		$tenant->phone = Input::get('phone');
		$tenant->mobile_phone = Input::get('mobile_phone');
		$tenant->email = Input::get('email');
		$tenant->notes = Input::get('notes');
		$tenant->moving_in = Input::get('moving_in');
		$tenant->moving_out = Input::get('moving_out');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
