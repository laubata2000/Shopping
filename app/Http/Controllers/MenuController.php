<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Components\Recusive;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    private $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
    public function index()
    {
        $menus = $this->menu->latest()->paginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        // return view('menus.add');
        $htmlOption = $this->getMenu($parentId = '');
        return view('admin.menus.add', compact('htmlOption'));
    }

    //add category
    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_replace(' ', '-', $request->name),
        ]);
        return redirect()->route('menus.index');
    }

    public function getMenu($parentId)
    {
        $data = $this->menu->all();;
        $recusive = new MenuRecusive($data);
        $htmlOption = $recusive->menuRecusive($parentId);
        return $htmlOption;
    }

    //edit menu
    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $htmlOption = $this->getMenu($menu->parent_id);
        return view('admin.menus.edit', compact('menu', 'htmlOption'));
    }
    //update menu
    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_replace(' ', '-', $request->name),
        ]);
        return redirect()->route('menus.index');
    }

    //delete menu
    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
