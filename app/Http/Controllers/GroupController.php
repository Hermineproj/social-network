<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Group::latest()->paginate(5);
        return view('groups.groups', compact($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('groups.creategroup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
        $this->validate($request, [
            'grouptitle'=>'required|unique:groups,name|min:3',
            'groupdesc'=>'required',
            'conf'=>'required',
            'visibility'=>'required',
            'image'=>'required|file|mimes:jpg,jpeg,png,gif'
        ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fileName = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $image->move('./upload/group/', $fileName);}
            //dump($request->all());
            $gr=new Group();
            $gr->name = $request->grouptitle;
            $gr->description = $request->groupdesc;
            $gr->status = $request->conf;
            $gr->visibility = $request->visibility;
            $gr->image = $fileName;
            $gr->created_by = Auth::user()->id;
            $gr->save();
            return back()->with('success', 'Group added success!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
