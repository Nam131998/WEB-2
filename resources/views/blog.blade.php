@extends('master')
@section('content')
<div class="container mt-5">
	<div class="row">
		@foreach ($blog as $b)
			<div class="col-sm-8">
			<h2>{{$b->tieude}}</h2>
			<div class="mt-5">
				<img style="margin-bottom: 40px;width: 700px; height: 400px;" src="public/anhda4/tintuc/{{$b->image}}" alt="">
				@php
					echo $b->noidung;
				@endphp
			</div>
		</div>
		@endforeach
		<div class=" col-sm-4 ">
			<h3 class="phimlienquan">Phim Sắp Chiếu</h3>
			<div class="row">
				@foreach($phimlq as $plq)
				<div class="col-12 ">
					<div class="movie movielienquan">
						<img src="public/anhda4/phim/{{$plq->image}}" alt="image" width="100%">
						<div class="decription-hover">
							<a href="{{url('phim',$plq->id)}}"><button class="btn btn-outline-secondary">Xem chi tiết</button></a>
						</div>
					</div>
					<div class="title-plq">
						<h4 class="text-uppercase">{{$plq->tenphim}}</h4>
						<h4 class="text-uppercase en">{{$plq->tentienganh}}</h4>
						<span >Ngày khởi chiếu:  <b style="color: red;">{{date('d-m-Y', strtotime($plq->ngaykhoichieu))}}</b></span>
					</div>
				</div>
				@endforeach
			</div>
			<button class="btn btn-outline-info mt-4 nutxemthem"><a style="text-decoration: none;" href="{{url('phimdangchieu')}}"> Xem Thêm</a></button>
		</div>
	</div>
</div>
@endsection