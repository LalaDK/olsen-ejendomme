<?php

class CompanyController extends \BaseController {

protected $company;

public function __construct(Company $company){
$this->company = $company;
}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$companies = $this->company->with('realestates')->get();
		return View::make('dashboard.index', compact('companies'));
	}

		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
		public function create()
		{
			return View::make('companies.create');
		}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!$this->company->isValid(Input::all())){
			return Redirect::back()->withInput()->withErrors($this->company->$errors);
		}
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

	/**
	 * Show the form for deleting a company
	 *
	 * @return Response
	 */
	public function deleteindex(){
		$companies = $this->company->with('realestates')->get();
		return View::make('companies.deleteindex', compact('companies'));
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
			$company = Company::find($id);
			$company->realestates()->delete();
			$company->delete();
		}
		return ;
	}
}
