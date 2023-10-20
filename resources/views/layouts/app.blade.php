<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <!--CDN mdbootstrap-->
      <link  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
    
</head>
<body class="bg-white text-black">
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
        @php $locale = session()->get('locale'); @endphp
        <a class="navbar-brand" href="{{route('welcome')}}">@lang('lang.text_hello')  @if(Auth::check()) {{Auth::user()->name}} @else Guest @endif</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mt-3 mb-3">
            @guest
                <a class="nav-link text-warning" href="{{route('registration')}}">@lang('lang.text_registration')</a>
                <a class="nav-link text-warning" href="{{route('login')}}">Login</a>
                
            @else
                <a class="nav-link text-warning" href="{{route('articles.index')}}">Articles</a>
                <a class="nav-link text-warning" href="{{route('user.list')}}">@lang('lang.text_users')</a>
                <a class="nav-link text-warning" href="{{route('articles.create')}}">@lang('lang.text_create')</a>
                <a class="nav-link text-warning" href="{{route('logout')}}">Logout</a>
            @endguest

                <a class="nav-link @if($locale == 'fr') text-info @endif" href="{{route('lang', 'fr')}}">Fr<i class="flag flag-france"></i></a>
                <a class="nav-link @if($locale == 'en') text-info @endif" href="{{route('lang', 'en')}}">En<i class="flag flag-united-kingdom"></i></a>
        </div>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="row">
           <div class="col-12 text-center">
                <h1 class="display-6 mt-5">
                    @yield('titleHeader')
                </h1>
                <div class="row justify-content-center">
            <div class="col-6">
            <!-- succees global -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Erreurs global -->
                @if(!$errors->isEmpty())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
           </div>
        </div>
     @yield('content')
    </div>
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>