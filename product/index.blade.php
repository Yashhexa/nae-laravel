@extends('layouts.admin')

@section('template_title')
    Product
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <section class="fw-lighter">
        <div class="container mb-3">
            <div class="row mt-4">

                <div class="col-md-6">
                    <form method="GET" action="{{ route('list') }}">
                        @csrf <label for="keyword">Search by Part # or Keyword: </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ Request::get('keyword') }}" name="keyword"
                                placeholder="Part # or Keyword:" aria-label="Part # or Keyword:"
                                aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><button type="submit"
                                class="btn btn-success">Search <i class="bi bi-search"></i></button></span>
                        </div>



                    </form>
                </div>



                <div class="col-md-6">
                    <form method="GET" action="{{ route('list') }}">
                        <label for="keyword">Search by Category: </label>
                        <div class="input-group mb-3">
                        <select name="cat_id" class="form-control">
                            <option value="">--Select a Category--</option>
                            @php
                                $cat_id = Request::get('cat_id');
                            @endphp
                            @foreach ($categories as $category)
                                @if ($category->id == $cat_id)
                                    <option value="{{ $category->name }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <span class="input-group-text" id="basic-addon2"><button type="submit"
                            class="btn btn-success">Search <i class="bi bi-search"></i></button></span>
                        </div>
                   
                    </form>
                </div>

            </div>

        </div>
        </div>

    </section>
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Product') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('enclosures.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="bi bi-database-add"></i> Add new product
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>SKU</th>
                                        <th>Image</th>

                                        <th>Name</th>
                                        <th>Status</th>

                                        <th>Color</th>
                                        <th>Material</th>
                                        <th>Distributor Price</th>

                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->sku }}</td>
                                            <td><img src="{{ $product->image_url }}" class="img-fluid" width="200" />
                                            </td>

                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->status }}</td>
                                            <td>{{ $product->color }}</td>
                                            <td>{{ $product->material }}</td>
                                            <td>{{ $product->distributor_price }}</td>


                                            <td>{{ $product->status }}</td>


                                            <td>
                                                <form action="{{ route('enclosures.destroy', $product->id) }}"
                                                    onsubmit="return confirm('Are you sure you want to delete this product?');" method="POST">
                                                    <div class="input-group">
                                                        <a class="btn btn-sm btn-primary"
                                                            href="/enclosures/{{ $product->url_key }}" target="_blank"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('View') }}</a>

                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('enclosures.edit', $product->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row p-5"> {{ $products->links('vendor.pagination.keyword') }} </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection
