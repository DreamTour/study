<?php 
include "library/PcFunction.php";
UserRoot("pc");
echo head("pc");
limit($kehu);
$ThisUrl = root."success.php";
/***********故事列表******************/
$sql = "select * from content where type = '牵手成功' and classify = '牵手成功' and xian = '显示' ";
paging($sql," order by UpdateTime desc ",5);
$success = "";
if($num == 0){
	$success .= "一个成功故事都没有";	
}else{
	while($array = mysql_fetch_array($query)){
		$dateTime = date("y-m-d",strtotime($array['UpdateTime']));
		$success .= "
			<div class='stories_content01'>
                    <h1>{$array['title']}</h1>
                    <span class='stories_date'>更新日期：{$dateTime}</span>
                    <div class='stories_content'>
                        <img src='{$array['ico']}'>
                        <div class='stories_introduce'>
                            <div class='details_box details_box01'>
                                <h5 class='details_title'>幸福女生：</h5><span class='details_content'>{$array['girl']}</span>
                                <h5 class='details_title'>幸福男生：</h5><span class='details_content'>{$array['boy']}</span>
                            </div>
                            <p>{$array['summary']}</p>
                            <a class='details_btn' href='{$root}successMx.php?successMx_id={$array['id']}'>查看详情</a>
                        </div>
                    </div>
                </div> 
		";	
	}	
}
/***********故事图片列表******************/
$imgSql = mysql_query("select * from img where type = '成功故事' order by list desc limit 7 ");
$img = "";
$x = "0";
while($array = mysql_fetch_array($imgSql)){
	if($x == 0 ){
		$img .= "
			<a target='_blank' href='{$array['url']}'><img src='{$array['imgsrc']}' width='400' height='400'></a>
		";	
	}else{
		$img .= "
			<a target='_blank' href='{$array['url']}'><img src='{$array['imgsrc']}' width='200' height='200' ></a>
		";
	}
	$x++;	
}
?>

<style>
.icon{ background:url(<?php echo img("WxN53377734Xb");?>)}
.ad{width:1000px;height:90px;clear:both;margin:20px auto 15px}
.success_stories_show{width:1006px;margin:0 auto 20px;overflow:hidden}
.success_stories_show h2{line-height:40px;border-bottom:1px solid #d4d4d4;font-size:16px;margin-bottom:10px;color:#000}
.success_stories_show img{float:left;margin:0 1px 1px 0}
.success_stories{margin-top:20px;overflow:hidden}
.stories_container{width:1000px;margin:auto}
.stories_top{height:60px;background-color:#fff;margin:20px 0;overflow:hidden}
.business,.off-line{float:left;line-height:60px;font-size:18px}
.off-line{width:130px;background-color:#ff7c7c;text-align:center;color:#fff}
.business{float:left;color:#000;margin-left:40px}
.my_stories{float:right;line-height:60px;font-size:18px;color:#f9a61c;margin-right:20px}
.stories_content01{height:260px;background-color:#fff;border:1px solid #d4d4d4;padding:20px 30px;margin-bottom:15px;position:relative}
.stories_content01 h1{font-size:20px;font-weight:700;color:#000;margin-bottom:15px}
.stories_introduce{width:560px;float:right;position:relative}
.stories_introduce p{clear:both;color:#000;font-size:14px;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:3;
height:60px;overflow:hidden;margin:10px 0}
.details_content,.details_title{font-size:14px;color:#000}
.details_title{font-weight:700}
.details_box{overflow:hidden}
.details_box01{margin-top:5px}
.details_box h5,.details_box span{float:left}
.details_content{margin-right:100px}
.stories_date{float: right;}
.details_content,.details_title{float:left}
.details_btn{position:absolute;right:0;bottom:-45px;display:inline-block;width:130px;height:40px;background-color:#ff7c7c;color:#fff;font-size:18px;line-height:40px;text-align:center}
.activity_btn_item{display:inline-block;width:30px;height:30px;border:1px solid #d4d4d4;text-align:center;font-size:16px;line-height:30px;background-color:#fff;margin-right:5px}
.activity_btn_icon01{background-position:-12px -61px}
.activity_btn_icon01,.activity_btn_icon02{color:transparent}
.activity_btn_icon02{background-position:-9px -85px}
.activity_btn_current{background-color:#ff7c7c;color:#fff}
.activity_btn{text-align:center;margin:30px 0 50px}
</style>
<!--头部-->
    <?php echo pcHeader();?>
    <!--广告-->
<!--    <div class="ad">
    <a href="<?php echo imgurl("oGv49861379ud");?>"><img src="<?php echo img("uiJ53377569IG");?>"></a>
    </div>
-->    <!--成功故事-->
    <div class="success_stories_show">
    	<h2>成功故事</h2>
        <?php echo $img;?>
    </div>
    <!--成功案例-->
    <div class="success_stories">
        <div class="stories_container">
            <div class="stories_content">
                <?php echo $success;?>
            </div>
        	<div class="activity_btn">
 		       <div class="activity_btn"><?php echo fenye($ThisUrl,7);?></div>
       	    </div>
		</div>
    </div>
    <!--底部-->
    <?php echo pcFooter();?>
</body>
</html>

