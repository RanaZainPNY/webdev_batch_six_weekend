@extends('admin.master')

@section('content')
    {{-- @php dump($product) @endphp --}}
    <div class="container">
        <div class="row d-flex justify-content-center g-0">

            <div class="col-md-10 d-flex justify-content-end">
                {{-- <a href="{{route('admin-products-index')}}" class="btn my-2" --}}
                <a href="" class="btn my-2" style="background-color: #0D6EFD;color: white;">Back</a>
            </div>

            <div class="col-md-10 border">
                <div class="card border-0" style="background-color: #0D6EFD;color: white;">
                    <div class="card-header">
                        <h3 class="text-white">Edit Product</h3>
                    </div>
                </div>

                {{-- <form enctype='multipart/form-data' action="{{ route('admin-products-store') }}" method="post"> --}}
                <form enctype='multipart/form-data' action="{{ route('admin-products-update', $product->id) }}"
                    method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label h5" for="name">Name</label>
                            <input value="{{ $product->name }}" type="text" name="name" id="name"
                                placeholder="Enter your Name" class="form-control form-control-lg">
                        </div>

                        <div class="mb-3">
                            <label for="sku" class="form-label h5">SKU</label>
                            <input value="{{ $product->sku }}" type="text" name="sku" id="sku"
                                class="form-control form-control-lg" placeholder="Enter SKU">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label h5">Price</label>
                            <input value="{{ $product->price }}" placeholder="Enter Price" type="text" name="price"
                                id="price" class=" form-control form-control-lg">
                        </div>

                        <div class="mb-3">
                            <label for="Description" class="form-label h5">Description</label>
                            <textarea placeholder="Enter description" cols="30" rows="5" name="description" id="description"
                                class="form-control form-control-lg">{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label h5">Image</label>
                            <input type="file" name="image" id="image" class="form-control form-control-lg">
                        </div>
                        {{-- @if ($product->image != '')
                            <img src="{{}}" alt="">
                        @endif --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection()
