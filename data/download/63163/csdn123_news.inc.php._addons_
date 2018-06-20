<?php
if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
if (!isset($_G['cache']['plugin'])) {
	loadcache('plugin');
}
$csdn123_dingshi = $_G['cache']['plugin']['csdn123_news']['csdn123_dingshi'];
$hzw_strict_dingshi = $_G['cache']['plugin']['csdn123_news']['hzw_strict_dingshi'];
if ($csdn123_dingshi != 1) {
	echo '// ' . lang('plugin/csdn123_news', 'cron_timing_acquisition');
	exit;
}
if(!defined('DISCUZ_VERSION')) {
	require_once './source/discuz_version.php';
}
if(DISCUZ_VERSION!='X2.5')
{
	$csdn123_cronid = C::t('common_cron')->get_cronid_by_filename('csdn123_news:cron_csdn123_news.inc.php');
}
if (DISCUZ_VERSION!='X2.5' && is_numeric($csdn123_cronid) && $csdn123_cronid > 0 && $hzw_strict_dingshi==1) {
	$csdn123_croninfo = C::t('common_cron')->fetch($csdn123_cronid);
	if (is_numeric($csdn123_croninfo['nextrun']) && $csdn123_croninfo['nextrun'] > 0 && $csdn123_croninfo['nextrun'] > TIMESTAMP) {
		
		$RemainingSeconds=$csdn123_croninfo['nextrun'] - TIMESTAMP;
		if(600 < $RemainingSeconds)
		{
			echo '// ' . lang('plugin/csdn123_news', 'cron_remaining_seconds') . $RemainingSeconds;
			exit;
		}
	}
}
require './source/plugin/csdn123_news/common.fun.php';
$csdn123_cron = DB::fetch_first("SELECT * FROM " . DB::table("csdn123zd_cron") . " ORDER BY catchtime ASC LIMIT 1");
if (is_numeric($csdn123_cron['catchtime'])) {
	$csdn123_diffTime = time() - $csdn123_cron['catchtime'];
	if ($csdn123_diffTime < 600) {
		echo '// ' .  lang('plugin/csdn123_news', 'cron_interval_seconds');
		exit;
	}
}
$csdn123_news_chk = DB::fetch_first("SELECT send_datetime FROM " . DB::table("csdn123zd_news") . " ORDER BY send_datetime DESC LIMIT 1");
if (is_numeric($csdn123_news_chk['send_datetime'])) {
	$csdn123_diffTime2 = time() - $csdn123_news_chk['send_datetime'];
	if ($csdn123_diffTime2 < 600) {
		echo '// ' .  lang('plugin/csdn123_news', 'cron_interval_seconds');
		exit;
	}
}
$csdn123_firt_news = DB::fetch_first("SELECT * FROM " . DB::table("csdn123zd_news") . " WHERE tid_aid=0 AND del=0 ORDER BY ID DESC LIMIT 1");
if (empty($csdn123_cron) == false && empty($csdn123_firt_news) == true) {
	DB::query("UPDATE " . DB::table("csdn123zd_cron") . " SET catchnum=catchnum+1,catchtime=" . time() . " WHERE ID=" . dintval($csdn123_cron["ID"]));
	$keyword = $csdn123_cron['keyword'];
	$forum_portal = $csdn123_cron['forum_portal'];
	$fid = $csdn123_cron['fid'];
	$threadtypeid = $csdn123_cron['threadtypeid'];
	$portal_catid = $csdn123_cron['portal_catid'];
	$uid = $csdn123_cron['uid'];
	$display_link = $csdn123_cron['display_link'];
	$image_localized = $csdn123_cron['image_localized'];
	$pseudo_original = $csdn123_cron['pseudo_original'];
	$chinese_encoding = $csdn123_cron['chinese_encoding'];
	$views = $csdn123_cron['views'];
	$release_time = $csdn123_cron['release_time'];
	$group_fid = $csdn123_cron['group_fid'];
	$release_time = strtotime($release_time);
	if (is_numeric($release_time) == FALSE || $release_time < 10000) {
		$release_time_start = time() - 3600;
		$release_time = rand($release_time_start, time());
	}
	$catchnum = $csdn123_cron['catchnum'];
	$catchnum = $catchnum % 5;
	if($catchnum==0)
	{
		$api_server="http://www.csdn123.net/zd_version/zd9_3/server_batch.php?";
		$api_server_parameter=array();
		$api_server_parameter['SN'] = '20180501022rc0liFg9f';
		$api_server_parameter['zhiwu'] = $_COOKIE['zhiwu'];
		$api_server_parameter['RevisionID'] = '63163';
		$api_server_parameter['RevisionDateline'] = '1520164801';
		$api_server_parameter['SiteUrl'] = 'http://110.4.45.86/~gotrave6/';
		$api_server_parameter['ClientUrl'] = 'http://110.4.45.86/~gotrave6/';
		$api_server_parameter['SiteID'] = '1E974BBF-33A0-62BD-9F21-83A5FC053AC1';
		$api_server_parameter['zw0lO1'] = $_SERVER['HTTP_REFERER'];
		$api_server_parameter['QQID'] = '31E5B0A4-984E-99EF-53B5-EC17433C8F61';
		$api_server_parameter['zwOl01'] = 'http://' . $_SERVER['SERVER_NAME'];
		$api_server_parameter['safecode'] = '4a672eb7eaaee346642a1c942480d8a6';
		$api_server_parameter['zwl0lO'] = $_G['siteurl'];
		$api_server_parameter['ip'] = $_SERVER['REMOTE_ADDR'];
		$keyword = diconv($keyword,CHARSET,'UTF-8');
		$api_server_parameter['query'] = $keyword;
		$api_server_parameter['zw01O1'] = 'http://' . $_SERVER['HTTP_HOST'];
		$api_server_parameter['number_collected'] = 10;	
		$api_server = $api_server . http_build_query($api_server_parameter);
		$htmlcode = dfsockopen($api_server);
		if (strlen($htmlcode) < 50) {
			$htmlcode = dfsockopen($api_server, 0, '', '', FALSE, '', 15, TRUE, 'URLENCODE', FALSE);
		}
		if (strlen($htmlcode) < 50) {
			echo '// ' .  lang('plugin/csdn123_news', 'collection_result_null');
			exit;
		}
		
	} else {
		
		$htmlcode = catch_data_source($keyword, $catchnum);
		if (is_array($htmlcode) == false) {
			echo '// ' .  lang('plugin/csdn123_news', 'collection_result_null');
			exit;
		}
		$api_server = "http://www.csdn123.net/zd_version/zd9_3/trueTime.php";
		$api_server_parameter = array();
		$api_server_parameter['SN'] = '20180501022rc0liFg9f';
		$api_server_parameter['zhiwu'] = $_COOKIE['zhiwu'];
		$api_server_parameter['RevisionID'] = '63163';
		$api_server_parameter['RevisionDateline'] = '1520164801';
		$api_server_parameter['SiteUrl'] = 'http://110.4.45.86/~gotrave6/';
		$api_server_parameter['ClientUrl'] = 'http://110.4.45.86/~gotrave6/';
		$api_server_parameter['SiteID'] = '1E974BBF-33A0-62BD-9F21-83A5FC053AC1';
		$api_server_parameter['zw0lO1'] = $_SERVER['HTTP_REFERER'];
		$api_server_parameter['QQID'] = '31E5B0A4-984E-99EF-53B5-EC17433C8F61';
		$api_server_parameter['zwOl01'] = 'http://' . $_SERVER['SERVER_NAME'];
		$api_server_parameter['safecode'] = '4a672eb7eaaee346642a1c942480d8a6';
		$api_server_parameter['zwl0lO'] = $_G['siteurl'];
		$api_server_parameter['ip'] = $_SERVER['REMOTE_ADDR'];
		$api_server_parameter['zw01O1'] = 'http://' . $_SERVER['HTTP_HOST'];
		$api_server_parameter['htmlcode'] = base64_encode($htmlcode['htmlcode']);
		$api_server_parameter['catchUrl'] = urlencode($htmlcode['catchUrl']);
		$htmlcode = dfsockopen($api_server, 0, $api_server_parameter);
		if (strlen($htmlcode) < 50) {
			$htmlcode = dfsockopen($api_server, 0, $api_server_parameter, '', FALSE, '', 15, TRUE, 'URLENCODE', FALSE);
		}
		if (strlen($htmlcode) < 50) {
			echo '// ' .  lang('plugin/csdn123_news', 'collection_result_null');
			exit;
		}
		$htmlcode = base64_decode($htmlcode);
	}	
	$resultLink = dunserialize($htmlcode);
	if (is_array($resultLink) == FALSE) {
		echo '// ' .  lang('plugin/csdn123_news', 'collection_result_null');
		exit;
	}
	foreach ($resultLink as $resultLinkItem) {
		$newsArr = array();
		$title = diconv($resultLinkItem['title'], 'UTF-8', CHARSET);
		$newsArr['title'] = daddslashes($title);
		$source_link = $resultLinkItem['url'];
		$newsArr['source_link'] = daddslashes($source_link);
		$newsArr['forum_portal'] = $forum_portal;
		$newsArr['fid'] = $fid;
		$newsArr['threadtypeid'] = $threadtypeid;
		$newsArr['portal_catid'] = $portal_catid;
		$newsArr['uid'] = getOneUid($uid);
		$newsArr['display_link'] = $display_link;
		$newsArr['image_localized'] = $image_localized;
		$newsArr['pseudo_original'] = $pseudo_original;
		$newsArr['chinese_encoding'] = $chinese_encoding;
		$newsArr['views'] = rand(1, $views);
		$newsArr['group_fid'] = $group_fid;
		$newsArr['release_time'] = $release_time - rand(-1800, 1800);
		if(!empty($resultLinkItem['fromurl']) && strlen($resultLinkItem['fromurl'])>8)
		{
			$newsArr['fromurl'] = daddslashes($resultLinkItem['fromurl']);
		}
		$chk = DB::fetch_first("SELECT * FROM " . DB::table('csdn123zd_news') . " WHERE source_link='" . daddslashes($source_link) . "' LIMIT 1");
		$chk2 = DB::fetch_first("SELECT * FROM " . DB::table('csdn123zd_news') . " WHERE title='" . daddslashes($title) . "' LIMIT 1");
		if (count($chk) == 0 && count($chk2) == 0) {
			DB::insert('csdn123zd_news', $newsArr);
		}
	}
	echo '// ' .  lang('plugin/csdn123_news', 'cron_collection_keyword');
} elseif (empty($csdn123_firt_news) == false) {
	require_once './source/function/function_forum.php';
	$status_code = send_thread($csdn123_firt_news['ID']);
	if ($status_code == 'ok') {
		DB::update('csdn123zd_news', array('catch_way' => 'autocatch'), array('ID' => $csdn123_firt_news['ID']));
	}
	$tid_aid_rs = DB::fetch_first("SELECT tid_aid FROM " . DB::table('csdn123zd_news') . " WHERE ID=" . $csdn123_firt_news['ID']);
	echo '// ' . lang('plugin/csdn123_news', 'collection_success') . preview_url($csdn123_firt_news['forum_portal'], $tid_aid_rs['tid_aid']);
}
?>