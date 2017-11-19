<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;




class UserController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $user = User::all();
    return view('User.index', ['user' => $user]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('User.create1');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required'

    ]);

    User::create($request->all());

    return back()->with('success', 'Thanks for contacting us!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\User $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $user = User::find($id);
    return view('User.show', ['user' => $user]);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $user = User::find($id);
    return view('User.edit', ['user' => $user]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \App\User $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    // validate
    // read more on validation at http://laravel.com/docs/validation
    $rules = array(
      'name'       => 'required',
      'email'      => 'required|email|unique:users,email,'.$id
    );
    $validator = Validator::make(Input::all(), $rules);
    /*$validator = $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email'
    ]);*/

    // process the login
    if ($validator->fails()) {
      return Redirect::to('User/' . $id . '/edit')
        ->withErrors($validator)
        ->withInput(Input::except('password'));
    } else {
      // store
      $user = User::find($id);
      $user->name       = Input::get('name');
      $user->email      = Input::get('email');
      $user->save();

      // redirect
      Session::flash('message', 'Successfully updated nerd!');
      return Redirect::to('User');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $user = User::find($id);
    $user->delete();

    // redirect
    Session::flash('message', 'Successfully deleted the nerd!');
    return Redirect::to('User');

  }
}
