<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;


class CategoryController extends Controller
{
    //create category
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOption'));
    }


    //page index category
    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    //add category
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_replace(' ', '-', $request->name),
        ]);
        return redirect()->route('categorys.index');
    }
    //get category
    public function getCategory($parentId)
    {
        $data = $this->category->all();;
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    //edit category
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    //update category
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_replace(' ', '-', $request->name),
        ]);
        return redirect()->route('categorys.index');
    }
    //delete category
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categorys.index');
    }
}
