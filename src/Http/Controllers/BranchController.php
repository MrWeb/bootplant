<?php

namespace Futurelabs\Bootplant\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Futurelabs\Bootplant\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:edit users']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Auth::user()->branches();
        if ($branches->count() == 1) {
            return redirect('branches/' . $branches->first()->id . '/edit');
        }
        return view('bootplant::admin.branch.index')->with(['table' => 'branches']);
    }

    public function mybranch()
    {
        $branch = Auth::user()->branch()->first();
        return redirect('branches/' . $branch->id . '/edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bootplant::admin.branch.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = new Branch;

        $branch->name     = $request->name;
        $branch->address  = $request->address;
        $branch->zip      = $request->zip;
        $branch->city     = $request->city;
        $branch->district = $request->district;
        $branch->phone    = $request->phone;
        $branch->PIVA     = $request->PIVA;
        $branch->CF       = $request->CF;
        $branch->website  = $request->website;

        $branch->save();

        return redirect('branches?n=saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('bootplant::admin.branch.edit')->with(compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->name     = $request->name;
        $branch->address  = $request->address;
        $branch->zip      = $request->zip;
        $branch->city     = $request->city;
        $branch->district = $request->district;
        $branch->phone    = $request->phone;
        $branch->PIVA     = $request->PIVA;
        $branch->CF       = $request->CF;
        $branch->website  = $request->website;

        $branch->save();

        return redirect('branches/' . $branch->id . '/edit?n=saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (isset($id)) {
        //     $branch = Branch::find($id);
        //     if ($branch) {
        //         Branch::destroy($id);
        //         return response()->json(['error' => null], 200);
        //     }
        // }
        // return response()->json(['error' => 'Branch not found'], 422);
    }

    private function metaDefault($id)
    {
        foreach (MetaDefault::get() as $meta) {
            $meta['brand_id'] = $id;
            DB::table("meta")->insert(get_object_vars($meta));
        }
    }
}
