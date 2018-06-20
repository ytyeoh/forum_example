<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

require './source/plugin/ftd_collect_bsbdj/common.fun.php';




if (empty($_GET['page']) || is_numeric($_GET['page']) === false) {
    $page = 1;
} else {
    $page = intval($_GET['page']);
    $page = max(1, $page);
}
$server_url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=ftd_collect_bsbdj&pmod=wait_send';

if ($_GET['formhash'] == FORMHASH && empty($_GET['del']) == false) {

    $delid = intval($_GET['del']);
    DB::delete('ftd_cai_ji_bsbdj', 'ID=' . $delid . ' AND tid = -1');
    $del_backUrl = $server_url . '&page=' . $page;
    cpmsg('ftd_collect_bsbdj:delete_success', $del_backUrl, 'succeed');
} else if ($_GET['formhash'] == FORMHASH && empty($_GET['import_id']) == false && is_numeric($_GET['import_id'])) {
    $recode = send_thread($_GET['import_id']);
    if ($recode == 'ok') {
        $success_Url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=ftd_collect_bsbdj&pmod=success';
        cpmsg('ftd_collect_bsbdj:publish_success', $success_Url, 'succeed'); 
    } else {
        cpmsg('ftd_collect_bsbdj:publish_failed', '', 'error'); 
    }
} else if ($_GET['formhash'] == FORMHASH && $_GET['selall'] == 'yes') {

    if (empty($_GET['idarray'])) {
        cpmsg('ftd_collect_bsbdj:select_left', $server_url . '&page=' . $_GET['page'], 'error');
    }

    if (empty($_GET['seldelete']) == false) {
        $idstr = implode(',', $_GET['idarray']);
        $idstr = daddslashes($idstr);
        DB::delete('ftd_cai_ji_bsbdj', 'ID in (' . $idstr . ') AND tid = -1 ');
        cpmsg('ftd_collect_bsbdj:delete_success', $server_url . '&page=' . $page, 'succeed');
    }

    if (empty($_GET['selimport']) == false) {

        if (empty($_GET['num'])) {
            $num = 0;
        } else {
            $num = $_GET['num'];
            $num = intval($num);
        }
        if (is_array($_GET['idarray'])) {
            $idarray = $_GET['idarray'];
            $count_num = count($idarray);
            $idstr = implode(',', $_GET['idarray']);
        } else {
            $idstr = $_GET['idarray'];
            $idarray = explode(',', $idstr);
            $count_num = count($idarray);
        }
        $ID = $idarray[$num];
        if (is_numeric($ID) == false) {
            $success_Url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=ftd_collect_bsbdj&pmod=success';
            cpmsg('ftd_collect_bsbdj:publish_success', $success_Url, 'succeed'); 
        }
        $recode = send_thread($ID);
        if ($recode == 'ok') {

            $num++;
            $ID = $idarray[$num];
            if (is_numeric($ID) == false) {
                $success_Url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=ftd_collect_bsbdj&pmod=success';
                cpmsg('ftd_collect_bsbdj:publish_success', $success_Url, 'succeed'); 
            }
            $nextCatchUrl = '?' . $server_url . '&selimport=yes&selall=yes&formhash=' . FORMHASH . '&idarray=' . $idstr . '&num=' . $num;
             $statusStr = lang('plugin/ftd_collect_bsbdj', 'importing');
            $statusStr = str_replace('count', $count_num, $statusStr);
            $statusStr = str_replace('num', $num, $statusStr);
            echo '<div style="font-size:20px;margin:8px auto;text-align:center;color:green">' . $statusStr . '</div>';
            echo '<script>setTimeout(function(){ window.location.href="' . $nextCatchUrl . '" },2000);</script>';
        } else {

            $num++;
            $ID = $idarray[$num];
            if (is_numeric($ID) == false) {
                $success_Url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=ftd_collect_bsbdj&pmod=success';
                cpmsg('ftd_collect_bsbdj:publish_success', $success_Url, 'succeed'); 
            }
            $nextCatchUrl = '?' . $server_url . '&selimport=yes&selall=yes&formhash=' . FORMHASH . '&idarray=' . $idstr . '&num=' . $num;
            $statusStr = lang('plugin/ftd_collect_bsbdj', 'importing');
            $statusStr = str_replace('num', $num, $statusStr);
            echo '<div style="font-size:20px;margin:8px auto;text-align:center;color:yellow">' . dhtmlspecialchars($statusStr) . '</div>';
            echo '<script>setTimeout(function(){ window.location.href="' . $nextCatchUrl . '" },2000);</script>';
        }
    }
} else {
    $startNum = ($page - 1) * 12;
    $postRs = DB::fetch_all("SELECT * FROM " . DB::table("ftd_cai_ji_bsbdj") . " WHERE status = 0 ORDER BY ID DESC LIMIT " . $startNum . ",12");
  
    $nextPage = $server_url . '&page=' . ($page + 1);
    $prePage = $server_url . '&page=' . ($page - 1);
    include template("ftd_collect_bsbdj:wait_send");
}



