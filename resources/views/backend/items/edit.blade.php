@extends('backend_master');
@section('content');

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard text-center"></i> Edit Items Form</h1>
       
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item d-inline-block"><a href="#">Item</a></li>
         <a href="{{route('items.index')}}" class="btn btn-warning ml-3" >Back</a>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

        <form action="{{route('items.update',$item->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
           @method('PUT')
          <div class="form-group">
            <label for='name'>Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameInput" value="{{$item->name}}">
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
                  <img src="{{asset($item->photo)}}" width="100">
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
            <label for='codeno'>Codeno</label>
            <input type="text" name="codeno" class="form-control @error('codeno') is-invalid @enderror" id="nameInput" value="{{$item->codeno}}">
            @error('codeno')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for='price'>Price</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="nameInput" value="{{$item->price}}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for='discount'>Discount</label>
            <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="nameInput" value="{{$item->discount}}">
            @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
           <div class="form-group">
            <label for='description'>Description</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="nameInput" value="{{$item->description}}">
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
           <div class="form-group">
            <label for='brand_id'>Brand_id</label>
                    <select class="form-control"  name="brand_id">
                          
                           @foreach($brands as $brand)
                               <option value="{{$brand->id}}">{{$brand->name}}</option>   
                         
                        @endforeach   
                                  
                     
                    </select>

          </div>
         <div class="form-group">
            <label for='subcategory_id'>Subcategory_id</label>
                    <select class="form-control" name="subcategory_id">
                        @foreach($subcategories as $subcategory)
                               <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>   
                         
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