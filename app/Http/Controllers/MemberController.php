<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth:member-api');
    }
    public function index()
    {
      echo "test index member";

      return Member::all();
    }
    public function store(Request $request)
    {
      echo "test post member";
      $member = new Member();
      $member->fill($request->all());
      $member->save();
    }
    public function show($id)
    {
      $member = Member::find($id);
      $member->fill($request->all());
      $member->save();
    }
    public function destroy($id)
    {

    }
    public function removeMember($id)
    {
      echo "test";
      //return redirect()->back();

    }
}
