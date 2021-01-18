<div>
    <!-- Very little is needed to make a happy life. - Marcus Antoninus -->
</div>

@foreach($brands as $brand)
<a class="dropdown-item" href="{{route('brand',$brand->id)}}">{{$brand->name}}</a>
<div class="dropdown-divider"></div>
@endforeach