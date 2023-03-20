<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
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
        $alumni = Alumni::all();
        return view('dokumen/alumni/index', compact('alumni'));
    }

    public function create()
    {
        $alumni = Alumni::all();
        return view('dokumen/alumni/create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_lengkap' => 'required',
            'no_ijazah' => 'required',
            'ijazah' => 'required',
            
        ];

        $messages = [
            'nama_lengkap.required' => 'wajib di isi',
            'no_ijazah.required' => 'wajib di isi',
            'ijazah.required' => 'wajib di isi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if ($request->hasFile('ijazah')) {
            $filenameWithExt = $request->file('ijazah')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ijazah')->getClientOriginalExtension();
            $ijazah = $filename.'_'.time().'.'.$extension;
            $path = $request->file('ijazah')->storeAs('public/alumni', $ijazah);
        }else{
            $ijazah = 'noimage.jpg';
        }

        

        $alumni = new Alumni();
        $alumni->nama_lengkap = $request->nama_lengkap;
        $alumni->no_ijazah = $request->no_ijazah;
        $alumni->ijazah = $request->ijazah;

        $alumni->save();

        return redirect()->route('alumni.index')->with('success',' Data Alumni Berhasil Ditambah.');
    }

     public function edit($id_alumni)
    {
        $alumni = Alumni::find($id_alumni);
        return view('dokumen/alumni/edit', compact('id_alumni'));
    }

     public function update(Request $request,$id_alumni)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_ijazah' => 'required',
            'ijazah' => 'required',
        ]);

        if ($request->hasFile('ijazah')) {
            $filenameWithExt = $request->file('ijazah')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ijazah')->getClientOriginalExtension();
            $ijazah = $filename.'_'.time().'.'.$extension;
            $path = $request->file('ijazah')->storeAs('public/alumni', $ijazah);
        }else{
            $ijazah = 'noimage.jpg';
        }

       

        $alumni = Alumni::find($id_alumni);
        $alumni->nama_lengkap = $request->get('nama_lengkap');
        $alumni->no_ijazah = $request->get('no_ijazah');
        $alumni->ijazah = $ijazah;
       
        $alumni->save();

        return redirect()->route('alumni.index', ['id_alumni => $id_alumni'])->with('success', 'Data Berhasil Di Update');
    }

     public function delete($id_alumni)
    {
        Alumni::find($id_alumni)-> delete();
        return back();
    }
}
