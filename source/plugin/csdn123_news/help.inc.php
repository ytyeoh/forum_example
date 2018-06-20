<?php
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$server_url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=csdn123_news&pmod=help';
if($_GET['formhash'] == FORMHASH && $_GET['repair'] == 'yes')
{
	
	$lang_data=dfsockopen("http://www.csdn123.net/zd_version/zd9_3/language_data.php");
	$lang_data=base64_decode($lang_data);
	$lang_data=preg_replace('/^\s+|\s+$/', '', $lang_data);
	$lang_data_arr=dunserialize($lang_data);
	if(is_array($lang_data_arr))
	{
		if($lang_data_arr['charset']!=CHARSET)
		{
			foreach($lang_data_arr['pluginlanguage_template'] as $key=>$value)
			{
				$lang_data_arr['pluginlanguage_template'][$key]=diconv($value,$lang_data_arr['charset'],CHARSET);
			}
			foreach($lang_data_arr['pluginlanguage_script'] as $key=>$value)
			{
				$lang_data_arr['pluginlanguage_script'][$key]=diconv($value,$lang_data_arr['charset'],CHARSET);
			}
			
		}		
		$_G['cache']['pluginlanguage_template'][$lang_data_arr['identifier']]=$lang_data_arr['pluginlanguage_template'];
		$_G['cache']['pluginlanguage_script'][$lang_data_arr['identifier']]=$lang_data_arr['pluginlanguage_script'];
		savecache('pluginlanguage_template',$_G['cache']['pluginlanguage_template']);
		savecache('pluginlanguage_script',$_G['cache']['pluginlanguage_script']);
		cpmsg('csdn123_news:language_import_success','', 'succeed');	
		
	} else {
		cpmsg('csdn123_news:fail','', 'error');
	}

} else {
	
	$remoteUrl = array();
	$remoteUrl['SN'] = '20180501022rc0liFg9f';
	$remoteUrl['RevisionID'] = '63163';
	$remoteUrl['RevisionDateline'] = '1520164801';
	$remoteUrl['SiteUrl'] = 'http://110.4.45.86/~gotrave6/';
	$remoteUrl['ClientUrl'] = 'http://110.4.45.86/~gotrave6/';
	$remoteUrl['SiteID'] = '1E974BBF-33A0-62BD-9F21-83A5FC053AC1';
	$remoteUrl['QQID'] = '31E5B0A4-984E-99EF-53B5-EC17433C8F61';
	$remoteUrl['safecode'] = '4a672eb7eaaee346642a1c942480d8a6';
	$remoteUrl['zwl0lO'] = $_G['siteurl'];
	$remoteUrl['SiteUrl2'] = $_G['siteurl'];
	$remoteUrl['ip'] = $_SERVER['REMOTE_ADDR'];
	$remoteUrl['url'] = $source_link;
	$remoteUrl['zw01O1'] = 'http://' . $_SERVER['HTTP_HOST'];
	$fetchUrl = "http://www.csdn123.net/zd_version/zd9_3/check.php";
	$htmlcode = dfsockopen($fetchUrl, 0, $remoteUrl);
	$csdn123_arr = preg_replace('/^\s+|\s+$/','',$htmlcode);
	$csdn123_arr = base64_decode($csdn123_arr);
	$csdn123_arr = dunserialize($csdn123_arr);
	$csdn123_arr['info']=diconv($csdn123_arr['info'],"UTF-8");
	$csdn123_arr['upgrade']=diconv($csdn123_arr['upgrade'],"UTF-8");
	include template('csdn123_news:help');

}

?>