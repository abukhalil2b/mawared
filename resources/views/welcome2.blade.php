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
	<div class="overlay4">
		<div class="headersection">
			<div class="logo">
				<img src="{{asset('img/welcome2/img/logo.png')}}" alt="logo">
				<div>
					<h4>الجمعية العمانية للعناية بالقرآن الكريم</h4>
					<h5>مركز ولاية العامرات</h5>
				</div>
			</div>
			<div class="menu">
				<ul>
				    <li><a href="">الرئيسية</a></li>
				    <li><a href="">المدونة</a></li>
				    <li><a href="">الدورات</a></li>
				    <li><a href="">التصدق الإلكتروني</a></li>
				    <li><a href="">اتصل بنا</a></li>
				    <li><a href="{{route('login')}}">دخول الحساب</a></li>
				</ul>
			</div>
		</div>

		<div class="bodysection">
			<div class="one">
				<img class="right" src="{{asset('img/welcome2/img/txtright.png')}}" alt="right">
				<img class="left" src="{{asset('img/welcome2/img/txtleft.png')}}" alt="left">
				<img class="middle" src="{{asset('img/welcome2/img/hadith.png')}}" alt="middle">
			</div>
			<div class="two">
				<img class="bar" src="{{asset('img/welcome2/img/bar.png')}}" alt="bar">
			</div>
		</div>

		<div class="bodysection2">
			<img src="{{asset('img/welcome2/img/i1.png')}}" alt="i1">
			<a class="btn-register" href="{{route('register')}}">سجل لتتعلم</a>
		</div>

		<div class="footersection">
			<div class="one">
				<ul>
				    <li>one</li>
				    <li>two</li>
				    <li>three</li>
				    <li>four</li>
				</ul>
			</div>
			<div class="two">
				<ul>
				    <li>one</li>
				    <li>two</li>
				</ul>
			</div>

			<div class="four">
				<li>one</li>
				<li>two</li>
			</div>
			<div class="five">
				<h5>support us</h5>
				<ul>
				    <li>
				    	<a href=""><img src="{{asset('img/welcome2/icons/face.png')}}" alt="facebook"></a>
				    	<a href=""><img src="{{asset('img/welcome2/icons/web.png')}}" alt="web"></a>
				    </li>
				    <li>
				    	<a href=""><img src="{{asset('img/welcome2/icons/twit.png')}}" alt="twitter"></a>
				    	<a href=""><img src="{{asset('img/welcome2/icons/what.png')}}" alt="whatsapp"></a>
				    </li>
				    <li>
				    	<a href=""><img src="{{asset('img/welcome2/icons/inst.png')}}" alt="instgram"></a>
				    	<a href=""><img src="{{asset('img/welcome2/icons/you.png')}}" alt="youtube"></a>
				    </li>
				</ul>
			</div>

		</div>


	</div>
	<div class="overlay3"></div>
	<div class="overlay2"></div>
	<div class="overlay1">
		<img class="slide-img1" src="{{asset('img/welcome2/img/b1.jpg')}}" alt="First slide">
	    <img class="slide-img2" src="{{asset('img/welcome2/img/b2.jpg')}}" alt="Second slide">
	    <img class="slide-img3" src="{{asset('img/welcome2/img/b3.jpg')}}" alt="Third slide">
	</div>

</body>
</html>
