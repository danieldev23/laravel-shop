<?php


namespace App\Http\Services;
use Illuminate\Http\Request;

class UploadService
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");

                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }


            // $name = $request->getClientOriginalName();
            // $path
            // $path = $request->file('file')->storeAs('public/uploads' . date("Y/m/d"), $name);

            // dd($path);
        }
    }
}