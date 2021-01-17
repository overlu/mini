<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers;

use Exception;
use Mini\Contracts\HttpMessage\RequestInterface;
use Mini\Facades\Validator;

class IndexController extends Controller
{
    public function welcome()
    {
        $info = <<<EOL
<pre>
 _   _ _____ _     _     ___       __  __ ___ _   _ ___ 
| | | | ____| |   | |   / _ \     |  \/  |_ _| \ | |_ _|
| |_| |  _| | |   | |  | | | |    | |\/| || ||  \| || | 
|  _  | |___| |___| |__| |_| |    | |  | || || |\  || | 
|_| |_|_____|_____|_____\___/     |_|  |_|___|_| \_|___|
</pre>
EOL;
        return view('welcome', ['value' => $info]);
    }

    public function index(): array
    {
        return $this->success('Hello Mini. 🙂');
    }

    /**
     * @param $data
     * @param $frame
     * @return string
     */
    public function message($data, $frame): string
    {
        return 'this is server' . json_encode((array)$data, JSON_UNESCAPED_UNICODE) . $frame->data;
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
