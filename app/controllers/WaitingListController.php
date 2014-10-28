<?php

class WaitingListController extends \BaseController {


	public function store()
	{
		$newEntry = new Wait_List_Entry();

		$newEntry->client_id = Input::get('clientId');
		$newEntry->company_id = Input::get('companyId');

		if($newEntry->client_id == null || $newEntry->company_id == null) {
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
		$waitListEntry->delete();
	}
}