@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Product</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Product</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                      </div>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control select2" id="" >
                        <option value="">select</option>
                        @foreach ($categories as $category)
                            <option @selected($product->category_id === $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                </div>

                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" id="">{!! $product->short_description !!}</textarea>
                </div>

                <div class="form-group">
                    <label>Show at Home</label>
                    <select name="show_at_home" class="form-control" id="">
                        <option @selected($product->show_at_home === 1) value="1">Yes</option>
                        <option @selected($product->show_at_home === 0) value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option @selected($product->status === 1) value="1">Active</option>
                        <option @selected($product->status === 0) value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.image-preview').css({
                'background-image': 'url({{ asset($product->thumb_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        })
    </script>
@endpush