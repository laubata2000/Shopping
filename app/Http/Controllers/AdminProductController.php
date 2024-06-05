<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    //
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        // $menus = $this->menu->latest()->paginate(5);
        // return view('admin.menus.index', compact('menus'));

        return view('admin.products.index');
    }

    public function create()
    {
        // return view('menus.add');
        // $htmlOption = $this->getMenu($parentId = '');
        // return view('admin.menus.add', compact('htmlOption'));
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.products.add', compact('htmlOption'));
    }

    //get category
    public function getCategory($parentId)
    {
        $data = $this->category->all();;
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    //add products
    public function store(Request $request)
    {
        // $this->menu->create([
        //     'name' => $request->name,
        //     'parent_id' => $request->parent_id,
        //     'slug' => str_replace(' ', '-', $request->name),
        // ]);
        // return redirect()->route('menus.index');
        $path = $request->file('feature_image_path')->store('product');
    }
}
