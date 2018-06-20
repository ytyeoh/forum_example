<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {

    exit('Access Denied');
}
require './source/plugin/ftd_collect_bsbdj/common.fun.php';
$server_url = 'action=plugins&operation=config&do=' . $pluginid . '&identifier=ftd_collect_bsbdj&pmod=success';

if (empty($_GET['page']) || is_numeric($_GET['page']) === false) {
    $page = 1;
} else {
    $page = intval($_GET['page']);
    $page = max(1, $page);
}
if ($_GET['formhash'] == FORMHASH && empty($_GET['del']) == false && is_numeric($_GET['del']) == true) {

    $delid = intval($_GET['del']);
    DB::delete('ftd_cai_ji_bsbdj', 'ID=' . $delid);
    cpmsg('ftd_collect_bsbdj:delete_success', $server_url . '&page=' . $_GET['page'], 'succeed');
} elseif ($_GET['formhash'] == FORMHASH && $_GET['selall'] == 'yes') {

    if (empty($_GET['idarray'])) {
        cpmsg('ftd_collect_bsbdj:select_left_need_delete', $server_url . '&page=' . $_GET['page'], 'succeed');
    }
    $idstr = implode(',', $_GET['idarray']);
    $idstr = daddslashes($idstr);
    DB::delete('ftd_cai_ji_bsbdj', 'ID in (' . $idstr . ')');
    cpmsg('ftd_collect_bsbdj:delete_success', $server_url . '&page=' . $_GET['page'], 'succeed');
} else {
    $startNum = ($page - 1) * 12;
    $postRs = DB::fetch_all("SELECT * FROM " . DB::table("ftd_cai_ji_bsbdj") . " where tid>0 ORDER BY tid DESC LIMIT " . $startNum . ",12");
    $nextPage = $server_url . '&page=' . ($page + 1);
    $prePage = $server_url . '&page=' . ($page - 1);

    include template("ftd_collect_bsbdj:success");
}