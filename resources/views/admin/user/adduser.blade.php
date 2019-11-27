@extends('.admin.layout')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
	<div class="container-fluid px-xl-5">
		<section class="py-5">
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card">
						<div class="card-header">
							<h3 class="h6 text-uppercase mb-0">Thêm User</h3>
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
							<form action="{{url('admin/adduser')}}" method="POST" class="form-horizontal">
								{{ csrf_field() }}
								
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Tên user</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess" name="name" type="text" placeholder="Tên user"  class="form-control form-control-success" required><small class="form-text text-muted ml-3">Chú ý : .</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Email</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess" name="email" type="text" placeholder="Email"  class="form-control form-control-success" required><small class="form-text text-muted ml-3">Chú ý : .</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Mật khẩu</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess" name="password" type="password" placeholder="Nhập mật khẩu"  class="form-control form-control-success" required><small class="form-text text-muted ml-3">Chú ý : .</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 form-control-label">Xác nhận</label>
									<div class="col-md-9">
										<input id="inputHorizontalSuccess" name="repassword" type="password" placeholder="Nhập lại mật khẩu"  class="form-control form-control-success" required><small class="form-text text-muted ml-3">Chú ý : .</small>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-3 form-control-label">Quyền</label>
									<div class="col-md-9">
										<div class="custom-control custom-radio custom-control-inline">
											<input id="customRadioInline1" type="radio" name="radio" value="1" class="custom-control-input" checked>
											<label for="customRadioInline1" class="custom-control-label">Admin</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input id="customRadioInline2" type="radio" name="radio" value="0" class="custom-control-input">
											<label for="customRadioInline2" class="custom-control-label">Khách</label>
										</div>            
									</div>
								</div>
								<div class="form-group row">       
									<div class="col-md-9 m-auto">
										<input type="submit" value="ADD" class="btn btn-primary">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection