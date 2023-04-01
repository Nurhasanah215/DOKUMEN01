<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Validator;

class AlumniController extends Controller
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
        $alumni = Alumni::select('tbl_alumni.*', 'tbl_siswa.nama_lengkap as nama_siswa')->leftJoin('tbl_siswa', 'tbl_siswa.id_siswa', '=', 'tbl_alumni.id_siswa')->get();

        return view('dokumen/alumni/index', compact('alumni'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('dokumen/alumni/create', compact('siswa'));
    }

    public function store(Request $request)
    {
        // dd($request->id_siswa);
        $validator = $request->validate(
            [
                'id_siswa' => 'required',
                'tahun' => 'required',
                'no_ijazah' => 'required',
                'ijazah' => 'required|mimes:jpg,jpeg,png|max:1024',

            ],
            [
                'id_siswa.required' => 'siswa wajib di isi',
                'tahun.required' => 'wajib di isi',
                'no_ijazah.required' => 'wajib di isi',
                'ijazah.required' => 'wajib di isi |mimes: file harus bertipe png/jpg/jpeg | file harus dibawah 1 mb',
            ]
        );
        $ijazah = '';
        if ($request->hasFile('ijazah')) {
            $extension = $request->file('ijazah')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $request->file('ijazah')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('ijazah')->getClientOriginalExtension();
            $ijazah = $fileName;
            // $path = $request->file('ijazah')->storeAs('public/guru', $ijazah);
        } else {
            $ijazah = 'noimage.jpg';
        }

        Alumni::create([
            'id_siswa' => $request->id_siswa,
            'tahun' => $request->tahun,
            'no_ijazah' => $request->no_ijazah,
            'ijazah' => $ijazah,
        ]);

        return redirect()->route('alumni.index')->with('success', ' Data Alumni Berhasil Ditambah.');
    }

    public function edit($id_alumni)
    {
        $alumni = Alumni::where('id_alumni', $id_alumni)->first();
        $siswa = Siswa::all();
        return view('dokumen/alumni/edit', compact('alumni', 'siswa'));
    }

    public function update(Request $request, $id_alumni)
    {
        $alumni = Alumni::where('id_alumni', $id_alumni)->first();
        $validator = $request->validate(
            [
                'id_siswa' => 'required',
                'tahun' => 'required',
                'no_ijazah' => 'required'


            ],
            [
                'id_siswa.required' => 'siswa wajib di isi',
                'tahun.required' => 'wajib di isi',
                'no_ijazah.required' => 'wajib di isi',
            ]
        );

        $ijazah = '';
        if ($request->hasFile('ijazah')) {
            $extension = $request->file('ijazah')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $request->file('ijazah')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('ijazah')->getClientOriginalExtension();
            $ijazah = $fileName;
            // $path = $request->file('ijazah')->storeAs('public/guru', $ijazah);
        } else {
            $ijazah = $alumni->ijazah;
        }

        DB::table('tbl_alumni')->where('id_alumni', $id_alumni)->update([
            'id_siswa' => $request->id_siswa,
            'tahun' => $request->tahun,
            'no_ijazah' => $request->no_ijazah,
            'ijazah' => $ijazah,
        ]);

        return redirect()->route('alumni.index')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id_alumni)
    {
        DB::table('tbl_alumni')->where('id_alumni', $id_alumni)->delete();
        return redirect()->route('alumni.index')->with('success', 'Data Berhasil Di hapus');
    }

    public function detail($id_alumni)
    {
        $alumni = Alumni::select('tbl_alumni.*', 'tbl_siswa.nama_lengkap as nama_siswa')->leftJoin('tbl_siswa', 'tbl_siswa.id_siswa', '=', 'tbl_alumni.id_siswa')->where('tbl_alumni.id_alumni' , '=', $id_alumni)->first();
        
        return view('dokumen/alumni/detail', compact('alumni'));
    }
}
