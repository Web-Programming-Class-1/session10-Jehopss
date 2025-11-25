<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CoursesController extends Controller
{
    //
    // daftar bahasa yg diizinkan; bisa ambil dari config jika diinginkan
    protected $available = ['en', 'id'];

    public function __construct(Request $request)
    {
        // dapatkan parameter route 'lang'
        $lang = $request->route('lang') ?? config('app.locale');

        // validasi agar tidak sembarang value diterima
        if (! in_array($lang, $this->available)) {
            abort(404);
        }

        // set locale Laravel sesuai lang
        App::setLocale($lang);

        // share current locale ke semua view (opsional, berguna untuk switcher)
        view()->share('currentLocale', $lang);
    }

    public function index()
    {
        // contoh data untuk view
        $course = [
            'title' => __('courses.title'),
            'subtitle' => __('courses.subtitle'),
            'price' => 'Rp 1.500.000',
            'duration_weeks' => 6,
        ];

        $seatsCount = 7; // untuk contoh trans_choice
        $studentName = 'Anderies';
        $studentCount = 4;

        return view('courses.index', compact('course', 'seatsCount', 'studentName', 'studentCount'));
    }
}
