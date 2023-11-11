<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bulk Email</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>



    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Bulk Email</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto form-inline">
                        {{-- <li class="nav-item active">
                          <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="#">Import Email</a>
                          </li>

                          <li class="nav-item active">
                            <a class="nav-link" href="#">Sent History </a>
                          </li> --}}
                       
                      </ul>
                      <form class="form-inline my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto form-inline">
                            <li class="nav-item active">
                              <a class="nav-link" href="{{ url('/home') }}">Dashboard <span class="sr-only">(current)</span></a>
                            </li>
    
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('emails') }}">Import Email</a>
                              </li>
    
                              <li class="nav-item active">
                                <a class="nav-link" href="{{ url('sent-history') }}">Sent History </a>
                              </li>

                              <li class="nav-item active">
                                <a class="nav-link" href="{{ url('users') }}">Users </a>
                              </li>

                              <li class="nav-item active">
                                <a class="nav-link" href="{{ url('compose') }}">Compose </a>
                              </li>

                              <li class="nav-item active">
                                <a class="nav-link" href="#">Logout </a>
                              </li>
                           
                          </ul>
                      </form>
                    </div>
                  </nav>
            </div>
        </div>
    </div>
    

    <div class="container mt-5">
        
        @yield('content')
            
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>