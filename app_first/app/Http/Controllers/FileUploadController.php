<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as LaravelFile;

class FileUploadController extends Controller
{
    public function index() {
        $files = File::all();
        return view('file-upload', ['files' => $files]);
    }

    public function submit(FileUploadRequest $request) {
        $file = $request->file('file');
        $customeName = 'test_' . Str::uuid();
        $ext = $file->getClientOriginalExtension();
        $fileName = $customeName . $ext;

        $fileName = $file->storeAs('/', $fileName, 'dir_public');

        $fileStore = new File();
        $fileStore->file_name = $fileName;
        $fileStore->file_path = '/uploads/' . $fileName;
        $fileStore->save();

        return redirect()->route('file.upload');
    }

    public function download(Request $request) {
        return Storage::disk('dir_public')->download($request->file_name);
    }

    public function delete(Request $request) {
        $file = File::where(['file_name' => $request->file_name])->first();
        if ($file) {
            LaravelFile::delete(public_path($file->file_path));
            $file->delete();
        }

        return redirect()->route('file.upload');
    }
}
