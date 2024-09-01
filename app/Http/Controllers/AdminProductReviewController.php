<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class AdminProductReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductReview::with('product', 'user')->latest()->paginate(10);
        return view('admin.product-reviews.index', compact('reviews'));
    }
    public function create()
    {
        $products = \App\Models\Product::all();
        $users = \App\Models\User::all();
        return view('admin.product-reviews.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'review_text' => 'required|string',
        ]);

        ProductReview::create($validatedData);

        return redirect()->route('product-review.index')
            ->with('success', 'Đánh giá sản phẩm đã được tạo thành công.');
    }

    public function show($id)
    {
        $review = ProductReview::with('product', 'user')->findOrFail($id);
        return view('admin.product-reviews.show', compact('review'));
    }

    public function updateStatus(Request $request, $id)
    {
        $review = ProductReview::findOrFail($id);
        $review->status = $request->status;
        $review->save();

        return redirect()->route('product-review.show', $id)
            ->with('success', 'Trạng thái đánh giá đã được cập nhật thành công.');
    }

    public function delete($id)
    {
        $review = ProductReview::findOrFail($id);
        $review->delete();

        return redirect()->route('product-review.index')
            ->with('success', 'Đánh giá đã được xóa thành công.');
    }
}
