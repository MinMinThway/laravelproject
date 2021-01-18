@php

use App\Item;
use App\Brand;
@endphp
@extends('frontend_master');
@section('content');

	
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white">Order History</h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">

	
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Date</th>
              <th>Total Amount</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>1</td>
              <td>{{$order->orderdate}}</td>
              <td>{{$order->total}}</td>
              <td>{{$order->status}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
 

	</div>
	


@endsection