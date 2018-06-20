<?php
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$server_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123com_kuaibao&pmod=trueTime';
require './source/plugin/csdn123com_kuaibao/function_common.php';
if($_GET['formhash'] == FORMHASH && !empty($_GET['csdn123_agrs']) && $_GET['csdn123_agrs']=='yes')
{
	if(empty($_GET['keyword']))
	{
		cpmsg("csdn123com_kuaibao:keywords_empty","","error");
	} else {
		$keyword=$_GET['keyword'];
		$keyword=diconv($keyword,CHARSET,"UTF-8");
		$keyword=urlencode($keyword);
	}
	if(empty($_GET['first_uid']))
	{
		cpmsg("csdn123com_kuaibao:uid_error","","error");
	} else {
		$first_uid=$_GET['first_uid'];
	}		
	if(preg_match('/[a-z]/i',$first_uid)==1)
	{
		cpmsg("csdn123com_kuaibao:uid_error","","error");
	}	
	$release_time=$_GET['release_time'];
	$page_number=$_GET['page_number'];
	$release_time=strtotime($release_time);
	if(is_numeric($release_time)==FALSE || $release_time<10000)
	{
		$release_time_start=time() - 3600;
		$release_time=rand($release_time_start,time());
	}
	if (!isset($_G['cache']['plugin'])) {
		loadcache('plugin');
	}
	$kuaibaoUrl=$_G['cache']['plugin']['csdn123com_kuaibao']['hzw_nowsearch'];
	if(strlen($kuaibaoUrl)<20)
	{
		$kuaibaoUrl='http://r.cnews.qq.com/search?mid=346d6c6ca36aae07442591a7cc498413dfbe976e&devid=865970035172871&mac=5C%3A03%3A39%3A24%3A8A%3AC7&store=70124&screen_height=1812&apptype=android&origin_imei=865970035172871&hw=HUAWEI_MHA-AL00&appver=24_areading_4.0.80&appversion=4.0.80&uid=2d118abbb92133fd&screen_width=1080&sceneid=&android_id=2d118abbb92133fd&adcode=441602&ssid=HZW3&source=&IronThroneBuildTime=1509759417935&omgid=ad8c8f1fe1cca74bde8ae2616a4fbb90a3e40010212807&IronThroneRelBuildTime=9475978&qqnetwork=wifi&commonGray=1&currentTab=kuaibao&is_wap=0&omgbizid=a7d729e960d95e464ebab5c9a853ade6f9350080212807&imsi=460000272547623&bssid=b8%3Af8%3A83%3A97%3Aa9%3Abf&IronThroneRelExecTime=9475979&query=%%query%%&muid=43390491924884512&activefrom=icon&qimei=865970035172871&Cookie=%20lskey%3D%3B%20luin%3D%3B%20skey%3D%3B%20uin%3D%3B%20logintype%3D0%3B&chlid=&IronThroneExecTime=1509759417936&rawQuery=&imsi_history=460000272547623&qn-sig=ab329668dffa994c786649bccef22361&qn-rid=b26c4bb2-ec26-4a8e-98f2-61702ec9b1c6';
		$kuaibaoMorePage='http://r.cnews.qq.com/searchMore?mid=6a6ff8ff488fa63b4f07baf5a8a6413180f79f1a&devid=d43db7e1e57177ae&mac=C8%3A94%3ABB%3A56%3A31%3AD4&store=70124&screen_height=1812&apptype=android&origin_imei=864647039546844&hw=HUAWEI_BLN-AL40&appver=24_areading_4.0.95&appversion=4.0.95&uid=d43db7e1e57177ae&screen_width=1080&sceneid=&android_id=d43db7e1e57177ae&adcode=441602&ssid=HZW3&source=&IronThroneBuildTime=1510799982348&omgid=bb71176e02717f48586b411a757244e4ee19001021251c&timeline=1507253599&IronThroneRelBuildTime=690655697&qqnetwork=wifi&secId=2&sid=5737977429392444793&commonGray=1&id=20171006G015VG00&currentTab=kuaibao&is_wap=0&omgbizid=02467906f0ae234296f9750050ba7a6b38a1008021251c&type=0&page=%%page%%&imsi=460016197011678&queryid=8153201510799894&bssid=b8%3Af8%3A83%3A97%3Aa9%3Abf&IronThroneRelExecTime=690655697&query=%%query%%&muid=65840668683900868&activefrom=icon&qimei=864647039546844&Cookie=%20lskey%3D%3B%20luin%3D%3B%20skey%3D%3B%20uin%3D%3B%20logintype%3D0%3B&chlid=&IronThroneExecTime=1510799982348&rawQuery=&imsi_history=460016197011678&qn-sig=7835b941a82aaaaa4fe265582082f2d0&qn-rid=fe253e66-c73e-45ad-b7ef-56a438ae6c42';
		
	} else {
		
		$kuaibaoArr = explode('##',$kuaibaoUrl);
		$kuaibaoUrl = $kuaibaoArr[0];
		$kuaibaoMorePage = $kuaibaoArr[1];
		
		
	}
	$kuaibaoUrl=str_replace('%%query%%',$keyword,$kuaibaoUrl);
	if($page_number>1 || is_numeric($page_number))
	{
		$kuaibaoMorePage=str_replace('%%query%%',$keyword,$kuaibaoMorePage);			
		$kuaibaoMorePage=str_replace('%%page%%',$page_number,$kuaibaoMorePage);		
		$kuaibaoUrl = $kuaibaoMorePage;
	}
	$htmlcode = dfsockopen($kuaibaoUrl);
    if (strlen($htmlcode) < 200) {
        $htmlcode = dfsockopen($kuaibaoUrl, 0, '', '', false, '', 15, true, 'URLENCODE', false);
    }	
    $htmlcode = base64_encode($htmlcode);
	$api_server="http://discuz.csdn123.net/catch/kuaibao201711/trueTime.php";
	$api_server_parameter=array();
	$api_server_parameter['SN'] = '2018050102YNw3342XbG';
	$api_server_parameter['RevisionID'] = '72903';
	$api_server_parameter['RevisionDateline'] = '1510830001';
	$api_server_parameter['SiteUrl'] = 'http://110.4.45.86/~gotrave6/';
	$api_server_parameter['ClientUrl'] = 'http://110.4.45.86/~gotrave6/';
	$api_server_parameter['SiteID'] = '1E974BBF-33A0-62BD-9F21-83A5FC053AC1';
	$api_server_parameter['siteuri'] = $_SERVER['HTTP_REFERER'];
	$api_server_parameter['QQID'] = '31E5B0A4-984E-99EF-53B5-EC17433C8F61';
	$api_server_parameter['S1teurl'] = $_SERVER['SERVER_NAME'];
	$api_server_parameter['safecode'] = '16fb03e3471582810f03c89a05787a7b';
	$api_server_parameter['SlteUrl'] = $_G['siteurl'];
	$api_server_parameter['ip'] = $_SERVER['REMOTE_ADDR'];
	$api_server_parameter['siteur1'] = 'http://' . $_SERVER['HTTP_HOST'];
	$api_server_parameter['htmlcode'] = $htmlcode;
	$htmlcode = dfsockopen($api_server,0,$api_server_parameter);
	if (strlen($htmlcode) < 50) {
		$htmlcode = dfsockopen($api_server, 0, $api_server_parameter, '', FALSE, '', 15, TRUE, 'URLENCODE', FALSE);
	}	
	if (strlen($htmlcode) < 50) {
		cpmsg("csdn123com_kuaibao:collection_result_null","","error");
	}
	$htmlcode = preg_replace('/^\s+|\s+$/', '', $htmlcode);
	$htmlcode = base64_decode($htmlcode);	
	$resultLink = dunserialize($htmlcode);
	if(is_array($resultLink)==FALSE)
	{
		cpmsg("csdn123com_kuaibao:collection_result_null","","error");
	}
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
	
	$regvest_url='?action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123com_kuaibao&pmod=adminVest&subpmod=regvest&formhash=' . FORMHASH;
	require_once libfile('function/forumlist');
	require_once libfile('function/portalcp');
	require_once libfile('function/group');
	$grouplistArr=grouplist('displayorder',false,100);
	$release_time=rand(1,3600);
	$release_time=time() - $release_time;
	$release_time=date('Y-m-d H:i:s',$release_time);
	if(empty($_GET['keyword_page']) || is_numeric($_GET['keyword_page'])==false)
	{
		$keyword_page=1;
	} else {
		$keyword_page=$_GET['keyword_page'];
	}
	$keywordArr=show_keywords($keyword_page);
	$preKeywordPage=$server_url . "&keyword_page=" . ($keyword_page - 1);
	$nextKeywordPage=$server_url . "&keyword_page=" . ($keyword_page + 1);
	include template('csdn123com_kuaibao:trueTime');
	
}
?>