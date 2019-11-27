@extends('.admin.layout')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Sửa Rạp Chiếu Phim</h3>
						</div>
						@if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
						<div class="card-body">
							<form action="admin/editrap/{{$rap->id}}" method="POST" class="form-horizontal">
								{{ csrf_field() }}
								
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Tên rạp</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess" name="tenrap" type="text" placeholder="Tên rạp" value="{{$rap->tenrap}}"  class="form-control form-control-success" required=""><small class="form-text text-muted ml-3">Chú ý : .</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Thông tin rạp</label>
									<div class="col-md-9">
										<textarea class="form-control " name="ndrap" value="{{$rap->thongtin}} rows="5" id="ttrap" required></textarea><small class="form-text text-muted ml-3">Chú ý :</small>
									</div>
								</div>
								<div class="form-group row">       
									<div class="col-md-9 m-auto">
										<input type="submit" value="UPDATE" class="btn btn-primary">
									</div>
								</div>
							</form>
							<a href="http://localhost/da/admin/qlyrap"><input type="button" value="BACK" class="btn btn-primary" 
							style="margin-top: -90px; "></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection