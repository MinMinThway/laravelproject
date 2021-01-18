@extends('backend_master');
@section('content');

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard text-center"></i> Create Category Form</h1>
       
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item d-inline-block"><a href="#">Categories</a></li>
         <a href="{{route('categories.index')}}" class="btn btn-warning ml-3" >Back</a>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

        <form action="{{route('categories.store')}}" method="POST"  enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for='name'>Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameInput" value="{{old('name')}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo"  class="form-control-file  @error('photo') is-invalid @enderror">
             @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
       <div class="form-group">
            <input type="submit" name="btn-submit" value="Save" class="btn btn-primary">
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