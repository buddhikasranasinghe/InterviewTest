<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Interview Test</title>

        {{-- bootsrap cdn --}}
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

        {{-- login form --}}
        <div class="row justify-content-center mr-0 my-auto p-5">
            <div class="col-4 mt-5 ">
                
                <div class="card rounded-3 bg-transparent border border-light">
                    <div class="card-body p-5">

                        <div class="text-center">
                            <h1 class="text-white">Sign In</h1>
                        </div>

                        {{-- display errors --}}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger bg-transparent">
                                <ul>
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger bg-transparent">
                                <h6>{{ session('error') }}</h6>
                            </div>
                        @endif

                        {{-- form --}}
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label text-white">Email address</label>
                                <input type="email" class="form-control text-white bg-transparent rounded-5" id="email" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label text-white">Password</label>
                                <input type="password" class="form-control text-white bg-transparent rounded-5" id="pwd" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning rounded-4 shadow-sm w-100 mt-3">Sign In</button>
                            </div>
                        </form>

                    </div>

                </div>
                
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </body>
</html>