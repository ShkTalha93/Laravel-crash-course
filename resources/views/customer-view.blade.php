<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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
        <div class='row m-2 '>
         <form action='' class='col-9 '>
            <div class="form-group">             
              <input type="search" name="search" id="" placeholder="search by name or email" class="form-control" value="{{$search}}">
            </div>
            <button class="btn btn-primary">Search</button> 
            <a href="{{url('customer')}}">
            <button class="btn btn-primary" type='button'>Reset</button> 
</a>
         </form>
         <div class='col-3'>
         <a href="{{route('customer.create')}}">
         <button class="btn btn-primary d-inline-block m-2 float-right" > Add </button>
               </a>
         <a href="{{url('customer/trash')}}">
         <button class="btn btn-danger d-inline-block m-2 float-right" > Go To Trash </button>
         </a>
         </div> 
        </div>
        <table class="table">
        <thead>
            <tr>
                <th>Sr.</th>
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
            @php $i=1 @endphp
            <tr>
               @foreach ($customers as $customer)
                <td>{{$i}}</td>
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
                    <a href='{{route('customer.delete',['id'=>$customer->customer_id])}}'>
                    <button class="btn btn-danger">Trash</button>
</a>
                     <a href='{{route('customer.edit',['id'=>$customer->customer_id])}}'>
                     <button class="btn btn-primary">Edit</button>
</a>
                   
                </td>
                
            </tr>
            @php 
            $i++
             @endphp
            @endforeach
        </tbody>
    </table>
    <div class="row">
    {{$customers->links()}}
      </div>
    </div>
    
    </body>
</html>