<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;

class BannerController extends Controller
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
            'judul' => 'required',
            'tampilkan' => 'nullable|boolean',
            'file.*' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ]);

        $dataToCreate = $request->except(['file']);

        if ($berita = $this->model::create($dataToCreate)) {

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $uploadedFile) {
                    $targetPath = Storage::putFile($berita->folder, $uploadedFile);

                    $berita->file()->create([
                        'data' => [
                            'name' => $uploadedFile->getClientOriginalName(),
                            'disk' => config('filesystems.default'),
                            'target' => $targetPath,
                        ],
                    ]);
                }
            }
            $response = [
                'status' => true,
                'message' => 'Data berhasil disimpan',
            ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Data gagal disimpan',
                ];
            }
        
        return response()->json($response ?? ['status' => false, 'message' => 'Data gagal disimpan']);
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
            'judul' => 'required',
            'tampilkan' => 'nullable|boolean',
            'file.*' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'existing_files' => 'nullable|array',
        ]);

        $data = $this->model::findOrFail($id);
        $dataToUpdate = $request->except(['new_files', 'existing_files']);

        if ($data->update($dataToUpdate)) {
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $uploadedFile) {
                    $data->file()->create([
                        'data' => [
                            'disk' => config('filesystems.default'),
                            'target' => Storage::putFile($data->folder, $uploadedFile),
                            'name' => $uploadedFile->getClientOriginalName(),
                        ],
                    ]);
                }
            }
        $response = [ 'status' => true, 'message' => 'Data berhasil disimpan', ];
        } else {
            $response = [ 'status' => false, 'message' => 'Data gagal diperbarui', ];
        }
        return response()->json($response);
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
