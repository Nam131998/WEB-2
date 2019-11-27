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
	form input
	{
		height: 40px;
	}
</style>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 pt-3">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a  href="{{url('/')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{url('muave')}}">Mua vé</a></li>	
                        </ol>
</div>

	<div class="col-md-4 m-auto pt-4" >
	<img  src="public/anhda4/khac/rap1.jpg" alt="" width="420" height="200">
	</div>
	<div class="col-md-4 m-auto pt-4" >
	<img  src="public/anhda4/khac/rap2.jpg" alt="" width="420" height="200">
    </div>
    <div class="col-md-4 m-auto pt-4">
	<img src="public/anhda4/khac/rap3.jpg" alt="" width="425" height="200">
	</div>
</div>
<div class="row ticket-price-wrapper pt-2">
	<div class="col-md-6 col-xs-12">
		<h3 class="pdc mt-2" style="text-transform: uppercase;">Phim Theo Ngày Giờ</h3>
		<div class="row theater-showtimes mt-4 mb-4">
			<div  >
				<form action="" method="post" accept-charset="utf-8">
					{{csrf_field()}}
				<div class="ml-3"><b style="color: red;">Mời bạn chọn ngày theo lịch chiếu phim của chúng tôi:</b> 
				<input class="ml-4" type="date" name="ngay" value="" id="ngay" onchange="hienthi()"></div>
				<h3 class="pdc mt-3 ml-3" style="text-transform: uppercase;">Kết Quả</h3>
				</form>
			</div>
		</div>
		<div id="duyetngay">
		</div>
		
	</div>
	<div class="col-md-6 col-xs-12">
	<h3 class="pdc mt-2 pl-3" style="text-transform: uppercase;">Giá Vé</h3>
	<div class="tab-theater">
			<div class="tab-wrapper col-3 p-0" >
    <ul class="tab">
        <li>
            <a href="#tab-main-info">PHIM 2D</a>
        </li>
        <li>
            <a href="#tab-image">PHIM 3D</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-item" id="tab-main-info">
        	<img src="public/anhda4/khac/2D.jpg" alt="" width="600" height="300">
        </div>
        <div class="tab-item" id="tab-image">
            <img src="public/anhda4/khac/3D.jpg" alt="" width="600" height="300">
        </div>
    </div>
</div>
	</div>
	<h3 class="pdc mt-2 pl-3" style="text-transform: uppercase;">Thông tin chi tiết</h3>
	<div class="tab-content">
	<span>
	<p><b>Địa chỉ:</b> 88 Xuân Thủy - Q. Cầu Giấy - Tp. Hà Nội</p>
	<p><b>Điện thoại:</b> 0987576508</p>
	<p><b>Email:</b> luugiangtk14@gmail.com</p>
	</span>
	<img src="public/anhda4/khac/diachi.png" alt="" width="600" height="300"><br><br>
	<span>
	<p>Nếu chưa quyết định sẽ xem phim mới nào, hãy tham khảo các bộ phim hay trong mục Phim Đang Chiếu cũng như Phim Sắp Chiếu tại rạp chiếu phim bằng cách vào mục Bình Luận Phim ở Góc Điện Ảnh để đọc những bài bình luận chân thật nhất, tham khảo và cân nhắc. Sau đó, quý khách hãy đặt vé bằng box Mua Vé Nhanh ngay ở đầu trang để chọn được suất chiếu và chỗ ngồi vừa ý nhất.</p>

	<p>Chính thức mở cửa đón các tín đồ điện ảnh vào ngày 20 tháng 1 năm 2017, rạp Beta Cinema Mỹ Đình toạ lạc tại tầng hầm B1, toà nhà Golden Palace, đường Mễ Trì, quận Nam Từ Liêm, Hà Nội. Rạp có vị trí thuận lợi, rất gần những trường đại học, cao đẳng và cấp 3 lớn tại Hà Nội.</p>

	<p>Beta Cinema Mỹ Đình sở hữu tổng cộng 6 phòng chiếu tương đương hơn 800 ghế ngồi. Rạp được trang bị hệ thống màn chiếu, máy chiếu, phòng chiếu hiện đại theo tiêu chuẩn Hollywood với 100% nhập khẩu từ nước ngoài. Trong mỗi phòng chiếu đều được lắp đặt hệ thống âm thanh Dolby 7.1 và hệ thống cách âm chuẩn quốc tế. Vì vậy mà mỗi thước phim được chiếu tại rạp đều là những thước phim rõ nét nhất, với âm thanh và hiệu ứng sống động nhất.</p>
	</div>
	</span>
	</div>

</div>
</div>
<script>
	// Hàm active tab nào đó
	function hienthi() {
		var ngay = $("#ngay").val();
		// $.post('ajax/rap',{ngay:ngay},function(data) {
		// 	alert(data);
		// });
		$.ajax({
			url: 'ajax/rap',
			type: 'post',
			data: {
				ngay:ngay,
				_token: '{{csrf_token()}}',
			},
		}).done(function (data) {
			$("#duyetngay").html(data);
			// alert(data);
			//console.log(data);
		});

	}
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