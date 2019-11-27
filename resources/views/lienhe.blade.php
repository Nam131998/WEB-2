@extends('master')
@section('content')
 <!-- Page Content -->
    <div class="container mt-3 ml-3 " 
    style="background-color: #FFCC00;width: 850px;border-radius: 8px;">
        <div style="clear: left;">

            <div class="col-md-12">
	            <div >

	            	<div class="panel-body">
	            		<!-- item -->
	            		<div class="mt-3">
                        <h2 ><span class="glyphicon glyphicon-align-left "></span> Thông tin liên hệ</h2><br>
                        </div>
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-user "></span> Họ Tên : </h4>
                        <p>Lưu Văn Giang</p>
                        <h4><span class= " glyphicon glyphicon-graduation-cap"></span> Lớp : </h4>
                        <p>TK14.1 (Công Nghệ Web) </p>
                        <h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Trường Đại học Sư phạm Kỹ thuật Hưng Yên CS2 </p>
                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>luugiangtk14@gmail.com</p>
                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>0987576508 </p>
                        <h3><span class=""></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe  src="public/anhda4/khac/maps.png" width="700" height="450"  style="border:5" ></iframe>

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection