<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;

class AdminSliderController extends Controller
{
    //
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        // $menus = $this->menu->latest()->paginate(5);
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        // return view('menus.add');
        // $htmlOption = $this->getMenu($parentId = '');
        // return view('admin.menus.add', compact('htmlOption'));
        return view('admin.slider.add');
    }

    //add slider
    public function store(SliderAddRequest $request)
    {
        // $this->menu->create([
        //     'name' => $request->name,
        //     'parent_id' => $request->parent_id,
        //     'slug' => str_replace(' ', '-', $request->name),
        // ]);
        // return redirect()->route('menus.index');
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
            // dd($product);
            //Insert data to product_image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                    // $productImage = $this->productImage->create([
                    //     'product_id' => $product->id,
                    //     'image_path' => $dataProductImageDetail['file_path'],
                    //     'image_name' => $dataProductImageDetail['file_name']
                    // ]);

                }
            };

            DB::commit();
            return redirect()->route('slider.index');
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

    // //edit menu
    // public function edit($id)
    // {
    //     $menu = $this->menu->find($id);
    //     $htmlOption = $this->getMenu($menu->parent_id);
    //     return view('admin.menus.edit', compact('menu', 'htmlOption'));
    // }
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

    // //delete menu
    // public function delete($id)
    // {
    //     try {
    //         $this->menu->find($id)->delete();
    //         return response()->json([
    //             'code' => 200,
    //             'message' => 'success'
    //         ], status: 200);
    //         //code...
    //     } catch (\Exception $exception) {
    //         //throw $th;
    //         Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
    //         return response()->json([
    //             'code' => 500,
    //             'message' => 'fail'
    //         ], status: 500);
    //     }
    // }
}
