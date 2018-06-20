<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');
0
|| checktplrefresh('./template/default/home/space_profile.htm', './template/default/home/space_header.htm', 1529238745, '1', './data/template/zh_cn_1_1_home_space_profile.tpl.php', './template/default', 'home/space_profile')
|| checktplrefresh('./template/default/home/space_profile.htm', './template/default/home/space_profile_body.htm', 1529238745, '1', './data/template/zh_cn_1_1_home_space_profile.tpl.php', './template/default', 'home/space_profile')
|| checktplrefresh('./template/default/home/space_profile.htm', './template/default/home/space_userabout.htm', 1529238745, '1', './data/template/zh_cn_1_1_home_space_profile.tpl.php', './template/default', 'home/space_profile')
|| checktplrefresh('./template/default/home/space_profile.htm', './template/default/common/header_common.htm', 1529238745, '1', './data/template/zh_cn_1_1_home_space_profile.tpl.php', './template/default', 'home/space_profile')
|| checktplrefresh('./template/default/home/space_profile.htm', './template/default/home/space_diy.htm', 1529238745, '1', './data/template/zh_cn_1_1_home_space_profile.tpl.php', './template/default', 'home/space_profile')
|| checktplrefresh('./template/default/home/space_profile.htm', './template/default/home/space_header_personalnv.htm', 1529238745, '1', './data/template/zh_cn_1_1_home_space_profile.tpl.php', './template/default', 'home/space_profile')
;?>
<?php if($_G['setting']['homepagestyle']) { $_G[cookie][extstyle] = false;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--vot--><html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $_G['langdir'];?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> Powered by Discuz!</title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2017 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" />
<link rel="shortcut icon" href="favicon.ico"><link rel="stylesheet" type="text/css" href="data/cache/style_1_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_1_home_space.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><!-- Multi-Lingual Javascript Support by Valery Votintsev  -->
<!--vot--><script src="<?php echo $_G['langurl'];?>lang_js.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<!--vot--><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', CSSPATH = '<?php echo $_G['setting']['csspath'];?>', DYNAMICURL = '<?php echo $_G['dynamicurl'];?>', LANG = '<?php echo DISCUZ_LANG;?>', LANGURL = '<?php echo $_G['siteurl'];?>source/language/<?php echo DISCUZ_LANG;?>/', LANGDIR = '<?php echo $_G['langdir'];?>', RTLSUFFIX = '<?php echo RTLSUFFIX;?>';</script>

<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { $_GET['diy'] = '';?><?php } if(!isset($topic)) { $topic = array();?><?php } ?>
<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<!--vot-->	<link rel="stylesheet" type="text/css" href='<?php echo $_G['setting']['csspath'];?><?php echo STYLEID;?>_css_space<?php echo RTLSUFFIX;?>.css?<?php echo VERHASH;?>' />
<link id="style_css" rel="stylesheet" type="text/css" href="<?php echo STATICURL;?>space/<?php if($space['theme']) { ?><?php echo $space['theme'];?><?php } else { ?>t1<?php } ?>/style.css?<?php echo VERHASH;?>">
<style id="diy_style"><?php echo $space['spacecss'];?></style>
</head>

<body id="space" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<?php if($space['self'] && $_GET['diy'] == 'yes' && $do == 'index' ) { ?>
<!--vot-->	<link rel="stylesheet" type="text/css" href='<?php echo $_G['setting']['csspath'];?><?php echo STYLEID;?>_css_diy<?php echo RTLSUFFIX;?>.css?<?php echo VERHASH;?>' /><div id="controlpanel" class="cl">
<div id="controlheader" class="cl">
<p class="y">
<span id="navcancel"><a href="javascript:;" onclick="spaceDiy.cancel();return false;">!close!</a></span>
<span id="navsave"><a href="javascript:;" onclick="javascript:spaceDiy.save();return false;">!save!</a></span>
<span id="button_redo" class="unusable"><a href="javascript:;" onclick="spaceDiy.redo();return false;" title="!diy_redo!" onfocus="this.blur();">!diy_redo!</a></span>
<span id="button_undo" class="unusable"><a href="javascript:;" onclick="spaceDiy.undo();return false;" title="!diy_revocation!" onfocus="this.blur();">!diy_revocation!</a></span>
</p>
<ul id="controlnav">
<li id="navstart" class="current"><a href="javascript:" onclick="spaceDiy.getdiy('start');this.blur();return false;">!diy_start!</a></li>
<li id="navlayout"><a href="javascript:;" onclick="spaceDiy.getdiy('layout');this.blur();return false;">!diy_layout!</a></li>
<li id="navstyle"><a href="javascript:;" onclick="spaceDiy.getdiy('style');this.blur();return false;">!diy_style!</a></li>
<li id="navblock"><a href="javascript:;" onclick="spaceDiy.getdiy('block');this.blur();return false;">!diy_block!</a></li>
<li id="navdiy"><a href="javascript:;" onclick="spaceDiy.getdiy('diy');this.blur();return false;">!diy_dress!</a></li>
</ul>
</div>
<div id="controlcontent" class="cl">
<ul id="contentstart" class="content">
  <li><a href="javascript:;" onclick="spaceDiy.getdiy('layout');return false;"><img src="<?php echo STATICURL;?>image/diy/layout.png" />!diy_layout_1!</a></li>
  <li><a href="javascript:;" onclick="spaceDiy.getdiy('style');return false;"><img src="<?php echo STATICURL;?>image/diy/style.png" />!diy_style!</a></li>
  <li><a href="javascript:;" onclick="spaceDiy.getdiy('block');return false;"><img src="<?php echo STATICURL;?>image/diy/module.png" />!diy_add_block!</a></li>
  <li><a href="javascript:;" onclick="spaceDiy.getdiy('diy', 'topicid', '<?php echo $topic['topicid'];?>');return false;"><img src="<?php echo STATICURL;?>image/diy/diy.png" />!do_it_yourself!</a></li>
</ul>
</div>
<div id="cpfooter"><table cellpadding="0" cellspacing="0" width="100%"><tr><td class="l">&nbsp;</td><td class="c">&nbsp;</td><td class="r">&nbsp;</td></tr></table></div>
</div>
<form method="post" autocomplete="off" name="diyform" action="home.php?mod=spacecp&amp;ac=index">
<input type="hidden" name="spacecss" value="" />
<input type="hidden" name="style" value="<?php echo $space['theme'];?>" />
<input type="hidden" name="layoutdata" value="" />
<input type="hidden" name="currentlayout" value="<?php echo $userdiy['currentlayout'];?>" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="diysubmit" value="true"/>
</form><?php } ?>

<div id="toptb" class="cl">
<!--vot-->
<div class="y">
<!--vot Multi-Lingual -->
<!--vot-->		<?php if($_G['config']['enable_multilingual']) { ?>
<!--vot-->		<a id="lslct" href="javascript:;" onmouseover="delayShow(this, function() {showMenu({'ctrlid':'lslct','pos':'34!'})});" title="!change_language!">!change_language!<img class="flag" src="<?php echo $_G['langurl'];?><?php echo $_G['langicon'];?>"/></a>
<!--vot-->		<?php } ?>

<!--vot-->	<?php if($_G['uid']) { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" class="xw1" target="_blank" title="!visit_my_space!"><?php echo $_G['member']['username'];?></a>
<a href="javascript:;" id="myspace" class="showmenu cur1" onmouseover="showMenu(this.id);">!my_nav!</a>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<a href="home.php?mod=spacecp">!setup!</a>
<a href="home.php?mod=space&amp;do=pm" id="pm_ntc" target="_blank"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>!pm_center!<?php if($_G['member']['newpm']) { ?>(<?php echo $_G['member']['newpm'];?>)<?php } ?></a>
<a href="home.php?mod=space&amp;do=notice" id="myprompt" target="_blank"<?php if($_G['member']['newprompt']) { ?> class="new"<?php } ?>>!remind!<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>
<?php if($_G['group']['allowmanagearticle'] || $_G['group']['allowdiy']|| getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3) || in_array($_G['uid'], $_G['setting']['ext_portalmanager'])) { ?><a href="portal.php?mod=portalcp">!portal_manage!</a><?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank">!forum_manager!</a><?php } if($_G['uid'] && ($_G['group']['radminid'] == 1 || getstatus($_G['member']['allowadmincp'], 1))) { ?><a href="admin.php" target="_blank">!admincp!</a><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">!logout!</a>
<?php if($space['self'] && $do == 'index') { ?><a id="diy-tg" href="javascript:openDiy();" title="!dress_space!">DIY</a><?php } ?>
<!--vot-->
<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<!--vot			<div class="y">-->
<a id="loginuser" class="xw1"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a>
<a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">!activation!</a>
<a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">!logout!</a>
<!--vot-->
<?php } elseif($_G['connectguest']) { ?>
<!--vot-->
!connect_fill_profile_to_view!
<!--vot-->
<?php } else { ?>
<!--vot			<div class="y"> -->
<!--vot-->			<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>">!register!</a>
<a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">!login!</a>
<!--vot			</div> -->
<?php } ?>
<!--vot-->	</div>
<div class="z">
<a href="./" title="<?php echo $_G['setting']['bbname'];?>" class="xw1"><?php echo $_G['setting']['bbname'];?></a>
<a href="home.php?mod=space&amp;do=home" id="navs" class="showmenu" onmouseover="showMenu(this.id);">!return_homepage!</a>
</div>
</div>
<!-- vot Multi-Lingual -->
<div id="lslct_menu" class="cl p_pop" style="display: none; width:120px;"><?php if(is_array($_G['config']['languages'])) foreach($_G['config']['languages'] as $lng => $lngarray) { ?><a href="javascript:;" onclick="setlang('<?php echo $lng;?>')" title="<?php echo $lngarray['title'];?>">
<img src="<?php echo $_G['siteroot'];?>source/language/<?php echo $lng;?>/<?php echo $lngarray['icon'];?>"/> <?php echo $lngarray['name'];?>
</a>
<?php } ?>
</div>
<?php if($space['status'] == -1 && $_G['adminid'] == 1 ) { ?>
<p class="ptw xw1 xi1 hm"><img src="<?php echo IMGDIR;?>/locked.gif" alt="Locked" class="vm" /> !message_banned!</p>
<?php } ?>
<div id="hd" class="wp cl">

<h2 id="spaceinfoshow"><?php space_merge($space, 'field_home'); $space[domainurl] = space_domain($space);getuserdiydata($space);$personalnv = isset($_G['blockposition']['nv']) ? $_G['blockposition']['nv'] : '';?><strong id="spacename" class="mbn">
<?php if($space['spacename']) { ?><?php echo $space['spacename'];?><?php } else { ?><?php echo $space['username'];?>!somebody_space!<?php } ?>
</strong>
<span class="xs0 xw0">
<a id="domainurl" href="<?php echo $space['domainurl'];?>" onclick="setCopy('<?php echo $space['domainurl'];?>', '!copy_space_address!');return false;"><?php echo $space['domainurl'];?></a>
<a href="javascript:;" onclick="addFavorite(location.href, document.title)">[!favorite!]</a>
<a id="domainurl" href="<?php echo $space['domainurl'];?>" onclick="setCopy('<?php echo $space['domainurl'];?>', '!copy_space_address!');return false;">[!copy!]</a>
<?php if(!$space['self']) { if(helper_access::check_module('share')) { ?>
<a id="share_space" href="home.php?mod=spacecp&amp;ac=share&amp;type=space&amp;id=<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">[!share!]</a>
<?php } ?>
<a href="home.php?mod=rss&amp;uid=<?php echo $space['uid'];?>">[RSS]</a>
<?php } ?>
</span>
<span id="spacedescription" class="xs1 xw0 mtn"><?php echo $space['spacedescription'];?></span>
</h2><?php if($_G['adminid'] == 1 && empty($space['self'])) { $personalnv['items'] = array(); $personalnv['banitems'] = array(); $personalnv['nvhidden'] = 0;?><?php } $nvclass = !empty($personalnv['nvhidden']) ? ' class="mininv"' : '';?><div id="nv">
<ul<?php echo $nvclass;?>>
<?php if(empty($personalnv['nvhidden'])) { if(empty($personalnv['banitems']['index'])) { if($_G['adminid'] == 1 && $_G['setting']['allowquickviewprofile'] == 1) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=index&amp;view=admin"><?php if(!empty($personalnv['items']['index'])) { ?><?php echo $personalnv['items']['index'];?><?php } else { ?>!main_page!<?php } ?></a></li>
<?php } else { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=index"><?php if(!empty($personalnv['items']['index'])) { ?><?php echo $personalnv['items']['index'];?><?php } else { ?>!main_page!<?php } ?></a></li>
<?php } } if(empty($personalnv['banitems']['feed']) && helper_access::check_module('feed')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=home&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['feed'])) { ?><?php echo $personalnv['items']['feed'];?><?php } else { ?>!feed!<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['doing']) && helper_access::check_module('doing')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=doing&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['doing'])) { ?><?php echo $personalnv['items']['doing'];?><?php } else { ?>!doing!<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['blog']) && helper_access::check_module('blog')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['blog'])) { ?><?php echo $personalnv['items']['blog'];?><?php } else { ?>!blog!<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['album']) && helper_access::check_module('album')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['album'])) { ?><?php echo $personalnv['items']['album'];?><?php } else { ?>!album!<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['follow']) && helper_access::check_module('follow')) { ?>
<li><a href="home.php?mod=follow&amp;uid=<?php echo $space['uid'];?>&amp;do=view"><?php if(!empty($personalnv['items']['follow'])) { ?><?php echo $personalnv['items']['follow'];?><?php } else { ?>!follow!<?php } ?></a></li>
<?php } if($_G['setting']['allowviewuserthread'] !== false && (empty($personalnv['banitems']['topic']))) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=thread&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['topic'])) { ?><?php echo $personalnv['items']['topic'];?><?php } else { ?>!topic!<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['share']) && helper_access::check_module('share')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=share&amp;view=me&amp;from=space"><?php if(!empty($personalnv['items']['share'])) { ?><?php echo $personalnv['items']['share'];?><?php } else { ?>!share!<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['wall']) && helper_access::check_module('wall')) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall"><?php if(!empty($personalnv['items']['wall'])) { ?><?php echo $personalnv['items']['wall'];?><?php } else { ?>!message_board!<?php } ?></a></li>
<?php } if(empty($personalnv['banitems']['profile'])) { ?>
<li><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=profile"><?php if(!empty($personalnv['items']['profile'])) { ?><?php echo $personalnv['items']['profile'];?><?php } else { ?>!memcp_profile!<?php } ?></a></li>
<?php } } ?>
</ul>
</div></div>

<?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>
<ul class="p_pop h_pop" id="plugin_menu" style="display: none"><?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?>     <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>
     <li><?php echo $module['url'];?></li>
     <?php } } ?>
</ul>
<?php } ?>
<!--vot-->			<?php if($_G['setting']['menunavs']) { ?>
<!--vot--><?php if(is_array($_G['setting']['menunavs'])) foreach($_G['setting']['menunavs'] as $navid => $subnav) { ?><!--vot-->				<ul class="p_pop h_pop" id="<?php echo $navid;?>_menu" style="display: none">
<!--vot--><?php if(is_array($subnav)) foreach($subnav as $subid => $sub) { ?><!--vot-->					<li<?php echo $sub['liparam'];?>>
<!--vot-->					<a href="<?php echo $sub['url'];?>"<?php echo $sub['extra'];?><?php if($sub['title']) { ?>title="<?php echo $sub['title'];?>" <?php } ?>><?php echo $sub['name'];?></a>
<!--vot-->					</li>
<!--vot-->					<?php } ?>
<!--vot-->				</ul>
<!--vot-->				<?php } ?>
<!--vot-->			<?php } $mnid = getcurrentnav();?><ul id="navs_menu" class="p_pop topnav_pop" style="display:none;"><?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { $nav_showmenu = strpos($nav['nav'], 'onmouseover="showMenu(');?>    <?php $nav_navshow = strpos($nav['nav'], 'onmouseover="navShow(')?>    <?php if($nav_hidden !== false || $nav_navshow !== false) { $nav['nav'] = preg_replace("/onmouseover\=\"(.*?)\"/i", '',$nav['nav'])?>    <?php } ?>
<!--vot-->	<?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><li <?php echo $nav['nav'];?>><?php echo $nav['navname'];?></a></li><?php } } ?>
</ul>
<ul id="myspace_menu" class="p_pop" style="display:none;">
    <li><a href="home.php?mod=space">!my_space!</a></li><?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>
<!--vot-->	<li><?php echo $nav['code'];?><?php echo $nav['navname'];?></a></li>
<?php } } ?>
</ul>
<div id="ct" class="ct2 wp cl">
<div class="mn">
<div class="bm">
<div class="bm_h">
<h1 class="mt">!memcp_profile!</h1>
</div>
<div class="bm_c">
<?php } else { include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="!homepage!"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em>
!memcp_profile!
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div><?php include template('home/space_menu'); ?><div id="ct" class="ct1 wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<div class="bm_c">
<?php } ?><div class="bm_c u_profile">

<div class="pbm mbm bbda cl">
<h2 class="mbn">
<?php echo $space['username'];?>
<?php if($_G['ols'][$space['uid']]) { ?>
<img src="<?php echo IMGDIR;?>/ol.gif" alt="online" title="!online!" class="vm" />&nbsp;
<?php } ?>
<span class="xw0">(UID: <?php echo $space['uid'];?><?php $isfriendinfo = 'home_friend_info_'.$space['uid'].'_'.$_G[uid];?><?php if($_G[$isfriendinfo]['note']) { ?>
, <span class="xg1"><?php echo $_G[$isfriendinfo]['note'];?></span>
<?php } ?>
)</span>
</h2>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_top'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_top'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_top'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_top'];?>
<?php } ?>
<ul class="pf_l cl pbm mbm">
<?php if($_G['setting']['allowspacedomain'] && $_G['setting']['domain']['root']['home'] && checkperm('domainlength') && !empty($space['domain'])) { $spaceurl = $_G['scheme'].'://'.$space['domain'].'.'.$_G['setting']['domain']['root']['home'];?><!--vot-->		<li><em>!second_domain!:</em><a href="<?php echo $spaceurl;?>" onclick="setCopy('<?php echo $spaceurl;?>', '!copy_space_address!');return false;"><?php echo $spaceurl;?></a></li>
<?php } if($_G['setting']['homepagestyle']) { ?>
<!--vot-->		<li><em>!space_visits!:</em><strong class="xi1"><?php echo $space['views'];?></strong></li>
<?php } if(in_array($_G['adminid'], array(1, 2))) { ?>
<!--vot-->		<li><em>!email!:</em><?php echo $space['email'];?></li>
<?php } ?>
<!--vot-->		<li><em>!email_status!:</em><?php if($space['emailstatus'] > 0) { ?>!profile_verified!<?php } else { ?>!profile_no_verified!<?php } ?></li>
<!--vot-->		<li><em>!video_certification!:</em><?php if($space['videophotostatus'] > 0) { ?>!profile_certified! <?php if($showvideophoto) { ?>&nbsp;&nbsp;(<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=videophoto" id="viewphoto" onclick="showWindow(this.id, this.href, 'get', 0)">!view_certification_photos!</a>)<?php } } else { ?>!profile_no_certified!<?php } ?></li>
</ul>
<ul>
<!--vot-->		<?php if($space['spacenote']) { ?><li><em class="xg1">!spacenote!:</em><?php echo $space['spacenote'];?></li><?php } ?>
<!--vot-->		<?php if($space['customstatus']) { ?><li class="xg1"><em>!permission_basic_status!:</em><?php echo $space['customstatus'];?></li><?php } ?>
<!--vot-->		<?php if($space['group']['maxsigsize'] && $space['sightml']) { ?><li><em class="xg1">!personal_signature!:</em><table><tr><td><?php echo $space['sightml'];?></td></tr></table></li><?php } ?>
</ul>
<ul class="cl bbda pbm mbm">
<li>
<!--vot-->			<em class="xg2">!stat_info!:</em>
<!--vot-->			<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=friend&amp;view=me&amp;from=space" target="_blank">!friends_num!: <?php echo $space['friends'];?></a>
<?php if(helper_access::check_module('doing')) { ?>
<span class="pipe">|</span>
<!--vot-->			<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=doing&amp;view=me&amp;from=space" target="_blank">!doings_num!: <?php echo $space['doings'];?></a>
<?php } if(helper_access::check_module('blog')) { ?>
<span class="pipe">|</span>
<!--vot-->			<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me&amp;from=space" target="_blank">!blogs_num!: <?php echo $space['blogs'];?></a>
<?php } if(helper_access::check_module('album')) { ?>
<span class="pipe">|</span>
<!--vot-->			<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;view=me&amp;from=space" target="_blank">!albums_num!: <?php echo $space['albums'];?></a>
<?php } if($_G['setting']['allowviewuserthread'] !== false) { ?>
<span class="pipe">|</span><?php $space['posts'] = $space['posts'] - $space['threads'];?><!--vot-->			<a href="<?php if(CURMODULE != 'follow') { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&do=thread&view=me&type=reply&from=space<?php } else { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&view=thread&type=reply<?php } ?>" target="_blank">!replay_num!: <?php echo $space['posts'];?></a>
<span class="pipe">|</span>
<!--vot-->			<a href="<?php if(CURMODULE != 'follow') { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&do=thread&view=me&type=thread&from=space<?php } else { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&view=thread<?php } ?>" target="_blank">!threads_num!: <?php echo $space['threads'];?></a>
<?php } if(helper_access::check_module('share')) { ?>
<span class="pipe">|</span>
<!--vot-->			<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=share&amp;view=me&amp;from=space" target="_blank">!shares_num!: <?php echo $space['sharings'];?></a>
<?php } ?>
</li>
</ul>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_middle'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_middle'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_middle'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_middle'];?>
<?php } ?>
<ul class="pf_l cl"><?php if(is_array($profiles)) foreach($profiles as $value) { ?><!--vot-->	<li><em><?php echo $value['title'];?>:</em><?php echo $value['value'];?></li>
<?php } ?>
</ul>
</div>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_bottom'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_bottom'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_bottom'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_bottom'];?>
<?php } if($space['medals']) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">!medals!</h2>
<p class="md_ctrl">
<a href="home.php?mod=medal"><?php if(is_array($space['medals'])) foreach($space['medals'] as $medal) { ?><img src="<?php echo STATICURL;?>/image/common/<?php echo $medal['image'];?>" alt="<?php echo $medal['name'];?>" id="md_<?php echo $medal['medalid'];?>" onmouseover="showMenu({'ctrlid':this.id, 'menuid':'md_<?php echo $medal['medalid'];?>_menu', 'pos':'12!'});" />
<?php } ?>
</a>
</p>
</div><?php if(is_array($space['medals'])) foreach($space['medals'] as $medal) { ?><div id="md_<?php echo $medal['medalid'];?>_menu" class="tip tip_4" style="display: none;">
<div class="tip_horn"></div>
<div class="tip_c">
<h4><?php echo $medal['name'];?></h4>
<p><?php echo $medal['description'];?></p>
</div>
</div>
<?php } } if($_G['setting']['verify']['enabled']) { $showverify = true;?><?php if(is_array($_G['setting']['verify'])) foreach($_G['setting']['verify'] as $vid => $verify) { if($verify['available']) { if($showverify) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">!profile_verify!</h2><?php $showverify = false;?><?php } if($space['verify'.$vid] == 1) { ?>
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>" target="_blank"><?php if($verify['icon']) { ?><img src="<?php echo $verify['icon'];?>" class="vm" alt="<?php echo $verify['title'];?>" title="<?php echo $verify['title'];?>" /><?php } else { ?><?php echo $verify['title'];?><?php } ?></a>&nbsp;
<?php } elseif(!empty($verify['unverifyicon'])) { ?>
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>" target="_blank"><?php if($verify['unverifyicon']) { ?><img src="<?php echo $verify['unverifyicon'];?>" class="vm" alt="<?php echo $verify['title'];?>" title="<?php echo $verify['title'];?>" /><?php } ?></a>&nbsp;
<?php } } } if(!$showverify) { ?></div><?php } } if($count) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">!manage_forums!</h2><?php if(is_array($manage_forum)) foreach($manage_forum as $key => $value) { ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $key;?>" target="_blank"><?php echo $value;?></a> &nbsp;
<?php } ?>
</div>
<?php } if($groupcount) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">!joined_group!</h2><?php if(is_array($usergrouplist)) foreach($usergrouplist as $key => $value) { ?><a href="forum.php?mod=group&amp;fid=<?php echo $value['fid'];?>" target="_blank"><?php echo $value['name'];?></a> &nbsp;
<?php } ?>
</div>
<?php } ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">!active_profile!</h2>
<ul>
<!--vot-->	<?php if($space['adminid']) { ?><li><em class="xg1">!management_team!:&nbsp;&nbsp;</em><span style="color:<?php echo $space['admingroup']['color'];?>"><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $space['adminid'];?>" target="_blank"><?php echo $space['admingroup']['grouptitle'];?></a></span> <?php echo $space['admingroup']['icon'];?></li><?php } ?>
<!--vot-->	<li><em class="xg1">!usergroup!:&nbsp;&nbsp;</em><span style="color:<?php echo $space['group']['color'];?>"<?php if($upgradecredit !== false) { ?> class="xi2" onmouseover="showTip(this)" tip="!credits!: <?php echo $space['credits'];?>, !thread_groupupgrade!: <?php echo $upgradecredit;?> !credits!"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $space['groupid'];?>" target="_blank"><?php echo $space['group']['grouptitle'];?></a></span> <?php echo $space['group']['icon'];?> <?php if(!empty($space['groupexpiry'])) { ?>&nbsp;!group_useful_life!:&nbsp;<?php echo dgmdate($space[groupexpiry], 'Y-m-d H:i');?><?php } ?></li>
<!--vot-->	<?php if($space['extgroupids']) { ?><li><em class="xg1">!group_expiry_type_ext!:&nbsp;&nbsp;</em><?php echo $space['extgroupids'];?></li><?php } ?>
</ul>
<ul id="pbbs" class="pf_l">
<!--vot-->	<?php if($space['oltime']) { ?><li><em>!online_time!:</em><?php echo $space['oltime'];?> !hours!</li><?php } ?>
<!--vot-->	<li><em>!regdate!:</em><?php echo $space['regdate'];?></li>
<!--vot-->	<li><em>!last_visit!:</em><?php echo $space['lastvisit'];?></li>
<?php if($_G['uid'] == $space['uid'] || $_G['group']['allowviewip']) { ?>
<!--vot-->	<li><em>!register_ip!:</em><?php echo $space['regip'];?> - <?php echo $space['regip_loc'];?></li>
<!--vot-->	<li><em>!last_visit_ip!:</em><?php echo $space['lastip'];?> - <?php echo $space['lastip_loc'];?></li>
<?php } ?>
<!--vot-->	<?php if($space['lastactivity']) { ?><li><em>!last_activity_time!:</em><?php echo $space['lastactivity'];?></li><?php } ?>
<!--vot-->	<?php if($space['lastpost']) { ?><li><em>!last_post_time!:</em><?php echo $space['lastpost'];?></li><?php } ?>
<!--vot-->	<?php if($space['lastsendmail']) { ?><li><em>!last_send_email!:</em><?php echo $space['lastsendmail'];?></li><?php } ?>
<!--vot-->	<li><em>!time_offset!:</em><?php $timeoffset = array(!timezone!);?><?php echo $timeoffset[$space['timeoffset']];?>
</li>
</ul>
</div>
<div id="psts" class="<?php if($clist) { ?>pbm mbm bbda <?php } ?>cl">
<h2 class="mbn">!stat_info!</h2>
<ul class="pf_l">
<!--vot-->	<li><em>!used_space!:</em><?php echo $space['attachsize'];?></li>
<?php if($space['buyercredit']) { ?>
<!--vot-->	<li><em>!eccredit_sellerinfo!:</em><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=trade&amp;view=eccredit#sellcredit" target="_blank"><?php echo $space['buyercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/buyer/<?php echo $space['buyerrank'];?>.gif" border="0" class="vm" /></a></li>
<?php } if($space['sellercredit']) { ?>
<!--vot-->	<li><em>!eccredit_buyerinfo!:</em><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=trade&amp;view=eccredit#buyercredit" target="_blank"><?php echo $space['sellercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/seller/<?php echo $space['sellerrank'];?>.gif" border="0" class="vm" /></a></li>
<?php } ?>
<!--vot-->	<li><em>!credits!:</em><?php echo $space['credits'];?></li><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { if($value['title']) { ?>
<!--vot-->	<li><em><?php echo $value['title'];?>:</em><?php echo $space["extcredits$key"];?> <?php echo $value['unit'];?></li>
<?php } } ?>
</ul>
</div>
<?php if($clist) { ?>
<div class="cl">
<h2 class="mbm">!crime_record!</h2>
<table id="pcr" class="dt">
<tr>
<th width="15%">!crime_action!</th>
<th width="15%">!crime_dateline!</th>
<th>!crime_reason!</th>
<th width="15%">!crime_operator!</th>
</tr><?php if(is_array($clist)) foreach($clist as $crime) { ?><tr>
<td>
<?php if($crime['action'] == 'crime_delpost') { ?>
!crime_delpost!
<?php } elseif($crime['action'] == 'crime_warnpost') { ?>
!crime_warnpost!
<?php } elseif($crime['action'] == 'crime_banpost') { ?>
!crime_banpost!
<?php } elseif($crime['action'] == 'crime_banspeak') { ?>
!crime_banspeak!
<?php } elseif($crime['action'] == 'crime_banvisit') { ?>
!crime_banvisit!
<?php } elseif($crime['action'] == 'crime_banstatus') { ?>
!crime_banstatus!
<?php } elseif($crime['action'] == 'crime_avatar') { ?>
!crime_avatar!
<?php } elseif($crime['action'] == 'crime_sightml') { ?>
!crime_sightml!
<?php } elseif($crime['action'] == 'crime_customstatus') { ?>
!crime_customstatus!
<?php } ?>
</td>
<td><?php echo dgmdate($crime[dateline]);?></td>
<td><?php echo $crime['reason'];?></td>
<td><a href="home.php?mod=space&amp;uid=<?php echo $crime['operatorid'];?>" target="_blank"><?php echo $crime['operator'];?></a></td>
</tr>
<?php } ?>
</table>
</div>
<?php } if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_extrainfo'])) echo $_G['setting']['pluginhooks']['space_profile_extrainfo'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_extrainfo'])) echo $_G['setting']['pluginhooks']['follow_profile_extrainfo'];?>
<?php } ?>
</div><?php if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } ?>
</div>
</div>
<?php if($_G['setting']['homepagestyle']) { ?>
</div>
<div class="sd"><div id="pcd" class="bm cl"><?php $encodeusername = rawurlencode($space[username]);?><div class="bm_c">
<div class="hm">
<p><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>" class="avtm"><?php echo avatar($space[uid],middle);?></a></p>
<h2 class="xs2"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a></h2>
</div>
<ul class="xl xl2 cl ul_list">
<?php if($space['self']) { if($_G['setting']['homepagestyle']) { ?>
<li class="ul_diy"><a href="home.php?mod=space&amp;do=index&amp;diy=yes">!diy_space!</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li class="ul_msg"><a href="home.php?mod=space&amp;do=wall">!view_message!</a></li>
<?php } ?>
<li class="ul_avt"><a href="home.php?mod=spacecp&amp;ac=avatar">!edit_avatar!</a></li>
<li class="ul_profile"><a href="home.php?mod=spacecp&amp;ac=profile">!update_profile!</a></li>
<?php } else { if(helper_access::check_module('follow')) { ?>
<li class="ul_broadcast"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>">!follow_view_feed!</a></li>
<?php } if(helper_access::check_module('follow') && $space['uid'] != $_G['uid']) { ?>
<li class="ul_flw"><?php $follow = 0;?><?php $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);?><?php if(!$follow) { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $space['uid'];?>">!follow_add!TA</a>
<?php } else { ?>
<a id="followmod" onclick="showWindow(this.id, this.href, 'get', 0);" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $space['uid'];?>">!follow_del!</a>
<?php } ?>
</li>
<?php } require_once libfile('function/friend');$isfriend=friend_check($space[uid]);?><?php if(!$isfriend) { ?>
<li class="ul_add"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=add&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=addfriendhk_<?php echo $space['uid'];?>" id="a_friend_li_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">!add_friend!</a></li>
<?php } else { ?>
<li class="ul_ignore"><a href="home.php?mod=spacecp&amp;ac=friend&amp;op=ignore&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=ignorefriendhk_<?php echo $space['uid'];?>" id="a_ignore_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">!ignore_friend!</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li class="ul_contect"><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=wall">!connect_me!</a></li>
<?php } ?>
<li class="ul_poke"><a href="home.php?mod=spacecp&amp;ac=poke&amp;op=send&amp;uid=<?php echo $space['uid'];?>&amp;handlekey=propokehk_<?php echo $space['uid'];?>" id="a_poke_<?php echo $space['uid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">!say_hi!</a></li>

<li class="ul_pm"><a href="home.php?mod=spacecp&amp;ac=pm&amp;op=showmsg&amp;handlekey=showmsg_<?php echo $space['uid'];?>&amp;touid=<?php echo $space['uid'];?>&amp;pmid=0&amp;daterange=2" id="a_sendpm_<?php echo $space['uid'];?>" onclick="showWindow('showMsgBox', this.href, 'get', 0)">!send_pm!</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser') || $_G['adminid'] == 1) { ?>
<hr class="da mtn m0">
<ul class="ptn xl xl2 cl">
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<li>
<?php if(checkperm('allowbanuser')) { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">!member_manage!</a>
<?php } else { ?>
<a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" id="usermanageli" onmouseover="showMenu(this.id)" class="showmenu" target="_blank">!member_manage!</a>
<?php } ?>
</li>
<?php } if($_G['adminid'] == 1) { ?>
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;do=search&amp;searchsubmit=1&amp;users=<?php echo $encodeusername;?>" id="umanageli" onmouseover="showMenu(this.id)" class="showmenu">!content_manage!</a></li>
<?php } ?>
</ul>
<?php if(checkperm('allowbanuser') || checkperm('allowedituser')) { ?>
<!--vot-->			<ul id="usermanageli_menu" class="p_pop" style="display:none;">
<?php if(checkperm('allowbanuser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=ban&username=<?php echo $encodeusername;?>&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=ban&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">!user_ban!</a></li>
<?php } if(checkperm('allowedituser')) { ?>
<li><a href="<?php if($_G['adminid'] == 1) { ?>admin.php?action=members&operation=search&username=<?php echo $encodeusername;?>&submit=yes&frames=yes<?php } else { ?>forum.php?mod=modcp&action=member&op=edit&uid=<?php echo $space['uid'];?><?php } ?>" target="_blank">!user_edit!</a></li>
<?php } ?>
</ul>
<?php } if($_G['adminid'] == 1) { ?>
<!--vot-->				<ul id="umanageli_menu" class="p_pop" style="display:none;">
<li><a href="forum.php?mod=modcp&amp;action=thread&amp;op=post&amp;searchsubmit=1&amp;do=search&amp;users=<?php echo $encodeusername;?>" target="_blank">!manage_post!</a></li>
<?php if(helper_access::check_module('doing')) { ?>
<li><a href="admin.php?action=doing&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">!manage_doing!</a></li>
<?php } if(helper_access::check_module('blog')) { ?>
<li><a href="admin.php?action=blog&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">!manage_blog!</a></li>
<?php } if(helper_access::check_module('feed')) { ?>
<li><a href="admin.php?action=feed&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">!manage_feed!</a></li>
<?php } if(helper_access::check_module('album')) { ?>
<li><a href="admin.php?action=album&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">!manage_album!</a></li>
<li><a href="admin.php?action=pic&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">!manage_pic!</a></li>
<?php } if(helper_access::check_module('wall')) { ?>
<li><a href="admin.php?action=comment&amp;searchsubmit=1&amp;detail=1&amp;fromumanage=1&amp;authorid=<?php echo $space['uid'];?>" target="_blank">!manage_comment!</a></li>
<?php } if(helper_access::check_module('share')) { ?>
<li><a href="admin.php?action=share&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;uid=<?php echo $space['uid'];?>" target="_blank">!manage_share!</a></li>
<?php } if(helper_access::check_module('group')) { ?>
<li><a href="admin.php?action=threads&amp;operation=group&amp;searchsubmit=1&amp;detail=1&amp;search=true&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">!manage_group_threads!</a></li>
<li><a href="admin.php?action=prune&amp;searchsubmit=1&amp;detail=1&amp;operation=group&amp;fromumanage=1&amp;users=<?php echo $encodeusername;?>" target="_blank">!manage_group_prune!</a></li>
<?php } ?>
</ul>
<?php } } ?>
</div>
</div>
</div>
<script type="text/javascript">
function succeedhandle_followmod(url, msg, values) {
var fObj = $('followmod');
if(values['type'] == 'add') {
fObj.innerHTML = '!follow_del!';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid'];
} else if(values['type'] == 'del') {
/*vot*/		fObj.innerHTML = '!follow_add!';
fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid='+values['fuid'];
}
}
</script><?php } ?>
</div>
</div>

<?php if(!$_G['setting']['homepagestyle']) { ?>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php } include template('common/footer'); ?>