<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Crud laravel</title>
    {{-- Boostrap Css CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    {{-- Navbar boostrap --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid" >
                <a class="navbar-brand" href="#">CRUD LARAVEL Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNavDropdown" >
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ url('categories/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('categories/create') }}">create</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                      </a>
                      {{-- dropdown menu --}}
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
    </nav>

    
    
    {{-- section for content --}}
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        @if(session('status'))
                            <div class='alert alert-success'>{{session('status')}}</div>
                        @endif
                        <h4>
                            Edite Category
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('categories/'.$category->id.'/edit') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">Name : </label>
                                <input type="text" class='form-control' name='name' value='{{ $category->name }}'>
                                @error('name') <span class='text-danger'>{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Description : </label>
                                <input type="text" class='form-control' name='description' value='{{ $category->description }}'>
                                @error('description') <span class='text-danger'>{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Is Active : </label>
                                <input type="checkbox"  name='is_active' {{ $category->is_active == true ? 'checked' : '' }} />
                                @error('is_active') <span class='text-danger'>{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" value='Update' class='btn btn-primary'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Boostrap Js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>