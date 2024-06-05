<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;

class AdminProductController extends Controller
{
    //
    use StorageImageTrait;
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
        $data = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        dd($data);
    }
}
