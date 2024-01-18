<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Services\TestService;
/*use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;*/

class TestController extends Controller
{
    /** @noinspection PhpMissingReturnTypeInspection */
    public function test(TestRequest $request, TestService $service)
    {
        $service->process($request->validated());
        //return response()->noContent();
        //return response()->json($service->getData());
    }
}
