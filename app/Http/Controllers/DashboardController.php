<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use App\Models\DataFeed;
    use App\Models\Hotel;
    use App\Models\User;
    use App\Models\Wisata;
    use Carbon\Carbon;
    use Barryvdh\DomPDF\Facade\Pdf;

    class DashboardController extends Controller
    {

        /**
         * Displays the dashboard screen
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            $dataFeed = new DataFeed();
            $users = User::count();
            $hotel = Hotel::count();
            $wisata = Wisata::count();
            return view('pages/dashboard/dashboard', compact('dataFeed', 'users', 'hotel', 'wisata'));
        }

        public function export()
        {
            $data['wisata'] = Wisata::query()->get();
            $data['akomodasi'] = Hotel::query()->get();
            $data['user'] = User::query()->where('is_admin', false)->get();
            $pdf = Pdf::loadView('export.pdf', ['data' => $data]);
            return $pdf->stream('laporan.pdf');
        }
    }
