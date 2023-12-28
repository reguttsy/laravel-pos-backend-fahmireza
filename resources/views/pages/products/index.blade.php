@extends('layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Product</h1>
                <div class="section-header-button">
                    <a href="{{ route('products.create') }}"
                        class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">All Posts</div>
                </div>
            </div>
            <div class="section-body">
            <div class"row">
                    <div class"col-12">
                    @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Product</h2>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Product</h4>
                            </div>
                            <div class="card-body">
                               <!-- <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>-->
                                <div class="float-right">
                                    <form method="GET" action="{{ route('products.index') }}">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Photo</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @php $no = 1; @endphp
                                        @foreach ($products as $product )


                                        <tr>

                                            <td>{{ $no++ }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->price}}</td>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/products/'.$product->image) }}" alt=""
                                                        width="100px" class="img-thumbnail">
                                                        @else
                                                        <span class="badge badge-danger">No Image</span>

                                                @endif

                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                <a href="{{ route('products.edit',$product->id) }}" class="btn btn-sm btn-info btn-icon">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                                </a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                    class="ml-2">
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <input type="hidden" name="_token"
                                                        value="{{ csrf_token() }}"/>
                                                <button class="btn btn-sm btn-danger btn-icon confirm delete">
                                                    <i class="fas fa-times"></i>
                                                    delete
                                                </button>
                                                </form>
                                                </div>


                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-rigt">
                                    {{ $products->withQueryString()->links() }}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
