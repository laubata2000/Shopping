@extends('layouts.admin')

@section('title')
<title>Quản lý Bình luận/Đánh giá Sản phẩm</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Bình luận/Đánh giá', 'key' => 'Danh sách'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('product-review.create') }}" class="btn btn-success float-right m-2">Thêm mới bình luận/đánh giá</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Người dùng</th>
                                <th scope="col">Đánh giá</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                            <tr>
                                <th scope="row">{{ $review->id }}</th>
                                <td>{{ $review->product->name }}</td>
                                <td>{{ $review->user->name }}</td>
                                <td>{{ $review->rating }}/5</td>
                                <td>{{ $review->title }}</td>
                                <td>{{ Str::limit($review->review_text, 50) }}</td>
                                <td>
                                    <a href="{{ route('product-review.show', $review->id) }}" class="btn btn-info btn-sm">Xem</a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('Bạn có chắc muốn xóa đánh giá này?')) document.getElementById('delete-form-{{ $review->id }}').submit();">Xóa</a>
                                    <form id="delete-form-{{ $review->id }}" action="{{ route('product-review.delete', $review->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection