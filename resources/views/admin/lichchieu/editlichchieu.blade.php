@extends('.admin.layout')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Sửa Lịch Chiếu</h3>
						</div>
						<div class="card-body">
							
							<form action="admin/sualichchieu/{{$lich->id}}" method="POST" class="form-horizontal">
								{{ csrf_field() }}
								
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Phim</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="phim" type="text"  class="form-control form-control-warning" value="{{$lich->phim->tenphim}}" disabled="disabled">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Rạp</label>
									<div class="col-md-9">
									<input id="inputHorizontalWarning" name="rap" type="text"  class="form-control form-control-warning" value="{{$lich->rap->tenrap}}" disabled="disabled">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Phòng</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="phong" type="text"  class="form-control form-control-warning" value="{{$lich->phong->tenphong}}" disabled="disabled" >
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Ngày</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="ngay" type="date"  class="form-control form-control-warning" value="{{$lich->ngay}}">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Thời gian</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name="time" type="time"  class="form-control" value="{{$lich->time}}">
									</div>
								</div>
								<div class="form-group row">       
									<div class="col-md-9 m-auto">
										<input type="submit" value="UPDATE" class="btn btn-primary">
									</div>
								</div>
							</form>
							<a href="http://localhost/da/admin/qlylichchieu"><input type="button" value="BACK" class="btn btn-primary" 
							style="margin-top: -90px; "></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<script type="text/javascript">
	
</script>
@endsection