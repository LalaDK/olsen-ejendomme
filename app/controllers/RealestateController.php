<?php

class RealestateController extends \BaseController {



		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
		public function create()
		{
			$companies = Company::all()->lists('name','id');
			return View::make('realestates.create', compact('companies'));
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
		$realestate->company_id = Input::get('company');
		$realestate->save();
		Session::flash('message', 'Ejendommen blev oprettet');
		return View::make('shared.entitycreated',['title' => 'Succes', 'message' => 'Ejendommen blev oprettet korrekt']);
		
	}

	/**
	 * Show the form for deleting a company
	 *
	 * @return Response
	 */
	public function deleteindex(){
		$realestates = Realestate::all();
		return View::make('realestates.deleteindex', compact('realestates'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$ids = Input::get('ids');
		foreach ($ids as $id) {
			$realestate = Realestate::find($id);
			$realestate->delete();
		}
		return ;
	}
}
