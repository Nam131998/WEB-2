<nav class="navbar navbar-expand-sm  navbar-dark" style="background-color: black;">
	<a href="{{url('/')}}" class="navbar-brand p-0 ml-2"><img src="public/anhda4/logo/logo1.png" alt="" width="180px" height="50px"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
	<div class="collapse navbar-collapse" id="menu">
		<span class="navbar-toggler-icon"></span>
	</button>
		<ul class="navbar-nav m-auto ">
			<li class="nav-item dropdown" >
				<a href="#" class="nav-link dropdown-toggle" id="menu2" data-toggle="dropdown">
					<b>PHIM</b></a>
				<div class="dropdown-menu">
					<a href="{{url('phimdangchieu')}}" class="dropdown-item"><b>PHIM ĐANG CHIẾU</b></a>
					<a href="{{url('phimsapchieu')}}" class="dropdown-item"><b>PHIM SẮP CHIẾU</b></a>
				</div>
			</li>
			<li class="nav-item pl-5" >
				<a href="{{url('rap')}}" class="nav-link"><b>RẠP</b></a>
			</li>
			<li class="nav-item pl-5" >
				<a href="{{url('tintuc')}}" class="nav-link"><b>TIN TỨC</b></a>
			</li>
			<li class="nav-item pl-5" >
				<a href="{{url('muave')}}" class="nav-link"><b>MUA VÉ</b></a>
			</li>
			<li class="nav-item pl-5" >
				<a href="{{url('hotro')}}" class="nav-link"><b>HỖ TRỢ</b></a>
			</li>
			<li class="nav-item pl-5" >
				<a href="{{url('lienhe')}}" class="nav-link"><b>LIÊN HỆ</b></a>
			</li>
		</ul>
		<form action="timkiem" method="POST" class="navbar-form navbar-left" role="search">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
			        <div class="form-group pt-1 mr-4 mb-1">
			          <input  type="text" name="tukhoa" class="form-control" placeholder="Từ khóa tìm kiếm...">
			        </div>
		</form>
		@if (!Auth::check())
		<div class="dangki" style="margin-right: 20px;" >
			<a href="{{ url('dangnhap') }}"><b>ĐĂNG NHẬP</b></a>&nbsp;<span class="text-white">|</span>&nbsp;<a href="{{ url('dangky') }}"><b>ĐĂNG KÝ</b></a>
		</div>
		@else
		<div class="dropdown">
			<strong class="text-white dropdown-toggle mr-4" data-toggle="dropdown" style="text-transform: uppercase;">{{Auth::user()->name}}</strong>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Thông Tin</a>
				@if (Auth::user()->level==1)
					<a class="dropdown-item" href="{{url('admin')}}">Trang Admin</a>
				@else

				@endif
				<a class="dropdown-item" href="{{url('dangxuat')}}">Đăng Xuất</a>
				
			</div>
		</div>
		@endif
		
	</div>
</nav>