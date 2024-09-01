@extends('layouts.admin')

@section('title')
<title>Thêm mới Bình luận/Đánh giá Sản phẩm</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Bình luận/Đánh giá', 'key' => 'Thêm mới'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('product-review.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">Người dùng</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="">Chọn người dùng</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_id">Sản phẩm</label>
                            <select class="form-control" id="product_id" name="product_id" required>
                                <option value="">Chọn sản phẩm</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rating">Đánh giá</label>
                            <select class="form-control" id="rating" name="rating" required>
                                <option value="">Chọn đánh giá</option>
                                <option value="1">1 sao</option>
                                <option value="2">2 sao</option>
                                <option value="3">3 sao</option>
                                <option value="4">4 sao</option>
                                <option value="5">5 sao</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="review_text">Nội dung đánh giá</label>
                            <textarea class="form-control" id="review_text" name="review_text" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="images">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                            <div id="image-preview" class="mt-3 d-flex flex-wrap">
                                <!-- Preview images will be displayed here -->
                                <div id="selected-images" class="d-flex flex-wrap">
                                    <!-- Các hình ảnh đã chọn sẽ được hiển thị ở đây -->
                                </div>
                                <script>
                                    document.getElementById('images').addEventListener('change', function(event) {
                                        var output = document.getElementById('selected-images');
                                        output.innerHTML = ''; // Clear previous previews
                                        for (var i = 0; i < event.target.files.length; i++) {
                                            var file = event.target.files[i];
                                            if (!file.type.startsWith('image/')) {
                                                continue
                                            }
                                            var img = document.createElement('img');
                                            img.classList.add('img-thumbnail', 'm-1');
                                            img.file = file;
                                            img.style.width = '100px';
                                            img.style.height = '100px';
                                            img.style.objectFit = 'cover';
                                            output.appendChild(img);
                                            var reader = new FileReader();
                                            reader.onload = (function(aImg) {
                                                return function(e) {
                                                    aImg.src = e.target.result;
                                                };
                                            })(img);
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                </script>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Thêm đánh giá</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // Bạn có thể thêm JavaScript ở đây nếu cần
</script>
@endsection