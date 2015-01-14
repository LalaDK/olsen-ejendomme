<?php

class TenantController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$companies = Company::with('realestates','wait_list_entry')->get();
		foreach ($companies as $company)
		{
			foreach ($company->realestates as $realestate)
			{
				$realestate->leases = Lease::with('contracts')->where('realestate_id', $realestate->id)->get();
				
				foreach ($realestate->leases as $lease) 
				{
					foreach ($lease->contracts as $contract) 
					{
						$contract->client = Client::find($contract->client_id);
					}
				}
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
		$company = Company::find($id);
		return View::make('tenants.create',['company' => $company]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$client = new Client();
		$client->company_id = Input::get('company_id');

		$client->firstname = Input::get('firstname');
		$client->lastname = Input::get('lastname');
		$client->street_name = Input::get('street_name');
		$client->street_number = Input::get('street_number');
		$client->zipcode = Input::get('zipcode');
		$client->city = Input::get('city');
		$client->phone = Input::get('phone');
		$client->mobile_phone = Input::get('mobile_phone');
		$client->email = Input::get('email');
		$client->notes = Input::get('notes');
		$client->save();

		$newEntry = new WaitingList();

		$newEntry->client_id = $client->id;
		$newEntry->company_id = Input::get('company_id');;
		$newEntry->save();
		Session::flash('message', 'Lejeren blev oprettet');
		return View::make('shared.entitycreated',['title' => 'Succes', 'message' => 'Personen blev tilføjet ventelisten korrekt']);

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
