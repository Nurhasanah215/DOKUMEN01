<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
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
        // $kelas = Kelas::all();
        $kelas = Kelas::select('tbl_kelas.*', 'tbl_guru.nama_lengkap as nama_guru')->leftJoin('tbl_guru', 'tbl_guru.id_guru', '=', 'tbl_kelas.id_guru')->get();
        
        return view('dokumen/kelas/index', compact('kelas'));
        

    }
    public function create()
    {
        $kelas = Guru::all();
        return view('dokumen/kelas/create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
        [
            'id_guru' => 'required',
            'nama_lengkap' => 'required',
            'nama_kelas' => 'required',
        
        ],
        [
            'id_guru.required' => 'wajib di isi',
            'nama_lengkap.required' => 'wajib di isi',
            'nama_kelas.required' => 'wajib di isi',
        ]    
        );

       Kelas::create([
        'id_guru' => $request->id_guru,
        'nama_lengkap' => $request->nama_lengkap,
        'nama_kelas' => $request->nama_kelas,
    ]);
       return redirect()->route('kelas.index')->with('success', ' Data Kelas Berhasil Ditambah.');
    }

     public function edit($id_kelas)
    {
        $kelas = Kelas::where('id_kelas',$id_kelas)->first();
        return view('dokumen/kelas/edit', compact('kelas'));
    }

     public function update(Request $request, $id_kelas)
    {
        $kelas = Kelas::where('id_kelas',$id_kelas)->first();
        $validator = $request->validate(
            [
            'id_guru' => 'required',
            'nama_lengkap' => 'required',
            'nama_kelas' => 'required'
        ],
        [
            'id_guru.required' => 'wajib di isi',
            'nama_lengkap.required' => 'wajib di isi',
            'nama_kelas.required' => 'wajib di isi'
        ]
        );

        DB::table('tbl_kelas')->where('id_kelas', $kelas->id_kelas)->update([
             'id_guru' => $request->id_guru,
             'nama_lengkap' => $request->nama_lengkap,
             'nama_kelas' => $request->nama_kelas,
         ]);

        return redirect()->route('kelas.index')->with('success', 'Data Berhasil Di Update');
    }

     public function delete($id_kelas)
    {
        DB::table('tbl_kelas')->where('id_kelas', $id_kelas)->delete();
        return redirect()->route('kelas.index')->with('success', 'Data Berhasil Di hapus');
    }

    public function detail($id_kelas){
        $kelas = Kelas::where('id_kelas',$id_kelas)->first();
        // dd($kelas);
        return view('dokumen/kelas/detail', compact('kelas'));

    }
}
