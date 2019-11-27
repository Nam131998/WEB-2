@extends('.admin.layout')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Thêm Tin Tức</h3>
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
							<form action="admin/edittintuc/{{$tintuc->id}}" method="POST" class="form-horizontal">
								{{ csrf_field() }}
								
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Tên tin tức</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess"  name="tieude" type="text" placeholder="Tiêu đề" value="{{$tintuc->tieude}}" class="form-control form-control-success" required><small class="form-text text-muted ml-3">Chú ý : .</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Ảnh Tin Tức</label>
									<div class="col-md-9">
										<input id="inputHorizontalWarning" name=image type="file"  class="form-control form-control-warning" value="{{$tintuc->image}}" required><small class="form-text text-muted ml-3">Chú ý :</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Thể loại tin tức</label>
									<div class="col-md-9">
										<div class="custom-control custom-radio custom-control-inline">
											<input id="customRadioInline1" type="radio" name="radio" value="1" class="custom-control-input" checked>
											<label for="customRadioInline1" class="custom-control-label">Review Phim</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input id="customRadioInline2" type="radio" name="radio" value="0" class="custom-control-input">
											<label for="customRadioInline2" class="custom-control-label">Blog</label>
										</div>            
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Nội Dung</label>
									<div class="col-md-9">
										<textarea class="form-control " name="noidung" value="{{$tintuc->noidung}}" rows="5" id="noidungtt"  ></textarea><small class="form-text text-muted ml-3">Chú ý :</small>
									</div>
								</div>
								<div class="form-group row">       
									<div class="col-md-9 m-auto">
										<input type="submit" value="UPDATE" class="btn btn-primary">
									</div>
								</div>
							</form>
							<a href="http://localhost/da/admin/qlytintuc"><input type="button" value="BACK" class="btn btn-primary" 
							style="margin-top: -90px; "></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection