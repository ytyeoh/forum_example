<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

runquery('DROP TABLE IF EXISTS `pre_csdn123kuaibao_news`');
runquery('DROP TABLE IF EXISTS `pre_csdn123kuaibao_cron`');
runquery('DROP TABLE IF EXISTS `pre_csdn123kuaibao_reguser`');
runquery('DROP TABLE IF EXISTS `pre_csdn123kuaibao_weiyanchang`');
runquery('DROP TABLE IF EXISTS `pre_csdn123kuaibao_words`');

$finish = true;

