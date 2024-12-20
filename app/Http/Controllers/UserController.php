<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $this->authorize("admin" , User::class);
        $Users = User::all();
        return view('users.index', compact("Users"));
    }


    public function create()
    {
        $this->authorize("admin" , User::class);
        return view('users.create');
    }


    public function store(Request $request){
        $this->authorize("admin" , User::class);
        if($request->is_admin)
        $is_admin=true;
        else
        $is_admin=false;
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'is_admin'=>$is_admin,
            'password' => Hash::make("$request->password"),
        ]);
        return redirect()->route("Users.index");
    }


    public function edit(User $User)
     {
        $this->authorize("admin" , User::class);
        return view('users.edit', compact("User"));
    }

    public function update(Request $request, User $User)
{
    $this->authorize("admin" , User::class);
        $User->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make("$request->password"),
        ]);




    return redirect()->route("Users.index");

    }
    public function destroy(User $User)
    {
        $this->authorize("admin" , User::class);
        $User->delete();
        return redirect()->route("Users.index");
    }
}
