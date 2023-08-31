
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
 
 @include('index')
 <div class="container mt-2">
 
    <div class="table-responsive">
      <div class="mb-2">
        <a href="{{url('/')}}/register"><button class="btn btn-success">Add New Record</button></a> 
        <a href="{{url('customer/trash')}}"><button class="btn btn-primary">Go To Trash</button></a> 
      </div>
        <table class="table table-primary">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                  <tr class="text-center">
                    <td scope="row">{{$customer['customer_id']}}</td>
                    <td scope="row">{{$customer['name']}}</td>
                    <td scope="row">{{$customer['email']}}</td>
                    <td scope="row">{{$customer['password']}}</td>                  
                    <td scope="row">{{$customer['created_at']}}</td>                  
                    <td scope="row">{{$customer['updated_at']}}</td>                  
                    <td scope="row"><a href="{{url('/customer/delete')}}/{{$customer['customer_id']}}"><button class="btn btn-danger">Trash</button></a> <a href="{{route('customer.edit',['id'=>$customer->customer_id])}}"><button class="btn btn-primary">Edit</button></td></a> 
                </tr>  
                @endforeach
                
            </tbody>
        </table>
    </div>
    
 </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>