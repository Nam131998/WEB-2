@extends('master')
@section('title','BETA CINEMA')
@section('content')
<style>
		select{
		width: 380px;
		height: 40px;
		margin-left: -10px;
		background-color: #fffdfd9c;
		color: white;
	}
	option
	{
		color: black;
	}
	.datvetrangchu div input:hover{
		background-color: green;
	}
</style>
<div style="position: relative;">
<div id="demo" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	</ul>
	<div class="carousel-inner">
		<?php $i=0 ?>
		@foreach ($slide as $s)
		@if ($i==0)
		<div class="carousel-item active">
			@else
			<div class="carousel-item">
				@endif
				<a href="{{$s->link}}"><img src="public/anhda4/slide/{{$s->image}}" alt="" width="100%" height="500"></a>
			</div>
			<?php $i++; ?>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>
</div>
<div style="position: absolute;top:100px;right: 50px;">
	<form action="{{url('/datve')}}" method="get" align="left" style="width: auto;height: auto;float:right;margin-top: 20px;margin-right: 5px;margin-left: 20px;color: white;">
	<div class="datvetrangchu" style="width: 400px;background-color:rgba(0, 0, 0, 0.8);
	margin-right: 100px;">
		<div style="background-color: #f26b38;text-align: center;width: 200px;height: 40px;padding-top: 8px;margin-bottom: 20px;color: white;"><b>MUA VÉ NHANH</b></div>
				<lable style="text-align: left;margin-left: 10px;">Chọn Phim:</lable><br>
		<select name="phim" id="phim1" style="margin-left: 10px;">
			<option value="" checked>Chọn phim</option>
			@foreach($phimdc as $pdc)
			<option value="{{$pdc->id}}" style="border-radius: 10px;">{{$pdc->tenphim}}</option>
			@endforeach
		</select><br>
				<lable style="text-align: left; margin-left: 10px;">Chọn Rạp:</lable><br>
		<select name="rap" id="rap" style="margin-left: 10px;">
			<option value="" checked>Chọn rạp</option>
		</select><br>
				<lable style="text-align: left;margin-left: 10px;">Chọn Ngày:</lable><br>
		<select name="ngay" id="ngay"  style="margin-left: 10px;">
			<option value="" checked>Chọn ngày</option>
		</select><br>
				<lable style="text-align: left;margin-left: 10px;">Chọn giờ:</lable><br>
		<select name="thoigian" id="time" style="margin-left: 10px;">
			<option value="" checked>Chọn giờ</option>
		</select><br>
	<input class="mt-3 mb-3 border-0 datve" type="submit" name="datve" id="datve" value="Đặt vé" style="background-color: #f26b38;text-align: center;text-decoration: none; color: white;padding: 11px 15px;margin-left: 160px;">
	</div>
	
</form>
</div>
</div>
<div class="container mt-4">
	<a href="{{url('/phimdangchieu')}}" class="pdc-hover" style="text-decoration: none;color: black">
		<h4 class="pdc">Phim Đang Chiếu</h4></a>
	<div class="row">
		@foreach ($phimdc as $pdc)
		<div class="col-sm-3 col-md-3 col-xs-6">
			<div class="moviedangchieu" >
				<img style="border-radius: 15px;"  src="public/anhda4/phim/{{$pdc->image}}" width="100%" height="350px">
				<a href="{{url('phim',$pdc->id)}}">
					<div class="decription-hover overlay">
						<div class="decription-content">
							<button class="btn btn-outline-danger">MUA VÉ</button>
						</div>
					</div>
				</a>
			</div>
			<div class="tieudephimdc mt-2">
				<h6 class="text-uppercase mb-0">{{$pdc->tenphim}}</h6>
				<h6 class="text-uppercase en">{{$pdc->tentienganh}}</h6>
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="container mt-3">
	<a href="{{url('/phimsapchieu')}}" class="pdc-hover" style="text-decoration: none;color: black"><h4 class="psc">Phim Sắp Chiếu</h4></a>
	<div class="row">
		@foreach ($phimsc as $psc)
		<div class="col-md-3">
			<div class="moviedangchieu">
				<img style="border-radius: 15px;" src="public/anhda4/phim/{{$psc->image}}" width="100%" height="350px">
				<a href="{{url('phim',$psc->id)}}">
					<div class="decription-hover overlay">
						<div class="decription-content">
							<button class="btn btn-outline-danger">MUA VÉ</button>
						</div>
					</div>
				</a>
			</div>
			<div class="tieudephimdc mt-2">
				<h6 class="text-uppercase mb-0">{{$psc->tenphim}}</h6>
				<h6 class="text-uppercase en">{{$psc->tentienganh}}</h6>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<a href="" class="text-dark"><h3 class="psc">Review Phim</h3></a>
			@foreach ($review as $r)
			<div class="blog row mt-3 mb-4">
				<div class="col-md-4">
					<a href="review/{{$r->id}}" ><img src="public/anhda4/tintuc/{{$r->image}}" width="170px" height="100px"></a>
				</div>
				<div class="col-md-8"><a href="review/{{$r->id}}" style="text-decoration: none; color:black"><h5>{{$r->tieude}}</h5></a></div>
			</div>
			@endforeach
			
		</div>
		<div class="col-md-6 col-xs-12">
			<a href="" class="text-dark"><h3 class="psc">Blog</h3></a>
			@foreach ($blog as $b)
			<div class="blog row mt-3 mb-4">
				<div class="col-md-4">
					<a href="blog/{{$b->id}}"><img src="public/anhda4/tintuc/{{$b->image}}" width="170px" height="100px"></a>
				</div>
				<div class="col-md-8"><a href="blog/{{$b->id}}" style="text-decoration: none; color:black"><h5>{{$b->tieude}}</h5></a></div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="container mt-3">
	<div class="gioithieu">
		<h3 class="psc">GIỚI THIỆU</h3>
		<div>
			<p>BETA CINEMA là một trong những công ty tư nhân đầu tiên về điện ảnh được thành lập từ năm 2003, đã khẳng định thương hiệu là 1 trong 10 địa điểm vui chơi giải trí được yêu thích nhất. Ngoài hệ thống rạp chiếu phim hiện đại, thu hút hàng triệu lượt người đến xem, BETA CINEMA còn hấp dẫn khán giả bởi không khí thân thiện cũng như chất lượng dịch vụ hàng đầu.</p>
			<p>Đặt vé tại BETA CINEMA dễ dàng chỉ sau vài thao tác vô cùng đơn giản. Để mua vé, hãy vào tab Mua vé. Quý khách có thể chọn Mua vé theo phim, theo rạp, theo ngày tùy cách nào tiện lợi nhất cho bản thân.Sau đó, tiến hành mua vé theo các bước hướng dẫn. Chỉ trong vài phút, quý khách sẽ nhận được tin nhắn và email phản hồi Đặt vé thành công của STAR MOVIE. Quý khách có thể dùng tin nhắn lấy vé tại quầy vé của BETA CINEMA hoặc quét mã QR để một bước vào rạp mà không cần tốn thêm bất kỳ công đoạn nào nữa.</p>
			<p>Nếu chưa quyết định sẽ xem phim mới nào, hãy tham khảo các bộ phim hay trong mục Phim Đang Chiếu cũng như Phim Sắp Chiếu tại rạp chiếu phim bằng cách vào mục Bình Luận Phim ở Góc Điện Ảnh để đọc những bài bình luận chân thật nhất, tham khảo và cân nhắc. Sau đó, quý khách hãy đặt vé bằng box Mua Vé Nhanh ngay ở đầu trang để chọn được suất chiếu và chỗ ngồi vừa ý nhất.</p>
			<p>
			Chính thức mở cửa đón các tín đồ điện ảnh vào ngày 20 tháng 1 năm 2017, rạp Beta Cinema Mỹ Đình toạ lạc tại tầng hầm B1, toà nhà Golden Palace, đường Mễ Trì, quận Nam Từ Liêm, Hà Nội. Rạp có vị trí thuận lợi, rất gần những trường đại học, cao đẳng và cấp 3 lớn tại Hà Nội.</p>
			<p>
			Beta Cinema Mỹ Đình sở hữu tổng cộng 6 phòng chiếu tương đương hơn 800 ghế ngồi. Rạp được trang bị hệ thống màn chiếu, máy chiếu, phòng chiếu hiện đại theo tiêu chuẩn Hollywood với 100% nhập khẩu từ nước ngoài. Trong mỗi phòng chiếu đều được lắp đặt hệ thống âm thanh Dolby 7.1 và hệ thống cách âm chuẩn quốc tế. Vì vậy mà mỗi thước phim được chiếu tại rạp đều là những thước phim rõ nét nhất, với âm thanh và hiệu ứng sống động nhất.</p>
			<p>
			Mức giá xem phim tại rạp hết sức ưu đãi, chỉ từ 40.000 VNĐ. Mỗi tuần, rạp còn có những chương trình khuyến mại, ưu đãi đặc biệt dành cho các tín đồ điện ảnh.</p>
			<p>
			Với địa điểm thuận lợi, cơ sở vật chất hiện đại, tiên tiến, mức giá ưu đãi và mô hình ẩm thực Foodfair, Beta Cinema Mỹ Đình chắc chắn sẽ là địa điểm xem-ăn-chơi không thể bỏ qua của giới trẻ Hà Thành.
			</p>
			<p>Hiện nay, BETA CINEMA đang ngày càng phát triển hơn nữa với các chương trình đặc sắc, các khuyến mãi hấp dẫn, đem đến cho khán giả những bộ phim bom tấn của thế giới và Việt Nam nhanh chóng và sớm nhất.</p>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#phim1').change(function(){
            var idphim=$(this).val();
           $.get("ajax/rap/"+idphim,function(data){
       		 $("#rap").html(data);	
       		});
       	});
		$('#rap').change(function(){
            var idrap=$(this).val();
            var idphim=$("#rap option").attr("id");
           $.get("ajax/ngay/"+idrap+"/"+idphim,function(data){
       		 $("#ngay").html(data);    	
       		});
       });
		$('#rap').change(function(){
		 	var idrap=$(this).val();
            var idphim=$("#rap option").attr("id");
           	$.get("ajax/time/"+idrap+"/"+idphim,function(data){
       		$("#time").html(data);
          //   var idrap=$(this).val();
          //   var idphim=$("#phim ").val();
          //   var ngay=$("#ngay").val();           
          //  $.get("ajax/time/"+idrap+"/"+idphim+"/"+ngay+"/"+time,function(data){
       		 // $("#time").html(data);
       		 
         	
       		});
       });

		//$('.box').css('transform','scale(2)');
	});
</script>
@endsection
