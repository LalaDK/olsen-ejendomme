<?php

class ContractController extends \BaseController {

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
	public function create($id)
	{
		$company = Company::with('realestates')->find($id);
		
		foreach ($company->realestates as $realestate)
		{
			$realestate->leases = Lease::with('client_leases')->where('realestate_id', $realestate->id)->get();
			
			foreach ($realestate->leases as $lease) 
			{
				foreach ($lease->client_leases as $client_lease) 
				{
					$client_lease->client = Client::find($client_lease->client_id);
				}
			}
		}
		return View::make('contracts.create',['company' => $company]);
	}


	public function leases(){
		$id = Input::get('id');
		$leases = Lease::where('realestate_id',$id)->get();
		return $leases;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tenant = new Tenant();
		$tenant->lease_id = Input::get('lease_id');
		$tenant->firstname = Input::get('firstname');
		$tenant->lastname = Input::get('lastname');
		$tenant->street_name = Input::get('street_name');
		$tenant->street_number = Input::get('street_number');
		$tenant->zipcode = Input::get('zipcode');
		$tenant->city = Input::get('city');
		$tenant->phone = Input::get('phone');
		$tenant->mobile_phone = Input::get('mobile_phone');
		$tenant->email = Input::get('email');
		$tenant->notes = Input::get('notes');

		$tenant->moving_in = date("Y-m-d", strtotime(Input::get('moving_in')));
		$tenant->moving_out = date("Y-m-d", strtotime(Input::get('moving_out')));
		$tenant->save();
		Session::flash('message', 'Lejeren blev oprettet');
		return $tenant;
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
