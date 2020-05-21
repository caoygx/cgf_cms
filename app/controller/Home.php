<?php
namespace app\controller;

use app\BaseController;
use QL\QueryList;


class Home extends BaseController
{
    public $autoInstantiateModel=false;


    public function index(){

        /*$elements = [
            'ap','ad','pro','ion','pro','al'
        ];
        $word = "adapprofessional";
        $sp = new Separate($word);
        $sp->dispose($elements);
        var_dump($sp->elements);*/

        /*$oldElementsCount = count($sp->elements);
        foreach ($elements as $element) {
            $sp->getPrefix($word,$element);
            $sp->getSuffix($word,$element);
        }
        $newElementsCount = count($sp->elements);


        if($newElementsCount>$oldElementsCount){
            $oldElementsCount = count($sp->elements);
            foreach ($elements as $element) {
                $sp->getPrefix($word,$element);
                $sp->getSuffix($word,$element);
            }
            $newElementsCount = count($sp->elements);
        }


        if($newElementsCount>$oldElementsCount){
            $oldElementsCount = count($sp->elements);
            foreach ($elements as $element) {
                $sp->getPrefix($word,$element);
                $sp->getSuffix($word,$element);
            }
            $newElementsCount = count($sp->elements);
        }*/



       /* $element = "ad";
        $sp->getPrefix($word,$element);

        $element = "gb";
        $sp->getPrefix($word,$element);


        $element = "ap";
        $sp->getPrefix($word,$element);
        $element = "al";
        $sp->getSuffix($word,$element);

        $element = "pro";
        $sp->getPrefix($word,$element);
        $element = "ion";
        $sp->getSuffix($word,$element);*/


        //exit;
        return $this->toview();
    }

    public function youku()
    {
        $args = [];
        $opts = [
            // 设置http代理
            //'proxy' => 'http://192.168.140.77:8888',
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


        $html = QueryList::get('https://so.youku.com/search_video/q_php',$args,$opts);

        //采集某页面所有的图片
        $data[] = $html->find('html .img_3p8m_')->map(function($item){
            preg_match('/background-image:url\((.+?)\)/is',$item->style,$out);
            if(!empty($out[1])){
                return $out[1];
            }else{
                return '';
            }
        });

        $data2[] = $html->find('html .aplus_exp')->map(function($item){
            $videoInfo = [];
            $trackinfo = json_decode($item->attr('data-trackinfo'));
            $videoInfo['title'] = $trackinfo->object_title;
            $videoInfo['url'] = $item->href;
            return $videoInfo;
        });

        //''
        print_r($data2);
        print_r($data);

        //return $this->toview();
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}

class Separate{
    public $elements = [];
    public $left = 0;
    public $right = 0;
    public $word;



    function __construct($word)
    {
        $this->word = $word;
        $this->right = strlen($word);
    }

    function dispose($elements){
        $oldElementsCount = count($this->elements);
        foreach ($elements as $element) {
            $this->getPrefix($this->word,$element);
            $this->getSuffix($this->word,$element);
        }
        $newElementsCount = count($this->elements);

        if($newElementsCount>$oldElementsCount){
           $this->dispose($elements);
        }
    }

    /**
     * @param $word
     * @param $element
     */
    function getPrefix($word,$prefix){

        $len = strlen($prefix);
        $start = $this->left;
        //设前缀长度=2,取单词2个字符，判断是否与前缀相同，是则找到了前缀
        if(substr($word,$start,$len) === $prefix){
            $this->elements[] = ['start'=>$start,'length'=>$len];
            $this->left = $start+$len;
        }

    }

    function getSuffix($word,$suffix){

        $lenSuffix = strlen($suffix);
        $lenWord = strlen($word);
        $start = $this->right -  $lenSuffix;
        //设前缀长度=2,取单词2个字符，判断是否与前缀相同，是则找到了前缀
        if(substr($word,$start,$lenSuffix) === $suffix){
            $this->elements[] = ['start'=>$start,'length'=>$lenSuffix];
            $this->right = $start;
        }
    }
}
