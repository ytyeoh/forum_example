<?php
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$server_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123com_kuaibao&pmod=url';
require './source/plugin/csdn123com_kuaibao/function_common.php';
if($_GET['formhash'] == FORMHASH && !empty($_GET['csdn123_agrs']) && $_GET['csdn123_agrs']=='yes')
{
	if(empty($_GET['content_url']) || stripos($_GET['content_url'],'http')===false)
	{
		cpmsg("csdn123com_kuaibao:content_url_error","","error");
	} else {
		$content_url=$_GET['content_url'];
		$content_url=trim($content_url);
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
	$release_time=strtotime($release_time);
	if(is_numeric($release_time)==FALSE || $release_time<10000)
	{
		$release_time_start=time() - 3600;
		$release_time=rand($release_time_start,time());
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
	$chk = DB::fetch_first("SELECT * FROM " . DB::table('csdn123kuaibao_news') . " WHERE source_link='" . daddslashes($content_url) . "' LIMIT 1");
	if (count($chk) == 0)
	{
		$newsArr=array();
		$title=md5($content_url) . 'temporary title';
		$newsArr['title']=daddslashes($title);
		$newsArr['source_link']=daddslashes($content_url);
		$newsArr['forum_portal']=$forum_portal;
		$newsArr['fid']=$fid;
		$newsArr['threadtypeid']=$threadtypeid;
		$newsArr['portal_catid']=$portal_catid;
		$newsArr['first_uid']=$first_uid;
		$newsArr['display_link']=$display_link;
		$newsArr['image_localized']=$image_localized;
		$newsArr['pseudo_original']=$pseudo_original;
		$newsArr['chinese_encoding']=$chinese_encoding;
		$newsArr['views']=$views;
		$newsArr['group_fid']=$group_fid;
		$newsArr['filter_image']=$filter_image;
		$newsArr['image_center']=$image_center;
		$newsArr['release_time']=$release_time;
		$ID = DB::insert('csdn123kuaibao_news', $newsArr,true);
	}
	if(is_numeric($ID) && $ID > 0)
	{
		$recode = send_thread($ID);
	}
	if($recode=='ok')
	{
		$succeed_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123com_kuaibao&pmod=released';
		cpmsg("csdn123com_kuaibao:collection_success",$succeed_url,"succeed");
	} else {
		cpmsg('csdn123com_kuaibao:fail', '', 'error');
	}	

} else {
	
	$regvest_url='?action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123com_kuaibao&pmod=adminVest&subpmod=regvest&formhash=' . FORMHASH;
	require_once libfile('function/forumlist');
	require_once libfile('function/portalcp');
	require_once libfile('function/group');
	$grouplistArr=grouplist('displayorder',false,100);
	$release_time=rand(1,3600);
	$release_time=time() - $release_time;
	$release_time=date('Y-m-d H:i:s',$release_time);
	include template('csdn123com_kuaibao:url');
	
}
?>