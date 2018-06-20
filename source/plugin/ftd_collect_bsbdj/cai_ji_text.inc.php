<?php


if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
require './source/plugin/ftd_collect_bsbdj/common.fun.php';
$server_url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=ftd_collect_bsbdj&pmod=cai_ji_text';

if ($_GET['formhash'] == FORMHASH && empty($_GET['search']) == false) {

    $random_page = intval($_GET['rndpage']);
    $page = intval($_GET['page']);
    $uid_str = daddslashes($_GET['uidstr']);
    $reply = intval($_GET['reply']);
    $fid = intval($_GET['fid']);
    $thread_type_id = intval($_GET['threadtypeid']);
    $content_type = daddslashes($_GET['content_type']);

    $page = $page < 0 ? 0 : $page;
    if ($random_page == 1) {
        $page = rand(1, 50);
    }
    $list_uid = explode(",", $uid_str);
    if (is_array($list_uid) == FALSE || count($list_uid) <= 0) {
        cpmsg('ftd_collect_bsbdj:input_uids', '', 'error');
    }
    foreach ($list_uid as $key) {
        if (!is_numeric($key)) {
            cpmsg('ftd_collect_bsbdj:uid_format_error', '', 'error');
        }
    }
    saveUids($uid_str);

    $bsbjd_html_code = dfsockopen("http://www.budejie.com/$content_type/$page");
     if($content_type == 'text'){
         $list = parseText($bsbjd_html_code);
     } else {
         $list = parsePic($bsbjd_html_code);
     }
    
   
      
    if (is_array($list) == true && count($list) > 0) {
        foreach ($list as $item) {
            $chk = DB::fetch_first("SELECT ID FROM " . DB::table('ftd_cai_ji_bsbdj') . " WHERE from_url='" . $item[from_url] . "'");
            if (empty($chk)) {
                $insertData = array();
                $item[content] = diconv($item[content] , 'UTF-8');
				$item[content] = $item[content] . "\r\n" . lang('plugin/ftd_collect_bsbdj', 'restrict');
                $insertData['content'] = daddslashes($item[content]);
                $insertData['from_url'] = daddslashes($item[from_url]);
                $insertData['uidstr'] = $uid_str;
                $insertData['fid'] = $fid;
                $insertData['thread_type_id'] = $thread_type_id;
                $insertData['reply'] = $reply;
                $insertData['status'] = 0;
                $insertData['content_type'] = $content_type;

                $subject = $item[content];
                if ($content_type == 'pic') {
                    $subject = explode('[img]', $item[content]);
                    $subject = $subject[0];
                    $insertData['content'] = convert_img($insertData['content']);
                }
                $subject = cutstr($subject, 75);

                $insertData['subject'] = daddslashes($subject);
                DB::insert('ftd_cai_ji_bsbdj', $insertData);
            }
        }
        $now_catch_ok_url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=ftd_collect_bsbdj&pmod=wait_send';

        cpmsg('ftd_collect_bsbdj:colloct_success', $now_catch_ok_url, 'succeed');
    } else {

        cpmsg('ftd_collect_bsbdj:colloct_failed', '', 'error');
    }
} else {

    require_once libfile('function/forumlist');
    include template("ftd_collect_bsbdj:cai_ji_text");
}
