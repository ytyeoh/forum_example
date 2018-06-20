<?php


$_config = array();

// ----------------------------  CONFIG DB  ----------------------------- //
$_config['db']['1']['dbhost'] = 'localhost';
$_config['db']['1']['dbuser'] = 'gotrave6_forum';
$_config['db']['1']['dbpw'] = 'SoCLae7Vl;Jk';
$_config['db']['1']['dbcharset'] = 'utf8';
$_config['db']['1']['pconnect'] = '0';
$_config['db']['1']['dbname'] = 'gotrave6_forum';
$_config['db']['1']['tablepre'] = 'pre_';
$_config['db']['slave'] = '';
$_config['db']['common']['slave_except_table'] = '';

// --------------------------  CONFIG MEMORY  --------------------------- //
$_config['memory']['prefix'] = 'HwIJ7v_';
$_config['memory']['redis']['server'] = '';
$_config['memory']['redis']['port'] = 6379;
$_config['memory']['redis']['pconnect'] = 1;
$_config['memory']['redis']['timeout'] = '0';
$_config['memory']['redis']['requirepass'] = '';
$_config['memory']['redis']['serializer'] = 1;
$_config['memory']['memcache']['server'] = '';
$_config['memory']['memcache']['port'] = 11211;
$_config['memory']['memcache']['pconnect'] = 1;
$_config['memory']['memcache']['timeout'] = 1;
$_config['memory']['apc'] = '0';
$_config['memory']['apcu'] = '0';
$_config['memory']['xcache'] = '0';
$_config['memory']['eaccelerator'] = '0';
$_config['memory']['wincache'] = '0';
$_config['memory']['yac'] = '0';
$_config['memory']['file']['server'] = '';

// --------------------------  CONFIG SERVER  --------------------------- //
$_config['server']['id'] = 1;

// -------------------------  CONFIG DOWNLOAD  -------------------------- //
$_config['download']['readmod'] = 2;
$_config['download']['xsendfile']['type'] = '0';
$_config['download']['xsendfile']['dir'] = '/down/';

// --------------------------  CONFIG OUTPUT  --------------------------- //
$_config['output']['charset'] = 'utf-8';
$_config['output']['forceheader'] = 1;
$_config['output']['gzip'] = '0';
$_config['output']['tplrefresh'] = 1;
$_config['output']['language'] = 'zh_cn';
$_config['output']['staticurl'] = 'static/';
$_config['output']['ajaxvalidate'] = '0';
$_config['output']['iecompatible'] = '0';

// --------------------------  CONFIG COOKIE  --------------------------- //
$_config['cookie']['cookiepre'] = '2iKP_';
$_config['cookie']['cookiedomain'] = '';
$_config['cookie']['cookiepath'] = '/';

// -------------------------  CONFIG SECURITY  -------------------------- //
$_config['security']['authkey'] = '81ed50964ffbf36f1a0fd809aed1ee94IHbBJCqvQU6tn7zKxT';
$_config['security']['urlxssdefend'] = 1;
$_config['security']['attackevasive'] = '0';
$_config['security']['querysafe']['status'] = 1;
$_config['security']['querysafe']['dfunction']['0'] = 'load_file';
$_config['security']['querysafe']['dfunction']['1'] = 'hex';
$_config['security']['querysafe']['dfunction']['2'] = 'substring';
$_config['security']['querysafe']['dfunction']['3'] = 'if';
$_config['security']['querysafe']['dfunction']['4'] = 'ord';
$_config['security']['querysafe']['dfunction']['5'] = 'char';
$_config['security']['querysafe']['daction']['0'] = '@';
$_config['security']['querysafe']['daction']['1'] = 'intooutfile';
$_config['security']['querysafe']['daction']['2'] = 'intodumpfile';
$_config['security']['querysafe']['daction']['3'] = 'unionselect';
$_config['security']['querysafe']['daction']['4'] = '(select';
$_config['security']['querysafe']['daction']['5'] = 'unionall';
$_config['security']['querysafe']['daction']['6'] = 'uniondistinct';
$_config['security']['querysafe']['dnote']['0'] = '/*';
$_config['security']['querysafe']['dnote']['1'] = '*/';
$_config['security']['querysafe']['dnote']['2'] = '#';
$_config['security']['querysafe']['dnote']['3'] = '--';
$_config['security']['querysafe']['dnote']['4'] = '"';
$_config['security']['querysafe']['dlikehex'] = 1;
$_config['security']['querysafe']['afullnote'] = '0';
$_config['security']['creditsafe']['second'] = '0';
$_config['security']['creditsafe']['times'] = 10;
$_config['security']['onlyremoteaddr'] = '0';

// --------------------------  CONFIG ADMINCP  -------------------------- //
// -------- Founders: $_config['admincp']['founder'] = '1,2,3'; --------- //
$_config['admincp']['founder'] = '1';
$_config['admincp']['forcesecques'] = '0';
$_config['admincp']['checkip'] = 1;
$_config['admincp']['runquery'] = '0';
$_config['admincp']['dbimport'] = 1;

// --------------------------  CONFIG REMOTE  --------------------------- //
$_config['remote']['on'] = '0';
$_config['remote']['dir'] = 'remote';
$_config['remote']['appkey'] = '62cf0b3c3e6a4c9468e7216839721d8e';
$_config['remote']['cron'] = '0';

// ---------------------------  CONFIG INPUT  --------------------------- //
$_config['input']['compatible'] = 1;

// -------------------------  CONFIG LANGUAGES  ------------------------- //
$_config['languages']['ar']['icon'] = 'ar.gif';
$_config['languages']['ar']['name'] = 'العربية';
$_config['languages']['ar']['title'] = 'Arabic';
$_config['languages']['ar']['dir'] = 'rtl';
$_config['languages']['ar']['code'] = 'ar-AE';
$_config['languages']['de']['icon'] = 'de.gif';
$_config['languages']['de']['name'] = 'Deutsch';
$_config['languages']['de']['title'] = 'German';
$_config['languages']['de']['dir'] = 'ltr';
$_config['languages']['de']['code'] = 'de-DE';
$_config['languages']['en']['icon'] = 'en.gif';
$_config['languages']['en']['name'] = 'English';
$_config['languages']['en']['title'] = 'English';
$_config['languages']['en']['dir'] = 'ltr';
$_config['languages']['en']['code'] = 'en-GB';
$_config['languages']['sc']['icon'] = 'zh.gif';
$_config['languages']['sc']['name'] = '简体中文';
$_config['languages']['sc']['title'] = 'Simplified Chinese';
$_config['languages']['sc']['dir'] = 'ltr';
$_config['languages']['sc']['code'] = 'zh-CN';
$_config['languages']['tc']['icon'] = 'tw.gif';
$_config['languages']['tc']['name'] = '繁體中文';
$_config['languages']['tc']['title'] = 'Traditional Chinese';
$_config['languages']['tc']['dir'] = 'ltr';
$_config['languages']['tc']['code'] = 'zh-TW';

// ----------------------  CONFIG DETECT_LANGUAGE  ---------------------- //
$_config['detect_language'] = 1;

// --------------------  CONFIG ENABLE_MULTILINGUAL  -------------------- //
$_config['enable_multilingual'] = 1;

// --------------------  CONFIG LANGUAGE_HORIZONTAL  -------------------- //
$_config['language_horizontal'] = '';

// ---------------------------  CONFIG CACHE  --------------------------- //
$_config['cache']['type'] = 'file';


// -------------------  THE END  -------------------- //

?>