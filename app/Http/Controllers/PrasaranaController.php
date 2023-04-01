<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\Prasarana;
use Illuminate\Support\Facades\DB;
use Validator;

class PrasaranaController extends Controller
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
        // $prasarana = prasarana::all();
        $prasarana = Prasarana::select('tbl_prasarana.*', 'tbl_guru.nama_lengkap as nama_guru')->leftJoin('tbl_guru', 'tbl_guru.id_guru', '=', 'tbl_prasarana.id_guru')->get();
        
        return view('dokumen/prasarana/index', compact('prasarana'));
        

    }
    public function create()
    {
        $prasarana = Guru::all();
        return view('dokumen/prasarana/create', compact('prasarana'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
        [
            'id_guru' => 'required',
            'nama_prasarana' => 'required',
            'sk_prasarana' => 'required|mimes:jpg,jpeg,png|max:1024',
            'gambar' => 'required|mimes:jpg,jpeg,png|max:1024',
        
        ],
        [
            'id_guru.required' => 'wajib di isi',
            'nama_prasarana.required' => 'wajib di isi',
            'sk_prasarana.required' => 'wajib di isi |mimes: file harus bertipe png/jpg/jpeg | file harus dibawah 1 mb',
            'gambar.required' => 'wajib di isi |mimes: file harus bertipe png/jpg/jpeg | file harus dibawah 1 mb',
        ]    
        );

         $sk_prasarana = '';
        if ($request->hasFile('sk_prasarana')) {
            $extension = $request->file('sk_prasarana')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $request->file('sk_prasarana')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('sk_prasarana')->getClientOriginalExtension();
            $sk_prasarana = $fileName;
            // $path = $request->file('sk_prasarana')->storeAs('public/guru', $sk_prasarana);
        } else {
            $sk_prasarana = 'noimage.jpg';
        }

         $gambar = '';
        if ($request->hasFile('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $request->file('gambar')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('gambar')->getClientOriginalExtension();
            $gambar = $fileName;
            // $path = $request->file('gambar')->storeAs('public/guru', $gambar);
        } else {
            $gambar = 'noimage.jpg';
        }

       Prasarana::create([
        'id_guru' => $request->id_guru,
        'nama_prasarana' => $request->nama_prasarana,
        'sk_prasarana' => $sk_prasarana,
        'gambar' => $gambar,
        
    ]);
       return redirect()->route('prasarana.index')->with('success', ' Data prasarana Berhasil Ditambah.');
    }

     public function edit($id_prasarana)
    {
        $prasarana = Prasarana::where('id_prasarana',$id_prasarana)->first();
        return view('dokumen/prasarana/edit', compact('prasarana'));
    }

     public function update(Request $request, $id_prasarana)
    {
        $prasarana = Prasarana::where('id_prasarana',$id_prasarana)->first();
        $validator = $request->validate(
            [
            'id_guru' => 'required',
            'nama_prasarana' => 'required'
           
        ],
        [
            'id_guru.required' => 'wajib di isi',
            'nama_prasarana.required' => 'wajib di isi',
            
        ]
        );

        $sk_prasarana = '';
        if ($request->hasFile('sk_prasarana')) {
            $extension = $request->file('sk_prasarana')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $request->file('sk_prasarana')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('sk_prasarana')->getClientOriginalExtension();
            $sk_prasarana = $fileName;
            // $path = $request->file('sk_prasarana')->storeAs('public/guru', $sk_prasarana);
        } else {
            $sk_prasarana = $alumni->sk_prasarana;
        }

        $gambar = '';
        if ($request->hasFile('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $request->file('gambar')->move(public_path('public/dokumen'), $fileName);
            // $extension = $request->file('gambar')->getClientOriginalExtension();
            $gambar = $fileName;
            // $path = $request->file('gambar')->storeAs('public/guru', $gambar);
        } else {
            $gambar = $alumni->gambar;
        }

        DB::table('tbl_prasarana')->where('id_prasarana', $prasarana->id_prasarana)->update([

             'id_guru' => $request->id_guru,
             'nama_prasarana' => $request->nama_prasarana,
             'sk_prasarana' => $sk_prasarana,
             'gambar' => $gambar,
             
         ]);

        return redirect()->route('prasarana.index')->with('success', 'Data Berhasil Di Update');
    }

     public function delete($id_prasarana)
    {
        DB::table('tbl_prasarana')->where('id_prasarana', $id_prasarana)->delete();
        return redirect()->route('prasarana.index')->with('success', 'Data Berhasil Di hapus');
    }

    public function detail($id_prasarana){
        $prasarana = Prasarana::where('id_prasarana',$id_prasarana)->first();
        // dd($prasarana);
        return view('dokumen/prasarana/detail', compact('prasarana'));

    }
}
