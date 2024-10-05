@extends('admin.master')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class='w-100 d-flex justify-content-between'>
                            <h5 class="card-title">Orders</h5>
                            {{-- <a href="{{ route('admin-products-create') }}" class='btn btn-dark'>Create Product</a> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="border-2 border-bottom border-primary border-0">
                                        <th scope="col" class="ps-0">Id</th>
                                        <th scope="col" class="ps-0">firstname</th>
                                        <th scope="col" class="text-center">email</th>
                                        <th scope="col" class="text-center">contact</th>
                                        <th scope="col" class="text-center">total</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row" class="ps-0 fw-medium">
                                                <span class="table-link1 text-truncate d-block">{{ $order->id }}</span>
                                            </th>
                                            <td>{{ $order->firstname }}</td>
                                            <td>
                                                {{ $order->email }}
                                                {{-- <img style='width: 100px;'
                                                    src="{{ asset('uploads/products/' . $product->image) }}" alt=""> --}}
                                            </td>
                                            <td class="text-center fw-medium">{{ $order->contact }}</td>
                                            <td class="text-center fw-medium">{{ $order->total }}</td>
                                            <td class="text-center fw-medium">
                                                {{-- <a class='btn btn-warning'
                                                    href="{{ route('admin-products-edit-form', $product->id) }}">Edit</a> --}}
                                                <a class='btn btn-danger' {{-- href="{{ route('admin-products-destroy', $product->id) }}">Completed</a> --}}
                                                    href="{{ route('admin-remove-order', $order->id) }}">Completed</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
