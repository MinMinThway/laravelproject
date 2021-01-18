@php

use App\Item;
use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Brand;

@endphp
@extends('frontend_master');
@section('content');


	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Your Shopping Cart </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">
		
		<!-- Button trigger modal -->
				<!-- Modal -->
				<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="staticBackdropLabel">Check Out Complete</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        ...
				      </div>
				      <div class="modal-footer">
				        <a href="{{route('index')}}">Ok</a>
				      </div>
				    </div>
				  </div>
				</div>



		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="{{asset('frontend_assets/categories')}}" class="{{asset('frontend_assets/btn mainfullbtncolor btn-secondary float-right px-3')}}" > 
					<i class="{{asset('frontend_assets/icofont-shopping-cart')}}"></i>
					Continue Shopping 
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3"> Product </th>
							<th colspan="3"> Qty </th>
							<th> Price </th>
							<th> Total </th>
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
						
					</tbody>
					<tfoot id="shoppingcart_tfoot">
						<tr> 
							<td colspan="5"> 
								<textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
							</td>
							<td colspan="3">
								
							@guest
								<a href="#"  class="btn btn-secondary btn-block mainfullbtncolor "> 
									Login To Check Out 
								</a>
								@else
								<a href="#" id="checkout" class="btn btn-secondary btn-block mainfullbtncolor "> 
									Check Out 
								</a>
							@endguest
							</td>
						</tr>

					</tfoot>
				</table>
			</div>
		</div>
		‌

		<div id="noCart"></div>

		<!-- No Shopping Cart Div -->
		{{-- <div class="row mt-5 noneshoppingcart_div text-center">
			
			

		</div> --}}
		

	</div>

@endsection