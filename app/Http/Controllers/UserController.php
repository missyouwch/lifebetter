<?php
/**
 * Created by PhpStorm.
 * User: wangch
 * Date: 2018/1/25
 * Time: 19:23
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return  'api success';

    }
    /**
     * 首页获取推荐数据
     * */
    public function remenList()
    {
        $key = 'user:recomenList';
        Redis::zadd($key,1,'{"name":"huanhuan"}');
        return response()->json([
            'data' => Redis::zrevrangebyscore($key,'+inf','-inf'),
        ]);
    }
}