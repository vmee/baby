<?php

class givemedata extends top
{
	public function newest_data()
		{
			$blogs = spClass('lastRSS')->Parse("http://news.baidu.com/n?cmd=4&class=star&tn=rss");
			echo $blogs;
		}
}

?>