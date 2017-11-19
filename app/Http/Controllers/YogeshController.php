<?php

namespace App\Http\Controllers;

use App\Yogesh;
use Illuminate\Http\Request;
use App\Http\Requests;


class YogeshController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id = null) {
    if ($id == null) {
      return Yogesh::all();
    } else {
      return $this->show($id);
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $yogesh = new Yogesh();
    $yogesh->name = $request->input('name');
    $yogesh->age = $request->input('age');
    $yogesh->address = $request->input('address');
    $yogesh->gender = $request->input('gender');
    $yogesh->save();

    return 'Yogesh record successfully created with id ' . $yogesh->id;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Yogesh $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    return Yogesh::find($id);

  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \App\Yogesh $yogesh
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $yogesh = Yogesh::find($id);
    $yogesh->name = $request->input('name');
    $yogesh->age = $request->input('age');
    $yogesh->address = $request->input('address');
    $yogesh->gender = $request->input('gender');
    $yogesh->save();

    return "Sucess updating user #" . $yogesh->id;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Request $request
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $yogesh = Yogesh::find($id);

    $yogesh->delete();

    return "Yogesh record successfully deleted #" . $id;
  }
}
