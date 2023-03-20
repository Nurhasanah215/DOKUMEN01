<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Validator;

class KelasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('dokumen/kelas/index', compact('kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('dokumen/kelas/create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $rules = [
            'id_guru' => 'required',
            'nama_lengkap' => 'required',
            'nama_kelas' => 'required',
            
            
        ];

        $messages = [
           'id_guru.required' => 'wajib di isi',
            'nama_lengkap.required' => 'wajib di isi',
            'nama_kelas.required' => 'wajib di isi',
            
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

       
        $kelas = new Kelas();
        $kelas->id_guru = $request->id_guru;
        $kelas->nama_lengkap = $request->nama_lengkap;
        $kelas->nama_kelas = $request->nama_kelas;
        

        $kelas->save();

        return redirect()->route('kelas.index')->with('success',' Data Kelas Berhasil Ditambah.');
    }

     public function edit($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        return view('dokumen/kelas/edit', compact('id_kelas'));
    }

     public function update(Request $request,$id_kelas)
    {
        $request->validate([
            'id_guru' => 'required',
            'nama_lengkap' => 'required',
            'nama_kelas' => 'required',
        ]);
       

        $kelas = Kelas::find($id_kelas);
        $kelas->id_guru = $request->get('id_guru');
        $kelas->nama_lengkap = $request->get('nama_lengkap');
        $kelas->nama_kelas = $request->get('nama_kelas');
       
       
        $kelas->save();

        return redirect()->route('kelas.index', ['id_kelas => $id_kelas'])->with('success', 'Data Berhasil Di Update');
    }

     public function delete($id_kelas)
    {
        Kelas::find($id_kelas)-> delete();
        return back();
    }
}
