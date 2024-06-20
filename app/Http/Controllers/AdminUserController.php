<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
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
        // return view('menus.add');
        // $htmlOption = $this->getMenu($parentId = '');
        // return view('admin.menus.add', compact('htmlOption'));
        $roles = $this->role->all();
        return view('admin.users.add', compact('roles'));
    }

    // //add category
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

    // public function getMenu($parentId)
    // {
    //     $data = $this->menu->all();;
    //     $recusive = new MenuRecusive($data);
    //     $htmlOption = $recusive->menuRecusive($parentId);
    //     return $htmlOption;
    // }

    //edit menu
    public function edit($id)
    {
        // $menu = $this->menu->find($id);
        // $htmlOption = $this->getMenu($menu->parent_id);
        // return view('admin.menus.edit', compact('menu', 'htmlOption'));
    }
    // //update menu
    // public function update($id, Request $request)
    // {
    //     $this->menu->find($id)->update([
    //         'name' => $request->name,
    //         'parent_id' => $request->parent_id,
    //         'slug' => str_replace(' ', '-', $request->name),
    //     ]);
    //     return redirect()->route('menus.index');
    // }

    //delete menu
    public function delete($id)
    {
        // return $this->deleteModelTrait($id, $this->menu);
    }
}
