<?php

namespace App\Http\Controllers;

use App\Testimoni;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TestimoniRequest;

class TestimoniController extends Controller
{
    public function index()
    {
        $items = DB::table('testimonies')->join('travel_packages', 'testimonies.travel_packages_id', '=', 'travel_packages.id')
            ->join('users', 'users.id', '=', 'testimonies.users_id')
            ->select('name', 'testimoni', 'location')->paginate(6);
        // var_dump($items);
        // die;

        return view('pages.testimoni.index', [
            'items' => $items,
            'page' => 'testimoni'
        ]);
    }

    public function create()
    {
        return view('pages.testimoni.create', [
            'page' => 'pesanan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimoniRequest $request, $id)
    {
        $data = $request->all();

        $items = Transaction::where('id', $id)->get();
        $cek = Testimoni::where(['transactions_id' => $id])->get();
        // var_dump(count($cek));
        // die;
        if (count($cek) == 0) {
            $data['travel_packages_id'] = $items[0]['travel_packages_id'];
            $data['transactions_id'] = $items[0]['id'];
            $data['users_id'] = $items[0]['users_id'];
            $aksi = Testimoni::create($data);
            if ($aksi) {
                $item = Transaction::findOrFail($id);
                $item->update(['status_review' => 1]);
            }
            return redirect()->route('pesanan');
        }
        return redirect()->route('pesanan');
    }
}
