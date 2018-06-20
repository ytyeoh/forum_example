<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

function convert_img($message) {
    global $_G;
    $list = array();
    preg_match("/\[img\](.+)\[\/img\]/is", $message, $list);
    $nopic = $_G['siteurl'] . 'source/plugin/ftd_collect_bsbdj/template/nopic.jpg';
    return str_replace($list[1], $nopic, $message);
}

function send_thread($ID = NULL, $fromurl = NULL) {

    global $_G;
    if (is_null($fromurl) && is_null($ID)) {
        return 'no1';
    }
    if (is_numeric($ID)) {
        $bsbdj_news = DB::fetch_first("SELECT * FROM " . DB::table('ftd_cai_ji_bsbdj') . " WHERE ID=" . $ID);
        $fromurl = $bsbdj_news['from_url'];
    } else {
        $bsbdj_news = DB::fetch_first("SELECT * FROM " . DB::table('ftd_cai_ji_bsbdj') . " WHERE from_url='" . $fromurl . "'");
        $ID = $bsbdj_news['ID'];
    }

    if (count($bsbdj_news) > 0 && $bsbdj_news['tid'] >= 0) {
        return 'ok';
    }

    $uidstr = $bsbdj_news['uidstr'];
    $uidArr = explode(',', $uidstr);
    $uidCount = count($uidArr);

    $firstUid = rand(1, 200);
    $firstUid = $firstUid % $uidCount;
    $firstUid = $uidArr[$firstUid];
    $UserInfo = getuserbyuid($firstUid, 1);
    $PostUserInfo = $UserInfo;


    $title = $bsbdj_news['subject'];
    $_G['forum']['fid'] = $bsbdj_news['fid'];
    $threadtypeid = $bsbdj_news['thread_type_id'];
    $params = array();
    $params['subject'] = $title;
    $params['message'] = $bsbdj_news['content'];
    $params['typeid'] = 0;
    $params['sortid'] = 0;
    $params['special'] = 0;
    $params['publishdate'] = time() - 3600;
    $params['readperm'] = 0;
    $params['allownoticeauthor'] = 1;
    $params['usesig'] = 1;
    $modthread = C::m('forum_thread');
    $modthread->newthread($params);
    $tid = $modthread->tid;
    $pid = $modthread->pid;
    $threadData = array();
    $threadData['author'] = $UserInfo['username'];
    $threadData['authorid'] = $UserInfo['uid'];
    $threadData['typeid'] = $threadtypeid;
    $threadData['subject'] = $title;



    DB::update('forum_thread', $threadData, 'tid=' . $tid);

    $postData = array();
    $postData['message'] = $bsbdj_news['content'];
    $postData['author'] = $UserInfo['username'];
    $postData['authorid'] = $UserInfo['uid'];
    $postData['bbcodeoff'] = 0;
    DB::update('forum_post', $postData, 'pid=' . $pid);
    unset($postData);
    unset($params);

    if (is_numeric($UserInfo['uid'])) {
        DB::query('update ' . DB::table('common_member_count') . ' set threads=threads+1 where uid=' . $UserInfo['uid']);
    }


    if ($bsbdj_news['reply'] == 1) {
        $num_list = array();
        preg_match("/[0-9]+/is", $bsbdj_news['from_url'], $num_list);
        $data_id = $num_list[0];
        $bsbdj_reply_code = dfsockopen("http://api.budejie.com/api/api_open.php?a=datalist&per=5&c=comment&hot=1&appname=www&client=www&device=pc&data_id=$data_id&page=1");
		
        $comments = json_decode($bsbdj_reply_code);
        $unfilter_comments_list = array_merge($comments->data, $comments->hot);
        $commnet_list = array();
        foreach ($unfilter_comments_list as $unfilter_commets) {
            $commnet_list[] = $unfilter_commets->content;
        }
    }

    $post_count = 0;
   
        if (!empty($commnet_list) && is_array($commnet_list)) {
            $post_count = count($commnet_list);
            $post_intval = 3600 / $post_count;
            $post_intval = intval($post_intval);
            foreach ($commnet_list as $post_k => $post_value) {

                $post_text = diconv($post_value , 'UTF-8'). "\r\n" . lang('plugin/ftd_collect_bsbdj', 'restrict');

                $postUid = rand(1, 200);
                $postUid = $postUid % $uidCount;
                $postUid = $uidArr[$postUid];

                $PostUserInfo = getuserbyuid($postUid, 1);
                $pid = insertpost(array(
                    'fid' => $bsbdj_news['fid'],
                    'tid' => $tid,
                    'first' => '0',
                    'author' => daddslashes($PostUserInfo['username']),
                    'authorid' => $PostUserInfo['uid'],
                    'subject' => '',
                    'dateline' => getglobal('timestamp'),
                    'message' => daddslashes($post_text),
                    'useip' => getglobal('clientip'),
                    'port' => getglobal('remoteport'),
                    'invisible' => 0,
                    'anonymous' => 0,
                    'usesig' => 1,
                    'htmlon' => 0,
                    'bbcodeoff' => 0,
                    'smileyoff' => -1,
                    'parseurloff' => 0,
                    'attachment' => '0',
                    'status' => 1024,
                ));
                $postData = array();
                $time_down = ($post_count - $post_k) * $post_intval;
                $time_down = $time_down - rand(1, 60);
                $time_down = max(0, $time_down);
                $postData['dateline'] = time() - $time_down;
                DB::update('forum_post', $postData, 'pid=' . $pid);
                updatemembercount($PostUserInfo['uid'], array('extcredits2' => 1), true, '', 0, '');
                if (is_numeric($PostUserInfo['uid'])) {
                    DB::query('update ' . DB::table('common_member_count') . ' set posts=posts+1 where uid=' . $PostUserInfo['uid']);
                }
            }
        }
    

    $lastpostArr = array();
    $lastpostArr['lastpost'] = time();
    $lastpostArr['lastposter'] = $PostUserInfo['username'];
    $lastpostArr['views'] = rand(90, 500);
    $replies = C::t('forum_post')->count_visiblepost_by_tid($tid);
    $replies = intval($replies) - 1;
    $lastpostArr['replies'] = $replies;
    DB::update('forum_thread', $lastpostArr, 'tid=' . $tid);
    if ($tid > 0) {

        if (is_numeric($ID)) {
            DB::update('ftd_cai_ji_bsbdj', array('tid' => $tid, 'status' => '1'), "ID=" . $ID);
        } else {
            DB::update('ftd_cai_ji_bsbdj', array('tid' => $tid, 'status' => '1'), "from_url='" . $fromurl . "'");
        }
        $lastUserName = $UserInfo['username'];
        $lastUserName = $tid . "\t" . daddslashes($title) . "\t" . $_G['timestamp'] . "\t" . daddslashes($lastUserName);
        DB::query("update " . DB::table('forum_forum') . " set threads=threads+1,posts=posts + " . $post_count . ",lastpost='" . $lastUserName . "',todayposts=todayposts + " . $post_count . " where fid=" . $bsbdj_news['fid']);
        return 'ok';
    }
}

function getUids() {

    $uids = DB::fetch_first("SELECT * FROM " . DB::table('ftd_cai_ji_uids') . " WHERE ID = 1");
    if (!empty($uids) && count($uids) > 0) {
        return $uids['uid_str'];
    } else {
        return '';
    }
}

function saveUids($uids) {

    DB::insert('ftd_cai_ji_uids', array('ID' => 1, 'uid_str' => $uids), false, TRUE);
}

function getFidName($fid) {
    $fidinfo = C::t('forum_forum')->fetch_info_by_fid($fid);
    return $fidinfo['name'];
}

function getTypeidName($typeid, $fid) {
    if ($typeid == 0) {
        return '';
    }
    $typeidInfo = C::t('forum_threadclass')->fetch_all_by_typeid_fid($typeid, $fid);
    if (empty($typeidInfo) || count($typeidInfo) == 0) {
        return '';
    } else {
        return $typeidInfo[$typeid]['name'];
    }
}

function chinesesubstr($str, $start, $len) {
    $strlen = $len - $start;
    for ($i = 0; $i < $strlen; $i++) {
        if (ord(substr($str, $i, 1)) > 0xa0) {
            $tmpstr .= substr($str, $i, 3);
            $i += 2;
        } else {
            $tmpstr .= substr($str, $i, 1);
        }
    }
    return $tmpstr;
}

function parseText($html) {
    //license mit

    require './source/plugin/ftd_collect_bsbdj/DiDom/Document.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Element.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Encoder.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Errors.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Query.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Exceptions/InvalidSelectorException.php';
    $doc = new \DiDom\Document($html);


    $loadResult = $doc->find(".j-r-list-c-desc");
    $all_list = array();
    foreach ($loadResult as $item) {
        $each = array();
        $a = $item->find("a")[0];
        $content = $a->text();
        $link = $a->href;
        $each["content"] = $content; //内容
        $each['from_url'] = "http://www.budejie.com" . $link;
        $all_list[] = $each;
    }
    return $all_list;
}

function parsePic($html) {
    //license mit
    require './source/plugin/ftd_collect_bsbdj/DiDom/Document.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Element.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Encoder.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Errors.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Query.php';
    require './source/plugin/ftd_collect_bsbdj/DiDom/Exceptions/InvalidSelectorException.php';
    $doc = new \DiDom\Document($html);
    $loadResult = $doc->find(".j-r-list-c-img a"); //a标签
    $all_list = array();
    foreach ($loadResult as $a) {
        $each = array();
        $link = $a->href;

        $img = $a->find("img")[0];
        $content = $img->title . "\r\n" . '[img]' . $img->getAttribute('data-original') . '[/img]';

        $each["content"] = $content; //内容+图片
        $each['from_url'] = "http://www.budejie.com" . $link;
        $all_list[] = $each;
    }
    return $all_list;
}
