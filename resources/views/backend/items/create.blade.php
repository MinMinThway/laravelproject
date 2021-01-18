@extends('backend_master');
@section('content');

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard text-center"></i> Create Items Form</h1>
       
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item d-inline-block"><a href="#">Itema</a></li>
         <a href="{{route('items.index')}}" class="btn btn-warning ml-3" >Back</a>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

        <form action="{{route('items.store')}}" method="POST"  enctype="multipart/form-data">
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
            <label for='codeno'>Codeno</label>
            <input type="text" name="codeno" class="form-control @error('codeno') is-invalid @enderror" id="nameInput" value="{{old('codeno')}}">
            @error('codeno')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for='price'>Price</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="nameInput" value="{{old('price')}}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for='discount'>Discount</label>
            <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="nameInput" value="{{old('discount')}}">
            @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
           <div class="form-group">
            <label for='description'>Description</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="nameInput" value="{{old('description')}}">
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
           <div class="form-group">
            <label for='brand_id'>Brand_id</label>
                    <select class="form-control" name="brand_id">
                     @foreach($brands as $brand)
                               <option value="{{$brand->id}}">{{$brand->name}}</option>   
                         
                        @endforeach
                                  
                     
                    </select>

          </div>
         <div class="form-group">
            <label for='subcategory_id'>Subcategoy</label>
                    <select class="form-control" name="subcategory_id">
                           @foreach($subcategories as $subcategory)
                               <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>   
                         
                             @endforeach
                                    
                                
                    </select>

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