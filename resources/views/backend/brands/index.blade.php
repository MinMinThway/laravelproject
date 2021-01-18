@extends('backend_master');
@section('content');

  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Brands List</h1>
         
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
         <a href="{{route('brands.create')}}" class="btn btn-primary float-right ">Add New Brands</a>
      </div>
   <div class="app-title">
     <table class="table-bordered table-striped text-center" cellpadding="10" width="100%" id="sampleTable">
       <thead>
         <tr>
           <th>#</th>
           <th>Name</th>
           <th>Photo</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
         @foreach($brands as $brand)

            <tr>
              <td>{{$brand->id}}</td>
              <td>{{$brand->name}}</td>
               <td><img src="{{$brand->photo}}" width="150px"></td>
                <td>
            <a href="{{route('brands.edit',$brand->id)}}" style="border-radius: 10px;" class="btn btn-warning btn-sm ">Edit</a>
            <form method="post" action="{{route('brands.destroy',$brand->id)}}" onsubmit="return confirm('Are you sure want to delete ?')" class="d-inline-block">
             @csrf
             @method('DELETE')
             <input type="submit" name="btnsubmit" style="border-radius: 10px;" class="btn btn-danger btn-sm " value="Delete">
            </form>
          </td>
          </tr>


         @endforeach
       </tbody>
     </table>
   </div>
    </main>

@endsection
@section('script')

  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection