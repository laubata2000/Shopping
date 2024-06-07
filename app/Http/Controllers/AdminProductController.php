<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    //
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $productTag;
    private $tag;
    public function __construct(Category $category, Product $product, ProductImage $productImage, ProductTag $productTag, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->tag = $tag;
    }
    public function index()
    {
        // $menus = $this->menu->latest()->paginate(5);
        // return view('admin.menus.index', compact('menus'));
        $products = $this->product->latest()->paginate(5);
        return view('admin.products.index', compact('products'));
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
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
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

            //Insert tags for product
            foreach ($request->tags as $tagItem) {
                //Insert to tags
                $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);

                $tagIds[] = $tagInstance->id;

                // $this->productTag::create([
                //     'product_id' => $product->id,
                //     'tag_id' => $tagInstance->id
                // ]);

            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.products.edit', compact('product', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        // $product = $this->product->find($id);
        // $htmlOption = $this->getCategory($product->category_id);
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            // dd($product);
            //Insert data to product_image
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
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

            //Insert tags for product
            foreach ($request->tags as $tagItem) {
                //Insert to tags
                $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);

                $tagIds[] = $tagInstance->id;

                // $this->productTag::create([
                //     'product_id' => $product->id,
                //     'tag_id' => $tagInstance->id
                // ]);

            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'line: ' . $exception->getLine());
        }
    }
}
