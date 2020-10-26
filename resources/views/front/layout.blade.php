<!DOCTYPE html>
<html lang="{{App::getLocale()}}">

<head>
    @include('front.partials.head',[
    'title' => (isset($title) ? $title : ''),
    'description' => (isset($description) ? $description : ''),
    'keywords' => (isset($keywords) ? $keywords : ''),
    ])
</head>

<body>
    <div class="preloader text-center">
        <div class="la-ball-circus la-2x">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    @include('front.partials.header')

    @yield('content')

    @include('front.partials.footer')

    @include('front.partials.scripts')

</body>

</html>
