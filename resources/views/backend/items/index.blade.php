@extends('backend_master');
@section('content');



  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Item ist</h1>

          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
         <a href="{{route('items.create')}}" class="btn btn-primary float-right ">Add New Itemcategory</a>
      </div>


     <div class="app-title">

        <table class="table-bordered text-cente table-striped" cellpadding="10" width="100%" id="sampleTable">
        <thead>
          <tr>
            <td>#</td>
            <td>Name</td>
            <td>Photo</td>
            <td>Codeno</td>
            <td>Price</td>
            <td>Discount</td>
            <td>Description</td>
            <td>Brand_Name</td>
            <td>Subcategory_Name</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          @php $i=1 @endphp
         @foreach($items as $item)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$item->name}}</td>
          <td><img src="{{$item->photo}}" width="100"></td>
          <td>{{$item->codeno}}</td>
          <td>{{$item->price}}</td>
          <td>{{$item->discount}}</td>
          <td>{{$item->description}}</td>
          <td>{{$item->brand->name}}</td>
           <td>{{$item->subcategory->name}}</td>
         
          <td>
            <a href="{{route('items.edit',$item->id)}}" class="btn btn-warning btn-sm">Edit</a>
           <form method="post" action="{{route('items.destroy',$item->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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