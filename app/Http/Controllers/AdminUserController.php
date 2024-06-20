<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->latest()->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.users.add', compact('roles'));
    }

    // //add user
    public function store(AdminUserRequest $request)
    {

        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
        }
    }

    //edit user
    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('admin.users.edit', compact('user'));
    }
    //update user
    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $dataUserUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ];

            $this->user->find($id)->update($dataUserUpdate);
            $user = $this->user->find($id);


            //Insert role for user
            foreach ($request->role_id as $roleItem) {
                //Insert to roles
                $roleInstance = $this->role->firstOrCreate(['name' => $roleItem]);
                $roleIds[] = $roleInstance->id;
            }
            $user->roles()->sync($roleIds);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
        }
    }

    //delete user
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
}
