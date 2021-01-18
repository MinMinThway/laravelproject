@extends('backend_master');
@section('content');

  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Create Brands FORM</h1>
         
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Brands</a></li>
        </ul>
         <a href="{{route('brands.index')}}" class="btn btn-primary float-right ">Back</a>
      </div>
     <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <form action="{{route('brands.store')}}" method="POST"  enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                @csrf
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror">
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