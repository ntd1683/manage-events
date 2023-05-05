<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleController extends Controller
{
    public function index()
    {
        $sheets = Sheets::spreadsheet('1YygRRzvQ6u-9WSVdBOaJNcYPs7S5PRr3i62GZzhlhpc')->sheet('Thành viên clb')->get();
        $header = $sheets->pull(0);
        $posts = Sheets::collection($header, $sheets);
        $posts = $posts->take(5000);

        $data = $posts->toArray();
        dd($data);

        if ($data) {
            foreach ($data as $key => $value) {
                info($value);
            }
        }else{
            info('data not found');
        }
    }
}
