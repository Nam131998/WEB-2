@extends('master')
@section('title','BETA CINEMA')
@section('content')
<div class="container">
	<?php 
            function doimau($str,$tukhoa)
            {
                return str_replace($tukhoa, "<span style='color:red;'>$tukhoa</span>",$str);
            }
            ?>
	<h5 class="pdc mt-5" style="text-transform: uppercase;">Phim theo từ khóa: {{$tukhoa}}</h5>
	<div class="row">
		
		@foreach ($phimdc as $pdc)
		<div class="col-md-3 mt-4">
			<div class="moviedangchieu">
				<img style="border-radius: 15px;" src="public/anhda4/phim/{{$pdc->image}}" width="100%" height="350px">
				<a href="{{url('phim',$pdc->id)}}">
					<div class="decription-hover overlay">
						<div class="decription-content">
							<button class="btn btn-outline-danger">MUA VÉ</button>
						</div>
					</div>
				</a>
			</div>
			<div class="tieudephimdc mt-2">
				<h5 class="text-uppercase ">{!! doimau($pdc->tenphim,$tukhoa) !!}</h5>
				<h6 class="text-uppercase ">{!! doimau($pdc->tentienganh,$tukhoa) !!}</h6>
			</div>
		</div>
		@endforeach
		
	</div>
</div>
@endsection