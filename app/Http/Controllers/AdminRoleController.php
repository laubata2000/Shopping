<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    //

    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function index()
    {
        $roles = $this->role->latest()->paginate(5);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        // $roles = $this->role->all();
        // return view('admin.users.add', compact('roles'));
    }

    // //add user
    public function store(Request $request)
    {

        // try {
        //     DB::beginTransaction();
        //     $user = $this->user->create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $request->password,
        //     ]);
        //     $roleIds = $request->role_id;
        //     $user->roles()->attach($roleIds);
        //     DB::commit();
        //     return redirect()->route('user.index');
        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
        // }
    }

    //edit user
    public function edit($id)
    {
        // $user = $this->user->find($id);
        // return view('admin.users.edit', compact('user'));
    }
    //update user
    public function update($id, Request $request)
    {
        // try {
        //     DB::beginTransaction();
        //     $dataUserUpdate = [
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $request->password,
        //     ];

        //     $this->user->find($id)->update($dataUserUpdate);
        //     $user = $this->user->find($id);


        //     //Insert role for user
        //     foreach ($request->role_id as $roleItem) {
        //         //Insert to roles
        //         $roleInstance = $this->role->firstOrCreate(['name' => $roleItem]);
        //         $roleIds[] = $roleInstance->id;
        //     }
        //     $user->roles()->sync($roleIds);
        //     DB::commit();
        //     return redirect()->route('user.index');
        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
        // }
    }

    //delete user
    public function delete($id)
    {
        // return $this->deleteModelTrait($id, $this->user);
    }
}
