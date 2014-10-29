<?php

class ContractController extends \BaseController {

	protected $contract;
	protected $client;

	public function __construct(Contract $contract, Client $client){
		$this->contract = $contract;
		$this->client = $client;
	}

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
		$company = Company::with('wait_list_entry')->find($id);
		
		foreach ($company->wait_list_entry as $list_item)
		{
			$list_item->client = Client::find($list_item->client_id);
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
		$createType=Input::get('newTenant');
		$client = new Client();
		if(!$this->contract->isValid(Input::all())){
			return Redirect::back()->withInput()->withErrors($this->contract->errors);
		}
		if($createType == 'true'){
			if(!$this->client->isValid(Input::all())){
				return Redirect::back()->withInput()->withErrors($this->client->errors);
			}
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
		} else {
			if(Input::get('waitinglist_id') == 0){
				return Redirect::back()->withInput()->withErrors(array('waiting_list'=>'Der skal vælges en klient fra ventelisten'));;
			} else {				
				$wait_list_entry = Contract::find(Input::get('waitinglist_id'));
				$client = Client::find($wait_list_entry->client_id);
				$wait_list_entry->delete();
			}
		}

		$contract = new Contract();
		$contract->moving_in = date("Y-m-d", strtotime(Input::get('moving_in')));
		$contract->moving_out = date("Y-m-d", strtotime(Input::get('moving_out')));
		$contract->client_id = $client->id;
		$contract->lease_id = Input::get('lease_id');
		$contract->save();
		Session::flash('message', 'Lejeren blev oprettet');
		return View::make('shared.entitycreated',['title' => 'Succes', 'message' => 'Kontrakten blev oprettet korrekt']);
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
