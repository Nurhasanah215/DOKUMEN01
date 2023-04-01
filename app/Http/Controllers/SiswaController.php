<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Validator;

class SiswaController extends Controller
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
        $siswa = Siswa::all();
        return view('dokumen/siswa/index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('dokumen/siswa/create', compact('kelas'));
    }

    public function store(Request $request)
    {

        $validator = $request->validate(
            [
                // 'id_alumni' => 'required',
                'id_kelas' => 'required',
                'nisn' => 'required',
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'jk' => 'required',
                'no_hp' => 'required',
                
                'skl_siswa' => 'required|mimes:jpg,jpeg,png|max:1024',
                'pip_siswa' => 'required|mimes:jpg,jpeg,png|max:1024',
                'kk' => 'required|mimes:jpg,jpeg,png|max:1024',
                'gambar' => 'required|mimes:jpg,jpeg,png|max:1024',

            ],
            [
                // 'id_alumni.required' => 'wajib di isi',
                'id_kelas.required' => 'kelas wajib di isi',
                'nisn.required' => 'wajib di isi',
                'nama_lengkap.required' => 'wajib di isi',
                'alamat.required' => 'wajib di isi',
                'jk.required' => 'wajib di isi',
                'no_hp.required' => 'wajib di isi',
            
                'skl_siswa' => 'wajib di isi |mimes: file harus bertipe png/jpg/jpeg | file harus dibawah 1 mb',
                'pip_siswa.required' => 'wajib di isi',
                'kk.required' => 'wajib di isi',
                'gambar.required' => 'wajib di isi',

            ]
        );


        $skl_siswa = '';
        $pip_siswa = '';
        $kk = '';
        $gambar = '';
        if ($request->hasFile('skl_siswa')) {
            $extension = $request->file('skl_siswa')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            
            $request->file('skl_siswa')->move(public_path('public/dokumen'), $fileName);
            $skl_siswa = $fileName;
            
        } else {
            $skl_siswa = 'noimage.jpg';
        }

        if ($request->hasFile('pip_siswa')) {
            $extension = $request->file('pip_siswa')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('pip_siswa')->move(public_path('public/dokumen'), $fileName);
            $pip_siswa = $fileName; 
        } else {
            $pip_siswa = 'noimage.jpg';
        }

        if ($request->hasFile('kk')) {
            $extension = $request->file('kk')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('kk')->move(public_path('public/dokumen'), $fileName);
            $kk = $fileName;
        } else {
            $kk = 'noimage.jpg';
        }

         if ($request->hasFile('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('gambar')->move(public_path('public/dokumen'), $fileName);
            $gambar = $fileName ;
        } else {
            $gambar = 'noimage.jpg';
        }

        Siswa::create([
            'id_alumni' => $request->id_alumni ? $request->id_alumni : null,
            'id_kelas' => $request->id_kelas ? $request->id_kelas : null,
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'jk' => $request ->jk,
            'no_hp' => $request->no_hp,
            'skl_siswa' => $skl_siswa,
            'pip_siswa' => $pip_siswa,
            'kk' => $kk,
            'gambar' => $gambar,
        ]);

        return redirect()->route('siswa.index')->with('success', ' Data Siswa Berhasil Ditambah.');
    }

    public function edit($id_siswa)
    {
        $siswa = Siswa::where('id_siswa',$id_siswa)->first();
        $kelas = Kelas::all();
        // dd($siswa);
        return view('dokumen/siswa/edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id_siswa)
    {
        $siswa = Siswa::where('id_siswa',$id_siswa)->first();
        $validator = $request->validate(
            [
                // 'id_alumni' => 'required',
                'id_kelas' => 'required',
                'nisn' => 'required',
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'jk' => 'required',
                'no_hp' => 'required',
                
                'skl_siswa' => 'mimes:jpg,jpeg,png|max:1024',
                'pip_siswa' => 'mimes:jpg,jpeg,png|max:1024',
                'kk' => 'mimes:jpg,jpeg,png|max:1024',
                'gambar' => 'mimes:jpg,jpeg,png|max:1024',

            ],
            [
                // 'id_alumni.required' => 'wajib di isi',
                'id_kelas.required' => 'kelas wajib di isi',
                'nisn.required' => 'wajib di isi',
                'nama_lengkap.required' => 'wajib di isi',
                'alamat.required' => 'wajib di isi',
                'jk.required' => 'wajib di isi',
                'no_hp.required' => 'wajib di isi',
            
                'skl_siswa.required' => 'wajib di isi |mimes: file harus bertipe png/jpg/jpeg | file harus dibawah 1 mb',
                'pip_siswa.required' => 'wajib di isi',
                'kk.required' => 'wajib di isi',
                'gambar.required' => 'wajib di isi',

            ]
        );
    
        $skl_siswa = '';
        $pip_siswa = '';
        $kk = '';
        $gambar = '';
        if ($request->hasFile('skl_siswa')) {
            $extension = $request->file('skl_siswa')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('skl_siswa')->move(public_path('public/dokumen'), $fileName);
        }else{
            $skl_siswa = $siswa->skl_siswa;
        }

        if ($request->hasFile('pip_siswa')) {
            $extension = $request->file('pip_siswa')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('pip_siswa')->move(public_path('public/dokumen'), $fileName);
            $pip_siswa = $fileName; 
        }else{
            $pip_siswa = $siswa->pip_siswa;
        }

        if ($request->hasFile('kk')) {
            $extension = $request->file('kk')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('kk')->move(public_path('public/dokumen'), $fileName);
            $kk = $fileName;
        }else{
            $kk = $siswa->kk;
        }

        if ($request->hasFile('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('gambar')->move(public_path('public/dokumen'), $fileName);
            $gambar = $fileName ;
        }else{
            $gambar = $siswa->gambar;
        }

        DB::table('tbl_siswa')->where('id_siswa', $siswa->id_siswa)->update([

            'id_alumni' => $request->id_alumni ? $request->id_alumni : null,
            'id_kelas' => $request->id_kelas ? $request->id_kelas : null,
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'jk' => $request ->jk,
            'no_hp' => $request->no_hp,
            'skl_siswa' => $skl_siswa,
            'pip_siswa' => $pip_siswa,
            'kk' => $kk,
            'gambar' => $gambar,
        ]);

          return redirect()->route('siswa.index')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id_siswa)
    {
        DB::table('tbl_siswa')->where('id_siswa', $id_siswa)->delete();
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Di hapus');
    }

    public function detail($id_siswa){
        $siswa = Siswa::where('id_siswa',$id_siswa)->first();
        return view('dokumen/siswa/detail', compact('siswa'));

    }
}
