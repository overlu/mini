<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Http;

use Exception;
use Mini\Contracts\HttpMessage\RequestInterface;
use Mini\Facades\Validator;

class IndexController extends Controller
{
    public function welcome()
    {
        return view('welcome', ['value' => 'Hello Mini.']);
    }

    public function index(): array
    {
        return $this->success('Hello Mini. 🙂');
    }

    /**
     * @param RequestInterface $request
     * @return array|string
     * @throws Exception
     */
    public function validate(RequestInterface $request)
    {
        $validation = Validator::validate($request->all(), [
            'name' => 'required|min:6'
        ]);
        if ($validation->fails()) {
            return $validation->errors()->all();
        }
        return 'ok';
    }
}
