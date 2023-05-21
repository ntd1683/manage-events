<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportGoogleSheet;
use App\Http\Trait\ResponseTrait;
use App\Models\Event;
use App\Models\RegisterEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Revolution\Google\Sheets\Facades\Sheets;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    use ResponseTrait;

    public function import(ImportGoogleSheet $request): JsonResponse
    {
        try{
            $listError = [];
            $sheet = $request->get('sheet');
            $arr =  explode('/', $sheet);
            $spreadsheetId = $arr[array_search('d', $arr) + 1];
            $sheet = $request->get('sheet_tab_name');

            $sheets = Sheets::spreadsheet($spreadsheetId)->sheet($sheet)->get();
            $header = $sheets->pull(0);
            $posts = Sheets::collection($header, $sheets);
            $posts = $posts->take(5000);

            $data = $posts->toArray();

            $name = $request->get('name') ?: 'name';
            $code_student = $request->get('code_student') ?: 'code_student';
            $class = $request->get('class') ?: 'class';
            $faculty = $request->get('faculty') ?: 'faculty';
            $phone = $request->get('phone') ?: 'phone';
            $email = $request->get('email') ?: 'email';

            foreach ($data as $key => $value) {
                $tmp = [
                    'name' => $value[$name],
                    'code_student' => $value[$code_student],
                    'class' => $value[$class],
                    'faculty' => $value[$faculty],
                    'phone' => trim($value[$phone]),
                    'email' => trim($value[$email]),
                ];

                $validator = Validator::make($tmp, [
                    'name' => ['required', 'string'],
                    'code_student' => ['required', 'string'],
                    'class' => ['required', 'string'],
                    'faculty' => ['required', 'string'],
                    'phone' => ['required', 'string'],
                    'email' => ['required', 'string', 'email'],
                ]);

                if ($validator->fails()) {
                    $message = implode('', $validator->errors()->all());
                    $listError[] = 'Line ' . $key + 1 . ': ' . $message;
                } else {
                    try {
                        Event::query()
                            ->where('id', $request->get('event_id'))
                            ->update(['google_sheet' => $request->get('sheet')]);
                        $tmp['event_id'] = $request->get('event_id');
                        RegisterEvent::insert($tmp);
                    } catch (\Exception $e) {
                        $listError[] = 'Line ' . $key + 1 . ': ' . $e->getMessage();
                    }
                }
            }

            return $this->successResponse($listError, 'Upload data successfully');
        } catch (\Exception $e) {
            return $this->errorResponse(trans($e->getMessage()));
        }
    }
}
