<?php
/////////////////////////////////////////////////////////////////
//地铁客开源轻博客, Copyright (C)   2010 - 2011  www.ditieker.com 
//EMAIL:ditieker@163.com QQ:530548182                              
//$Id: image.php 7 2011-09-20 15:02:20Z anythink $ 

class image {
    /**
     * 图片文件句柄
     * @var image
     */
    var $image;
    /**
     * 图片类型
     *
     * @var imagetype
     */
    var $image_type;
    var $image_quality=80;
    var $true_color = false;
    /**
     * 装载图像
     *
     * @param string $filename 文件完整路径
     * @return void
     */
    
    function load($filename) {
        @ini_set('memory_limit', '128M');
        $image_info = @getimagesize($filename);
        $this->image_type = $image_info[2];
        if( $this->image_type == IMAGETYPE_JPEG ) {
            $this->image = @imagecreatefromjpeg($filename);
        } elseif( $this->image_type == IMAGETYPE_GIF ) {
            $this->image = @imagecreatefromgif($filename);
        } elseif( $this->image_type == IMAGETYPE_PNG ) {
            $this->image = @imagecreatefrompng($filename);
        }else{
            return false;
        }
        if(function_exists("imagecopyresampled") && function_exists("imagecreatetruecolor") && $this->image_type != IMAGETYPE_GIF){
            $this->true_color = true;
        }
    }
    
    function setQuality($q){
        if($q>0) $this->image_quality = $q;
    }
    /**
     * 返回扩展名
     * @return string 扩展名
     */
    function getExtension(){
        if( $this->image_type == IMAGETYPE_JPEG ) return 'jpg';
        elseif( $this->image_type == IMAGETYPE_GIF ) return 'gif';
        elseif( $this->image_type == IMAGETYPE_PNG ) return 'png';
    }

    /**
     * 将图形对象保存成文件
     * @param string $filename 文件名
     * @param int $image_type 文件类型
     * return volid
     */
    function save($filename) {
        $image_type = $this->image_type;
        if( $image_type == IMAGETYPE_JPEG ) {
           if(@imagejpeg($this->image,$filename,$this->image_quality)) {return true;}
        } elseif( $image_type == IMAGETYPE_GIF ) {
            if(@imagegif($this->image,$filename)) {return true;}
        } elseif( $image_type == IMAGETYPE_PNG ) {
            if(@imagepng($this->image,$filename)) {return true;}
        }
		return false;
    }
    
    /**
     * 将图像输出到数据流
     * @param int $image_type 文件类型
     * @return void
     */
    function output() {
        $image_type = $this->image_type;
        if( $image_type == IMAGETYPE_JPEG ) {
            header('Content-Type: image/jpeg');
            imagejpeg($this->image,NULL,$this->image_quality);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            header('Content-type: image/gif');
            imagegif($this->image);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            header('Content-type: image/png');
            imagepng($this->image);
        }
    }

    /**
     * 获得图像宽度
     * @return int 图像宽度
     */
    function getWidth() {
        return imagesx($this->image);
    }

    /**
     * 获得图像高度
     * @return int 图像高度
     */
    function getHeight() {
        return imagesy($this->image);
    }

    /**
     * 等比例缩小到指定高度
     * @param int $height 指定高度
     */
    function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width,$height);
    }

    /**
     * 缩小到指定尺寸
     * 
     * @param int $w 指定宽度
     * @param int $h 指定高度
     */
    function resizeTo($w=0, $h=0) {
        if($w>0 && $h>0) return $this->resize($w,$h);
        else if($w>0) return $this->resizeToWidth($w);
        else if($h>0) return $this->resizeToHeight($h);
    }
    /**
     * 指定最大宽度和最大高度
     * @param int $w 最大宽度
      * @param int $h 最大高度
     */
    function resizeScale($w=0,$h=0){
        if($w == 0 && $h>0){
            return $this->resizeToHeight($h);
        }
        if($h == 0 && $w>0){
            return $this->resizeToWidth($w);
        }
        if($w == 0 && $h==0){
            return false;
        }
        $maxwidth = $w;
        $maxheight = $h;
        
        $width = $this->getWidth();
        $height = $this->getHeight();
        
        $RESIZEWIDTH = $RESIZEHEIGHT = false;
        if($maxwidth && $width > $maxwidth){
            $widthratio = $maxwidth/$width;
            $RESIZEWIDTH=true;
        }
        if($maxheight && $height > $maxheight){
            $heightratio = $maxheight/$height;
            $RESIZEHEIGHT=true;
        }
        if($RESIZEWIDTH && $RESIZEHEIGHT){
            if($widthratio < $heightratio){
                return $this->resizeToWidth($w);
            }else{
                return $this->resizeToHeight($h);
            }
        }elseif($RESIZEWIDTH){
            return $this->resizeToWidth($w);
        }elseif($RESIZEHEIGHT){
            return $this->resizeToHeight($h);
        }
    }
    /**
     * 等比例缩小到指定宽度，并切成方形
     * @param int $v 指定宽度/高度
     */
    function square($v){
        $width = $this->getWidth();
        $height = $this->getHeight();
        $left = 0;
        $top = 0;
        if($width>$height){
            $this->resizeToHeight($v);
            $left = ceil(($v/$height * $width - $v)/2); 
        }else{
            $this->resizeToWidth($v);
            $top = ceil(($v/$width * $height - $v)/2); 
        }
        $this->cut($v,$v,$left,$top);
    }
    /**
     * 等比例缩小到指定宽度
     * @param int $width 指定宽度
     */
    function resizeToWidth($width) {
        if($width>=$this->getWidth()) return;
        $ratio = $width / $this->getWidth();
        $height = $this->getHeight() * $ratio;
        $this->resize($width,$height);
    }

    /**
     * 维持宽高比缩小指定比例
     * @param int $scale 指定比例
     */
    function scale($scale) {
        $width = $this->getWidth() * $scale/100;
        $height = $this->getHeight() * $scale/100;
        $this->resize($width,$height);
    }

    /**
     * 改变图像尺寸
     * @param int $width 指定宽度
     * @param int $height 指定高度
     */
    function resize($width,$height) {
        if($this->true_color){
            $newim = imagecreatetruecolor($width, $height);
            imagecopyresampled($newim, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        }else{
            $newim = imagecreate($width, $height);
            imagecopyresized($newim, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        }
        imagedestroy($this->image);
        $this->image = $newim;
    }

    /**
     * 裁剪图像
     *
     * @param int $width 指定宽度
     * @param int $height 指定高度
     */
    function cut($width,$height,$left = 0,$top = 0){
        if($this->true_color){
            $new_image = imagecreatetruecolor($width, $height);
        }else{
            $new_image = imagecreate($width, $height);
        }
        imagecopy($new_image, $this->image, 0, 0, $left, $top, $width, $height);
        imagedestroy($this->image);
        $this->image = $new_image;
    }

    /**
     * 截取从某纵向位置开始指定高度的图像
     *
     * @param int $top 指定位置
     * @param int $height 指定高度
     */
    function vcut($top,$height){
        $width = $this->getWidth();
        $height = $this->getHeight()-$top+$height;
        if($height<200) return;
        if($this->true_color){
            $new_image = imagecreatetruecolor($width, $height);
        }else{
            $new_image = imagecreate($width, $height);
        }
        imagecopy($new_image, $this->image, 0, 0, 0, $top, $width, $height);
        imagedestroy($this->image);
        $this->image = $new_image;
    }

    /**
     * 获取图片EXIF信息
     */
    function GetImageInfo($img) {
        if(!function_exists('exif_read_data')){
            return false;
        }
        $Flash_arr = array(
            0x00 => "关闭",
            0x01 => "开启",
            0x05 => "打开(不探测返回光线)",
            0x07 => "打开(探测返回光线)",
            0x09 => "打开(强制)",
            0x0D => "打开(强制/不探测返回光线)",
            0x0F => "打开(强制/探测返回光线)",
            0x10 => "关闭(强制)",
            0x18 => "关闭(自动)",
            0x19 => "打开(自动)",
            0x1D => "打开(自动/不探测返回光线)",
            0x1F => "打开(自动/探测返回光线)",
            0x20 => "没有闪光功能",
            0x41 => "打开(防红眼)",
            0x45 => "打开(防红眼/不探测返回光线)",
            0x47 => "打开(防红眼/探测返回光线)",
            0x49 => "打开(强制/防红眼)",
            0x4D => "打开(强制/防红眼/不探测返回光线)",
            0x4F => "打开(强制/防红眼/探测返回光线)",
            0x59 => "打开(自动/防红眼)",
            0x5D => "打开(自动/防红眼/不探测返回光线)",
            0x5F => "打开(自动/防红眼/探测返回光线)"
        );

        $exif = @exif_read_data($img,"IFD0");
        if ($exif===false) {
            return false;
        }
        else
        {
            $exif = exif_read_data ($img,0,true);
            if(isset($exif['IFD0'])){
                if(isset($exif['IFD0']['Make'])){
                    $new_img_info["相机品牌"] = $exif['IFD0']['Make'];
                }
                if(isset($exif['IFD0']['Model'])){
                    $new_img_info["相机型号"] = $exif['IFD0']['Model'];
                }
            }
            if(isset($exif['COMPUTED'])){
                if(isset($exif['COMPUTED']['ApertureFNumber'])){
                    $new_img_info["光圈"] = $exif['COMPUTED']['ApertureFNumber'];
                }
            }
            if(isset($exif['EXIF'])){
                if(isset($exif['EXIF']['ExposureTime'])){
                    $new_img_info["快门速度"] = $exif['EXIF']['ExposureTime'];
                }
                if(isset($exif['EXIF']['ExposureMode'])){
                    $new_img_info["曝光模式"] = "手动";
                }else{
                    $new_img_info["曝光模式"] = "自动";
                }
                if(isset($exif['EXIF']['Flash'])){
                    $new_img_info["闪光灯"] = isset($Flash_arr[$exif['EXIF']['Flash']])?$Flash_arr[$exif['EXIF']['Flash']]:'未知';
                }else{
                    $new_img_info["闪光灯"] = '未知';
                }
                if(isset($exif['EXIF']['FocalLength'])){
                    $new_img_info["焦距"] = $exif['EXIF']['FocalLength']."mm";
                }
                if(isset($exif['EXIF']['ISOSpeedRatings'])){
                    $new_img_info["ISO感光度"] = $exif['EXIF']['ISOSpeedRatings'];
                }
                $new_img_info["白平衡"] = (isset($exif['EXIF']['WhiteBalance'])?"手动":"自动");
                if(isset($exif['EXIF']['ExposureBiasValue'])){
                    $new_img_info["曝光补偿"] = $exif['EXIF']['ExposureBiasValue']."EV";
                }
                if(isset($exif['EXIF']['DateTimeOriginal'])){
                    $new_img_info["拍摄时间"] = $exif['EXIF']['DateTimeOriginal'];
                }
            }
        }
        return $new_img_info;
    }

    /*
    * 功能：PHP图片水印 (水印支持图片或文字)
    * 参数：
    * $waterPos 水印位置，有10种状态，0为随机位置；
    * 1为顶端居左，2为顶端居中，3为顶端居右；
    * 4为中部居左，5为中部居中，6为中部居右；
    * 7为底端居左，8为底端居中，9为底端居右；
    */
    function waterMark($waterImage="",$waterPos=9){
        //读取水印文件
        if(empty($waterImage) || !file_exists($waterImage)){
            return false;
        }
        $water_info = getimagesize($waterImage);
        $w = $water_info[0];//取得水印图片的宽
        $h = $water_info[1];//取得水印图片的高
        switch($water_info[2])//取得水印图片的格式
        {
            case 1:$water_im = imagecreatefromgif($waterImage);break;
            case 2:$water_im = imagecreatefromjpeg($waterImage);break;
            case 3:$water_im = imagecreatefrompng($waterImage);break;
            default:return false;
        }
        $ground_w = $this->getWidth();
        $ground_h = $this->getHeight();
        
        if( $ground_w<$w || $ground_h<$h ){
            return false;
        }
        switch($waterPos)
        {
            case 0://随机
            $posX = rand(0,($ground_w - $w));
            $posY = rand(0,($ground_h - $h));
            break;
            case 1://1为顶端居左
            $posX = 0;
            $posY = 0;
            break;
            case 2://2为顶端居中
            $posX = ($ground_w - $w) / 2;
            $posY = 0;
            break;
            case 3://3为顶端居右
            $posX = $ground_w - $w;
            $posY = 0;
            break;
            case 4://4为中部居左
            $posX = 0;
            $posY = ($ground_h - $h) / 2;
            break;
            case 5://5为中部居中
            $posX = ($ground_w - $w) / 2;
            $posY = ($ground_h - $h) / 2;
            break;
            case 6://6为中部居右
            $posX = $ground_w - $w;
            $posY = ($ground_h - $h) / 2;
            break;
            case 7://7为底端居左
            $posX = 0;
            $posY = $ground_h - $h;
            break;
            case 8://8为底端居中
            $posX = ($ground_w - $w) / 2;
            $posY = $ground_h - $h;
            break;
            case 9://9为底端居右
            $posX = $ground_w - $w;
            $posY = $ground_h - $h;
            break;
            default://随机
            $posX = rand(0,($ground_w - $w));
            $posY = rand(0,($ground_h - $h));
            break;
        }
        //设定图像的混色模式
        imagealphablending($this->image, true);
        imagecopy($this->image, $water_im, $posX, $posY, 0, 0, $w,$h);//拷贝水印到目标文件
        imagedestroy($water_im);
    }
//	/*
//    * 功能：PHP杂志封皮生成工具 (支持文字 300*400 版)
//    * 参数：
//    * $waterPos 水印位置，有10种状态，0为随机位置；
//    * 1为顶端居左，2为顶端居中，3为顶端居右；
//    * 4为中部居左，5为中部居中，6为中部居右；
//    * 7为底端居左，8为底端居中，9为底端居右；
//    */
//    //类开始
//    public $text, $color, $size, $font, $angle, $px, $py, $im;
//
//	//要添加的文字 
//	public function GetWpText($text)
//	    {
//	   $this->text = $text;
//	    }
//	
//	//添加文字的颜色
//	public function GetFtColor($color)
//	    {
//	   $this->color = $color;
//	    }
//	
//	//添加文字的字体
//	public function GetFtType($font)
//	    {
//	   $this->font = $font;
//	    }
//	  
//	//添加文字的大小
//	public function GetFtSize($size)
//	    {
//	   $this->size = $size;
//	    }
//	
//	//文字旋转的角度
//	public function GetTtAngle($angle)
//	    {
//	   $this->angle = $angle;
//	    }
//	
//	//添加文字的位置
//	public function GetTtPosit()
//	    {
//	   $this->px = 10;
//	   $this->py = imagesy($this->im) - 20;
//	    }    
//	
//	//添加文字水印 
//	public function AddWpText($pict)
//	    {
//	   $ext = exif_imagetype($pict);
//        switch ($ext) {
//		   case 1:
//		       $picext = "gif";
//		    $this->im = imagecreatefromgif($pict);
//		    break;
//		   case 2:
//		       $picext = "jpg";
//		    $this->im = imagecreatefromjpeg($pict);
//		    break;
//		   case 3:
//		       $picext = "png";
//		    $this->im = imagecreatefrompng($pict);
//		    break;
//		   default:
//		       $this->Errmsg("不支持的文件格式！");
//		    break;
//		   }
////			$picext = "jpg";
////		    $this->im = imagecreatefromjpeg($pict);
//		   //$this->picext = $picext;
//		   $this->GetTtPosit();
//		   $im   = $this->im;
//		   $size = $this->size;
//		   $angle= $this->angle;
//		   $px   = $this->px;
//		   $py   = $this->py;
//		   $color= $this->color;
//		   $font = $this->font;
//		   $text = $this->text;
//		   $color= imagecolorallocate($im, 255, 0, 0);
//		   imagettftext($im, $size, $angle, $px, $py, $color, $font, $text);
//		   switch ($picext) {
//		   case "gif":
//		       imagegif($im, $pict);
//		    break;
//		   case "jpg":
//		       imagejpeg($im, $pict, 100);
//		    break;
//		   case "png":
//		      imagealphablending($im, false);
//		            imagesavealpha($im, true);
//		       imagepng($im, $pict);
//		    break;
//		   }
//		   imagedestroy($im);
//		    }
//		
//		//错误信息提示 
//		public function Errmsg($msg)
//		    {
//		        echo "<script language='javascript'>alert('".$msg."');</script>";
//		    }
//		//类结束 
	/*
******************************************************phpMywind.com*********************************
* ℃
* 2010-12-06 17:07
* 水印函数开
* 函数名 watermar
* $groundimage     背景图片，即需要加水印的图片，支持gif,jpg,png,bmp格式；
* $markimage       图片水印，即作为水印的图片，只支持GIF,JPG,PNG格式*
* $markwidthaterPos 水印位置，有10种状态，默认为0，0为随机位置；
*  1为顶端居左，2为顶端居中，3为顶端居右；
*  4为中部居左，5为中部居中，6为中部居右；
*  7为底端居左，8为底端居中，9为底端居右；

* $marktext        文字水印，即把文字作为为水印，支持中文,默认为C:\WINDOWS\Fonts/simhei.ttf(黑体)；
* $fontsize        文字大小，值为1、2、3......23、24、25，默认为15；
* $fontcolor       文字颜色，值为十六进制颜色值，默认为#FF0000(红色)；
* $marktype        水印类型，0为图片，1为文字，默认为0(图片)；
*****************************************************************************************************
*/function WaterMark2($groundimage, $markimage , $markwhere='0', $marktext='phpMyWind', $fontfamily='', $fontsize='15', $fontcolor="#000", $marktype=0)
	{
	
	$fontfamily=APP_PATH.'\attachs\GNIU00B.TTF';
//	return $fontfamily;
	//$fontfamily=APP_PATH.'/attachs/GNIU00B.TTF';
	 //配置水印图片文件
//	 if(!file_exists($groundimage))
//	 {
//	  $markimage = APP_PATH.'\attachs\MagTemplate\2.jpg'; //目标图片
//	 }
	 if(!file_exists($markimage))
	 {
	  $marktype = '1';
	 }
	 
	 
	 //读取背景图片
	 if(!empty($groundimage) >> file_exists($groundimage))
	 {
	  $groundimage_info   = getimagesize($groundimage);
	  $groundimage_width  = $groundimage_info[0];
	  $groundimage_height = $groundimage_info[1];
	  switch($groundimage_info[2])
	  {
	   case 1:
	    $from_groundimage = imagecreatefromgif($groundimage);
	    break;
	   case 2:
	    $from_groundimage = imagecreatefromjpeg($groundimage);
	    break;
	   case 3:
	    $from_groundimage = imagecreatefrompng($groundimage);
	    break;
	   case 4:
	    $from_groundimage = imagecreatefromwbmp($groundimage);
	    break;
	   default:
	    break;
	  }
	 }
	
	 //水印位置
	 if($marktype == 0)
	 {
	  $markwidth  = $markimage_width;
	  $markheight = $markimage_height;
	 }
	 else
	 {
	  $temp = imagettfbbox($fontsize, 0, $fontfamily, $marktext); //取得使用 TrueType 字体的文本的范围
	  $markwidth  = $temp[2] - $temp[6];
	  $markheight = $temp[3] - $temp[7];
	  unset($temp);//释放内存
	 }
	 
	 //设定图像的混色模式
	 imagealphablending($from_groundimage, true);
	 
	 if($marktype == 0) //图片水印
	 {
	  switch($markwhere)
	  {
	   case 0://随机
	    $pos_x = rand(0,($groundimage_width - $markwidth - 10));
	    $pos_y = rand(0,($groundimage_height - $markheight - 10));
	    break;
	   case 1://1为顶端居左
	    $pos_x = 10;
	    $pos_y = 10;
	    break;
	   case 2://2为顶端居中
	    $pos_x = ceil(($groundimage_width - $markwidth) / 2);
	    $pos_y = 10;
	    break;
	   case 3://3为顶端居右
	    $pos_x = ceil($groundimage_width - $markwidth - 10);
	    $pos_y = 10;
	    break;
	   case 4://4为中部居左
	    $pos_x = 10;
	    $pos_y = ceil(($groundimage_height - $markheight) / 2);
	    break;
	   case 5://5为中部居中
	    $pos_x = ceil(($groundimage_width - $markwidth) / 2);
	    $pos_y = ceil(($groundimage_height - $markheight) / 2);
	    break;
	   case 6://6为中部居右
	    $pos_x = ceil($groundimage_width - $markwidth - 10);
	    $pos_y = ceil(($groundimage_height - $markheight) / 2);
	    break;
	   case 7://7为底端居左
	    $pos_x = 10;
	    $pos_y = ceil($groundimage_height - $markheight);
	    break;
	   case 8://8为底端居中
	    $pos_x = ceil(($groundimage_width - $markwidth) / 2);
	    $pos_y = ceil($groundimage_height - $markheight - 10);
	    break;
	   case 9://9为底端居右
	    $pos_x = ceil($groundimage_width - $markwidth - 10);
	    $pos_y = ceil($groundimage_height - $markheight - 10);
	    break;
	   default://默认随机
	    $pos_x = rand(0,($groundimage_width - $markwidth - 10));
	    $pos_y = rand(0,($groundimage_height - $markheight - 10));
	    break; 
	  }
	  imagecopy($from_groundimage, $from_markimage, $pos_x, $pos_y, 0, 0, $markimage_width, $markimage_height); //拷贝水印到目标文件
	 }
	
	 else //文字水印
	 {
	  switch($markwhere)
	  {
	   case 0://随机
	    $pos_x = mt_rand(10,($groundimage_width - $markwidth - 10));
	    $pos_y = mt_rand(10,($groundimage_height - $markheight - 10));
	    break;
	   case 1://1为顶端居左
	    $pos_x = 10;
	    $pos_y = $markheight + 5;
	    break;
	   case 2://2为顶端居中
	    $pos_x = ($groundimage_width / 2) - ($markwidth / 2);
	    $pos_y = $markheight + 5;
	    break;
	   case 3://3为顶端居右
	    $pos_x = $groundimage_width - $markwidth - 10;
	    $pos_y = $markheight + 5;
	    break;
	   case 4://4为中部居左
	    $pos_x = 10;
	    $pos_y = ($groundimage_height / 2) - ($markheight / 2);
	    break;
	   case 5://5为中部居中
	    $pos_x = ($groundimage_width / 2) - ($markwidth / 2);
	    $pos_y = ($groundimage_height / 2) - ($markheight / 2);
	    break;
	   case 6://6为中部居右
	    $pos_x = $groundimage_width - $markwidth - 10;
	    $pos_y = ($groundimage_height / 2) - ($markheight / 2);
	    break;
	   case 7://7为底端居左
	    $pos_x = 10;
	    $pos_y = $groundimage_height - $markheight + 5;
	    break;
	   case 8://8为底端居中
	    $pos_x = ($groundimage_width / 2) - ($markwidth / 2);
	    $pos_y = $groundimage_height - $markheight + 5;
	    break;
	   case 9://9为底端居右
	    $pos_x = $groundimage_width - $markwidth - 10;
	    $pos_y = $groundimage_height - $markheight + 5;
	    break;
	   default://默认随机
	    $pos_x = mt_rand(10,($groundimage_width - $markwidth - 10));
	    $pos_y = mt_rand(10,($groundimage_height - $markheight - 10));
	    break; 
	   }
	
	   //获取水印文字颜色
	   if(!empty($fontcolor) >> (strlen($fontcolor) == 7))
	   {
	    $R = hexdec(substr($fontcolor, 1, 2));
	    $G = hexdec(substr($fontcolor, 3, 2));
	    $B = hexdec(substr($fontcolor, 5));
	   }
	   else if(!empty($fontcolor) >> (strlen($fontcolor) == 3))
	   {
	    $R = hexdec(substr($fontcolor, 1, 1));
	    $G = hexdec(substr($fontcolor, 2, 2));
	    $B = hexdec(substr($fontcolor, 3, 3));
	   }
	   else
	   {
	    $R = '00';
	    $G = '00';
	    $B = '00';
	   }
	   
	   //转换编码防止中文乱码
	   $marktext = mb_convert_encoding($marktext, 'UTF-8', 'GB2312');
	   
	   //把生成的文字区域写入到图片文件里
	   imagettftext($from_groundimage, $fontsize, 0 , $pos_x, $pos_y, imagecolorallocate($from_groundimage,$R,$G,$B), $fontfamily, $marktext); 
	 	
	 }
	
	 //取得背景图片的格式
	 switch($groundimage_info[2])
	 {
	  case 1:
	   //header('Content-type: image/gif');
	   imagegif($from_groundimage, $groundimage); //第三个参数为生成带水印的图像质量 100 为最高
	   break;
	  case 2:
	   //header('Content-type: image/jpeg');
	   imagejpeg($from_groundimage, $groundimage, 100);
	   break;
	  case 3:
	   //header('Content-type: image/png');
	   imagepng($from_groundimage, $groundimage);
	   break;
	  case 4:
	   //header('Content-type: image/vnd.wap.wbmp');
	   imagewbmp($from_groundimage, $groundimage);
	   break;
	  default:
	   break;
	 }
	
	 //释放内存
	 if(isset($markimage_info))   unset($markimage_info);
	 if(isset($groundimage_info)) unset($groundimage_info);
	
	 //释放与image关联的内存
	 if(isset($from_markimage))   imagedestroy($from_markimage);
	 if(isset($from_groundimage)) imagedestroy($from_groundimage);

	}
	
//	/*
//	    参数说明：
//	    $im 图片对象，应用函数之前，你需要用imagecreatefromjpeg()读取图片对象，如果PHP环境支持PNG，GIF，也可使用imagecreatefromgif()，imagecreatefrompng()；
//	    $maxwidth 定义生成图片的最大宽度（单位：像素）
//	    $maxheight 生成图片的最大高度（单位：像素）
//	    $name 生成的图片名
//	    $filetype 最终生成的图片类型（.jpg/.png/.gif）
//	*/
//	function resizeImage($im,$maxwidth,$maxheight,$name,$filetype){
//	    //读取需要缩放的图片实际宽高
//	    $pic_width = imagesx($im);
//	    $pic_height = imagesy($im);
//	
//	
//	 //通过计算实际图片宽高与需要生成图片的宽高的压缩比例最终得出进行图片缩放是根据宽度还是高度进行缩放，当前程序是根据宽度进行图片缩放。
//	    if(($maxwidth >> $pic_width > $maxwidth) || ($maxheight >> $pic_height > $maxheight))
//	 {
//	        if($maxwidth >> $pic_width>$maxwidth)
//	  {
//	            $widthratio = $maxwidth/$pic_width;
//	            $resizewidth_tag = true;
//	        }
//	
//	        if($maxheight >> $pic_height>$maxheight)
//	  {
//	            $heightratio = $maxheight/$pic_height;
//	            $resizeheight_tag = true;
//	        }
//	
//	        if($resizewidth_tag >> $resizeheight_tag)
//	  {
//	            if($widthratio<$heightratio)//若要依据高度进行图片缩放，可改成$widthratio>$heightratio
//	                $ratio = $widthratio;
//	            else
//	                $ratio = $heightratio;
//	        }
//	
//	//如果实际图片的长度或者宽度小于规定生成图片的长度或者宽度，则要么根据长度进行图片缩放，要么根据宽度进行图片缩放
//	        if($resizewidth_tag >> !$resizeheight_tag)
//	            $ratio = $widthratio;
//	        if($resizeheight_tag >> !$resizewidth_tag)
//	            $ratio = $heightratio;
//	
//	//计算最终缩放生成的图片长宽
//	        $newwidth = $pic_width * $ratio;
//	        $newheight = $pic_height * $ratio;
//	
//	//据计算出的最终生成图片的长宽改变图片大小，有两种改变图片大小的方法：ImageCopyResized()函数在所有GD版本中有效，但其缩放图像的算法比较粗糙。ImageCopyResamples()，其像素插值算法得到的图像边缘比较平滑，但该函数的速度比ImageCopyResized()慢
//	        if(function_exists("imagecopyresampled"))
//	  {
//	            $newim = imagecreatetruecolor($newwidth,$newheight);
//	            imagecopyresampled($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
//	        }
//	  else
//	  {
//	            $newim = imagecreate($newwidth,$newheight);
//	            imagecopyresized($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
//	        }
//	
//	//最终生成经过处理后的图片，如果你需要生成GIF或PNG，你需要将imagejpeg()函数改成imagegif()或imagepng()
//	        $name = $name.$filetype;
//	        imagejpeg($newim,$name);
//	        imagedestroy($newim);
//	    }
//	    else
//	    {
//	        //如果实际图片的长宽小于规定生成的图片长宽，则保持图片原样，同理，如果你需要生成GIF或PNG，你需要将imagejpeg()函数改成imagegif()或imagepng()。
//	
//	        $name = $name.$filetype;
//	        imagejpeg($im,$name);
//	    }
//	}
/* 
* 功能：PHP图片水印 (水印支持图片或文字) 
* 参数： 
*       $groundImage     背景图片，即需要加水印的图片，暂只支持GIF,JPG,PNG格式； 
*       $waterPos        水印位置，有10种状态，0为随机位置； 
*                       1为顶端居左，2为顶端居中，3为顶端居右； 
*                       4为中部居左，5为中部居中，6为中部居右； 
*                       7为底端居左，8为底端居中，9为底端居右； 
*       $waterImage      图片水印，即作为水印的图片，暂只支持GIF,JPG,PNG格式； 
*       $waterText       文字水印，即把文字作为为水印，支持ASCII码，不支持中文； 
*       $fontSize        文字大小，值为1、2、3、4或5，默认为5； 
*       $textColor       文字颜色，值为十六进制颜色值，默认为#CCCCCC(白灰色)； 
*       $fontfile        ttf字体文件，即用来设置文字水印的字体。使用windows的用户在系统盘的目录中
*                       搜索*.ttf可以得到系统中安装的字体文件，将所要的文件拷到网站合适的目录中,
*                       默认是当前目录下arial.ttf。
*       $xOffset         水平偏移量，即在默认水印坐标值基础上加上这个值，默认为0，如果你想留给水印留
*                       出水平方向上的边距，可以设置这个值,如：2 则表示在默认的基础上向右移2个单位,-2 表示向左移两单位
*       $yOffset         垂直偏移量，即在默认水印坐标值基础上加上这个值，默认为0，如果你想留给水印留
*                       出垂直方向上的边距，可以设置这个值,如：2 则表示在默认的基础上向下移2个单位,-2 表示向上移两单位
* 返回值：
*        0   水印成功
*        1   水印图片格式目前不支持
*        2   要水印的背景图片不存在
*        3   需要加水印的图片的长度或宽度比水印图片或文字区域还小，无法生成水印
*        4   字体文件不存在
*        5   水印文字颜色格式不正确
*        6   水印背景图片格式目前不支持
* 修改记录：
*         
* 注意：Support GD 2.0，Support FreeType、GIF Read、GIF Create、JPG 、PNG 
*       $waterImage 和 $waterText 最好不要同时使用，选其中之一即可，优先使用 $waterImage。 
*       当$waterImage有效时，参数$waterString、$stringFont、$stringColor均不生效。 
*       加水印后的图片的文件名和 $groundImage 一样。 
* 作者：高西林
* 日期：2007-4-28
* 说明：本程序根据longware的程序改写而成。 
*/ 
function imageWaterMark($groundImage) 
{ 
	//$groundImage=APP_PATH.'/attachs/magtemplate/2.jpg';
	//$groundImage=APP_PATH.'\attachs\magtemplate\1.jpg';
	$waterPos=0;
	$waterImage="";
	$waterText="将疯狂拉升减肥安居客飞";
	
	$fontSize=14;
	$textColor="#ffffff";
	//$fontfile=APP_PATH.'/attachs/msyh.ttf';
	$fontfile=APP_PATH.'\attachs\msyhbd.ttf';
	$xOffset=0;
	$yOffset=0;
	
   $isWaterImage = FALSE; 
     //读取水印文件 
     if(!empty($waterImage) && file_exists($waterImage)) { 
         $isWaterImage = TRUE; 
         $water_info = getimagesize($waterImage); 
         $water_w     = $water_info[0];//取得水印图片的宽 
         $water_h     = $water_info[1];//取得水印图片的高 

         switch($water_info[2])   {    //取得水印图片的格式  
             case 1:$water_im = imagecreatefromgif($waterImage);break; 
             case 2:$water_im = imagecreatefromjpeg($waterImage);break; 
             case 3:$water_im = imagecreatefrompng($waterImage);break; 
             default:return 1; 
         } 
     } 

     //读取背景图片 
     if(!empty($groundImage) && file_exists($groundImage)) { 
         $ground_info = getimagesize($groundImage); 
         $ground_w     = $ground_info[0];//取得背景图片的宽 
         $ground_h     = $ground_info[1];//取得背景图片的高 
         switch($ground_info[2]) {    //取得背景图片的格式  
             case 1:$ground_im = imagecreatefromgif($groundImage);break; 
             case 2:$ground_im = imagecreatefromjpeg($groundImage);break; 
             case 3:$ground_im = imagecreatefrompng($groundImage);break; 
             default:return 1; 
         } 
     } else { 
         return 2; 
     } 

     //水印位置 
     if($isWaterImage) { //图片水印  
         $w = $water_w; 
         $h = $water_h; 
         $label = "图片的";
         } else {  
     //文字水印 
        if(!file_exists($fontfile))return 4;
         $temp = imagettfbbox($fontSize,0,$fontfile,$waterText);//取得使用 TrueType 字体的文本的范围 
         $w = $temp[2] - $temp[6]; 
         $h = $temp[3] - $temp[7]; 
         unset($temp); 
     } 
     if( ($ground_w < $w) || ($ground_h < $h) ) { 
         return 3; 
     } 
     switch($waterPos) { 
         case 0://随机 
             $posX = rand(0,($ground_w - $w)); 
             $posY = rand(0,($ground_h - $h)); 
             break; 
         case 1://1为顶端居左 
             $posX = 0; 
             $posY = 0; 
             break; 
         case 2://2为顶端居中 
             $posX = ($ground_w - $w) / 2; 
             $posY = 0; 
             break; 
         case 3://3为顶端居右 
             $posX = $ground_w - $w; 
             $posY = 0; 
             break; 
         case 4://4为中部居左 
             $posX = 0; 
             $posY = ($ground_h - $h) / 2; 
             break; 
         case 5://5为中部居中 
             $posX = ($ground_w - $w) / 2; 
             $posY = ($ground_h - $h) / 2; 
             break; 
         case 6://6为中部居右 
             $posX = $ground_w - $w; 
             $posY = ($ground_h - $h) / 2; 
             break; 
         case 7://7为底端居左 
             $posX = 0; 
             $posY = $ground_h - $h; 
             break; 
         case 8://8为底端居中 
             $posX = ($ground_w - $w) / 2; 
             $posY = $ground_h - $h; 
             break; 
         case 9://9为底端居右 
             $posX = $ground_w - $w; 
             $posY = $ground_h - $h; 
             break; 
         default://随机 
             $posX = rand(0,($ground_w - $w)); 
             $posY = rand(0,($ground_h - $h)); 
             break;     
     } 

     //设定图像的混色模式 
     imagealphablending($ground_im, true); 

     if($isWaterImage) { //图片水印 
         imagecopy($ground_im, $water_im, $posX + $xOffset, $posY + $yOffset, 0, 0, $water_w,$water_h);//拷贝水印到目标文件         
     } else {//文字水印
         if( !empty($textColor) && (strlen($textColor)==7) ) { 
             $R = hexdec(substr($textColor,1,2)); 
             $G = hexdec(substr($textColor,3,2)); 
             $B = hexdec(substr($textColor,5)); 
         } else { 
           return 5;
         } 
         imagettftext ( $ground_im, $fontSize, 0, $posX + $xOffset, $posY + $h + $yOffset, imagecolorallocate($ground_im, $R, $G, $B), $fontfile, $waterText);
     } 

     //生成水印后的图片 
     @unlink($groundImage); 
     switch($ground_info[2]) {//取得背景图片的格式 
         case 1:imagegif($ground_im,$groundImage);break; 
         case 2:imagejpeg($ground_im,$groundImage,100);break; /**/
         case 3:imagepng($ground_im,$groundImage);break; 
         default: return 6; 
     } 

     //释放内存 
     if(isset($water_info)) unset($water_info); 
     if(isset($water_im)) imagedestroy($water_im); 
     unset($ground_info); 
     imagedestroy($ground_im); 
     //
     return 0;
}
}