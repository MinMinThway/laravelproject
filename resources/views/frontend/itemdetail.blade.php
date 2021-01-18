@php
use App\Category;
use App\Brand;
use App\Item;
use App\Subcategory;
@endphp


@extends('frontend_master');
@section('content');

	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Code Number </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
	  			@php
	    			$subcate = Subcategory::find($item->subcategory_id);
	    			$cate = Category::find($subcate->category_id);
	    		@endphp
		    	<li class="breadcrumb-item">
		    		<a href="{{route('index')}}" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> {{$cate->name}} </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> {{$subcate->name}} </a>

		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					{{$item->brand->name}}
		    	</li>
		  	</ol>
		</nav>
		<div class="row mt-5">

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<img src="{{$item->photo}}" class="img-fluid">
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				
				<h4>{{$item->name}}</h4>

				<div class="star-rating">
					<ul class="list-inline">
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
					</ul>
				</div>

				<p>
					{{$item->description}}
				</p>

				<p> 
					<span class="text-uppercase "> Current Price : </span>
					<span class="maincolor ml-3 font-weight-bolder"> {{$item->discount}} Ks </span>
				</p>
				
				<p> 
					<span class="text-uppercase "> Brand : </span>
					<span class="ml-3"> <a href="" class="text-decoration-none text-muted">{{$item->brand->name}}</a> </span>
				</p>

				<a href="#" class="addtocartBtn text-decoration-none">
					<i class="icofont-shopping-cart mr-2"></i> Add to Cart
				</a>
				
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-12">
				<h3> Related Item </h3>
				<hr>
			</div>
			

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="{{asset('frontend_assets/image/item/saisai_two.jpg')}}" class="img-fluid">
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="{{asset('frontend_assets/image/item/saisai_three.jpg')}}" class="img-fluid">
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="{{asset('frontend_assets/image/item/saisai_four.jpg')}}" class="img-fluid">
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="{{asset('frontend_assets/image/item/saisai_four.jpg')}}" class="img-fluid">
				</a>
			</div>
		</div>

		
	</div>
	


@endsection