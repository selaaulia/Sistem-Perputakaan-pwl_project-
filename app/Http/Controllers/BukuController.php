<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::paginate(10);
        return view('buku.index', ['bukus' => $bukus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add([
            'kode_buku' => 'BK' . str_pad(Buku::max('id_buku') + 1, 3, '0', STR_PAD_LEFT)
        ]);

        $request->validate([
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'kategori_buku' => 'required',
            'nama_penulis' => 'required',
            'nama_penerbit' => 'required',
            'no_rak' => 'required',
            'tahun' => 'required',
            'jumlah' => 'required',
        ]);

        Buku::create($request->all());
        return redirect()->route('buku.index')
        ->with('success', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bukus = Buku::find($id);
        return view('buku.detail', compact('bukus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bukus = Buku::find($id);
        return view('buku.edit', compact('bukus'));
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
        $request->validate([
            'id_buku' => 'required',
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'kategori_buku' => 'required',
            'nama_penulis' => 'required',
            'nama_penerbit' => 'required',
            'no_rak' => 'required',
            'tahun' => 'required',
            'jumlah' => 'required',
            ]);

         //fungsi eloquent untuk mengupdate data inputan kita
         Buku::find($id)->update($request->all());

         //jika data berhasil diupdate, akan kembali ke halaman utama
         return redirect()->route('buku.index')->with('success', 'Buku Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::find($id)->delete();
        return redirect()->route('buku.index') -> with('success', 'Buku Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $bukus = Buku::where([
            ['kode_buku', '!=', null, 'OR', 'judul_buku', '!=', null, 'OR', 'kategori_buku', '!=', null, 'OR', 'tahun', '!=', null,
            'OR', 'nama_penerbit', '!=', null, 'OR', 'nama_penulis', '!=', null],
            [function ($query) use ($request){
                if (($keyword = $request->keyword)) {
                    $query  ->orWhere('kode_buku', 'like', "%{$keyword}%")
                            ->orWhere('judul_buku', 'like', "%{$keyword}%")
                            ->orWhere('kategori_buku', 'like', "%{$keyword}%")
                            ->orWhere('tahun', 'like', "%{$keyword}%")
                            ->orWhere('nama_penerbit', 'like', "%{$keyword}%")
                            ->orWhere('nama_penulis', 'like', "%{$keyword}%");
                }
            }]
        ])
        ->orderBy('id_buku')
        ->paginate(5);
    
        return view('buku.index', compact('bukus'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}