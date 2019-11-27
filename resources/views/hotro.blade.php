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
</div>
@endsection