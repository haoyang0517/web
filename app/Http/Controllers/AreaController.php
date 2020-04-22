<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Member;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $areas = Area::where('area_id', null)->get();

      return view('areas.index', ['areas'=>$areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $area = new Area();
        $area->fill($request->all());
        $area->saveOrFail();

        return redirect('/areas')->with('success', 'Area successfully created');

    }
    public function storeChildArea(Request $request, $id)
    {

      $area = new Area();
      $area->name = $request->name;
      $area->area_id = $id;
      $area->saveOrFail();
      $areas = Area::where('area_id', $id)->get();
      $parent = Area::find($id);
      return view('areas.show',['areas'=>$areas, 'parent'=>$parent, 'members'=>[]])->with('success', 'Area successfully created');

    }

    public function storeMember(Request $request, $id)
    {

      $member = Member::where('email', $request->email)->first();
      if($member!=null){
        $member->area_id = $id;
        $member->save();

        $members = Area::find($id)->members;
        $parent = Area::find($id);

        return view('areas.show',['members'=>$members, 'parent'=>$parent, 'areas'=>[]])->with('success', 'Member successfully created');
      }else{
        $members = Area::find($id)->members;
        $parent = Area::find($id);
        return view('areas.show',['members'=>$members, 'parent'=>$parent, 'areas'=>[]]);
        //echo "error";
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areas = Area::where('area_id', $id)->get();
        $members = Area::find($id)->members;
        $parent = Area::find($id);
        return view('areas.show',['areas'=>$areas, 'members'=>$members, 'parent'=>$parent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $area = Area::find($id);
      $area->fill($request->all());
      $area->save();
      $parentID = $area->area_id;
      if($parentID == null){
        $areas = Area::where('area_id', null)->get();
        return view('areas.index', ['areas'=>$areas]);
      }else{
        $parent = Area::find($parentID);
        $areas = Area::where('area_id', $parentID)->get();
        return view('areas.show',['areas'=>$areas, 'parent'=>$parent])->with('success', 'Data successfully updated');
      }

    }
    public function removeMember($id)
    {
      /*
      $member = Member::find($id);
      $member->area_id = null;
      $member->save();
      */
      echo "test";
      return view('test');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //check whether got sub area or not, if yes cannot delete.
        $checkSubArea = Area::where('area_id',$id)->get();
        $checkMember = Area::find($id)->members;
        if (sizeof($checkSubArea)!=0 || sizeof($checkMember)!=0){
            return redirect('/areas')->with('success','FAIL! Area data cannot be delete! There has data inside!!');
        }else{
            $area = Area::find($id);
            $area->delete();
            $areas = Area::where('area_id', null)->get();
            return redirect('/areas')->with('success','Area data has been deleted');

        }
    }
}
