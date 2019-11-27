@extends('master')
@section('content')
<style>
	div ol li a{
		text-decoration: none;
		color: gray;
	}
	div ol li a:hover{
		text-decoration:  none;

	}
	.date{
		height: 38px;
    	background: none;
    	border: none;
    	padding-left: 12px;
    	width: 88%;
	}
	select{
		width: 100%;
		height: 40px;
	}
	.gio
	{
		margin-left: -40px;
	}
	.gio a{
	text-decoration: none;
	color: #212529;
}
	.gio ul li{

		list-style-type: none;
		display: inline;
		margin-right: 30px;
		padding: 6px 10px;
		border: 1px solid #8e8e8e;
	}
	.gio ul li:hover{
	color: #f26b38;
	border: 1px solid #f26b38;
}

</style>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 pt-3">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a  href="{{url('/')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{url('tintuc')}}">Tin Tức</a></li>	
                        </ol>
</div>

	{{-- <div class="col-md-4 m-auto pt-4" >
	<img  src="public/anhda4/khac/rap1.jpg" alt="" width="420" height="200">
	</div>
	<div class="col-md-4 m-auto pt-4" >
	<img  src="public/anhda4/khac/rap2.jpg" alt="" width="420" height="200">
    </div>
    <div class="col-md-4 m-auto pt-4">
	<img src="public/anhda4/khac/rap3.jpg" alt="" width="425" height="200">
	</div> --}}
</div>
<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<a href="" class="text-dark"><h3 class="psc">Review Phim</h3></a>
			@foreach ($review as $r)
			<div class="blog row mt-3 mb-4">
				<div class="col-md-5">
					<a href="review/{{$r->id}}" ><img src="public/anhda4/tintuc/{{$r->image}}" width="160px" height="100px"></a>
				</div>
				<div class="col-md-7"><a href="review/{{$r->id}}" style="text-decoration: none; color:black"><h5>{{$r->tieude}}</h5></a></div>
			</div>
			@endforeach
			
		</div>
		<div class="col-md-4 col-xs-12">
			<a href="" class="text-dark"><h3 class="psc">Blog</h3></a>
			@foreach ($blog as $b)
			<div class="blog row mt-3 mb-4">
				<div class="col-md-5">
					<a href="blog/{{$b->id}}"><img src="public/anhda4/tintuc/{{$b->image}}" width="160px" height="100px"></a>
				</div>
				<div class="col-md-7"><a href="blog/{{$b->id}}" style="text-decoration: none; color:black"><h5>{{$b->tieude}}</h5></a></div>
			</div>
			@endforeach
		</div>
		<div class="col-md-4 col-xs-12">
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
</div>
<script>
	// Hàm active tab nào đó
    function activeTab(obj)
    {
        // Xóa class active tất cả các tab
        $('.tab-wrapper ul li').removeClass('active');
 
        // Thêm class active vòa tab đang click
        $(obj).addClass('active');
 
        // Lấy href của tab để show content tương ứng
        var id = $(obj).find('a').attr('href');
 
        // Ẩn hết nội dung các tab đang hiển thị
        $('.tab-item').hide();
 
        // Hiển thị nội dung của tab hiện tại
        $(id) .show();
    }
 
    // Sự kiện click đổi tab
    $('.tab li').click(function(){
        activeTab(this);
        return false;
    });
 
    // Active tab đầu tiên khi trang web được chạy
    activeTab($('.tab li:first-child'));
</script>
@endsection