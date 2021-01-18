@extends('backend_master');
@section('content');

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard text-center"></i> Edit Subcategory Form</h1>
       
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item d-inline-block"><a href="#">Subcategories</a></li>
         <a href="{{route('subcategories.index')}}" class="btn btn-warning ml-3" >Back</a>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

        <form action="{{route('subcategories.update',$subcategory->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
           @method('PUT')
          <div class="form-group">
            <label for='name'>Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameInput" value="{{$subcategory->name}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group row">
                                    
                  <label for='category_id'>Category_id</label>
                    <select class="form-control" name="category_id">
                              @foreach($categories as $category)
                               <option value="{{$category->id}}">{{$category->name}}</option>   
                         
                        @endforeach
                     
                    </select>
                
         </div>
         
       <div class="form-group">
            <input type="submit" name="btn-submit" value="Update" class="btn btn-primary">
       </div>
        </form>
     </div>
        </div>
      </div>   
    </div>    
  </main>
@endsection
@section('script')

  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection