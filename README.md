Mini, 基于`swoole4`和`php7.4`的协程框架

```
 _______ _____ __   _ _____
 |  |  |   |   | \  |   |
 |  |  | __|__ |  \_| __|__   2.15.1

**********************************************************************************************
* App Information    | Name: Mini, Env: Local, Timezone: UTC
* System Information | OS: Linux-4.4.0-22621-Microsoft-x86_64, PHP: 7.4.33, Swoole: 4.8.10
**********************************************************************************************

2023/11/23 08:59:17 🚀 mini http server [8 workers] running：0.0.0.0:9501...
2023/11/23 08:59:17 👀 watching start...
2023/11/23 08:59:17 📡 watching [40] files...

```

### Install Mini
```bash
composer create-project overlu/mini
```

### Run Mini
```bash
php bin/mini start
```

### More
[View Wiki](https://github.com/overlu/mini/wiki)

### Performance Testing
__2CPU/2G__
```bash
➜  ab -n 5000 -c 10 http://127.0.0.1:9501/
This is ApacheBench, Version 2.3 <$Revision: 1843412 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        Mini
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /
Document Length:        141 bytes

Concurrency Level:      10
Time taken for tests:   0.714 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1730000 bytes
HTML transferred:       705000 bytes
Requests per second:    6998.25 [#/sec] (mean)
Time per request:       1.429 [ms] (mean)
Time per request:       0.143 [ms] (mean, across all concurrent requests)
Transfer rate:          2364.64 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       2
Processing:     0    1   0.4      1       4
Waiting:        0    1   0.4      1       4
Total:          1    1   0.4      1       5

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      2
  80%      2
  90%      2
  95%      2
  98%      3
  99%      3
 100%      5 (longest request)
```
