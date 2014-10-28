<?php

class UserController extends \BaseController {

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
		$user = new User();
		$user->name = Input::get('name');
		$user->email = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		Session::flash('message', 'Brugeren blev oprettet!');
		return View::make('shared.entitycreated',['title' => 'Succes', 'message' => 'Selskabet blev oprettet korrekt']);
		return Redirect::to('users/create');
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