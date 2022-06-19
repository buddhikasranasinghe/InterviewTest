<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Interview Test</title>

        {{-- boostsrap style cdn --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        {{-- boostrap icon cdn --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <style>
            body{
                background-image: url('{{ asset('Images/Site/landingpage.jpg') }}');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% auto ;
            }
            .row{
                margin-right: calc(0 * var(--bs-gutter-x));
            }
        </style>
    </head>
    <body>
        
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Food Items</a>
            </div>
        </nav>

        <div class="container">

            <div class="row m-2 p-2">
                <div class="d-flex justify-content-between">
                    <div class="float-right">
                        <h1 class="text-white">Product List</h1>
                    </div>
                    <div class="float-left">
                        <a href="{{ route('products.create') }}" class="btn btn-primary rounded-3 shadow">Add Product</a>
                    </div>
                </div>
            </div>

            <div class="row justify-items-center">
                @if(count($products) <= 0)
                    <div class="alert alert-info">
                        <h5>Nothing Products to Display</h5>
                    </div>
                @else
                    @foreach($products as $product)
                        <div class="col-sm-3 mt-3">
                            <div class="card shadow">
                                <img src="{{ asset('Images/Items/'.$product->image) }}" class="card-img-top" alt="Product Image" style="height: 200px; width:auto; overflow: hidden;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ ucfirst($product->name) }}</h5>
                                    <h5>Rs. {{ $product->price }}</h5>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <div class="d-inline">
                                                @if ($product->status == 1)
                                                    <h5 class="text-white bg-success rounded p-2">Active</h5>
                                                @else
                                                    <h5 class="text-white bg-danger rounded p-2">Inactive</h5>
                                                @endif
                                            </div>
                                            <div class="d-inline">
                                                <form action="{{ route('changestatus', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-warning mx-2" type="submit">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="d-flex float-left">
                                            <div class="d-inline">
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary" type="button">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </div>
                                            <div class="d-inline ml-2">
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" id="delete-product-{{ $product->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="button" onclick="deleteproduct({{ $product->id }})">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script>
            function deleteproduct(id){
                if (confirm("Are You Sure want to remove Product ?")) {
                    var formelement = 'delete-product-'+id;
                    document.getElementById(formelement).submit();
                }else{
                    event.preventDefault();
                }
            }
        </script>

    </body>
</html>