<!DOCTYPE html>
<html dir="rtl">
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/welcome2/style.css')}}">
</head>
<body>
	<div class="logo">
		<img src="{{asset('img/welcome2/img/logo.png')}}" alt="logo">
		<h4>الجمعية العمانية للعناية بالقرآن الكريم</h4>
		<h5>مركز ولاية العامرات</h5>
	</div>
	<div class="menu">
		<ul>
		    <li><a href="">الرئيسية</a></li>
		    <li><a href="">المدونة</a></li>
		    <li><a href="">الدورات</a></li>
		    <li><a href="">التصدق الإلكتروني</a></li>
		    <li><a href="">اتصل بنا</a></li>
		    <li><a href="">دخول الحساب</a></li>
		</ul>
	</div>
	<div class="social">
		<ul>
		    <li>
		    	<a href=""><img src="{{asset('img/welcome2/icons/facebook.png')}}" alt="facebook"></a>
		    </li>
		    <li>
		    	<a href=""><img src="{{asset('img/welcome2/icons/twitter.png')}}" alt="twitter"></a>
		    </li>
		    <li>
		    	<a href=""><img src="{{asset('img/welcome2/icons/instgram.png')}}" alt="instgram"></a>
		    </li>
		</ul>
	</div>
	<div class="middle-button">
		<button></button>
	</div>

	<div class="overlay3">
		<img src="{{asset('img/welcome2/icons/icons.png')}}" alt="">
	</div>
	<div class="overlay2">
	      <img class="slide-img1" src="{{asset('img/welcome2/img/b1.jpg')}}" alt="First slide">
	      <img class="slide-img2" src="{{asset('img/welcome2/img/b2.jpg')}}" alt="Second slide">
	      <img class="slide-img3" src="{{asset('img/welcome2/img/b3.jpg')}}" alt="Third slide">
	</div>
	<div class="overlay"></div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
         $('.carousel').carousel({
              interval: 3000
        })
    </script>
</body>
</html>
