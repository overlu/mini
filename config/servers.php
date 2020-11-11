<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

use App\Events\WebSocket;
use \Mini\Service\Server\Protocol\MQTT;
use App\Events\MqttServer;

return [
    'http' => [
        'ip' => '0.0.0.0',
        'port' => 9501,
        'sock_type' => SWOOLE_SOCK_TCP,
        'callbacks' => [
        ],
        'settings' => [
            /**
             * @url https://wiki.swoole.com/#/server/setting
             */
            'reactor_num' => swoole_cpu_num() * 2,
            'worker_num' => swoole_cpu_num() * 2,
            'pid_file' => runtime_path('http.server.pid'),
            'log_file' => runtime_path('logs/mini.http.log'),
            'log_level' => SWOOLE_LOG_ERROR,
//            'max_request' => 10000,   // 设置 worker 进程的最大任务数， 进程退出后会释放所有内存和资源
//            'task_worker_num' => 2,   // 配置 Task 进程的数量。【默认值：未配置则不启动 task】
//            'task_enable_coroutine' => true,  // 开启 Task 协程支持
//            'task_use_object' => true,    // 设置为 true 时，onTask 回调将变成对象模式
//            'buffer_output_size' => 6 * 1024 * 1024,    // 单次 Server->send 最大允许发送 6M 字节的数据，默认 2M
//            'daemonize' => true,      // 守护进程化，使用 systemd 或者 supervisord 管理 Swoole 服务时，请勿设置 daemonize = 1
//            'chroot' => BASE_PATH,    // 重定向 Worker 进程的文件系统根目录
//            'user' => 'Apache'        // 设置 Worker/TaskWorker 子进程的所属用户。【默认值：执行脚本用户】
//            'group' => 'www-data'     // 设置 worker/task 子进程的进程用户组。【默认值：执行脚本用户组】
//            'ssl_cert_file' => BASE_PATH.'/storage/app/ssl.crt',      // 文件必须为 PEM 格式，不支持 DER 格式，可使用 openssl 工具进行转换
//            'ssl_key_file' => BASE_PATH.'/storage/app/ssl.key',
            /******http config******/
            'upload_tmp_dir' => runtime_path('tmp'),
//            'enable_static_handler' => true,
//            'http_autoindex' => true,
//            'document_root' => BASE_PATH,
//            'http_index_files' => ['index.html', 'index.txt'],
//            "static_handler_locations" => ['/public'],
            'open_http2_protocol' => true,
        ],
        'mode' => SWOOLE_PROCESS,
    ],
    'ws' => [
        'ip' => '0.0.0.0',
        'port' => 9502,
        'sock_type' => SWOOLE_SOCK_TCP,
        'callbacks' => [
            "open" => [WebSocket::class, 'onOpen'],
            "message" => [WebSocket::class, 'onMessage'],
            "close" => [WebSocket::class, 'onClose'],
        ],
        'settings' => [
            'worker_num' => swoole_cpu_num(),
            'open_websocket_protocol' => true,
            'pid_file' => runtime_path('ws.server.pid'),
            'log_file' => runtime_path('logs/mini.ws.log'),
            'log_level' => SWOOLE_LOG_ERROR,
        ],
        'mode' => SWOOLE_PROCESS,
    ],
    'wshttp' => [
        'ip' => '0.0.0.0',
        'port' => 9503,
        'sock_type' => SWOOLE_SOCK_TCP,
        'callbacks' => [
            "open" => [WebSocket::class, 'onOpen'],
            "message" => [WebSocket::class, 'onMessage'],
            "close" => [WebSocket::class, 'onClose'],
        ],
        'settings' => [
            'worker_num' => swoole_cpu_num(),
            'open_websocket_protocol' => true,
            'pid_file' => runtime_path('ws.server.pid'),
            'log_file' => runtime_path('logs/mini.ws.log'),
            'log_level' => SWOOLE_LOG_ERROR,
        ],
        'mode' => SWOOLE_PROCESS,
    ],
    /*'tcp' => [
        'ip' => '0.0.0.0',
        'port' => 9504,
        'sock_type' => SWOOLE_SOCK_TCP,
        'callbacks' => [
            "receive" => function($server, $data){
            },
        ],
        'settings' => [
            'worker_num' => swoole_cpu_num(),
            'pid_file' => runtime_path('tcp.server.pid'),
            'log_file' => runtime_path('logs/mini.tcp.log'),
            'log_level' => SWOOLE_LOG_ERROR,
        ],
        'mode' => SWOOLE_PROCESS,
    ],*/
    /*'mqtt' => [
        'ip' => '0.0.0.0',
        'port' => 9505,
        'callbacks' => [
        ],
        'receiveCallbacks' => [
            MQTT::CONNECT => [MqttServer::class, 'onMqConnect'],
            MQTT::PINGREQ => [MqttServer::class, 'onMqPingreq'],
            MQTT::DISCONNECT => [MqttServer::class, 'onMqDisconnect'],
            MQTT::PUBLISH => [MqttServer::class, 'onMqPublish'],
            MQTT::SUBSCRIBE => [MqttServer::class, 'onMqSubscribe'],
            MQTT::UNSUBSCRIBE => [MqttServer::class, 'onMqUnsubscribe'],
        ],
        'settings' => [
            'worker_num' => 1,
            'open_mqtt_protocol' => true,
            'pid_file' => runtime_path('mqtt.server.pid'),
            'log_file' => runtime_path('logs/mini.mqtt.log'),
            'log_level' => SWOOLE_LOG_ERROR,
        ],
        'mode' => SWOOLE_PROCESS,
    ],*/
];
