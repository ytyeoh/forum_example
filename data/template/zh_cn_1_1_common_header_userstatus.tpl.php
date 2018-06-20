<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if($_G['uid']) { ?>
<div id="um">
<div class="avt y"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo avatar($_G[uid],small);?></a></div>
<p>
<strong class="vwmy<?php if($_G['setting']['connect']['allow'] && $_G['member']['conisbind']) { ?> qq<?php } ?>"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="!visit_my_space!"><?php echo $_G['member']['username'];?></a></strong>
<?php if($_G['group']['allowinvisible']) { ?>
<span id="loginstatus">
<a id="loginstatusid" href="member.php?mod=switchstatus" title="!login_switch_invisible_mode!" onclick="ajaxget(this.href, 'loginstatus');return false;" class="xi2"></a>
</span>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?><a href="javascript:;" id="myitem" class="showmenu" onmouseover="showMenu({'ctrlid':'myitem'});">!myitem!</a>
<span class="pipe">|</span><a href="home.php?mod=spacecp">!setup!</a>
<span class="pipe">|</span><a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>!pm_center!</a>
<span class="pipe">|</span><a href="home.php?mod=space&amp;do=notice" id="myprompt" class="a showmenu<?php if($_G['member']['newprompt']) { ?> new<?php } ?>" onmouseover="showMenu({'ctrlid':'myprompt'});">!remind!<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>
<?php if(empty($_G['cookie']['ignore_notice']) && ($_G['member']['newpm'] || $_G['member']['newprompt_num']['follower'] || $_G['member']['newprompt_num']['follow'] || $_G['member']['newprompt'])) { ?><script language="javascript">delayShow($('myprompt'), function() {showMenu({'ctrlid':'myprompt','duration':3})});</script><?php } if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><span class="pipe">|</span><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">!task_doing!</a><?php } if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<span class="pipe">|</span><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>!portal_manage!<?php } else { ?>!portal_block_manage!<?php } ?></a>
<?php } if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
<span class="pipe">|</span><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank">!forum_manager!</a>
<?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<span class="pipe">|</span><a href="admin.php" target="_blank">!admincp!</a>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">!logout!</a>
</p>
<p>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu"<?php if(!$_G['setting']['bbclosed']) { ?> onmouseover="delayShow(this, showCreditmenu);" class="showmenu"<?php } ?>>!credits!: <?php echo $_G['member']['credits'];?></a>
<span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=usergroup" id="g_upmine" class="showmenu" onmouseover="delayShow(this, showUpgradeinfo)">!usergroup!: <?php echo $_G['group']['grouptitle'];?><?php if($_G['member']['freeze']) { ?><span class="xi1">(!freeze!)</span><?php } ?></a>
</p>
</div>
<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<p>
<strong><a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></strong>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">!activation!</a>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">!logout!</a>
</p>
<?php } elseif(!$_G['connectguest']) { include template('member/login_simple'); } else { ?>
<div id="um">
<div class="avt y"><?php echo avatar(0,small);?></div>
<p>
<strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">!logout!</a>
</p>
<p>
<a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">!credits!: 0</a>
<span class="pipe">|</span>!usergroup!: <?php echo $_G['group']['grouptitle'];?>
</p>
</div>
<?php } ?>