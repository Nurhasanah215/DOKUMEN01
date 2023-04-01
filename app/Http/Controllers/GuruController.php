<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;
use Validator;

class GuruController extends Controller
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
        $guru = Guru::all();
        return view('dokumen/guru/index', compact('guru'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('dokumen/guru/create', compact('guru'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'nuptk' => 'required',
                'nama_lengkap' => 'required',
                'jk' => 'required',
                'status_sertifikasi' => 'required',
                'tgl_sertifikasi' => 'required',
                'sk_guru' => 'required|mimes:jpg,jpeg,png|max:1024',
                'ijazah' => 'required|mimes:jpg,jpeg,png|max:1024',
                'kk' => 'required|mimes:jpg,jpeg,png|max:1024',
                'ktp' => 'required|mimes:jpg,jpeg,png|max:1024',

            ],
            [
                'nuptk.required' => 'wajib di isi',
                'nama_lengkap.required' => 'wajib di isi',
                'jk.required' => 'wajib di isi',
                'status_sertifikasi.required' => 'wajib di isi',
                'tgl_sertifikasi.required' => 'wajib di isi',
                'sk_guru.required' => 'wajib di isi |mimes: file harus bertipe png/jpg/jpeg | file harus dibawah 1 mb',
                'ijazah.required' => 'wajib di isi',
                'kk.required' => 'wajib di isi',
                'ktp.required' => 'wajib di isi',

            ]
        );

        // dd($validator);
        // $rules = [
        //     'nuptk' => 'required',
        //     'nama_lengkap' => 'required',
        //     'jk' => 'required',
        //     'status_sertifikasi' => 'required',
        //     'tgl_sertifikasi' => 'required',
        //     'sk_guru' => 'required',
        //     'ijazah' => 'required',
        //     'kk' => 'required',
        //     'ktp' => 'required',

        // ];

        // $messages = [
        //     'nuptk.required' => 'wajib di isi',
        //     'nama_lengkap.required' => 'wajib di isi',
        //     'jk.required' => 'wajib di isi',
        //     'status_sertifikasi.required' => 'wajib di isi',
        //     'tgl_sertifikasi.required' => 'wajib di isi',
        //     'sk_guru.required' => 'wajib di isi',
        //     'ijazah.required' => 'wajib di isi',
        //     'kk.required' => 'wajib di isi',
        //     'ktp.required' => 'wajib di isi',

        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);

        // dd($validator);

        // if ($validator->fails()) {
        //     dd('ya');
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // }

        $sk_guru = '';
        $ijazah = '';
        $kk = '';
        $ktp = '';
        if ($request->hasFile('sk_guru')) {
            $extension = $request->file('sk_guru')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            // dd($fileName);
            $request->file('sk_guru')->move(public_path('public/dokumen'), $fileName);
            $sk_guru = $fileName;
            // $path = $request->file('sk_guru')->storeAs('public/guru', $sk_guru);
        } else {
            $sk_guru = 'noimage.jpg';
        }

        if ($request->hasFile('ijazah')) {
            $extension = $request->file('ijazah')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('ijazah')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('ijazah')->getClientOriginalExtension();
            $ijazah = $fileName; 
            // $path = $request->file('ijazah')->storeAs('public/guru', $ijazah);
        } else {
            $ijazah = 'noimage.jpg';
        }

        if ($request->hasFile('kk')) {
            $extension = $request->file('kk')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('kk')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('kk')->getClientOriginalExtension();
            $kk = $fileName;
            // $path = $request->file('kk')->storeAs('public/guru', $kk);
        } else {
            $kk = 'noimage.jpg';
        }

        if ($request->hasFile('ktp')) {
            $extension = $request->file('ktp')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('ktp')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('ktp')->getClientOriginalExtension();
            $ktp = $fileName ;
            // $path = $request->file('ktp')->storeAs('public/guru', $ktp);
        } else {
            $ktp = 'noimage.jpg';
        }

        // $guru = new Guru();
        // $guru->nuptk = $request->nuptk;
        // $guru->nama_lengkap = $request->nama_lengkap;
        // $guru->jk = $request->jk;
        // $guru->status_sertifikasi = $request->status_sertifikasi;
        // $guru->tgl_sertifikasi = $request->tgl_sertifikasi;
        // $guru->sk_guru = $request->sk_guru;
        // $guru->ijazah = $request->ijazah;
        // $guru->kk = $request->kk;
        // $guru->ktp = $request->ktp;

        // $guru->save();

        Guru::create([
            'nuptk' => $request->nuptk,
    	'nama_lengkap' => $request->nama_lengkap,
    	'jk' => $request ->jk,
    	'status_sertifikasi' => $request->status_sertifikasi,
    	'tgl_sertifikasi' => $request->tgl_sertifikasi,
    	'sk_guru' => $sk_guru,
    	'ijazah' => $ijazah,
    	'kk' => $kk,
    	'ktp' => $ktp
        ]);

        return redirect()->route('guru.index')->with('success', ' Data Guru Berhasil Ditambah.');
    }

    public function edit($id_guru)
    {
        $guru = Guru::where('id_guru',$id_guru)->first();
        // dd($guru);
        return view('dokumen/guru/edit', compact('guru'));
    }

    public function update(Request $request, $id_guru)
    {
        $guru = Guru::where('id_guru',$id_guru)->first();
        $validator = $request->validate(
            [
                'nuptk' => 'required',
                'nama_lengkap' => 'required',
                'jk' => 'required',
                'status_sertifikasi' => 'required',
                'tgl_sertifikasi' => 'required'
            ],
            [
                'nuptk.required' => 'wajib di isi',
                'nama_lengkap.required' => 'wajib di isi',
                'jk.required' => 'wajib di isi',
                'status_sertifikasi.required' => 'wajib di isi',
                'tgl_sertifikasi.required' => 'wajib di isi'

            ]
        );
    
        $sk_guru = '';
        $ijazah = '';
        $kk = '';
        $ktp = '';
        if ($request->hasFile('sk_guru')) {
            $extension = $request->file('sk_guru')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            // dd($fileName);
            $request->file('sk_guru')->move(public_path('public/dokumen'), $fileName);
            $sk_guru = $fileName;
            // $path = $request->file('sk_guru')->storeAs('public/guru', $sk_guru);
        }else{
            $sk_guru = $guru->sk_guru;
        }

        if ($request->hasFile('ijazah')) {
            $extension = $request->file('ijazah')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('ijazah')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('ijazah')->getClientOriginalExtension();
            $ijazah = $fileName; 
            // $path = $request->file('ijazah')->storeAs('public/guru', $ijazah);
        }else{
            $ijazah = $guru->ijazah;
        }

        if ($request->hasFile('kk')) {
            $extension = $request->file('kk')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('kk')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('kk')->getClientOriginalExtension();
            $kk = $fileName;
            // $path = $request->file('kk')->storeAs('public/guru', $kk);
        }else{
            $kk = $guru->kk;
        }

        if ($request->hasFile('ktp')) {
            $extension = $request->file('ktp')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('ktp')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('ktp')->getClientOriginalExtension();
            $ktp = $fileName ;
            // $path = $request->file('ktp')->storeAs('public/guru', $ktp);
        }else{
            $ktp = $guru->ktp;
        }

        DB::table('tbl_guru')->where('id_guru', $guru->id_guru)->update([
            'nuptk' => $request->nuptk,
            'nama_lengkap'  => $request->nama_lengkap,
            'jk' => $request->jk,
            'status_sertifikasi' => $request->status_sertifikasi,
            'tgl_sertifikasi' => $request->tgl_sertifikasi,
            'sk_guru' => $sk_guru,
            'ijazah' => $ijazah,
            'kk' => $kk,
            'ktp' => $ktp,
        ]);
        // $guru->update([
        //     'nuptk' => $request->nuptk,
        //     'nama_lengkap'  => $request->nama_lengkap,
        //     'jk' => $request->jk,
        //     'status_sertifikasi' => $request->status_sertifikasi,
        //     'tgl_sertifikasi' => $request->tgl_sertifikasi,
        //     'sk_guru' => $sk_guru,
        //     'ijazah' => $ijazah,
        //     'kk' => $kk,
        //     'ktp' => $ktp,
        // ]);

        // $guru = Guru::find($id_guru);
        // $guru->nuptk = $request->get('nuptk');
        // $guru->nama_lengkap = $request->get('nama_lengkap');
        // $guru->jk = $request->get('jk');
        // $guru->status_sertifikasi = $request->get('status_sertifikasi');
        // $guru->tgl_sertifikasi = $request->get('tgl_sertifikasi');
        // $guru->sk_guru = $sk_guru;
        // $kkguru->ijazah = $ijazah;
        // $guru->kk = $kk;
        // $guru->ktp = $ktp;

        // $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id_guru)
    {
        // dd($id_guru);
        // Guru::find($id_guru)->delete();
        DB::table('tbl_guru')->where('id_guru', $id_guru)->delete();
        return redirect()->route('guru.index')->with('success', 'Data Berhasil Di hapus');
    }

    public function detail($id_guru){
        $guru = Guru::where('id_guru',$id_guru)->first();
        // dd($guru);
        return view('dokumen/guru/detail', compact('guru'));

    }
}
