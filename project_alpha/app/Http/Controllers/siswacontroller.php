<?php


namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


    
class siswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        
        if (!empty($katakunci)) {
            $data = siswa::where('nis', 'like', "%$katakunci%")
                ->orwhere('nama', 'like', "%$katakunci%")
                ->orwhere('tgl_lhr', 'like', "%$katakunci%")
                ->orwhere('no_hp', 'like', "%$katakunci%")
                ->orwhere('jns_klmn', 'like', "%$katakunci%")
                ->orwhere('alamat', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = siswa::orderBy('nis', 'desc')->paginate($jumlahbaris);
        }
        
        return view('siswa.index')->with('data', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nis', $request->nis);
        Session::flash('nama', $request->nama);
        Session::flash('tmpt_lahir', $request->tmpt_lahir);
        Session::flash('tgl_lhr', $request->tgl_lhr);
        Session::flash('no_hp', $request->no_hp);
        Session::flash('jns_klmn', $request->jns_klmn);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis',
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lhr' => 'required|date|before_or_equal:today',
            'no_hp' => 'required|numeric:siswa,no_hp',
            'jns_klmn' => 'required',
            'alamat' => 'required',
        ],[
            'nis.required'=>'NIS WAJIB DIISI',
            'nis.numeric'=>'NIS WAJIB ANGKA',
            'nis.unique'=>'NIS SUDAH ADA',
            'nama.required'=>'NAMA WAJIB DIISI',
            'tmpt_lahir.required'=>'TEMPAT LAHIR WAJIB DIISI',
            'tgl_lhr.required'=>'TANGGAL WAJIB DIISI',
            'tgl_lhr.before_or_equal'=> 'TANGGAL LAHIR TIDAK VALID',
            'no_hp.required'=>'NOMOR HANDPHONE WAJIB DIISI',
            'jns_klmn.required'=>'JENIS KELAMIN WAJIB DIISI',
            'alamat.required'=>'ALAMAT WAJIB DIISI',
        ]);
        $data = [
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'tmpt_lahir'=>$request->tmpt_lahir,
            'tgl_lhr'=>$request->tgl_lhr,
            'no_hp'=>$request->no_hp,
            'jns_klmn'=>$request->jns_klmn,
            'alamat'=>$request->alamat
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('nis',$id)->first();
        return view('siswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\http\Request  $request
     * @param int  $id
     * @return \illuminate\http\response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lhr' => 'required',
            'no_hp' => 'required',
            'jns_klmn' => 'required',
            'alamat' => 'required',
        ],[
            'tmpt_lahir.required'=>'TEMPAT LAHIR wajib diisi',
            'tgl_lhr.required'=>'TANGGAL wajib diisi',
            'no_hp.required'=>'NOMOR HANDPHONE wajib diisi',
            'jns_klmn.required'=>'JENIS KELAMIN wajib diisi',
            'alamat.required'=>'ALAMAT wajib diisi',
        ]);
        $data = [
            'nama'=>$request->nama,
            'tmpt_lahir'=>$request->tmpt_lahir,
            'tgl_lhr'=>$request->tgl_lhr,
            'no_hp'=>$request->no_hp,
            'jns_klmn'=>$request->jns_klmn,
            'alamat'=>$request->alamat
        ];

        siswa::where('nis',$id)->update($data);
        return redirect()->to('siswa')->with('success','Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('nis', $id)->delete();
        return redirect()->to('siswa')->with('success','Data Berhasil Dihapus');
    }
}
