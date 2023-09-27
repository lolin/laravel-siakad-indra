<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users= DB::table('users')
                ->when($request->input('name'), function ($query, $search) {
                    return $query->where('name', 'like', '%'.$search.'%');
                })
                ->select('id','name','email','address','phone', DB::raw('DATE_FORMAT(created_at, "%d %M %Y") as created_at'))
                ->paginate(10);
        return view('pages.users.index',['users'=>$users]);
    }

    public function create(){
        return view('pages.users.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'roles'=>$request->roles,
        ]);

        return redirect(route('user.index'))->with('success','Data berhasil ditambahkan');
    }

    public function edit(User $user){
        return view('pages.users.edit',['user'=>$user]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validate=$request->validated();
        $user->update($validate);
        return redirect(route('user.index'))->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('user.index'))->with('success','Data berhasil dihapus');
    }
}
