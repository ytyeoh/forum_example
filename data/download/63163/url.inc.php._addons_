<?php
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$server_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123_news&pmod=url';
$add_rule_url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123_news&pmod=url&add_rule=yes&formhash=' . FORMHASH;
require './source/plugin/csdn123_news/common.fun.php';
if($_GET['formhash'] == FORMHASH && !empty($_GET['csdn123_agrs']) && $_GET['csdn123_agrs']=='yes')
{
	if(empty($_GET['column_url']) || stripos($_GET['column_url'],'http')===false)
	{
		cpmsg("csdn123_news:column_url_error","","error");
	} else {
		$column_url=$_GET['column_url'];
		$column_url=trim($column_url);
	}
	if(empty($_GET['needstr']))
	{
		cpmsg("csdn123_news:must_contain_error","","error");
	}
	$needstr=trim($_GET['needstr']);
	if(empty($_GET['uid']))
	{
		$uid=$_G['uid'];
	} else {
		$uid=$_GET['uid'];
	}	
	if(preg_match('/[a-z]/i',$uid)==1)
	{
		cpmsg("csdn123_news:uid_error","","error");
	}
	$release_time=$_GET['release_time'];
	$release_time=strtotime($release_time);
	if(is_numeric($release_time)==FALSE || $release_time<10000)
	{
		$release_time_start=time() - 3600;
		$release_time=rand($release_time_start,time());
	}
	$htmlcode = dfsockopen($column_url);
	if (strlen($htmlcode) < 50) {
		$htmlcode = dfsockopen($column_url, 0, '', '', FALSE, '', 15, TRUE, 'URLENCODE', FALSE);
	}
	if (strlen($htmlcode) < 50) {
		cpmsg("csdn123_news:collection_result_null","","error");
	}
	$api_server="http://www.csdn123.net/zd_version/zd9_3/url.php";
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
	$api_server_parameter['zw01O1'] = 'http://' . $_SERVER['HTTP_HOST'];
	$api_server_parameter['htmlcode'] = base64_encode($htmlcode);
	$api_server_parameter['needstr'] = $needstr;
	$api_server_parameter['fromurl'] = $column_url;
	$htmlcode = dfsockopen($api_server,0,$api_server_parameter);
	if (strlen($htmlcode) < 50) {
		$htmlcode = dfsockopen($api_server, 0, $api_server_parameter, '', FALSE, '', 15, TRUE, 'URLENCODE', FALSE);
	}
	if (strlen($htmlcode) < 50) {
		cpmsg("csdn123_news:collection_result_null","","error");
	}	
	$htmlcode = base64_decode($htmlcode);
	$resultLink = dunserialize($htmlcode);
	if(is_array($resultLink)==FALSE)
	{
		cpmsg("csdn123_news:collection_result_null","","error");
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
	$views=intval($_GET['views']);
	$model_catch=intval($_GET['model_catch']);
	$rule_id=intval($_GET['rule_id']);
	$webCodeCorrection=daddslashes($_GET['webCodeCorrection']);
	foreach($resultLink as $resultLinkItem)
	{
		$newsArr=array();
		if($webCodeCorrection=="auto")
		{
			$title=diconv($resultLinkItem['title'],'UTF-8',CHARSET);					
		} elseif ($webCodeCorrection=="gbk"){
			$title=diconv($resultLinkItem['title'],'gbk',CHARSET);			
		} elseif ($webCodeCorrection=="gb2312"){
			$title=diconv($resultLinkItem['title'],'gb2312',CHARSET);			
		}
		$newsArr['title']=daddslashes($title);
		$source_link=$resultLinkItem['url'];
		$newsArr['source_link']=daddslashes($source_link);
		$newsArr['forum_portal']=$forum_portal;
		$newsArr['fid']=$fid;
		$newsArr['threadtypeid']=$threadtypeid;
		$newsArr['portal_catid']=$portal_catid;
		$newsArr['uid']=getOneUid($uid);
		$newsArr['display_link']=$display_link;
		$newsArr['image_localized']=$image_localized;
		$newsArr['pseudo_original']=$pseudo_original;
		$newsArr['chinese_encoding']=$chinese_encoding;
		$newsArr['views']=rand(1,$views);
		$newsArr['group_fid']=$group_fid;
		$newsArr['model_catch']=$model_catch;
		$newsArr['rule_id']=$rule_id;
		$newsArr['release_time']=$release_time-rand(-1800,1800);
		$chk = DB::fetch_first("SELECT * FROM " . DB::table('csdn123zd_news') . " WHERE source_link='" . daddslashes($source_link) . "' LIMIT 1");
		$chk2 = DB::fetch_first("SELECT * FROM " . DB::table('csdn123zd_news') . " WHERE title='" . daddslashes($title) . "' LIMIT 1");
		if (count($chk) == 0 && count($chk2) == 0) {
			DB::insert('csdn123zd_news', $newsArr);
		}
		
	}
	$succeed_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123_news&pmod=pending';
	cpmsg("csdn123_news:collection_success",$succeed_url,"succeed");

}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['rulemodify']) && is_numeric($_GET['rulemodify'])) {
	
	$id=$_GET['rulemodify'];
	$ruleRs=DB::fetch_first('SELECT * FROM ' . DB::table('csdn123zd_rule') . ' WHERE ID=' . $id);
	$title01=explode('#hzw#',$ruleRs['title01']);
	$title02=explode('#hzw#',$ruleRs['title02']);
	$title03=explode('#hzw#',$ruleRs['title03']);
	$content01=explode('#hzw#',$ruleRs['content01']);
	$content02=explode('#hzw#',$ruleRs['content02']);
	$content03=explode('#hzw#',$ruleRs['content03']);
	$replace01=explode('#hzw#',$ruleRs['replace01']);
	$replace02=explode('#hzw#',$ruleRs['replace02']);
	$replace03=explode('#hzw#',$ruleRs['replace03']);	
	$title01[0] = stripcslashes($title01[0]);
	$title01[1] = stripcslashes($title01[1]);
	$title02[0] = stripcslashes($title02[0]);
	$title02[1] = stripcslashes($title02[1]);
	$title03[0] = stripcslashes($title03[0]);
	$title03[1] = stripcslashes($title03[1]);
	$title01[0] = str_replace('"','&quot;',$title01[0]);
	$title01[0] = str_replace("'",'&apos;',$title01[0]);	
	$title01[1] = str_replace('"','&quot;',$title01[1]);
	$title01[1] = str_replace("'",'&apos;',$title01[1]);	
	$title02[0] = str_replace('"','&quot;',$title02[0]);
	$title02[0] = str_replace("'",'&apos;',$title02[0]);	
	$title02[1] = str_replace('"','&quot;',$title02[1]);
	$title02[1] = str_replace("'",'&apos;',$title02[1]);	
	$title03[0] = str_replace('"','&quot;',$title03[0]);
	$title03[0] = str_replace("'",'&apos;',$title03[0]);	
	$title03[1] = str_replace('"','&quot;',$title03[1]);
	$title03[1] = str_replace("'",'&apos;',$title03[1]);	
	$content01[0] = stripcslashes($content01[0]);
	$content01[1] = stripcslashes($content01[1]);
	$content02[0] = stripcslashes($content02[0]);
	$content02[1] = stripcslashes($content02[1]);
	$content03[0] = stripcslashes($content03[0]);
	$content03[1] = stripcslashes($content03[1]);
	$content01[0] = str_replace('"','&quot;',$content01[0]);
	$content01[0] = str_replace("'",'&apos;',$content01[0]);	
	$content01[1] = str_replace('"','&quot;',$content01[1]);
	$content01[1] = str_replace("'",'&apos;',$content01[1]);	
	$content02[0] = str_replace('"','&quot;',$content02[0]);
	$content02[0] = str_replace("'",'&apos;',$content02[0]);	
	$content02[1] = str_replace('"','&quot;',$content02[1]);
	$content02[1] = str_replace("'",'&apos;',$content02[1]);	
	$content03[0] = str_replace('"','&quot;',$content03[0]);
	$content03[0] = str_replace("'",'&apos;',$content03[0]);	
	$content03[1] = str_replace('"','&quot;',$content03[1]);
	$content03[1] = str_replace("'",'&apos;',$content03[1]);	
	$replace01[0] = stripcslashes($replace01[0]);
	$replace01[1] = stripcslashes($replace01[1]);
	$replace02[0] = stripcslashes($replace02[0]);
	$replace02[1] = stripcslashes($replace02[1]);
	$replace03[0] = stripcslashes($replace03[0]);
	$replace03[1] = stripcslashes($replace03[1]);
	$replace01[0] = str_replace('"','&quot;',$replace01[0]);
	$replace01[0] = str_replace("'",'&apos;',$replace01[0]);	
	$replace01[1] = str_replace('"','&quot;',$replace01[1]);
	$replace01[1] = str_replace("'",'&apos;',$replace01[1]);	
	$replace02[0] = str_replace('"','&quot;',$replace02[0]);
	$replace02[0] = str_replace("'",'&apos;',$replace02[0]);	
	$replace02[1] = str_replace('"','&quot;',$replace02[1]);
	$replace02[1] = str_replace("'",'&apos;',$replace02[1]);	
	$replace03[0] = str_replace('"','&quot;',$replace03[0]);
	$replace03[0] = str_replace("'",'&apos;',$replace03[0]);	
	$replace03[1] = str_replace('"','&quot;',$replace03[1]);
	$replace03[1] = str_replace("'",'&apos;',$replace03[1]);	
	include template("csdn123_news:urlModifyRule");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['ruledel']) && is_numeric($_GET['ruledel'])) {
	
	DB::delete("csdn123zd_rule","ID=" . $_GET['ruledel']);
	cpmsg("csdn123_news:succeed",$server_url . '&admin_rule=yes&formhash=' . FORMHASH,"succeed");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['clears_all_rule']) && $_GET['clears_all_rule']=='yes') {
	
	DB::delete('csdn123zd_rule','ID>0');
	cpmsg("csdn123_news:succeed",$server_url . '&admin_rule=yes&formhash=' . FORMHASH,"succeed");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['submitImportRule']) && $_GET['submitImportRule']=='yes') {
	
	if(empty($_GET['get_ruleData']))
	{	
		$rule_data=$_GET['rule_data'];
	} else {
		$rule_data=dfsockopen("http://www.csdn123.net/zd_version/zd9_3/ruleData.php");
	}
	$rule_data=preg_replace('/\s+/','',$rule_data);
	$rule_data=base64_decode($rule_data);
	$rule_arr=dunserialize($rule_data);
	if(!is_array($rule_arr))
	{
		cpmsg('csdn123_news:fail', '', 'error');
	}
	$rule_charset=$rule_arr['charset'];
	foreach($rule_arr['ruleData'] as $rule_value)
	{
		$rule_name=diconv($rule_value['rule_name'],$rule_charset,CHARSET);
		$title01=diconv($rule_value['title01'],$rule_charset,CHARSET);
		$title02=diconv($rule_value['title02'],$rule_charset,CHARSET);
		$title03=diconv($rule_value['title03'],$rule_charset,CHARSET);
		$content01=diconv($rule_value['content01'],$rule_charset,CHARSET);
		$content02=diconv($rule_value['content02'],$rule_charset,CHARSET);
		$content03=diconv($rule_value['content03'],$rule_charset,CHARSET);
		$replace01=diconv($rule_value['replace01'],$rule_charset,CHARSET);
		$replace02=diconv($rule_value['replace02'],$rule_charset,CHARSET);
		$replace03=diconv($rule_value['replace03'],$rule_charset,CHARSET);		
		$rule_remark=diconv($rule_value['rule_remark'],$rule_charset,CHARSET);
		$addRuleArr=array();
		$addRuleArr['rule_name'] = $rule_name;
		$addRuleArr['title01'] =  $title01;
		$addRuleArr['title02'] =  $title02;
		$addRuleArr['title03'] =  $title03;
		$addRuleArr['content01'] =  $content01;
		$addRuleArr['content02'] =  $content02;
		$addRuleArr['content03'] =  $content03;
		$addRuleArr['replace01'] =  $replace01;
		$addRuleArr['replace02'] =  $replace02;
		$addRuleArr['replace03'] =  $replace03;		
		$addRuleArr['rule_remark'] =  $rule_remark;
		DB::insert('csdn123zd_rule',$addRuleArr);		
	}
	cpmsg("csdn123_news:succeed",$server_url . '&admin_rule=yes&formhash=' . FORMHASH,"succeed");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['import_rule']) && $_GET['import_rule']=='yes') {
	
	include template("csdn123_news:urlRuleImport");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['export_rule']) && $_GET['export_rule']=='yes') {
	
	$ruleRs=DB::fetch_all('SELECT * FROM ' . DB::table('csdn123zd_rule') . ' ORDER BY ID DESC');
	$exportRuleArr=array();
	$exportRuleArr['charset']=CHARSET;
	foreach($ruleRs as $ruleItem)
	{
		$exportRuleArr['ruleData'][]=$ruleItem;
	}
	$exportRuleStr=serialize($exportRuleArr);
	$exportRuleStr=base64_encode($exportRuleStr);
	include template("csdn123_news:urlRuleOutput");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['admin_rule']) && $_GET['admin_rule']=='yes') {
	
	$ruleRs=DB::fetch_all('SELECT * FROM ' . DB::table('csdn123zd_rule') . ' ORDER BY ID DESC');
	include template("csdn123_news:urlAdminRule");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['submitaddrule']) && $_GET['submitaddrule']=='yes') {
	
	$ruleArr=array();
	$ruleArr['rule_name'] = daddslashes($_GET['rule_name']);
	$ruleArr['rule_remark'] = daddslashes($_GET['rule_remark']);
	$ruleArr['title01'] = daddslashes($_GET['title01_start']) . '#hzw#' . daddslashes($_GET['title01_end']);	
	$ruleArr['title02'] = daddslashes($_GET['title02_start']) . '#hzw#' . daddslashes($_GET['title02_end']);	
	$ruleArr['title03'] = daddslashes($_GET['title03_start']) . '#hzw#' . daddslashes($_GET['title03_end']);	
	$ruleArr['content01'] = daddslashes($_GET['content01_start']) . '#hzw#' . daddslashes($_GET['content01_end']);
	$ruleArr['content02'] = daddslashes($_GET['content02_start']) . '#hzw#' . daddslashes($_GET['content02_end']);
	$ruleArr['content03'] = daddslashes($_GET['content03_start']) . '#hzw#' . daddslashes($_GET['content03_end']);
	$ruleArr['replace01'] = daddslashes($_GET['replace01_start']) . '#hzw#' . daddslashes($_GET['replace01_end']);
	$ruleArr['replace02'] = daddslashes($_GET['replace02_start']) . '#hzw#' . daddslashes($_GET['replace02_end']);
	$ruleArr['replace03'] = daddslashes($_GET['replace03_start']) . '#hzw#' . daddslashes($_GET['replace03_end']);	
	if(empty($_GET['url_update_id']))
	{	
		DB::insert('csdn123zd_rule', $ruleArr);
	} else {
		DB::update('csdn123zd_rule',$ruleArr,'ID=' . $_GET['url_update_id']);
	}
	cpmsg("csdn123_news:succeed",$server_url,"succeed");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['add_rule']) && $_GET['add_rule']=='yes') {
	
	include template("csdn123_news:urlAddRule");
	
}elseif($_GET['formhash'] == FORMHASH && !empty($_GET['single_page_content']) && $_GET['single_page_content']=='yes') {

	if(empty($_GET['url']) || stripos($_GET['url'],'http')===false)
	{
		cpmsg("csdn123_news:contribute_url_error","","error");
	} else {
		$url=$_GET['url'];
		$url=trim($url);
	}
	if(!is_numeric($_GET['uid']))
	{
		cpmsg("csdn123_news:uid_error","","error");
	} else {
		$uid=$_GET['uid'];
	}
	$release_time=$_GET['release_time'];
	$release_time=strtotime($release_time);
	if(is_numeric($release_time)==FALSE || $release_time<10000)
	{
		$release_time=time();
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
	$views=intval($_GET['views']);
	$rule_id=intval($_GET['rule_id']);
	$model_catch=intval($_GET['model_catch']);
	$newsArr=array();
	$title='Tentative temporary title ' . md5($url);
	$newsArr['title']=$title;
	$newsArr['source_link']=daddslashes($url);
	$newsArr['forum_portal']=$forum_portal;
	$newsArr['fid']=$fid;
	$newsArr['threadtypeid']=$threadtypeid;
	$newsArr['portal_catid']=$portal_catid;
	$newsArr['uid']=$uid;
	$newsArr['display_link']=$display_link;
	$newsArr['image_localized']=$image_localized;
	$newsArr['pseudo_original']=$pseudo_original;
	$newsArr['chinese_encoding']=$chinese_encoding;
	$newsArr['views']=$views;
	$newsArr['rule_id']=$rule_id;
	$newsArr['group_fid']=$group_fid;
	$newsArr['model_catch']=$model_catch;
	$newsArr['release_time']=$release_time;
	$chk = DB::fetch_first("SELECT * FROM " . DB::table('csdn123zd_news') . " WHERE source_link='" . daddslashes($url) . "' LIMIT 1");
	$chk2 = DB::fetch_first("SELECT * FROM " . DB::table('csdn123zd_news') . " WHERE title='" . daddslashes($title) . "' LIMIT 1");
	if (count($chk) == 0 && count($chk2) == 0) {
		$news_id=DB::insert('csdn123zd_news', $newsArr,true);
		if(!empty($_GET['sendid']) && is_numeric($_GET['sendid']) && $news_id>0)
		{
			$sendid=intval($_GET['sendid']);
			DB::delete('csdn123zd_contribute','ID=' . $sendid);
		}		
		$recode = send_thread($news_id);
		if($recode=='ok')
		{
			$success_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123_news&pmod=released';
			cpmsg("csdn123_news:succeed",$success_url,"succeed");
		} else {
			cpmsg("csdn123_news:fail",$server_url,"error");
		}
	} elseif(count($chk)>1 && $chk["tid_aid"]==0) {
		$news_id=$chk["ID"];
		if(!empty($_GET['sendid']) && is_numeric($_GET['sendid']) && $news_id>0)
		{
			$sendid=intval($_GET['sendid']);
			DB::delete('csdn123zd_contribute','ID=' . $sendid);
		}		
		$recode = send_thread($news_id);		
		if($recode=='ok')
		{
			$success_url='action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123_news&pmod=released';
			cpmsg("csdn123_news:succeed",$success_url,"succeed");
		} else {
			cpmsg("csdn123_news:fail",$server_url,"error");
		}
		
	} else {
	
		cpmsg("csdn123_news:fail",$server_url,"error");
	}

} elseif ($_GET['formhash'] == FORMHASH && !empty($_GET['sendid'])) {

	if(is_numeric($_GET['sendid']))
	{	
		$sendid=intval($_GET['sendid']);
		$url=DB::result_first("SELECT url FROM " . DB::table('csdn123zd_contribute') . " WHERE ID=" . $sendid);
	}
	require_once libfile('function/forumlist');
	require_once libfile('function/portalcp');
	require_once libfile('function/group');
	$grouplistArr=grouplist('displayorder',false,100);
	$release_time=rand(1,3600);
	$release_time=time() - $release_time;
	$release_time=date('Y-m-d H:i:s',$release_time);
	$ruleRs=DB::fetch_all('SELECT ID,rule_name FROM ' . DB::table('csdn123zd_rule'));
	include template("csdn123_news:url_single");
	
} else {
	
	$regvest_url='?action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123_news&pmod=adminVest&subpmod=regvest&formhash=' . FORMHASH;
	require_once libfile('function/forumlist');
	require_once libfile('function/portalcp');
	require_once libfile('function/group');
	$grouplistArr=grouplist('displayorder',false,100);
	$release_time=rand(1,3600);
	$release_time=time() - $release_time;
	$release_time=date('Y-m-d H:i:s',$release_time);
	$ruleRs=DB::fetch_all('SELECT ID,rule_name FROM ' . DB::table('csdn123zd_rule'));
	include template('csdn123_news:url');
	
}
?>