<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;

class AdminSliderController extends Controller
{
    //
    use StorageImageTrait;
    use DeleteModelTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    //add slider
    public function store(SliderAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataSliderCreate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataUploadFeatureImage)) {
                $dataSliderCreate['image_name'] = $dataUploadFeatureImage['file_name'];
                $dataSliderCreate['image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->slider->create($dataSliderCreate);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    //update slider
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataSliderUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataUploadFeatureImage)) {
                $dataSliderUpdate['image_name'] = $dataUploadFeatureImage['file_name'];
                $dataSliderUpdate['image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->slider->find($id)->update($dataSliderUpdate);
            $slider = $this->slider->find($id);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
        }
    }
    //delete slider
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->slider);
    }
}
