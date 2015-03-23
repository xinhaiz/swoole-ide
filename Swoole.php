<?php
/**
 * 当前Swoole的版本号
 */
define('SWOOLE_VERSION', SWOOLE_VERSION);

/**
 * 使用Base模式，业务代码在Reactor中直接执行
 */
define('SWOOLE_BASE', SWOOLE_BASE);

/**
 * 使用线程模式，业务代码在Worker线程中执行
 */
define('SWOOLE_THREAD', SWOOLE_THREAD);

/**
 * 使用进程模式，业务代码在Worker进程中执行
 */
define('SWOOLE_PROCESS', SWOOLE_PROCESS);

/**
 * 创建tcp socket
 */
define('SWOOLE_SOCK_TCP', SWOOLE_SOCK_TCP);

/**
 * 创建tcp ipv6 socket
 */
define('SWOOLE_SOCK_TCP6', SWOOLE_SOCK_TCP6);

/**
 * 创建udp socket
 */
define('SWOOLE_SOCK_UDP', SWOOLE_SOCK_UDP);

/**
 * 创建udp ipv6 socket
 */
define('SWOOLE_SOCK_UDP6', SWOOLE_SOCK_UDP6);

/**
 * 同步客户端
 */
define('SWOOLE_SOCK_SYNC', SWOOLE_SOCK_SYNC);

/**
 * 异步客户端
 */
define('SWOOLE_SOCK_ASYNC', SWOOLE_SOCK_ASYNC);

/**
 * 创建文件锁
 */
define('SWOOLE_FILELOCK', SWOOLE_FILELOCK);

/**
 * 创建互斥锁
 */
define('SWOOLE_MUTEX', SWOOLE_MUTEX);

/**
 * 创建读写锁
 */
define('SWOOLE_MUTEX', SWOOLE_MUTEX);

/**
 * 创建自旋锁
 */
define('SWOOLE_RWLOCK', SWOOLE_SPINLOCK);

/**
 * 创建信号量
 */
define('SWOOLE_SEM', SWOOLE_SEM);


final class swoole_server {
    
    /**
     * @var array
     */
    public $setting = array();
    
    /**
     * @var int
     */
    public $master_pid = null;
    
    /**
     * @var int
     */
    public $manager_pid = null;
    
    /**
     * @var int
     */
    public $worker_id = null;
    
    /**
     * @var int
     */
    public $worker_pid = null;
    
    /**
     * 创建一个swoole server资源对象。
     * 别名： swoole_server_create
     * 
     * @param string $host 参数用来指定监听的ip地址，如127.0.0.1，或者外网地址，或者0.0.0.0监听全部地址
     *                     127.0.0.1表示监听本机，0.0.0.0表示监听所有地址
     *                     使用::1表示监听本机，:: (0:0:0:0:0:0:0:0) 表示监听所有地址
     * @param int $port 监听的端口，如9501，监听小于1024端口需要root权限，如果此端口被占用server->start时会失败
     * @param int $mode 运行的模式，swoole提供了3种运行模式，默认为多进程模式
     * @param int $sock_type 指定socket的类型，支持TCP/UDP、TCP6/UDP6、UnixSock Stream/Dgram 6种
     */
    public function __construct(string $host, int $port, int $mode = SWOOLE_PROCESS, int $sock_type = SWOOLE_SOCK_TCP){}
    
    /**
     * swoole_server->set函数用于设置swoole_server运行时的各项参数。
     * 服务器启动后通过$serv->setting来访问set函数设置的参数数组
     * 
     * 别名： swoole_server_set(swoole_server $server, array $setting);
     * 
     * @param array $setting
     */
    public function set(array $setting){}
    
    /**
     * 注册Server的事件回调函数
     * 
     * @param string $event 回调的名称, 大小写不敏感，具体内容参考回调函数列表
     * @param callenable $callback 回调的PHP函数，可以是函数名的字符串，类静态方法，对象方法数组，匿名函数。
     * 
     * @return boolean
     */
    public function on(string $event, mixed $callback){}
    
    /**
     * Swoole提供了public addListener来增加监听的端口
     * 
     * swoole支持的Socket类型
     * SWOOLE_TCP/SWOOLE_SOCK_TCP       tcp ipv4 socket 
     * SWOOLE_TCP6/SWOOLE_SOCK_TCP6     tcp ipv6 socket
     * SWOOLE_UDP/SWOOLE_SOCK_UDP       udp ipv4 socket
     * SWOOLE_UDP6/SWOOLE_SOCK_UDP6     udp ipv6 socket
     * SWOOLE_UNIX_DGRAM                unix socket dgram
     * SWOOLE_UNIX_STREAM               unix socket stream
     * 
     * @param string $host
     * @param int $port
     * @param int $type
     */
    public function addListener(string $host, int $port, $type = SWOOLE_SOCK_TCP){}
    
    /**
     * 添加一个用户自定义的工作进程
     * 
     * @param swoole_process $process
     * @return boolean
     */
    public function addProcess(swoole_process $process){}
    
    /**
     * 监听一个新的Server端口，此方法是addlistener的别名
     * 
     * @param string $host
     * @param int $port
     * @param int $type
     * @return boolean
     */
    public function listen(string $host, int $port, int $type){}
    
    /**
     * 设置Server的事件回调函数
     * 
     * $event_name 回调的名称, 大小写不敏感，具体内容参考回调函数列表
     * $event_callback_function 回调的PHP函数，可以是字符串，数组，匿名函数
     * 
     * handler/on/set 方法只能在public start前调用
     * 
     * 另名：bool swoole_server_handler(swoole_server $serv, string $event_name, mixed $event_callback_function);
     *      第一个参数是swoole的资源对象
     * 
     * @param string $event_name
     * @param mixed $event_callback_function
     */
    public function handler(string $event_name, mixed $event_callback_function){}
    
    /**
     * 启动server，监听所有TCP/UDP端口
     */
    public function start(){}
    
    /**
     * 重启所有worker进程
     */
    public function reload(){}
    
    /**
     * 关闭服务器
     */
    public function shutdown(){}
    
    /**
     * 设置定时器
     * 
     * 别名： bool swoole_server_addtimer(swoole_server $serv, int $interval);
     * 
     * @param int $interval
     * @return boolean
     */
    public function addtimer(int $interval){}
    
    /**
     * 删除定时器
     * 
     * @param int $interval
     * @return boolean
     */
    public function deltimer(int $interval){}
    
    /**
     * 在指定的时间后执行函数
     * 
     * @param int $after_time_ms 指定时间，单位为毫秒
     * @param mixed $callback_function 时间到期后所执行的函数，必须是可以调用的。callback函数不接受任何参数
     */
    public function after(int $after_time_ms, mixed $callback_function){}
    
    /**
     * 关闭客户端连接
     * 
     * @param int $fd
     * @param int $from_id
     * 
     * @rturn boolean
     */
    public function close(int $fd, int $from_id = 0){}
    
    /**
     * 向客户端发送数据
     * 
     * @param int $fd
     * @param string $data 发送的数据。TCP协议最大不得超过2M，UDP协议不得超过64K
     * @param int $from_id
     * 
     * @return boolean
     */
    public function send(int $fd, string $data, int $from_id = 0){}
    
    /**
     * 发送文件到TCP客户端连接
     * 
     * @param int $fd
     * @param string $filename
     * 
     * @return boolean
     */
    public function sendfile(int $fd, string $filename){}
    
    /**
     * 向任意的客户端IP:PORT发送UDP数据包
     * 
     * @param string $ip 为IPv4字符串，如192.168.1.102。如果IP不合法会返回错误 
     * @param int $port 为 1-65535的网络端口号，如果端口错误发送会失败
     * @param string $data 要发送的数据内容，可以是文本或者二进制内容
     * @param bool $ipv6 是否为IPv6地址，可选参数，默认为false
     * 
     * @return boolean
     */
    public function sendto(string $ip, int $port, string $data, bool $ipv6 = false){}
    
    /**
     * 此函数可以向任意worker进程或者task进程发送消息。
     * 在非主进程和管理进程中可调用。收到消息的进程会触发onPipeMessage事件
     * 
     * @param string $message 为发送的消息数据内容
     * @param int $dst_worker_id 为目标进程的ID，范围是0 ~ (worker_num + task_worker_num - 1)
     * 
     * @return boolean
     */
    public function sendMessage(string $message, int $dst_worker_id){}
    
    /**
     * 获取连接的信息
     * 
     * @param int $fd
     * @param int $fromid
     * 
     * @return array
     */
    public function connection_info(int $fd = null, int $fromid = null){}
    
    /**
     * 用来遍历当前Server所有的客户端连接
     * connection_list方法是基于共享内存的，不存在IOWait，遍历的速度很快
     * 另外connection_list会返回所有TCP连接，而不仅仅是当前worker进程的TCP连接
     * 
     * @param int $start_fd
     * @param int $pagesize
     * 
     * @return array|false
     */
    public function connection_list(int $start_fd = 0, int $pagesize = 10){}
    
    /**
     * 将连接绑定一个用户定义的ID，可以设置dispatch_mode=5设置已此ID值进行hash固定分配
     * 可以保证某一个UID的连接全部会分配到同一个Worker进程
     * 
     * @param int $fd 连接的文件描述符
     * @param int $uid 指定UID
     */
    public function bind(int $fd, int $uid){}
    
    /**
     * 得到当前Server的活动TCP连接数，启动时间，accpet/close的总次数等信息
     */
    public function stats(){}
    
    /**
     * 投递一个异步任务到task_worker池中。此函数会立即返回。worker进程可以继续处理新的请求
     * 
     * @param string $data 要投递的任务数据
     * @param int $dst_worker_id 可以制定要给投递给哪个task进程，
     *                          传入ID即可，范围是0 - serv->task_worker_num 
     *                          返回值为整数($task_id)，表示此任务的ID。
     *                          如果有finish回应，onFinish回调中会携带$task_id参数
     * 
     * @return boolean
     */
    public function task(string $data, int $dst_worker_id = -1){}
    
    /**
     * taskwait与task方法作用相同，用于投递一个异步的任务到task进程池去执行
     * 与task不同的是taskwait是阻塞等待的，直到任务完成或者超时返回
     * 
     * @param string $task_data
     * @param float $timeout
     * @param int $dst_worker_id
     */
    public function taskwait(string $task_data, float $timeout = 0.5, int $dst_worker_id = -1){}
    
    /**
     * 此函数用于在task进程中通知worker进程，投递的任务已完成
     * 
     * public finish是可选的。如果worker进程不关心任务执行的结果，不需要调用此函数
     * 在onTask回调函数中return字符串，等同于调用finishs
     */
    public function finish(){}
    
    /**
     * 检测服务器所有连接，并找出已经超过约定时间的连接。
     * 如果指定if_close_connection，则自动关闭超时的连接。未指定仅返回连接的fd数组
     * 
     * $if_close_connection是否关闭超时的连接，默认为true
     * 调用成功将返回一个连续数组，元素是已关闭的$fd, 调用失败返回false
     * 
     * @param boolean $if_close_connection
     * 
     * @return boolean
     */
    public function heartbeat(bool $if_close_connection = true){}
}

final class swoole_client {
    
    /**
     * @var int
     */
    public $errCode = null;
    
    /**
     * @var int
     */
    public $sock = null;
    
    /**
     * @param int $sock_type 表示socket的类型，如TCP/UDP。
     * @param int $is_sync 表示同步阻塞还是异步非阻塞，默认为同步阻塞
     * @param string $key 用于长连接的Key，默认使用IP:PORT作为key。相同key的连接会被复用
     */
    public function __construct(int $sock_type, int $is_sync = SWOOLE_SOCK_SYNC, string $key){}
    
    /**
     * 注册异步事件回调函数，调用on方法会使当前的socket变成非阻塞的
     * 
     * @param string 支持connect/error/receive/close 4种
     * @param mixed $callback 可以是函数名字符串、匿名函数、类静态方法、对象方法
     */
    public function on(string $event, mixed $callback){}
    
    /**
     * 连接到远程服务器
     * 
     * $flag参数在UDP类型时表示是否启用udp_connect 
     * 设定此选项后将绑定$host与$port，此UDP将会丢弃非指定host/port的数据包。
     * $flag参数在TCP类型,$flag=1表示设置为非阻塞socket，connect会立即返回
     * 如果将$flag设置为1，那么在send/recv前必须使用swoole_client_select来检测是否完成了连接
     * 
     * @param string $host 是远程服务器的地址
     * @param int $port 远程服务器端口
     * @param float $timeout 是网络IO的超时，单位是s，支持浮点数。默认为0.1s，即100ms
     * @param int $flag 参数在UDP类型时表示是否启用udp_connect
     * 
     * @return boolean
     */
    public function connect(string $host, int $port, float $timeout = 0.1, int $flag = 0){}
    
    /**
     * 返回swoole_client的连接状态
     * 
     * @return boolean
     */
    public function isConnected(){}
    
    /**
     * 用于获取客户端socket的本地host:port，必须在连接之后才可以使用
     * 
     * @return  array
     */
    public function getsockname(){}
    
    /**
     * 获取对端socket的IP地址和端口，仅支持SWOOLE_SOCK_UDP/SWOOLE_SOCK_UDP6类型的swoole_client对象
     * 此函数必须在$client->recv() 之后调用
     * 
     * @return string
     */
    public function getpeername(){}
    
    /**
     * 发送数据到远程服务器，必须在建立连接后，才可向Server发送数据
     * 如果未执行connect，调用send会触发PHP警告
     * 
     * $data参数为字符串，支持二进制数据 成功发送返回的已发数据长度 
     * 失败返回false，并设置$swoole_client->errCode
     * 
     * @param string $data
     * 
     * @return int
     */
    public function send(string $data){}
    
    /**
     * 向任意IP:PORT的主机发送UDP数据包，仅支持SWOOLE_SOCK_UDP/SWOOLE_SOCK_UDP6类型的swoole_client对象。
     * 
     * @param string $ip
     * @param int $port
     * @param string $data 要发送的数据内容，不得超过64K
     * 
     * @return boolean
     */
    public function sendto(string $ip, int $port, string $data){}
    
    /**
     * 发送文件到服务器，本函数是基于sendfile操作系统调用的
     * 
     * @param string $filename
     * @return boolean
     */
    public function sendfile(string $filename){}
    
    /**
     * recv方法用于从服务器端接收数据
     * 
     * @param int $size 接收数据的最大长度
     * @param bool $waitall 是否等待所有数据到达后返回
     * 
     * @return string
     */
    public function recv(int $size = 65535, bool $waitall = 0){}
    
    /**
     * 关闭连接
     */
    public function close(){}
    
}

final class Process {
    
    /**
     * 
     * @param mixed $function 子进程创建成功后要执行的函数
     * @param boolean $redirect_stdin_stdout 重定向子进程的标准输入和输出。 
     *          启用此选项后，在进程内echo将不是打印屏幕，而是写入到管道。
     *          读取键盘输入将变为从管道中读取数据。 默认为阻塞读取
     * @param boolean $create_pipe 是否创建管道，启用$redirect_stdin_stdout后，
     *                  此选项将忽略用户参数，强制为true 如果子进程内没有进程间通信，可以设置为false
     */
    public function __construct(mixed $function, $redirect_stdin_stdout = false, $create_pipe = true){}
    
    /**
     * 执行fork系统调用
     * 
     * $process->pid 属性为子进程的PID
     * $process->pipe 属性为管道的文件描述符
     */
    public function start(){}
    
    /**
     * 修改进程名称。此函数是swoole_set_process_name的别名
     * 
     * @param string $new_process_name
     */
    public function name(string $new_process_name){}
    
    /**
     * 执行一个外部程序，此函数是exec系统调用的封装。
     * 
     * 由于exec系统调用会使用指定的程序覆盖当前程序，子进程需要读写标准输出与父进程进行通信
     * 如果未指定redirect_stdin_stdout = true，执行exec后子进程与父进程无法通信
     * 
     * @param string $execfile
     * @param array $args
     */
    public function exec(string $execfile, array $args){}
    
    /**
     * 向管道内写入数据
     * 
     * 在子进程内调用write，主进程会收到数据
     * 在主进程内调用write，子进程会收到数据
     * 
     * @param string $data
     */
    public function write(string $data){}
    
    /**
     * 从管道中读取数据
     * 
     * @param int $buffer_size
     */
    public function read(int $buffer_size=8192){}
    
    /**
     * 启用消息队列作为进程间通信
     * 
     * useQueue方法接受2个可选参数。
     * 
     * 创建消息队列失败，会返回false。
     * 可使用swoole_strerror(swoole_errno()) 得到错误码和错误信息。
     * 
     * @param int $msgkey 是消息队列的key，默认会使用ftok(FILE)
     * @param int $mode 通信模式，默认为2，表示争抢模式，所有创建的子进程都会从队列中取数据
     */
    public function useQueue(int $msgkey = 0, int $mode = 1){}
    
    /**
     * 投递数据到消息队列中
     * 
     * $data要投递的数据，长度受限与操作系统内核参数的限制。默认为8192，最大不超过65536
     * 操作失败会返回false，成功返回true
     * 
     * @param string $data
     */
    public function push(string $data){}
    
    /**
     * 从队列中提取数据
     * 
     * @param int $maxsize
     * @return string
     */
    public function pop(int $maxsize = 8192){}
    
    /**
     * 用于关闭创建的好的管道
     */
    public function close(){}
    
    /**
     * 退出子进程
     */
    public function exit(){}
    
    /**
     * 向子进程发送信号
     * 
     * 默认的信号为SIGTREM，表示终止进程。
     * $signo=0表示检测子进程是否存在，不会真的发送信号
     * 
     * @param int $pid
     * @param string $signo
     */
    public static function kill($pid, $signo = SIGTREM){}
    
    /**
     * 回收结束运行的子进程。
     * $blocking 参数可以指定是否阻塞等待，默认为阻塞
     * 操作成功会返回返回一个数组包含子进程的PID和退出状态码，
     * 如array('code' => 0, 'pid' => 15001)，失败返回false
     * 
     * @param bool $blocking
     * 
     * @return array
     */
    public static function wait(bool $blocking = true){}
    
    /**
     * 使当前进程脱变为一个守护进程
     * 
     * @param bool $nochdir 为true表示不修改当前目录。默认false表示将当前目录切换到“/”
     * @param bool $noclose 默认false表示将标准输入和输出重定向到/dev/null
     * 
     * @return boolean
     */
    public static function daemon(bool $nochdir = false, bool $noclose = false){}
    
    /**
     * 设置异步信号监听
     * 
     * @param int $signo
     * @param mixed $callback
     * 
     * @return boolean
     */
    public static function signal(int $signo, mixed $callback){}
}