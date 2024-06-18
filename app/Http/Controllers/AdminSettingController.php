<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
// use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    //
    //create setting
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function create()
    {
        //    $htmlOption = $this->getCategory($parentId = '');
        //    return view('admin.category.add', compact('htmlOption'));
        return view('admin.settings.add');
    }


    //page index category
    public function index()
    {
        //    $categories = $this->category->latest()->paginate(5);
        //    return view('admin.category.index', compact('categories'));
        return view('admin.settings.index');
    }
    //add category
    public function store(SettingAddRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value

        ]);
        return redirect()->route('setting.index');
    }
    //    //get category
    //    public function getCategory($parentId)
    //    {
    //        $data = $this->category->all();;
    //        $recusive = new Recusive($data);
    //        $htmlOption = $recusive->categoryRecusive($parentId);
    //        return $htmlOption;
    //    }
    //    //edit category
    //    public function edit($id)
    //    {
    //        $category = $this->category->find($id);
    //        $htmlOption = $this->getCategory($category->parent_id);
    //        return view('admin.category.edit', compact('category', 'htmlOption'));
    //    }

    //    //update category
    //    public function update($id, Request $request)
    //    {
    //        $this->category->find($id)->update([
    //            'name' => $request->name,
    //            'parent_id' => $request->parent_id,
    //            'slug' => str_replace(' ', '-', $request->name),
    //        ]);
    //        return redirect()->route('categorys.index');
    //    }
    //    //delete category
    //    public function delete($id)
    //    {
    //        try {
    //            $this->category->find($id)->delete();
    //            return response()->json([
    //                'code' => 200,
    //                'message' => 'success'
    //            ], status: 200);
    //            //code...
    //        } catch (\Exception $exception) {
    //            //throw $th;
    //            Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
    //            return response()->json([
    //                'code' => 500,
    //                'message' => 'fail'
    //            ], status: 500);
    //        }
    //    }
}
