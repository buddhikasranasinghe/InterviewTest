<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Interview Test</title>

        {{-- bootstrap cdn --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
            input:focus{
                background-color: blue
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

        <div class="container p-5">

            <div class="row m-2 p-2">
                <div class="d-flex justify-content-between">
                    <div class="float-right">
                        <h1 class="text-white">Edit Product</h1>
                    </div>
                    <div class="float-left">
                        <a href="{{ route('products.index') }}" class="btn btn-primary rounded-3 shadow">Product List</a>
                    </div>
                </div>
            </div>

            <div class="card rounded-3 shadow m-3">
                <div class="card-body">

                    {{-- display error --}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- success message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            <h5>{{ session('success') }}</h5>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            <h5>{{ session('error') }}</h5>
                        </div>
                    @endif

                    {{-- product add form --}}
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row m-3">
                            <div class="col-sm-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required value="{{ $product->name }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" required value="{{ $product->price }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="productimage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="productimage" name="productimage" required>
                            </div>
                        </div>
                        <div class="row m-4">
                            <button class="btn btn-success" type="submit">Update Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </body>
</html>