<?php

class WaitingListController extends \BaseController {


	public function store()
	{
		$newEntry = new Wait_List_Entry();

		$inputClientId = Input::get('clientId');
		$inputCompanyId = Input::get('companyId');

		$newEntry->client = Client::find($inputClientId);
		$newEntry->company = Company::find($inputCompanyId);

		if($newEntry->client == null || $newEntry->company == null) {
			Session::flash('message', 'Forkerte parametre!');
			return Redirect::back();
		}
		else {
			$newEntry->save();
			Session::flash('message', 'Brugeren blev tilføjet på ventelisten.');
			return Redirect::back();
		}		
	}


	public function destroy()
	{
		$waitListEntry = Wait_List_Entry::find(Input::get('id'));
		$client = Client::find($waitListEntry->id);

		$waitListEntry->delete();
	}
}