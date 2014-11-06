<?php   
class RSS   
{   
    /**  
     +----------------------------------------------------------  
     * RSS频道名  
     +----------------------------------------------------------  
     */  
    protected $channel_title = '地铁客——全球搞笑集中营'; 
//	protected $channel_title = '';     
    /**  
     +----------------------------------------------------------  
     * RSS频道链接  
     +----------------------------------------------------------  
     */  
    protected $channel_link = 'http://www.ditieker.com/index.php?c=main&a=feeds';   
//	protected $channel_link = '';   
    /**  
     +----------------------------------------------------------  
     * RSS频道描述  
     +----------------------------------------------------------  
     */  
    protected $channel_description = '面向所有像挤地铁上班一样苦逼的人们提供瞬时间恢复状态的各种极品笑话、图片、视频、音频！每天一看，胜过信春哥！';
//	protected $channel_description = '';      
    /**  
     +----------------------------------------------------------  
     * RSS频道使用的小图标的URL  
     +----------------------------------------------------------  
     */  
    protected $channel_imgurl = 'http://www.ditieker.com/tpl/image/ologo.png';
//	protected $channel_imgurl = '';      
    /**  
     +----------------------------------------------------------  
     * RSS频道所使用的语言  
     +----------------------------------------------------------  
     */  
    protected $language = 'zh_CN';   
    /**  
     +----------------------------------------------------------  
     * RSS文档创建日期，默认为今天  
     +----------------------------------------------------------  
     */  
    protected $pubDate = '';   
    protected $lastBuildDate = '';   
    
    protected $generator = 'DTK RSS Generator';   
    
    /**  
     +----------------------------------------------------------  
     * RSS单条信息的数组  
     +----------------------------------------------------------  
     */  
    protected $items = array();   
    
    /**  
     +----------------------------------------------------------  
     * 构造函数  
     +----------------------------------------------------------  
     * @access public   
     +----------------------------------------------------------  
     * @param string $title  RSS频道名  
     * @param string $link  RSS频道链接  
     * @param string $description  RSS频道描述  
     * @param string $imgurl  RSS频道图标  
     +----------------------------------------------------------  
     */  
    public function __construct($title, $link, $description, $imgurl = '')   
    {   
        $this->channel_title = '地铁客——全球搞笑集中营';   
        $this->channel_link = 'http://www.ditieker.com/index.php?c=main&a=feeds';   
        $this->channel_description = '面向所有像挤地铁上班一样苦逼的人们提供瞬时间恢复状态的各种极品笑话、图片、视频、音频！每天一看，胜过信春哥！';   
        $this->channel_imgurl = 'http://www.ditieker.com/tpl/image/ologo.png';
        $this->language = 'zh_CN';
        $this->pubDate = Date('Y-m-d H:i:s', time());   
        $this->lastBuildDate = Date('Y-m-d H:i:s', time());   
    }   
    
    /**  
     +----------------------------------------------------------  
     * 设置私有变量  
     +----------------------------------------------------------  
     * @access public   
     +----------------------------------------------------------  
     * @param string $key  变量名  
     * @param string $value  变量的值  
     +----------------------------------------------------------  
     */  
     public function Config($key,$value)   
     {   
        $this->{$key} = $value;   
     }   
    
    /**  
     +----------------------------------------------------------  
     * 添加RSS项  
     +----------------------------------------------------------  
     * @access public   
     +----------------------------------------------------------  
     * @param string $title  日志的标题  
     * @param string $link  日志的链接  
     * @param string $description  日志的摘要  
     * @param string $pubDate  日志的发布日期  
     +----------------------------------------------------------  
     */  
     function AddItem($title, $link, $description, $pubDate)   
     {   
        $this->items[] = array('title' => $title, 'link' => $link, 'description' => $description, 'pubDate' => $pubDate);   
     }   
    
     /**  
     +----------------------------------------------------------  
     * 输出RSS的XML为字符串  
     +----------------------------------------------------------  
     * @access public   
     +----------------------------------------------------------  
     * @return string  
     +----------------------------------------------------------  
     */  
    public function Fetch()   
    {   
        $rss = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n";   
        $rss .= "<rss version=\"2.0\">\r\n";   
        $rss .= "<channel>\r\n";   
        $rss .= "<title>{$this->channel_title}</title>\r\n";   
        $rss .= "<description><![CDATA[{$this->channel_description}]]></description>\r\n";   
        $rss .= "<link><![CDATA[{$this->channel_link}]]></link>\r\n";   
        $rss .= "<language>{$this->language}</language>\r\n";   
    
        if ($this->pubDate!='')   
            $rss .= "<pubDate>{$this->pubDate}</pubDate>\r\n";   
        if ($this->lastBuildDate!='')   
            $rss .= "<lastBuildDate>{$this->lastBuildDate}</lastBuildDate>\r\n";   
        if ($this->generator!='')   
            $rss .= "<generator>{$this->generator}</generator>\r\n";   
    
        $rss .= "<ttl>10</ttl>\r\n";   
    
        if (!$this->channel_imgurl!='') {   
            $rss .= "<image>\r\n";   
            $rss .= "<title><![CDATA[{$this->channel_title}]]></title>\r\n";
            $rss .= "<url>{$this->channel_imgurl}</url>\r\n";   
            $rss .= "</image>\r\n";   
        }   
    
        for ($i = 0; $i < count($this->items); $i++) {   
            $rss .= "<item>\r\n";   
            if($this->items[$i]['title']==''){
            	$rss .= "<title><![CDATA[短笑话]]></title>\r\n";
            }else{
            	$rss .= "<title><![CDATA[{$this->items[$i]['title']}]]></title>\r\n";   
            }
            $rss .= "<link>{$this->items[$i]['link']}</link>\r\n";   
            $rss .= "<description><![CDATA[{$this->items[$i]['description']}]]></description>\r\n";   
            $rss .= "<pubDate>{$this->items[$i]['pubDate']}</pubDate>\r\n";   
            $rss .= "</item>\r\n";   
        }   
    
        $rss .= "</channel>\r\n</rss>";   
        return $rss;
        //echo $rss;
    }   
    
    /**  
     +----------------------------------------------------------  
     * 输出RSS的XML到浏览器  
     +----------------------------------------------------------  
     * @access public   
     +----------------------------------------------------------  
     * @return void  
     +----------------------------------------------------------  
     */  
    public function Display()   
    {   
    	header("Content-type: text/html; charset=utf-8");
        echo $this->Fetch();
        exit;
    }
	function feeds($params)
	{
		$site_uri = trim(dirname($GLOBALS['G_SP']['url']["url_path_base"]),"\/\\");
		if( '' == $site_uri ){ $site_uri = 'http://'.$_SERVER["HTTP_HOST"]; 	}else{ $site_uri = 'http://'.$_SERVER["HTTP_HOST"].'/'.$site_uri; }
	
		//处理基本数据
		$bid = $params['bid'];
		//$d = $params['item'];  
		$type = $params['type'];   //模型 类型
		$limit = 'all'; //feed 条数
		$show = $params['showmedia']; //是否展开媒体
		$readall = $params['readall'];  //是否显示阅读全文文字
		$d = split_attribute($params['body']);
		$content = $d['content'];
		$attr = $d['attr'];
		
		$more = 0;
	
		if($type == 6) //一句话笑话
		{
		//只有limit不显示全部的时候才显示
			$final_result = $content;
			
		}
		
		if($type == 1) //文字
		{
			//只有limit不显示全部的时候才显示
			if($limit == 'all')
			{
					$final_result = $content;
			}else{
				if($attr != '') 
				{
					if(file_exists($attr)) {
					$final_result .= '<img src="'.$site_uri.'/'.$attr.'"  alt=""/>';
					$outimg = 1;
					
					} //是否有代表图封面
				}
	
				if(utf8_strlen($content) >700)
				{
					if(!$outimg)
					{
						$final_result .= utf8_substr(strip_tags($content,'<p><ul><li><br><img>'),0,700);
					}else{
						$final_result .= utf8_substr(strip_tags($content,'<p><ul><li><br>'),0,700);
					}
					
					$more = 1;
				}else{
				
					if(!$outimg)
					{
						$final_result .= strip_tags($content,'<p><ul><li><br><img>');
					}else{
						$final_result .= strip_tags($content,'<p><ul><li><br>');
					}
				
					
				}
				//return $result;
			}
		}
		
		
		
		if($type == 3) //图片
		{
			if($limit == 'all')//如果显示全部
			{
				foreach($attr['img'] as $d){ $result0 .= '<a class="highslide" href="'.getBigImg($d['url']).'" onclick="return hs.expand(this)"><img src="'.$site_uri.'/'.$d['url'].'" class="feedimg" alt="'.$d['desc'].'"/></a><p>'.$d['desc'].'</p>';}
				$final_result = $result0.$content;
			}else{
				if($attr['count'] >$limit){ $attr['img'] = arrayPage($attr['img'],$limit); $more = 1;} //不然只显示4个
				$result0 = '<div class="highslide-gallery">';
				foreach($attr['img'] as $d)
				{
					$result0.= '<a class="highslide" href="'.$site_uri.'/'.getBigImg($d['url']).'" onclick="return hs.expand(this)"><img src="'.$site_uri.'/'.$d['url'].'"  alt="'.$d['desc'].'" class="feedimg"/></a>';
				}
				$result0.= '</div>';
				
	
				if(utf8_strlen($content) >700)
				{
					$result1 = utf8_substr(strip_tags($content,'<p><ul><li><br><img>'),0,700); $more = 1;
				}else{
					$result1 = strip_tags($content,'<p><ul><li><br><img>');
				}
				$final_result .= $result0.$result1;
				if($more == 1){ $final_result .= '<p>共'.$attr['count'].'张图</p>'; }
//				return $result2;
				
			}
	
		
		}
		
		
		
		if($type == 2 || $type == 4) //如果是音乐
		{
			if($limit != 'all')//如果不显示全部
			{
				$count = count($attr);
				if($count > $limit){ $more = 1; $attr = arrayPage($attr,$limit);	}  
				if(utf8_strlen($content) >700) //如果内容超过700字则标记
				{
					$result0 = utf8_substr(strip_tags($content,'<p><ul><li><br><img>'),0,700);
					$more = 1;
				}else{
					$result0 = strip_tags($content,'<p><ul><li><br><img>');
				}
				
			}
			
			
			
			foreach($attr as $rs)
			{
				
				
	
				if($rs['type'] == 'youku')
				{
					$url = 'http://player.youku.com/player.php/sid/'.$rs['pid'].'/v.swf';
					if($show == 1)
					{
						$result1 .= '<p> '.$rs['desc'].'</p>'._getSwfplayer($url);
					}else{
						$result1 .= '<div class="player">
						<a href="javascript:;" onclick="OMP(\''.$url.'\',this)"><img src="'.$rs['img'].'" class="img" alt=""/><img src="'.$site_uri.'/tpl/image/videoplay.gif" class="playbtn" alt="" /></a>
						<div class="area"> <p><a href="javascript:;" onclick="LMP(this)">收起</a> '.$rs['desc'].'</p><div class="playbox"></div> </div>
					</div>';	
					}	
					
				}elseif($rs['type'] == 'sina'){
				
					$pid = str_replace('-','_',$rs['pid']);
					$url = 'http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid='.$pid;
					if($show == 1)
					{
						$result1 .= '<p> '.$rs['desc'].'</p>'._getSwfplayer($url);
					}else{
						$result1 .= '<div class="player">
						<a href="javascript:;" onclick="OMP(\''.$url.'\',this)"><img src="'.$rs['img'].'" class="img" alt=""/><img src="'.$site_uri.'/tpl/image/videoplay.gif" class="playbtn" alt="" /></a>
						<div class="area"> <p><a href="javascript:;" onclick="LMP(this)">收起</a> '.$rs['desc'].'</p><div class="playbox"></div> </div>
					</div>';	
					}	
				
				}elseif($rs['type'] == 'xiami'){
			
						$result1 .= '<div class="xiami clearfix"><img src="'.$rs['img'].'" class="img" alt=""/><div>'.$rs['desc'].'</div><embed src="http://www.xiami.com/widget/0_'.$rs['pid'].'/singlePlayer.swf" type="application/x-shockwave-flash" width="257" height="33" wmode="transparent"></embed><div class="clear"></div></div>';
						
				}elseif($rs['type'] == 'flamesky'){
				
					$result1 .= '<div class="xiami clearfix"><img src="'.$rs['img'].'" class="img" alt=""/><div>'.$rs['desc'].'</div><embed src="http://www.flamesky.com/track/'.$rs['pid'].'/ffp.swf" quality="high" width="310" height="45" allowScriptAccess="allways" wmode="transparent" type="application/x-shockwave-flash" /></div>';
				
				}elseif($rs['type'] == 'local'){
					if(stripos($rs['desc'],'mp3'))
					{
						$mtype = 1;
					}else{
						$mtype = 3;
					}
					$result1 .= '<div class="localmu"><p>'.$rs['desc'].'</p>
					<div id="player_'.$rs['pid'].'"></div>
					</div>
					<script type="text/javascript">
					var flashvars = { 
						name : "云边轻博客平台 - 本地音乐",
						skin : "'.$site_uri.'/tpl/swf/skins/mini/blueplayer.zip",
						src  : "'.spUrl('blog','getmusic',array('id'=>$rs['pid'])).'",
						type : '.$mtype.',
						label:"'.$rs['desc'].'"
					};
					var html = CMP.create("cmp", "100%", "50", "'.$site_uri.'/tpl/swf/cmp.swf",flashvars);
					document.getElementById("player_'.$rs['pid'].'").innerHTML = html;
					</script>
					';
		
	
				}elseif($rs['type'] == 'weblink'){
				
					if(stripos($rs['pid'],'mp3'))
					{
						$mtype = 1;
					}else{
						$mtype = 3;
					}
					$result1 .= '<div class="localmu"><p>'.$rs['desc'].' / <a href="'.$rs['pid'].'" target="_blank">点击下载</a></p>
					<div id="player_'.$bid.'"></div>
					</div>
					<script type="text/javascript">
					var flashvars = { 
						name : "云边轻博客平台 - 网络音乐",
						skin : "'.$site_uri.'/tpl/swf/skins/mini/blueplayer.zip",
						src  : "'.$rs['pid'].'",
						type : '.$mtype.',
						label:"'.$rs['desc'].'" 
					};
					var html = CMP.create("cmp", "100%", "50", "'.$site_uri.'/tpl/swf/cmp.swf",flashvars);
					document.getElementById("player_'.$bid.'").innerHTML = html;
					</script>';
	
				
				}elseif($rs['type'] == 'yinyuetai'){
					if($show == 1)
					{
						$result1 .= '<p> '.$rs['desc'].'</p>'._getSwfplayer($rs['pid'].'?autostart=false');
					}else{
						$result1 .= '<div class="player">
						<a href="javascript:;" onclick="OMP(\''.$rs['pid'].'\',this)">
						<img src="'.spUrl('blog','getyytimg',array('src'=>base64_encode($rs['img']))).'" class="img" onerror="this.src=\'tpl/image/videobg.png\'" width="240" /><img src="'.$site_uri.'/tpl/image/videoplay.gif" class="playbtn" style="left:100px; top:50px" /></a>
						<div class="area"> <p><a href="javascript:;" onclick="LMP(this)">收起</a> '.$rs['desc'].'</p><div class="playbox"></div> </div>
					</div>';
					}
					
				}else{
	
					$url = $rs['pid'];
					if($show == 1)
					{
						$result1 .= '<p> '.$rs['desc'].'</p>'._getSwfplayer($url);
					}else{
						$result1 .= '<div class="player">
								 <a href="javascript:;" onclick="OMP(\''.$url.'\',this)">
								 <img src="'.$rs['img'].'" class="img" alt="" /><img src="'.$site_uri.'/tpl/image/videoplay.gif" class="playbtn" alt="" /></a>
								 <div class="area"><p><a href="javascript:;" onclick="LMP(this)">收起</a> '.$rs['desc'].'</p><div class="playbox"></div> </div>
							 </div>';
					 }
				}
					
			}
			$final_result .= $result0.$result1.'<span class="feed_content">'.$content.'</span>';
		}
		
		
		
		if($more == 1)
		{
	
			return  $final_result .='<p class="readMore"><a href="'.goUserBlog(array('bid'=>$bid,'domain'=>$d['domain'],'uid'=>$uid)).'">未完,阅读全文</a></p>';	
		}else{
			return  $final_result;
		}
		
		if($readall == 1 && $more != 1)
		{
			return  $final_result .= '<p class="showAll"><a href="'.goUserBlog(array('bid'=>$bid,'domain'=>$d['domain'],'uid'=>$uid)).'">查看全文</a></p>';	
	
		}else{
			return  $final_result;
		}
		
	}
}   
?>