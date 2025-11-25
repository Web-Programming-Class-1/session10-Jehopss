<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $course['title'] }}</title>

    {{-- hreflang untuk SEO --}}
    <link rel="alternate" href="{{ route('courses', ['lang' => 'id']) }}" hreflang="id" />
    <link rel="alternate" href="{{ route('courses', ['lang' => 'en']) }}" hreflang="en" />
</head>
<body>
    <nav>
        {{-- Language switcher berbasis route --}}
        <a href="{{ route('courses', ['lang' => 'id']) }}"
           @if(app()->getLocale() === 'id') style="font-weight:700" @endif>🇮🇩 ID</a>
        |
        <a href="{{ route('courses', ['lang' => 'en']) }}"
           @if(app()->getLocale() === 'en') style="font-weight:700" @endif>🇬🇧 EN</a>
    </nav>

    <h1>{{ $course['title'] }}</h1>
    <p>{{ $course['subtitle'] }}</p>

    <p><strong>{{ __('courses.price_label') }}:</strong> {{ $course['price'] }}</p>

    <p><strong>Duration:</strong> {{ __('courses.duration', ['weeks' => $course['duration_weeks']]) }}</p>

    <p>
        {{-- pluralization --}}
        {{ trans_choice('courses.seats', $seatsCount, ['count' => $seatsCount]) }}
    </p>

    <p>{{ __('courses.welcome', ['name' => $studentName]) }}</p>
    <p>If 0 no students have joined yet | 1 students joined</p>
    <p>{{ trans_choice('courses.join', $studentCount, ['count' => $studentCount]) }}</p>
    <p><button>{{ __('Enroll now') }}</button> {{-- JSON translation example --}}</p>
</body>
</html>