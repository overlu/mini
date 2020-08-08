<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controller;

use App\Model\Article;
use App\Model\Dares;
use App\Model\User;
use Exception;
use Mini\Cache\Cache;
use Mini\Database\Mysql\DB;
use Mini\Logging\Log;
use Mini\Contracts\HttpMessage\RequestInterface;
use Mini\Contracts\HttpMessage\ResponseInterface;
use Mini\Support\Coroutine;
use Mini\Support\Filesystem;
use Mini\Support\Json;
use Mini\Support\Str;
use Mini\Validator\Validator;

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
        return $this->success([], 'Hello Mini. 🙂');
    }

    /**
     * @param RequestInterface $request
     * @return array|string
     * @throws Exception
     */
    public function validate(RequestInterface $request)
    {
        $validate = new Validator();
        $validation = $validate->validate($request->all(), [
            'name' => 'required|min:6'
        ]);
        if ($validation->fails()) {
            return $validation->errors()->all();
        }
        return 'ok';
    }
}
