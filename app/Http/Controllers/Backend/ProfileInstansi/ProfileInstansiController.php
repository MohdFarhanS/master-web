<?php

namespace App\Http\Controllers\Backend\ProfileInstansi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\ProfileInstansi;

class ProfileInstansiController extends Controller
{
    public function index()
    {
        return view($this->view.'.index');
    }

    public function create()
    {
        return view($this->view.'.create');
    }

    public function data(Request $request)
    {
        $user = $request->user();
        $data=$this->model::all();
        return datatables()->of($data)
            ->addColumn('action', function ($data) use ($user) {
                $button ='';
                if($user->read){
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Detail" data-action="show" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Tampilkan"><i class="fa fa-eye text-info"></i></button>';
                }
                if($user->update){
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Edit" data-action="edit" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Edit"> <i class="fa fa-edit text-warning"></i> </button> ';
                }
                if($user->delete){
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>".$button."</div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function store(Request $request)
    {
        $request->validate([
            'kata_pengantar' => 'required',
			'sejarah_singkat' => 'required',
			'visi_misi' => 'required',
			'tugas_fungsi' => 'required',
        ]);

        if($data=$this->model::create($request->all())) {
            if($request->hasFile('file')) {
                $data->file()->create([
                    'data'=>[
                        'name'=>$request->file('file')->getClientOriginalName(),
                        'disk'=>config('filesystems.default'),
                        'target'=>Storage::putFile($data->folder, $request->file('file')),
                    ],
                ]);
            }
            $response=[
                'status'=>TRUE, 'message'=>'Data Berhasil disimpan',
            ];
        }
        else {
            $response=[
                'status'=>FALSE, 'message'=>'Data gagal disimpan',
            ];
        }
        return response()->json($response);
    }

    public function show($id)
    {
        $data = $this->model::find($id);
        return view($this->view.'.show', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->model::find($id);
        return view($this->view.'.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kata_pengantar' => 'required',
			'sejarah_singkat' => 'required',
			'visi_misi' => 'required',
			'tugas_fungsi' => 'required',
            'file.*' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data=$this->model::find($id);
        if($data->update($request->all())){
            $response=[ 'status'=>TRUE, 'message'=>'Data berhasil disimpan'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Data gagal disimpan']);
    }

    public function delete($id)
    {
        $data=$this->model::find($id);
        return view($this->view.'.delete', compact('data'));
    }

    public function destroy($id)
    {
        $data=$this->model::find($id);
        if($data->delete()){
            $response=[ 'status'=>TRUE, 'message'=>'Data berhasil dihapus'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Data gagal dihapus']);
    }
}
