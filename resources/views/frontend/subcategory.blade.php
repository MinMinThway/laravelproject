@php
use App\Subcategory;
use App\Category;
use App\Item;
$id=$_GET['id'];
$subcategorys=Subcategory::all();
$subcategory=Subcategory::find($id);
$category=Category::find($subcategory->category_id);
$subcategorys=Subcategory::where('category_id','=',$category->id)->get();
$items=Item::where('subcategory_id','=',$id)->get();
@endphp
@extends('frontend_master');
@section('content');

<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Subcategory name </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
			
		  	<ol class="breadcrumb bg-transparent">
		  		
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor">{{$category->name}}</a>
		    	</li>
		    			
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor">{{$subcategory->name}}</a>
		    	</li>
		    
		  	</ol>

		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<ul class="list-group">
				  	@foreach($subcategorys as $subcate)
				  	@php
				  		if($subcategory->name==$subcate->name){
							$state=' active';
				  		}else{
				  			$state='';
				  		}
				  	@endphp
				  	<li class="list-group-item {{$state}}">
				  		<a href="{{route('subcategory','id='.$subcate->id)}}" class="text-decoration-none secondarycolor">{{$subcate->name}}</a>
				  	</li>
				  	@endforeach
				</ul>
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-4">
						@foreach($items as $item)
						<div class="card pad15 mb-3">
						  	<img src="{{$item->photo}}" class="card-img-top" alt="...">
						  	<div class="card-body text-center">
						    	<h5 class="card-title text-truncate">Card title</h5>
						    	<p class="item-price">
		                        	<strike>{{$item->price}} Ks </strike> 
		                        	<span class="d-block">{{$item->discount}} Ks</span>
		                        </p>
		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>
								<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
						  	</div>
						</div>
						@endforeach
					</div>

				</div>


				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
					    <li class="page-item disabled">
					      	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
					      	</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">1</a>
					    </li>
					    <li class="page-item active">
					    	<a class="page-link" href="#">2</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">3</a>
					    </li>
					    <li class="page-item">
					      	<a class="page-link" href="#">
					      		<i class="icofont-rounded-right"></i>
					      	</a>
					    </li>
					</ul>
				</nav>
			</div>
		</div>

		
	</div>
	

@endsection