<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    //
    //create setting
    use DeleteModelTrait;
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
        $settings = $this->setting->latest()->paginate(5);
        //    return view('admin.category.index', compact('categories'));
        return view('admin.settings.index', compact('settings'));
    }
    //add category
    public function store(SettingAddRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type

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
    //edit settings
    public function edit($id)
    {

        $setting = $this->setting->find($id);
        return view('admin.settings.edit', compact('setting'));
    }

    //update settings
    public function update($id, Request $request)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);
        return redirect()->route('setting.index');
    }
    //delete settings
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }
}
