<title>{{ ($title != '' ? $title.' | ' : '').setting('title') }}</title>
<base href="{{ base_url() }}/">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8; IE=10; IE=11" />
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0, shrink-to-fit=no" />
<meta name="description" content="{{ ($description != '' ? $description : setting('description')) }}" />
<meta name="keywords" content="{{ ($keywords != '' ? $keywords : setting('keywords')) }}" />
<meta name="author" content="" />
<meta name="_token" content="{{csrf_token()}}" />
<link rel="icon"  type="image/png" href="{{asset('site/images/favicon.png')}}">
<link rel="stylesheet" type="text/css" href="{{asset('site/css/bootstrap.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/owl.carousel.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/owl.theme.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/font-awesome.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/animate.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/magnific-popup.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/settings.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/slick.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/icons.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/preset.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/theme.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/responsive.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('site/css/presets/color1.css')}}" id="colorChange"/>
