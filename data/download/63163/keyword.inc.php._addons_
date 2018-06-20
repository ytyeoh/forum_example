<?php
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$server_url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123_news&pmod=keyword';
if ($_GET['formhash'] == FORMHASH && empty($_GET['keyword_add']) == false && $_GET['keyword_add'] == 'yes') {
	
	if(empty($_GET['keyword']) || trim($_GET['keyword'])=='')
	{
		cpmsg('csdn123_news:keywords_empty', '', 'error');
	} else {
		$keyword=trim($keyword);
		$keyword=daddslashes($_GET['keyword']);	
	}
	if(empty($_GET['orderby_num']) || is_numeric($_GET['orderby_num'])==false)
	{
		$orderby_num=0;
	} else {
		$orderby_num=intval($_GET['orderby_num']);
	}
	$keywordSql="REPLACE INTO " . DB::table('csdn123zd_words') . "(word_str,orderby_num)  VALUES('" . $keyword . "'," . $orderby_num . ")";
	DB::query($keywordSql);
	cpmsg('csdn123_news:succeed', $server_url, 'succeed');

} elseif($_GET['formhash'] == FORMHASH && empty($_GET['clears_all']) == false && $_GET['clears_all'] == 'yes') {
	
	DB::delete('csdn123zd_words','ID>0');
	cpmsg('csdn123_news:succeed', $server_url, 'succeed');

} elseif($_GET['formhash'] == FORMHASH && empty($_GET['hot_keyword']) == false && $_GET['hot_keyword'] == 'yes') {
	
	$keywordUrl="http://top.baidu.com/";
	$htmlcode = dfsockopen($keywordUrl);
	if (strlen($htmlcode) < 100) {
		$htmlcode = dfsockopen($keywordUrl, 0, '', '', FALSE, '', 15, TRUE, 'URLENCODE', FALSE);
	}
	if (strlen($htmlcode) < 100) {
		cpmsg("csdn123_news:hot_keyword_error","","error");
	}
	$remoteUrl = array();
	$remoteUrl['SN'] = '20180501022rc0liFg9f';
	$remoteUrl['RevisionID'] = '63163';
	$remoteUrl['RevisionDateline'] = '1520164801';
	$remoteUrl['SiteUrl'] = 'http://110.4.45.86/~gotrave6/';
	$remoteUrl['ClientUrl'] = 'http://110.4.45.86/~gotrave6/';
	$remoteUrl['SiteID'] = '1E974BBF-33A0-62BD-9F21-83A5FC053AC1';
	$remoteUrl['QQID'] = '31E5B0A4-984E-99EF-53B5-EC17433C8F61';
	$remoteUrl['safecode'] = '4a672eb7eaaee346642a1c942480d8a6';
	$remoteUrl['SiteUrl2'] = $_G['siteurl'];
	$remoteUrl['ip'] = $_SERVER['REMOTE_ADDR'];
	$remoteUrl['url'] = $source_link;
	$remoteUrl['siteur1'] = 'http://' . $_SERVER['HTTP_HOST'];
	$fetchUrl = "http://www.csdn123.net/zd_version/zd9_3/hot_keyword.php";
	$htmlcode = base64_encode($htmlcode);
	$remoteUrl['htmlcode'] = $htmlcode;
	$htmlcode = dfsockopen($fetchUrl, 0, $remoteUrl);
	if (strlen($htmlcode) < 100) {
		cpmsg("csdn123_news:hot_keyword_error","","error");
	}
	$htmlcode = preg_replace('/^\s+|\s+$/', '', $htmlcode);
	$htmlcode = dunserialize($htmlcode);
	if (is_array($htmlcode) === false) {
		cpmsg("csdn123_news:hot_keyword_error","","error");
	}
	foreach($htmlcode as $keyword)
	{
		$keyword = diconv($keyword,'UTF-8');
		$keywordSql="REPLACE INTO " . DB::table('csdn123zd_words') . "(word_str)  VALUES('" . $keyword . "')";
		DB::query($keywordSql);
	}
	cpmsg('csdn123_news:succeed', $server_url, 'succeed');		
	
} elseif($_GET['formhash'] == FORMHASH && empty($_GET['delid']) == false && is_numeric($_GET['delid']) == true) {
	
	$id=intval($_GET['delid']);
	DB::delete('csdn123zd_words','ID=' . $id);
	cpmsg('csdn123_news:succeed', $server_url, 'succeed');

} elseif($_GET['formhash'] == FORMHASH && empty($_GET['keyword_update']) == false && $_GET['keyword_update'] == 'yes') {
	
	foreach($_GET['ids'] as $id)
	{
		$word_str='keyword' . $id;
		$word_str=$_GET[$word_str];
		$orderby_num='orderby_num' . $id;
		$orderby_num=$_GET[$orderby_num];
		$keywordArr=array();
		$keywordArr['word_str']=daddslashes($word_str);
		$keywordArr['orderby_num']=daddslashes($orderby_num);
		DB::update('csdn123zd_words',$keywordArr,'ID=' . $id);		
	}
	cpmsg('csdn123_news:succeed', $server_url, 'succeed');
	
} else {
	
	$keyword_list = DB::fetch_all('SELECT * FROM ' . DB::table('csdn123zd_words') . ' ORDER BY orderby_num ASC,ID DESC');
	include template('csdn123_news:keyword');
	
}
