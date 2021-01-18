@extends('backend_master');
@section('content');

  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Edite Brands FORM</h1>
         
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
           
        <form action="{{route('brands.update',$brand->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
           @method('PUT')
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$brand->name}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                  <label for="photo">Photo</label>
                <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Profile</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Profile</a>
                
              </div>

                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <img src="{{asset($brand->photo)}}" width="100">
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                     <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>

                </div>
              
               
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