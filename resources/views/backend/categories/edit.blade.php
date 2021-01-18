@extends('backend_master');
@section('content');

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard text-center"></i> Edit Category Form</h1>
       
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

        <form action="{{route('categories.update',$category->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
           @method('PUT')
          <div class="form-group">
            <label for='name'>Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameInput" value="{{$category->name}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="photo">Photo</label>
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Progfile</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
               
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <img src="{{asset($category->photo)}}" width="100">
              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                 <input type="file" name="photo"  class="form-control-file  @error('photo') is-invalid @enderror">
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
@section('script')

  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection