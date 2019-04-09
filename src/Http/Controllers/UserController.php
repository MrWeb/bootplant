<?php

namespace Futurelabs\Bootplant\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bootplant::admin.user.index')->with(['table' => 'users']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Auth::user()->branches()->get();
        return view('bootplant::admin.user.edit')->with(compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->branch_id     = $request->branch_id;
        $user->name          = $request->name;
        $user->lastname      = $request->lastname;
        $user->email         = $request->email;
        $user->internal_code = $request->internal_code;
        $user->password      = bcrypt($request->email);

        $user->save();
        $user->assignRole($request->role);

        return redirect('users?n=saved');
    }

    /**
     * Reset Password = email
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passwordreset(Request $request)
    {
        $user           = User::find($request->user['id']);
        $user->password = bcrypt($user->email);
        $user->save();

        return response()->json(true);
    }

    /**
     * Reset Password = email
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passwordupdate(Request $request)
    {
        $user = User::find($request->user_id);

        //Vecchia password corretta
        if (Hash::check($request->current, $user->password)) {
            $user->password = bcrypt($request->new);
            $user->save();
            return redirect('users/' . $user->id . '/edit?n=pswupdated');
        } else {
            return redirect('users/' . $user->id . '/edit?n=errpswupdate');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::where('id', $user)->with('roles')->first();
        //Non può edit Andy Lombardi
        if ($user->id == 1 && Auth::id() != 1) {
            return back();
        }

        //Se non è admin/superadmin non può edit altri
        if (Auth::user()->hasRole('agente') && $user->id != Auth::id()) {
            return back();
        }

        $branches = Auth::user()->branches()->get();
        return view('bootplant::admin.user.edit')->with(compact('user', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        // $user->branch_id     = $request->branch_id;
        // $user->name          = $request->name;
        // $user->lastname      = $request->lastname;
        // $user->email         = $request->email;
        // $user->internal_code = $request->internal_code;

        $user->save();

        if (Auth::user()->can('edit users')) {
            $user->syncRoles($request->role);
            return redirect('users/?n=updated');
        }

        return redirect('dashboard/?n=updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == 1) {
            return back();
        }
        return response()->json($user->delete());
    }
}
