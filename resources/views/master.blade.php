<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<base href="{{asset('')}}">
	<link rel="shortcut icon" type="image/png" href="public/anhda4/logo/logo1.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/fontawesome/css/all.css">
	<link rel="stylesheet" href="public/css/style.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="public/js/jquery-3.3.1.min.js"></script>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border-top: none;
}
.tab-wrapper{
    max-width: 100%;
    margin: 20px auto;
}
.tab-wrapper ul{
    overflow: hidden;
    background: white;
    margin: 0px;
    padding: 0px;
}
.tab-wrapper ul li{    float: left;
    list-style: none;
    padding: 5px 10px;
    background-color: white;
    margin-right: 0px;
    margin-top: 5px;
    margin-left: 20px;
    border: 1px solid #f26b38;
    color: #f26b38;
}
.tab-wrapper ul li.active{
    background: #f26b38;
}
.tab-wrapper ul li.active a{
    color: blue;
}
.tab-wrapper ul li a{
    color:  #f26b38;
    text-transform: uppercase;
    text-decoration: none;
}
.tab-content{
    padding: 20px;
}
.tab-item{
    display: none;
}
</style>
</head>
<body>
	@include('navigation')
	@section('content')
	@show
	@include('footer')
  @yield('script')
</body>
</html>