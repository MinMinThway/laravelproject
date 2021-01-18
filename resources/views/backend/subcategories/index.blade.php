@extends('backend_master');
@section('content');



  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Category ist</h1>

          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
         <a href="{{route('subcategories.create')}}" class="btn btn-primary float-right ">Add New subcategory</a>
      </div>


     <div class="app-title">

        <table class="table-bordered text-cente table-striped" cellpadding="10" width="100%" id="sampleTable">
        <thead>
          <tr>
            <td>#</td>
            <td>Name</td>
            <td>Category_Id</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          @php $i=1 @endphp
         @foreach($subcategories as $subcategory)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$subcategory->name}}</td>
          <td>
          		{{$subcategory->category->name}}
   
          </td>
          <td>
            <a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning btn-sm">Edit</a>
           <form method="post" action="{{route('subcategories.destroy',$subcategory->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
              @csrf
              @method('DELETE')
            <input type="submit" name="btnsubmit" class="btn btn-danger btn-sm" value="Delete">
            </form>
            
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
     </div>
      
    </main>


@section('script')

  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection
@endsection