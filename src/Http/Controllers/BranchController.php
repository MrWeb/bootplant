<?php

namespace Futurelabs\Bootplant\Http\Controllers;

use App\Http\Controllers\Controller;
use Futurelabs\Bootplant\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::get();
        return response()->json($branches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Bootplant::branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($id)) {
            $branch = new Branch();
            if ($branch) {
                $data = $request->all();
                if ($branch->validate($data)) {
                    $branch->fill($data);
                    $branch->save();
                    $this->metaDefault($branch->id);
                    return response()->json($branch);
                } else {
                    return response()->json(sprintf('Error: %s', $branch->errors()), 422);
                }
            }
        }
        return response()->json(['error' => 'Branch not found'], 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        dd($branch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (isset($id)) {
            $branch = Branch::find($id);
            if ($branch) {
                return response()->json($branch);
            }
        }
        return response()->json(['error' => 'Branch not found'], 422);
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
        if (isset($id)) {
            $branch = Branch::find($id);
            if ($branch) {
                $data = $request->all();
                if ($branch->validate($data)) {
                    $branch->fill($data);
                    $branch->save();
                    return response()->json($branch);
                } else {
                    return response()->json(sprintf('Error: %s', $branch->errors()), 422);
                }
            }
        }
        return response()->json(['error' => 'Branch not found'], 422);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (isset($id)) {
            $branch = Branch::find($id);
            if ($branch) {
                Branch::destroy($id);
                return response()->json(['error' => null], 200);
            }
        }
        return response()->json(['error' => 'Branch not found'], 422);
    }

    private function metaDefault($id)
    {
        foreach (MetaDefault::get() as $meta) {
            $meta['brand_id'] = $id;
            DB::table("meta")->insert(get_object_vars($meta));
        }
    }
}
