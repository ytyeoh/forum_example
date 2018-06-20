<?php
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$server_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123com_kuaibao&pmod=spec';
require './source/plugin/csdn123com_kuaibao/function_common.php';
if (!isset($_G['cache']['plugin'])) {
	loadcache('plugin');
}
$kuaibaoUrl=$_G['cache']['plugin']['csdn123com_kuaibao']['hzw_nowsearch'];
if(strlen($kuaibaoUrl)<20)
{
	$catchSpecAcount = 'http://r.cnews.qq.com/searchMediaInfo?mid=6a6ff8ff488fa63b4f07baf5a8a6413180f79f1a&devid=d43db7e1e57177ae&mac=C8%3A94%3ABB%3A56%3A31%3AD4&store=70124&screen_height=1812&apptype=android&origin_imei=864647039546844&hw=HUAWEI_BLN-AL40&appver=24_areading_4.0.95&appversion=4.0.95&uid=d43db7e1e57177ae&screen_width=1080&sceneid=&android_id=d43db7e1e57177ae&ssid=HZW3&IronThroneBuildTime=1510803625053&bssid=b8%3Af8%3A83%3A97%3Aa9%3Abf&omgid=bb71176e02717f48586b411a757244e4ee19001021251c&IronThroneRelExecTime=694298405&IronThroneRelBuildTime=694298402&query=%%query%%&muid=65840668683900868&activefrom=icon&qqnetwork=wifi&qimei=864647039546844&Cookie=%20lskey%3D%3B%20luin%3D%3B%20skey%3D%3B%20uin%3D%3B%20logintype%3D0%3B&commonGray=1&currentTab=kuaibao&is_wap=0&IronThroneExecTime=1510803625057&omgbizid=02467906f0ae234296f9750050ba7a6b38a1008021251c&imsi_history=460016197011678&qn-sig=8b383d7cb7dda36ba6d5d44e52557ab2&qn-rid=6323fc4d-7eea-41be-ac46-6bd26447c98b&imsi=460016197011678';
	$catchSpecNewsList = 'http://r.cnews.qq.com/getSubNewsIndex?mid=6a6ff8ff488fa63b4f07baf5a8a6413180f79f1a&devid=d43db7e1e57177ae&mac=C8%3A94%3ABB%3A56%3A31%3AD4&store=70124&screen_height=1812&apptype=android&origin_imei=864647039546844&hw=HUAWEI_BLN-AL40&appver=24_areading_4.0.95&appversion=4.0.95&uid=d43db7e1e57177ae&screen_width=1080&sceneid=&android_id=d43db7e1e57177ae&ssid=HZW3&IronThroneBuildTime=1510804587921&bssid=b8%3Af8%3A83%3A97%3Aa9%3Abf&omgid=bb71176e02717f48586b411a757244e4ee19001021251c&IronThroneRelBuildTime=695261270&IronThroneRelExecTime=695261270&muid=65840668683900868&activefrom=icon&qqnetwork=wifi&media_openid=&qimei=864647039546844&format=json&Cookie=%20lskey%3D%3B%20luin%3D%3B%20skey%3D%3B%20uin%3D%3B%20logintype%3D0%3B&commonGray=1&currentTab=kuaibao&chlid=%%chlid%%&is_wap=0&IronThroneExecTime=1510804587922&omgbizid=02467906f0ae234296f9750050ba7a6b38a1008021251c&imsi_history=460016197011678&qn-sig=19195c521249d53e59d59ec9bbfc1036&qn-rid=96220bf6-7172-4519-a495-9e6f9393bdb9&imsi=460016197011678';
	
} else {
	
	$kuaibaoArr = explode('##',$kuaibaoUrl);
	$catchSpecAcount = $kuaibaoArr[2];
	$catchSpecNewsList = $kuaibaoArr[3];
	
}	
if($_GET['formhash'] == FORMHASH && !empty($_GET['csdn123_agrs']) && $_GET['csdn123_agrs']=='yes')
{
	if(empty($_GET['keyword'])){
		cpmsg('csdn123com_kuaibao:keywords_empty', '', 'error');
	}
	$postdata = serialize($_GET);
	$keyword = $_GET['keyword'];
	$keyword = diconv($keyword,CHARSET,'UTF-8');
	$keyword = urlencode($keyword);
	$catchSpecAcount = str_ireplace('%%query%%',$keyword,$catchSpecAcount);
	$htmlcode = dfsockopen($catchSpecAcount);
	if (strlen($htmlcode) < 200) {
        $htmlcode = dfsockopen($catchSpecAcount, 0, '', '', FALSE, '', 15, TRUE, 'URLENCODE', FALSE);
    }
	$htmlcode = base64_encode($htmlcode);
	$htmlcode = dfsockopen('http://discuz.csdn123.net/catch/kuaibao201711/spec.php', 0, array('htmlcode' => $htmlcode));
	$htmlcode = preg_replace('/^\s+|\s+$/', '', $htmlcode);
	$htmlcode = base64_decode($htmlcode);
	$specLinkArr = dunserialize($htmlcode);	
	include template('csdn123com_kuaibao:spec_search');

} elseif($_GET['formhash'] == FORMHASH && !empty($_GET['step_one']) && $_GET['step_one']=='yes') {
	
	$chlid = $_GET['specUrl'];
	$catchSpecNewsList = str_ireplace('%%chlid%%',$chlid,$catchSpecNewsList);
	$htmlcode = dfsockopen($catchSpecNewsList);	
	if (strlen($htmlcode) < 200) {
		$htmlcode = dfsockopen($catchSpecNewsList, 0, '', '', FALSE, '', 15, TRUE, 'URLENCODE', FALSE);
	}
	$htmlcode = base64_encode($htmlcode);
	$htmlcode = dfsockopen('http://discuz.csdn123.net/catch/kuaibao201711/spec_links.php',0, array('htmlcode' => $htmlcode));
	$htmlcode = preg_replace('/^\s+|\s+$/', '', $htmlcode);
	$htmlcode = base64_decode($htmlcode);
	$resultLink = dunserialize($htmlcode);	
	if(is_array($resultLink)==FALSE)
	{
		cpmsg("csdn123com_kuaibao:collection_result_null","","error");
	}
	$_GET = dunserialize($_GET['postdata']);
	$forum_portal=daddslashes($_GET['forum_portal']);
	$fid=intval($_GET['fid']);
	$threadtypeid=intval($_GET['threadtypeid']);
	$portal_catid=intval($_GET['portal_catid']);
	$display_link=intval($_GET['display_link']);
	$image_localized=intval($_GET['image_localized']);
	$pseudo_original=intval($_GET['pseudo_original']);
	$chinese_encoding=intval($_GET['chinese_encoding']);
	$group_fid=intval($_GET['group_fid']);
	$first_uid=daddslashes($_GET['first_uid']);
	$filter_image=intval($_GET['filter_image']);
	$image_center=intval($_GET['image_center']);
	$views=intval($_GET['views']);
	$release_time=$_GET['release_time'];
	$release_time=strtotime($release_time);
	if(is_numeric($release_time)==FALSE || $release_time<10000)
	{
		$release_time_start=time() - 3600;
		$release_time=rand($release_time_start,time());
	}
	foreach($resultLink as $resultLinkItem)
	{
		$newsArr=array();
		$title=diconv($resultLinkItem['title'],'UTF-8',CHARSET);
		$newsArr['title']=daddslashes($title);
		$source_link=$resultLinkItem['url'];
		$newsArr['source_link']=daddslashes($source_link);
		$newsArr['forum_portal']=$forum_portal;
		$newsArr['fid']=$fid;
		$newsArr['threadtypeid']=$threadtypeid;
		$newsArr['portal_catid']=$portal_catid;
		$newsArr['first_uid']=$first_uid;
		$newsArr['display_link']=$display_link;
		$newsArr['image_localized']=$image_localized;
		$newsArr['pseudo_original']=$pseudo_original;
		$newsArr['chinese_encoding']=$chinese_encoding;
		$newsArr['views']=rand(1,$views);
		$newsArr['group_fid']=$group_fid;
		$newsArr['filter_image']=$filter_image;
		$newsArr['image_center']=$image_center;
		$newsArr['release_time']=$release_time-rand(-1800,1800);
		$chk = DB::fetch_first("SELECT * FROM " . DB::table('csdn123kuaibao_news') . " WHERE source_link='" . daddslashes($source_link) . "' LIMIT 1");
		$chk2 = DB::fetch_first("SELECT * FROM " . DB::table('csdn123kuaibao_news') . " WHERE title='" . daddslashes($title) . "' LIMIT 1");		
		if (count($chk) == 0 && count($chk2) == 0) {
			DB::insert('csdn123kuaibao_news', $newsArr);
		}
		
	}
	$succeed_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123com_kuaibao&pmod=pending';
	cpmsg("csdn123com_kuaibao:collection_success",$succeed_url,"succeed");
	
	
} else {	

	require_once libfile('function/forumlist');
	require_once libfile('function/portalcp');
	require_once libfile('function/group');
	$grouplistArr=grouplist('displayorder',false,100);
	$release_time=rand(1,3600);
	$release_time=time() - $release_time;
	$release_time=date('Y-m-d H:i:s',$release_time);	
	include template('csdn123com_kuaibao:spec');
	
}
?>