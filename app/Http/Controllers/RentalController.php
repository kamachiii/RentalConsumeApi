<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;

$BaseApi = new BaseApi();

class rentalController extends Controller
{

    public function index(Request $request)
    {
        $baseApi = new BaseApi();
        $data = $baseApi->index('/api/rentals');
        if($request->input('search_supir')){
            $search = $request->query('search_supir');
            $data = (new BaseApi)->index('api/rentals?search_supir', ['search_supir' => $search]);
        }
        $rentals = $data->json();
        return view('dashboard')->with(['rentals' => $rentals['data']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rental = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'type' => $request->type,
            'waktu_jam' => $request->waktu_jam,
            'jam_mulai' => $request->jam_mulai,
            'supir' => $request->supir,
        ];
        $proses = (new BaseApi)->store('api/rentals/store', $rental);
        if ($proses->failed()) {
            $errors = $proses->json('rental');
            return redirect()->back()->with(['errors' => $errors]);
        } else {
            return redirect('/rental')->with('success', 'Berhasil menambahkan data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rental = [
            'id' => $id
        ];
        $response = (new BaseApi)->show('/api/rentals/'.$id, $rental);


        return view('edit')->with('rental', $response['data']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // rental yang akan dikirim ($request ke REST APInya)
        $payload = [
            'jam_selesai' => $request->jam_selesai,
            'tempat_tujuan' => $request->tempat_tujuan,
        ];
        // panggil method update dari BaseApi, kirim endpoint (route update dari REST APInya) dan rental ($payload diatas)
        $proses = (new BaseApi)->update('/api/rentals/update/'.$id, $payload);
        if ($proses->failed()) {
            // kalau gagal, balikin lagi sama pesan errors dari json nya
            $errors = $proses->json('rental');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            // berhasil, balikin ke halaman paling awal dengan pesan
            return redirect('/rental')->with('edit', 'Berhasil mengubah data');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proses = (new BaseApi)->delete('/api/rentals/delete/'.$id);
        $detail = $proses->json();
        if ($proses->failed()) {
            $errors = $proses->json('data');
             return redirect()->back()->with(['errors' => $errors]);
         } else {
            return redirect('/rental')->with('deleted', 'Berhasil menghapus data');
        }
    }

    public function trash ()
    {
        $data = (new BaseApi)->onlyTrashed('/api/rentals/show/trash');
        $rental = $data->json('data');
        return view('softDelete')->with('rentals', $rental);
    }

    public function restore($id)
    {
        $proses = (new BaseApi)->restore('/api/rentals/trash/restore/' .$id);
        if($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect(route('trash'))->with('success', 'Berhasil mengembalikan data dari sampah!');
        }
    }

    public function permanentDelete($id)
    {
        $proses = (new BaseApi)->forceDelete('/api/rentals/trash/delete/permanent/' .$id);
        if($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect()->back()->with('deleted', 'Berhasil mengembalikan data dari sampah!');
        }
    }
}
