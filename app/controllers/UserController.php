<?php

class UserController extends \BaseController {

	public function __construct(User $user){
		$this->user = $user;
	}

	public function deleteUser()
	{
		$users = User::all();
		return View::make('users.deleteUsers',['users' => $users]);
	}

	public function createUser()
	{
		Return View::make('users.create');
	}

	public function store()
	{
		if(!$this->user->isValid(Input::all())){
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}
		$user = new User();
		$user->name = Input::get('name');
		$user->email = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		Session::flash('message', 'Brugeren blev oprettet!');
		return View::make('shared.entitycreated',['title' => 'Succes', 'message' => 'Brugeren blev oprettet korrekt']);
	}


	public function showUser($id)
	{
		$user = User::find($id);
		return View::make('users/show', ['user' => $user]);
	}

	public function resetUserPassword()
	{
		$users = User::All();
		return View::make('users.resetUserPassword', ['users' => $users]);
	}

	public function update($id)
	{
		$user = User::find($id);
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		Session::flash('message', 'Brugeren blev opdateret!');
		return 'JAAAA';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();
		return Redirect::back();
	}
}