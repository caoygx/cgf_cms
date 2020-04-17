<?php
namespace app\controller;

use app\BaseController;
use QL\QueryList;


class Home extends BaseController
{
    public $autoInstantiateModel=false;
    public function index()
    {
        $args = [];
        $opts = [
            // 设置http代理
            'proxy' => 'http://192.168.140.77:8888',
            //设置超时时间，单位：秒
            'timeout' => 30,
            // 伪造http头
            'headers' => [
                'Referer' => 'https://www.youku.com',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36 SocketLog(tabid=392&client_id=)',
                'Accept-Encoding'=> 'gzip, deflate, br',
                'Accept-Language'=>  'zh-CN,zh;q=0.9',
                'Cookie' => 'firstExpireTime=1587089284295; firstTimes=1; __ysuid=1557022065424SSQ; cna=EbJNFapHRmYCAT2YQmJNrunb; __ayft=1562124123236; juid=01deqtkvft2nv4; ypvid=1562124125889hVZvAG; yseid=1562124125889i2kjD7; ysestep=1; yseidcount=1; yseidtimeout=1562131325890; ycid=0; ystep=1; seid=01dlu2p2vv3b2; referhost=; seidtimeout=1569748158982; __aysid=15867729991267Bg; __ayscnt=7; UM_distinctid=1717d0a103833-015101de93ff21-3f385c06-168000-1717d0a10391c1; youku_history_word=[%22php%22]; ctoken=VTozVvU_v4dcEGCUxrZVmk7s; __arycid=dz-1-00; __arcms=dz-1-00; _m_h5_tk=401bd4c0907a0f6d7db57a946eae2a4f_1587006694816; _m_h5_tk_enc=ca588e3bec296246701ba9f9b43739af; _m_h5_c=4c654dbe9b2df785bc188b0017a25c38_1587012455639%3Bb0008a9fb135123be3a27b88a2ff9e15; modalFrequency={"UUID":"1"}; modalBlackListclose={"UUID":"1"}; modalBlackListlogined={"UUID":"1"}; __ayvstp=70; __aysvstp=55; P_ck_ctl=654DAB89C16BB5B4F1DAC20565CB376D; __arpvid=15870028837352zGhZ1-1587002883745; __aypstp=36; __ayspstp=26; isg=BCEhHD5H22eR9nQY7MXetEf7MO07zpXAQg_4CYP2MCiH6kG8yh_KkE-4Sh7sOS34',

            ]
        ];


        //采集某页面所有的图片
        $data[] = QueryList::get('https://so.youku.com/search_video/q_php',$args,$opts)->find('html .img_3p8m_')->map(function($item){
            preg_match('/background-image:url\((.+?)\)/is',$item->style,$out);
            if(!empty($out[1])){
                return $out[1];
            }else{
                return '';
            }
        });
        //打印结果
        print_r($data);

        //return $this->toview();
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}
