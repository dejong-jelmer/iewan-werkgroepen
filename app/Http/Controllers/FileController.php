<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showFiles()
    {
        return view('files');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'unique:files,name',
            'workgroup' => 'required',
            'type' => 'required',
        ]);
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $newFile = File::create([
            'name' => $name,
            'path' => 'public/files/' . $name,
            'type' => $request->type,
            'ext' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
            'workgroup_id' => $request->workgroup ?? 1
        ]);

        Storage::putFileAs('public/files', $file, $name);
        return redirect()->back()->with('success', 'Bestand geupload.');

    }

    public function downloadFile($file_id)
    {
        $file = File::find($file_id);
        return Storage::download($file->path);
    }
}
