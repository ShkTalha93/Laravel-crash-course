<!doctype html>
<html lang="en">
  <head>
    <title>Trash</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class='container-fluid bg-dark'>
    <div class='container'>
     <nav class="navbar navbar-expand-sm  ">
        <a class="navbar-brand" href="#" style="color:white">
      @if(session()->has('user-name') )
      {{session()->get('user-name')}} 
      @else
      Guest
      @endif
    </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/')}}" style="color:white">Home </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/register')}}" style="color:white">Register</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/customer')}}" style="color:white">Customer </a>
                </li>
               
            </ul>
            
        </div>
    
     </nav>
</div> 
</div>
    <div class='container'>
          <a href="{{url('customer')}}">
        <button class="btn btn-success d-inline-block m-2 float-right" > Customer View </button>
</a>
        <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>State</th>
                <th>Country</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               @foreach ($customers as $customer)
                <td>{{$customer->user_name}}</td>
                <td>{{$customer->email}}</td>
                <td>
                    @if($customer->gender=='M')
                    Male
                    @elseif($customer->gender=="F")
                    Female
                    @else
                    Other
                    @endif

                </td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->state}}</td>
                <td>{{$customer->country}}</td>
                <td>
                    @if($customer->status=="1")
                <a href=''>
                    <span class="badge badge-success">Active</span>
</a>
                    @else
                    <a href=''>
                    <span class="badge badge-danger"> InActive</span>
</a>
                   
                    @endif
                </td>
                <td>
                    <a href='{{route('customer.forceDelete',['id'=>$customer->customer_id])}}'>
                    <button class="btn btn-danger">Delete</button>
</a>
                     <a href='{{route('customer.restore',['id'=>$customer->customer_id])}}'>
                     <button class="btn btn-primary">Restore</button>
</a>
                   
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <pre>
        <!-- {{print_r($customers->toArray())}}? -->
</pre>
    </div>
    </body>
</html>