<?php
/**
 * 酷炫小程序相册模块小程序接口定义
 *
 * @author 一淘模板 www.ytaomb.com
 */
defined('IN_IA') or exit('Access Denied');

class Hr_albumModuleWxapp extends WeModuleWxapp
{
    private function extend($file_name)
    {
        $extend = pathinfo($file_name);
        $extend = strtolower($extend["extension"]);
        return $extend;
    }

    private function createdir($path)
    {
        if (! is_dir($path)) {
            $this->createdir(dirname($path));
            mkdir($path);
        }
        return is_dir($path);
    }
    private  function getjson($url,$refer){
        $curl = curl_init();
        // 要访问的网址
        curl_setopt($curl, CURLOPT_URL, $url);
        // 设置来路
        curl_setopt($curl, CURLOPT_REFERER,$refer);
        curl_setopt($curl, CURLOPT_USERAGENT, '"Dalvik/1.6.0 (Linux; U; Android 4.1.2; DROID RAZR HD Build/9.8.1Q-62_VQW_MR-2)');
        // 不直接输入内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // 降结果保存在$result中
        $qqlyc = curl_exec($curl);
        // 关闭
        curl_close($curl);
        return $qqlyc;
    }
    private function https_request($url,$data){
        $data=json_encode($data);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;

    }
    private function http_post_media($url,$strPOST)
    {
        $oCurl = curl_init ();
        curl_setopt ( $oCurl, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt ( $oCurl, CURLOPT_URL, $url );
        curl_setopt ( $oCurl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $oCurl, CURLOPT_POST, true );
        curl_setopt ( $oCurl, CURLOPT_POSTFIELDS, $strPOST );
        $output =  curl_exec ( $oCurl );
        //$aStatus = curl_getinfo ( $oCurl );
        curl_close ( $oCurl );
        return $output;
    }
    public function doWebPinglun(){
        global $_GPC, $_W;
        $id = intval($_GPC['id']);
        $account_api = WeAccount::create();
        $token = $account_api->getAccessToken();
        $url = 'https://api.weixin.qq.com/wxa/msg_sec_check?access_token='.$token;
        $data = array(
            'content' => 'hello'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POSTFIELDS , json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        echo $output;
        curl_close($ch);
    }
    private  function jianhuang($image){
        global $_GPC, $_W;
        $id = intval($_GPC['id']);
        $account_api = WeAccount::create();
        $token = $account_api->getAccessToken();
        $url = 'https://api.weixin.qq.com/wxa/img_sec_check?access_token='.$token;
        $post_data ['media']  = '@'.$image;
        $ss = $this->http_post_media($url, $post_data);
        $arr = json_decode($ss,true);
        //[errcode] => 87014
        //[errmsg] => risky content hint: [lOk04264526]
        return $arr;
    }
    private function vkey(){
        $ckey = cache_load('vkey');//读取缓存
        $extime = cache_load('extime');
        $times = TIMESTAMP;
        if($ckey && $times < $extime){
            $key = $ckey;
        }else{
            $arr = array('3tKRt03FbDol','BufSu3It7QO','4b76Fa155dXo','1fpbwS2TUTjV','2BWJyE2nofFX','20AL9u23tfeR');
            $url = 'https://c.y.qq.com/base/fcgi-bin/fcg_music_express_mobile3.fcg?g_tk=217896930&jsonpCallback=MusicJsonCallback34474659184462486&hostUin=0&format=json&inCharset=utf8&outCharset=utf-8&notice=0&platform=yqq&needNewCode=0&cid=205361747&songmid='.$arr[rand(0,5)].'&filename=C10000'.$arr[rand(0,6)].'.m4a&guid=7314047088';
            $refer = 'https://c.y.qq.com';
            $rs = $this->getjson($url,$refer);
            $arr = json_decode($rs,true);
            //file type wrong
            $key = $arr['data']['items'][0]['vkey'];
            if($key == 'file type wrong'){
                $key = $this->vkey();
            }else{
                cache_write('vkey', $key);
                cache_write('extime', $times+70400);
            }
        }
        return $key;
    }
    private function file_remote_delete($remote,$file) {
        global $_W;
        if (empty($file)) {
            return true;
        }
        if ($remote['type'] == '1') {
            load()->library('ftp');
            $ftp_config = array(
                'hostname' => $remote['ftp']['host'],
                'username' => $remote['ftp']['username'],
                'password' => $remote['ftp']['password'],
                'port' => $remote['ftp']['port'],
                'ssl' => $remote['ftp']['ssl'],
                'passive' => $remote['ftp']['pasv'],
                'timeout' => $remote['ftp']['timeout'],
                'rootdir' => $remote['ftp']['dir']
            );
            $ftp = new Ftp($ftp_config);
            if (true === $ftp->connect()) {
                if ($ftp->delete_file($file)) {
                    return true;
                } else {
                    return error(1, '删除附件失败，请检查配置并重新删除');
                }
            } else {
                return error(1, '删除附件失败，请检查配置并重新删除');
            }
        } elseif ($remote['type'] == '2') {
            load()->model('attachment');
            load()->library('oss');
            $buckets = attachment_alioss_buctkets($remote['alioss']['key'], $remote['alioss']['secret']);
            $endpoint = 'http://' . $buckets[$remote['alioss']['bucket']]['location'] . '.aliyuncs.com';
            try {
                $ossClient = new \OSS\OssClient($remote['alioss']['key'], $remote['alioss']['secret'], $endpoint);
                $ossClient->deleteObject($remote['alioss']['bucket'], $file);
            } catch (\OSS\Core\OssException $e) {
                return error(1, '删除oss远程文件失败');
            }
        } elseif ($remote['type'] == '3') {
            load()->library('qiniu');
            $auth = new Qiniu\Auth($remote['qiniu']['accesskey'], $remote['qiniu']['secretkey']);
            $bucketMgr = new Qiniu\Storage\BucketManager($auth);
            $error = $bucketMgr->delete($remote['qiniu']['bucket'], $file);
            if ($error instanceof Qiniu\Http\Error) {
                if ($error->code() == 612) {
                    return true;
                }

                return error(1, '删除七牛远程文件失败');
            } else {
                return true;
            }
        } elseif ($remote['type'] == '4') {
            $bucketName = $remote['cos']['bucket'];
            $path = '/' . $file;
            if (!empty($remote['cos']['local'])) {
                load()->library('cos');
                qcloudcos\Cosapi::setRegion($remote['cos']['local']);
                $result = qcloudcos\Cosapi::delFile($bucketName, $path);
            } else {
                load()->library('cosv3');
                $result = Qcloud_cos\Cosapi::delFile($bucketName, $path);
            }
            if (!empty($result['code'])) {
                return error(-1, '删除cos远程文件失败');
            } else {
                return true;
            }
        }

        return true;
    }
    private function file_albumremote_upload($filename, $remote, $auto_delete_local = true)
    {
        global $_W;
        if (empty($remote['type'])) {
            return false;
        }
        if ($remote['type'] == '1') {
            require_once (IA_ROOT . '/framework/library/ftp/ftp.php');
            $ftp_config = array(
                'hostname' => $remote['ftp']['host'],
                'username' => $remote['ftp']['username'],
                'password' => $remote['ftp']['password'],
                'port' => $remote['ftp']['port'],
                'ssl' => $remote['ftp']['ssl'],
                'passive' => $remote['ftp']['pasv'],
                'timeout' => $remote['ftp']['timeout'],
                'rootdir' => $remote['ftp']['dir']
            );
            $ftp = new Ftp($ftp_config);
            if (true === $ftp->connect()) {
                $response = $ftp->upload(ATTACHMENT_ROOT . '/' . $filename, $filename);
                if ($auto_delete_local) {
                    file_delete($filename);
                }
                if (! empty($response)) {
                    return true;
                } else {
                    return error(1, '远程附件上传失败，请检查配置并重新上传');
                }
            } else {
                return error(1, '远程附件上传失败，请检查配置并重新上传');
            }
        } elseif ($remote['type'] == '2') {
            load()->library('oss');
            load()->model('attachment');
            $buckets = attachment_alioss_buctkets($remote['alioss']['key'], $remote['alioss']['secret']);
            $endpoint = 'http://' . $buckets[$remote['alioss']['bucket']]['location'] . '.aliyuncs.com';
            try {
                $ossClient = new \OSS\OssClient($remote['alioss']['key'], $remote['alioss']['secret'], $endpoint);
                $ossClient->uploadFile($remote['alioss']['bucket'], $filename, ATTACHMENT_ROOT . $filename);
            } catch (\OSS\Core\OssException $e) {
                return error(1, $e->getMessage());
            }
            if ($auto_delete_local) {
                file_delete($filename);
            }
        } elseif ($remote['type'] == '3') {
            load()->library('qiniu');
            $auth = new Qiniu\Auth($remote['qiniu']['accesskey'], $remote['qiniu']['secretkey']);
            $uploadmgr = new Qiniu\Storage\UploadManager();
            $putpolicy = Qiniu\base64_urlSafeEncode(json_encode(array(
                'scope' => $remote['qiniu']['bucket'] . ':' . $filename
            )));
            $uploadtoken = $auth->uploadToken($remote['qiniu']['bucket'], $filename, 3600, $putpolicy);
            list ($ret, $err) = $uploadmgr->putFile($uploadtoken, $filename, ATTACHMENT_ROOT . '/' . $filename);
            if ($auto_delete_local) {
                file_delete($filename);
            }
            if ($err !== null) {
                return error(1, '远程附件上传失败，请检查配置并重新上传');
            } else {
                return true;
            }
        } elseif ($remote['type'] == '4') {
            if (! empty($remote['cos']['local'])) {
                load()->library('cos');
                qcloudcos\Cosapi::setRegion($remote['cos']['local']);
                $uploadRet = qcloudcos\Cosapi::upload($remote['cos']['bucket'], ATTACHMENT_ROOT . $filename, '/' . $filename, '', 3 * 1024 * 1024, 0);
            } else {
                load()->library('cosv3');
                $uploadRet = \Qcloud_cos\Cosapi::upload($remote['cos']['bucket'], ATTACHMENT_ROOT . $filename, '/' . $filename, '', 3 * 1024 * 1024, 0);
            }
            if ($uploadRet['code'] != 0) {
                switch ($uploadRet['code']) {
                    case - 62:
                        $message = '输入的appid有误';
                        break;
                    case - 79:
                        $message = '输入的SecretID有误';
                        break;
                    case - 97:
                        $message = '输入的SecretKEY有误';
                        break;
                    case - 166:
                        $message = '输入的bucket有误';
                        break;
                }
                return error(- 1, $message);
            }
            if ($auto_delete_local) {
                file_delete($filename);
            }
        }
    }

    private function savepics($pic)
    {
        global $_GPC, $_W;
        $cfg = $this->module['config'];
        if (! empty($pic)) {
            // $path = "/pics/".$_W['uniacid']."/" . date('Y/m/',time());
            // $this->createdir(MODULE_ROOT . $path);
            $allow_type = array(
                'jpg',
                'jpeg',
                'gif',
                'png'
            ); // 定义允许上传的类型
            $ext = $this->extend($pic['name']);
            if (in_array($ext, $allow_type)) {
                $filename = random(30) . '.' . $ext;
                $filename = 'images/' . $_W['uniacid'] . '/hr_album/' . date('Y/m/') . $filename;
                $filenames = ATTACHMENT_ROOT . '/' . $filename;
                load()->func('file');
                file_move($pic['tmp_name'], $filenames);
                if($cfg['wxyellow']){
                    $arr = $this->jianhuang($filenames);
                }
                if ($cfg['remote']['type']){
                    $this->file_albumremote_upload($filename, $cfg['remote'], $auto_delete_local = true);
                    if($cfg['wxyellow'] && $arr['errcode'] == '87014'){
                        $this->file_remote_delete($cfg['remote'],$filename);
                    }
                }else{
                    if($cfg['wxyellow'] && $arr['errcode'] == '87014'){
                        file_delete($filenames);
                    }
                }
                // move_uploaded_file($pic['tmp_name'], MODULE_ROOT.$filename);
            }
            return $filename;
        }
    }

    private function imgurl()
    {
        global $_GPC, $_W;
        $cfg = $this->module['config'];
        if ($cfg['remote']['type']) {
            if ($cfg['remote']['type'] == 1) {
                $url = $cfg['remote']['ftp']['url'] . '/';
            } elseif ($cfg['remote']['type'] == 2) {
                $url = $cfg['remote']['alioss']['url'] . '/';
            } elseif ($cfg['remote']['type'] == 3) {
                $url = $cfg['remote']['qiniu']['url'] . '/';
            } elseif ($cfg['remote']['type'] == 4) {
                $url = $cfg['remote']['cos']['url'] . '/';
            }
        } else {
            $url = $_W['siteroot'] . 'attachment/';
        }
        return $url;
    }
    public function doPageUpdeluser(){
        global $_GPC, $_W;
        $openid = $_GPC['openid'];
        pdo_update($this->modulename.'_user',array('status'=>1),array('openid' => $openid));
    }
   //用户获取信息同时获取小程序基本配置
    public function doPagemember()
    {
        global $_GPC, $_W;
        $cfg = $this->module['config'];
        $url = $this->imgurl();
        $code = $_GPC['code'];
        $ver = $_GPC['ver'];
        if($cfg['review'] && $ver == '4.3'){
            $review = $cfg['review'];
        }else{
            $review = 0;
        }
        $account_api = WeAccount::create();
        $oauth = $account_api->getOauthInfo($code);
        $user = array(
            'nickName' => $_GPC['nickName'],
            'avatarUrl' => $_GPC['avatarUrl'],
            'openid' => $oauth['openid'],
        );
        $isave = pdo_fetch("SELECT id,status,fee FROM" . tablename($this->modulename . '_user') . ' WHERE openid = :openid', array(':openid' => $oauth['openid']));
        if (!$isave['id']) {
            $data = array(
                'nickname' => $user['nickName'],
                'openid' => $user['openid'],
                'avatar' => $user['avatarUrl'],
                'uniacid' => $_W['uniacid'],
                'addtime' => TIMESTAMP
            );
            pdo_insert($this->modulename . '_user', $data);
        }
        $user['status'] = $isave['status'];
        return json_encode($user);
    }
    public function doPageSetdata()
    { // 模块基础信息
        global $_GPC, $_W;
        $cfg = $this->module['config'];
        $ver = $_GPC['ver'];
        if($cfg['review'] && $ver == '4.3'){
            $review = $cfg['review'];
        }else{
            $review = 0;
        }
        $isapp = pdo_fetchall('select count(*) from'.tablename($this->modulename.'_app').' where uniacid = :uniacid',array(':uniacid' => $_W['uniacid']));
        $url = $this->imgurl();
        $cfg['imgurl'] = $url;
        $cfg['review'] = $review;
        $cfg['dstext'] = htmlspecialchars_decode($cfg['dstext']);
        $cfg['mapp'] = pdo_fetchcolumn('select count(*) from'.tablename($this->modulename.'_app').' where uniacid = :uniacid',array(':uniacid' => $_W['uniacid']));
        unset($cfg['remote']);
        echo json_encode($cfg);
    }

    public function doPageTest()
    {
        global $_GPC, $_W;
        $errno = 0;
        echo $message = '返回消息';
        $data = array();
        // return $this->result($errno, $message, $data);
    }

    public function doPageUpimg()
    {
        global $_GPC, $_W;
        if ($_FILES["file"]["error"] > 0) {
            // 输出文件上传错误提示
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } else {
            $pic = $_FILES["file"];
            return $this->savepics($pic);
        }
    }

    public function doPageSavedata()
    {
        global $_GPC, $_W;
        $cfg = $this->module['config'];
        $pics = explode(',', $_GPC['pics']);
        $skin = pdo_fetch("SELECT skiname,music FROM" . tablename($this->modulename . '_skin') . ' WHERE uniacid = :uniacid and skiname = :skiname', array(
            ':uniacid' => $_W['uniacid'],
            ':skiname' => $cfg['baseskin']
        ));
        for ($i = 0; $i < count($pics); $i ++) {
            $item[$i]['pics'] = $pics[$i];
        }        
        $data = array(
            'content' => serialize($item),
            'openid' => $_GPC['openid'],
            'avatar' => $_GPC['avatar'],
            'nickname' => $_GPC['nickname'],
            'uniacid' => $_W['uniacid'],
            'music' => $skin['music'],
            'title' => $cfg['deftitle'],
            'skin' => $skin['skiname'],
            'addtime' => TIMESTAMP
        );
        pdo_insert($this->modulename . '_data', $data);
        $id = pdo_insertid();
        $msg = array(
            'id' => $id,
            'skin' => $skin['skiname']
        );
        return json_encode($msg);
    }

    public function doPagePiclist()
    {
        global $_GPC, $_W;
        $url = $this->imgurl();
        $openid = $_GPC['openid'];
        $uniacid = $_GPC['uniacid'];
        $data = pdo_fetchall("SELECT id,title,skin,content,click,share,isshow,addtime FROM" . tablename($this->modulename . '_data') . " WHERE uniacid = :uniacid and  openid = :openid ORDER BY addtime DESC", array(
            ':uniacid' => $uniacid,
            ':openid' => $openid
        ));
        $allshare = 0;
        for ($i = 0; $i < count($data); $i ++) {
            $pics = unserialize($data[$i]['content']);
            $data[$i]['thumb'] = $url . $pics[0]['pics'];
            $data[$i]['addtime'] = date('Y-m-d',$data[$i]['addtime']);
            $allshare = $data[$i]['share'] + $allshare;
            unset($data[$i]['content']);
        };
        $data[0]['allshare'] = $allshare;
        return json_encode($data);
    }

    public function doPagedelphoto()
    {
        global $_GPC, $_W;
        $openid = $_GPC['openid'];
        $id = $_GPC['id'];
        $result = pdo_delete($this->modulename . '_data', array(
            'id' => $id,
            'openid' => $openid
        ));
        $data = array(
            'sts' => 1
        );
        return json_encode($data);
    }

    public function doPageToskin()
    {
        global $_GPC, $_W;
        $uniacid = $_GPC['uniacid'];
        $pid = $_GPC['pid'];
        $pdata = pdo_fetchcolumn("SELECT skin FROM" . tablename($this->modulename . '_data') . " WHERE uniacid = :uniacid and id = :id", array(
            ':uniacid' => $uniacid,
            ':id' => $pid
        ));
        $data = array(
            'skin' => $pdata
        );
        return json_encode($data);
    }

    public function doPagePhotodata()
    {
        global $_GPC, $_W;
        $cfg = $this->module['config'];
        $openid = $_GPC['openid'];
        $uniacid = $_GPC['uniacid'];
        $pid = $_GPC['pid'];
        $pdata = pdo_fetch("SELECT id,openid,nickname,avatar,title,skin,content,click,share,addtime,music FROM" . tablename($this->modulename . '_data') . " WHERE uniacid = :uniacid and id = :id ORDER BY addtime DESC", array(
            ':uniacid' => $uniacid, 
            ':id' => $pid
        ));
        $piclist = unserialize($pdata['content']);
        for ($i = 0; $i < count($piclist); $i ++) {
            $pdata['pic'][$i] = $piclist[$i]['pics'];
            $pdata['text'][$i] = $piclist[$i]['text'];
        }
        ;
        if ($cfg['remoteskin']) {
            $skinurl = $this->imgurl() . 'skin/' . $pdata['skin'];
        } else {
            $skinurl = $_W['siteroot'] . 'addons/hr_album/skin/' . $pdata['skin'];
        }
        unset($pdata['content']);
        $data = array(
            'pdata' => $pdata,
            'imgurl' => $this->imgurl(),
            'skinurl' => $skinurl, 
            'isico' => $cfg['isico'],
            'ispay' => $cfg['ispay'],
            'tnum' => count($pdata['pic'])
        );
        return json_encode($data);
    }

    public function doPageMusic()
    {
        global $_GPC, $_W;
        $cid = intval($_GPC['cid']);
        $uniacid = $_GPC['uniacid'];
        if (! $cid) {
            $cate = pdo_fetchall("SELECT id,title FROM" . tablename($this->modulename . '_mucate') . " WHERE uniacid = :uniacid  ORDER BY displayorder DESC", array(
                ':uniacid' => $uniacid
            ));
            $music = pdo_fetchall("SELECT id,title,singer,type,music FROM" . tablename($this->modulename . '_music') . " WHERE uniacid = :uniacid  ORDER BY addtime DESC", array(
                ':uniacid' => $uniacid
            ));
            for ($i=0;$i<count($music);$i++){
                $music[$i]['music'] = str_replace('ws.stream.qqmusic.qq.com','dl.stream.qqmusic.qq.com',$music[$i]['music']);
                $music[$i]['music'] = $music[$i]['music'].'&vkey='.$this->vkey();
            }
            $data = array(
                'cate' => $cate,
                'music' => $music
            );
        } else {
            $music = pdo_fetchall("SELECT id,title,singer,type,music FROM" . tablename($this->modulename . '_music') . " WHERE uniacid = :uniacid and type = :type  ORDER BY addtime DESC", array(
                ':uniacid' => $uniacid,
                ':type' => $cid
            ));
            for ($i=0;$i<count($music);$i++){
                $music[$i]['music'] = str_replace('ws.stream.qqmusic.qq.com','dl.stream.qqmusic.qq.com',$music[$i]['music']);
                $music[$i]['music'] = $music[$i]['music'].'&vkey='.$this->vkey();
            }
            $data = array(
                'music' => $music
            );
        }
        return json_encode($data);
    }

    public function doPageSkin()
    {
        global $_GPC, $_W;
        $cid = intval($_GPC['cid']);
        $uniacid = $_GPC['uniacid'];
        if (! $cid) {
            $cfg = $this->module['config'];
            if ($cfg['remoteskin']) {
                if ($cfg['remote']['type']) {
                    if ($cfg['remote']['type'] == 1) {
                        $url = $cfg['remote']['ftp']['url'] . '/';
                    } elseif ($cfg['remote']['type'] == 2) {
                        $url = $cfg['remote']['alioss']['url'] . '/';
                    } elseif ($cfg['remote']['type'] == 3) {
                        $url = $cfg['remote']['qiniu']['url'] . '/';
                    } elseif ($cfg['remote']['type'] == 4) {
                        $url = $cfg['remote']['cos']['url'] . '/';
                    }
                } else {
                    $url = $_W['siteroot'] . 'addons/hr_album/';
                }
            } else {
                $url = $_W['siteroot'] . 'addons/hr_album/';
            }
            $cate = pdo_fetchall("SELECT id,title FROM" . tablename($this->modulename . '_skincate') . " WHERE uniacid = :uniacid  ORDER BY displayorder DESC", array(
                ':uniacid' => $uniacid
            ));
            $skin = pdo_fetchall("SELECT id,skiname,ishot,skintitle FROM" . tablename($this->modulename . '_skin') . " WHERE uniacid = :uniacid  ORDER BY displayorder DESC", array(
                ':uniacid' => $uniacid
            ));
            $data = array(
                'cate' => $cate,
                'imgurl' => $this->imgurl(),
                'skinurl' => $url,
                'skindata' => $skin
            );
        } else {
            $skin = pdo_fetchall("SELECT id,skiname,ishot,skintitle FROM" . tablename($this->modulename . '_skin') . " WHERE uniacid = :uniacid and cid = :cid  ORDER BY ishot DESC", array(
                ':uniacid' => $uniacid,
                ':cid' => $cid
            ));
            $data = array(
                'skindata' => $skin
            );
        }
        
        return json_encode($data);
    }

    public function doPageUpdateskin()
    {
        global $_GPC, $_W;
        $data = array(
            'skin' => $_GPC['skiname']
        );
        pdo_update($this->modulename . '_data', $data, array(
            'id' => intval($_GPC['pid'])
        ));
        $data = array(
            'id' => intval($_GPC['pid'])
        );
        return json_encode($data);
    }

    public function doPageSavemusic()
    {
        global $_GPC, $_W;
        $id = intval($_GPC['id']);
        $uniacid = intval($_GPC['uniacid']);
        $music = strip_gpc($_GPC['music']);
        $result = pdo_update($this->modulename . '_data', array(
            'music' => $music
        ), array(
            'id' => $id,
            'uniacid' => $uniacid
        ));
        $data = array(
            'result' => $result
        );
        return json_encode($data);
    }

    public function doPageSeachmusic()
    {
        global $_GPC, $_W;
        $keyword = strip_gpc($_GPC['title']);
        if (empty($keyword)) die('1');
            load()->func('communication');            
            $url = "https://auth-external.music.qq.com/open/fcgi-bin/fcg_weixin_music_search.fcg?remoteplace=txt.weixin.officialaccount&w={$keyword}&platform=weixin&perpage=15&curpage=1";
            $res = ihttp_get($url);
            $res = json_decode($res['content'],true);
            $list = $res['list'];
            if(empty($list)) die('1');
        $key = $this->vkey();
        for ($i = 0; $i < count($list); $i ++) {           
            $mudata[$i]['id'] = $i;
            $mudata[$i]['title'] = $list[$i]['songname'];
            $mudata[$i]['singer'] = $list[$i]['singername'];
            $list[$i]['m4a'] = str_replace('ws.stream.qqmusic.qq.com','dl.stream.qqmusic.qq.com',$list[$i]['m4a']);
            $mudata[$i]['music'] = $list[$i]['m4a'].'&lyric='.$list[$i]['id'];
        }
        return json_encode($mudata);
    }

    public function doPageSavetext()
    {
        global $_GPC, $_W;
        $id = intval($_GPC['pid']);
        $openid = $_GPC['openid'];
        $uniacid = $_GPC['uniacid'];
        $title = $_GPC['title'];
        $text = explode(',', $_GPC['text']);
        $pic = explode(',', $_GPC['pic']);
        for ($i = 0; $i < count($pic); $i ++) {
            $data[$i]['pics'] = $pic[$i];
            $data[$i]['text'] = $text[$i];
        }
        $datas = array(
            'title' => $title,
            'content' => serialize($data)
        );
        $result = pdo_update($this->modulename . '_data', $datas, array(
            'uniacid' => $uniacid,
            'id' => $id,
            'openid' => $openid
        ));
        if ($result) {
            $msg = array(
                'result' => 1
            );
        } else {
            $msg = array(
                'result' => 0
            );
        }
        return json_encode($msg);
    }

    public function doPageShareclick()
    {
        global $_GPC, $_W;
        if($_W['ispost']){
            $id = intval($_GPC['id']);
            pdo_query("UPDATE " . tablename($this->modulename . '_data') . " SET share = share + 1 WHERE id = :id", array(':id' => $id));
        }
    }

    public function doPageUserclick()
    {
        global $_GPC, $_W;
        $id = intval($_GPC['id']);
        pdo_query("UPDATE " . tablename($this->modulename . '_data') . " SET click = click + 1 WHERE id = :id", array(
            ':id' => $id
        ));
    }
    public function doPageservers()
    {
        global $_GPC, $_W;
        $cfg = $this->module['config'];
        require_once (MODULE_ROOT . '/public/wxBizMsgCrypt.php');
        $encodingAesKey = $cfg['encodingAesKey'];
        $token = $cfg['tokens'];
        $appId = $_W['account']['key'];
        $signature = $_GPC['signature'];
        $timestamp = $_GPC['timestamp'];
        $nonce = $_GPC['nonce'];
        $echostr = $_GPC['echostr'];
        $pdata = file_get_contents("php://input");
        $this->sendRes($pdata);
        $pc = new WXBizMsgCrypt($token, $encodingAesKey, $appId);
        $isok = $pc->checkSignature($signature, $timestamp, $nonce);
        if ($isok) {
            return $echostr;
        }      
    }
    
    public function sendRes($pdata)
    {
        global $_W;
        $cfg = $this->module['config'];
        $postdata = json_decode($pdata, true);
        if ($postdata['Event'] == 'user_enter_tempsession') {
            $post = '{"touser":"' . $postdata['FromUserName'] . '","msgtype":"link","link":{"title": "'.$cfg['kftitle'].'","description": "'.$cfg['kfdesc'].'","url": "'.$cfg['kfurl'].'", "thumb_url": "'.$this->imgurl().$cfg['kfpic'].'"}}';
            load()->classs('wxapp.account');
            $accObj = WxappAccount::create();
            $access_token = $accObj->getAccessToken($_W['uniacid']);
            $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$access_token}";
            load()->func('communication');
            $ret = ihttp_request($url, $post);
        }
    }
    public function doPagePicslist(){
        global $_GPC, $_W;
        $uniacid = $_W['uniacid'];
        $page = intval($_GPC['page']);
        if($_W['ispost']){
            $pindex = max(1, intval($_GPC['page']));
            $psize = 5;
            $data = pdo_fetchall("SELECT id,title,content,skin,isshow,addtime,avatar,nickname,click,share FROM " . tablename($this->modulename.'_data') . " WHERE uniacid = :uniacid and isshow = 1 ORDER BY addtime desc LIMIT ".($pindex - 1) * $psize.','.$psize,array(':uniacid' => $uniacid));              
            if($data){
                for($i=0;$i<count($data);$i++){
                    $pics = unserialize($data[$i]['content']); 
                    $data[$i]['thumb'] = $pics[0]['pics'];
                    unset($data[$i]['content']);
                }
            }            
            return json_encode($data);
        }
    }
    public function doPageRlist(){
        global $_GPC, $_W;
        $uniacid = $_W['uniacid'];
        $page = intval($_GPC['page']);
        $cid = $_GPC['cid'];
        if($_W['ispost']){
            $pindex = max(1, intval($_GPC['page']));
            $psize = 15;
            $data = pdo_fetchall("SELECT * FROM " . tablename($this->modulename.'_pl') . " WHERE uniacid = :uniacid and cid = :cid ORDER BY addtime desc LIMIT ".($pindex - 1) * $psize.','.$psize,array(':uniacid' => $uniacid,':cid' => $cid));
            for ($i=0;$i<count($data);$i++){
                $data[$i]['addtime'] = date('m-d H:i',$data[$i]['addtime']);
            }
            return json_encode($data);
        }
    }
    public function doPageAdslist(){
        global $_GPC, $_W;
        $ads = pdo_fetchall("SELECT title,thumb,type,path,appid FROM".tablename($this->modulename.'_ads')." WHERE uniacid = :uniacid",array(':uniacid' => $_W['uniacid']));
        return json_encode($ads); 
    }
    public function doPageShareset(){
        global $_GPC, $_W;
        $cfg = $this->module['config'];
        $uniacid = $_W['uniacid'];
        $openid = $_GPC['openid'];
        $isshow = $_GPC['isshow'] ? 0 : 1;
        $id = $_GPC['id'];
        if($cfg['ishare'] && !$_GPC['isshow']){
           $ishere =  pdo_fetch("SELECT id FROM".tablename($this->modulename.'_review')." WHERE id = :id and uniacid = :uniacid",array(':id' => $id,':uniacid' => $uniacid));
           if(!$ishere){
               $data = array(
                   'id' => $id,
                   'openid' => $openid,
                   'uniacid' => $uniacid,
                   'addtime' => TIMESTAMP                   
               );
               pdo_insert($this->modulename.'_review',$data);
           }
           $data = array(
                   'success' => 1,
                   'isshow' =>1
            );
        }else{               
            $result = pdo_update($this->modulename.'_data',array('isshow' => $isshow),array('uniacid' => $uniacid,'openid' => $openid,'id'=>$id));   
            if($result){
                $data = array(
                    'success' => 1,
                    'isshow' => $isshow
                );
            }else{
                $data = array(
                    'success' => 0
                );
            }
        }        
        return json_encode($data);
    } 
    private  function hex2rgb($hexColor) {
        $color = str_replace('#', '', $hexColor);
        if (strlen($color) > 3) {
            $rgb = array(
                'r' => hexdec(substr($color, 0, 2)),
                'g' => hexdec(substr($color, 2, 2)),
                'b' => hexdec(substr($color, 4, 2))
            );
        } else {
            $color = $hexColor;
            $r = substr($color, 0, 1) . substr($color, 0, 1);
            $g = substr($color, 1, 1) . substr($color, 1, 1);
            $b = substr($color, 2, 1) . substr($color, 2, 1);
            $rgb = array(
                'r' => hexdec($r),
                'g' => hexdec($g),
                'b' => hexdec($b)
            );
        }
        return $rgb;
    }
    public function doPageTpic(){
        global $_GPC, $_W;
        $textcolor =  $_GPC['fontcolor'] == '#000' ? '0' : '255';
        $bgcolor = $this->hex2rgb($_GPC['bgcolor']);
        $target = imagecreatetruecolor (600,600);
        $text = $_GPC['font'];
        $white = imagecolorallocate ( $target, $bgcolor['r'],$bgcolor['g'], $bgcolor['b']);
        imagefill ( $target, 0, 0, $white );
        $fontColor = imagecolorallocate ($target,$textcolor,$textcolor,$textcolor);//字的RGB颜色
        $font = MODULE_ROOT.'/skin/yahei.ttf';
        $fontBox = imagettfbbox(20, 0,$font, $text);//文字水平居中实质
        imagettftext ( $target, 20, 0, ceil((600 - $fontBox[2]) / 2),300, $fontColor, $font, $text );
        header("content-type: image/jpeg");
        imagejpeg($target);        
        //销毁该图片(释放内存)
        imagedestroy($target);
    }
    public function doPageGetsetdata(){
        global $_GPC, $_W;
        $openid = $_GPC['openid'];
        $uniacid  = $_W['uniacid'];
        $payset = pdo_fetch("SELECT leastmon,service FROM".tablename($this->modulename.'_paydata')." WHERE uniacid = :uniacid",array(':uniacid' => $_W['uniacid']));
        return json_encode($payset);
    }
    public function doPageGotocost(){
        global $_GPC, $_W;
        $openid = $_GPC['openid'];
        $uniacid  = $_W['uniacid'];
        $avatar = $_GPC['avatar'];
        $nickname = $_GPC['nickname'];
        $fee = $_GPC['nowmoney'];
        $tixian = $_GPC['tixian'];
        $data = array(
            'uniacid' => $uniacid,
            'openid' => $openid,
            'avatar' => $avatar,
            'nickname' => $nickname,
            'cost' => $fee,//提现金额
            'rcost' => $tixian, //实际金额
            'addtime' => TIMESTAMP,
        );
        $info = pdo_fetch("SELECT fee,status FROM".tablename($this->modulename.'_user').' WHERE openid = :openid and uniacid = :uniacid',array(':openid' => $openid,'uniacid' => $_W['uniacid']));
        if(!$info['status'] && $fee > 0 && $tixian > 0){
            $nowcost = $info['fee'] - $fee;
            if($nowcost >= 0){
                pdo_insert($this->modulename.'_cashpay',$data);
                $id = pdo_insertid();
                $result = pdo_update($this->modulename.'_user',array('fee' => $nowcost),array('openid' => $openid,'uniacid' => $_W['uniacid']));
                if($result){
                    $result = array(
                        'result' => 1,
                        'msg' => '提现申请成功',
                        'fee' => $nowcost
                    );
                }else{
                    $result = array(
                        'result' => 0,
                        'msg' => '提现失败请联系客服'
                    );
                }
            }else{
                $result = array(
                    'result' => 0,
                    'msg' => '余额不足'
                );
            }

        }else{
            $result = array(
                'result' => 0,
            );
        }
        return json_encode($result);
    }
    public function doPagePaylog(){
        global $_GPC, $_W; 
        $openid = $_GPC['openid'];
        $list = pdo_fetchall("SELECT avatar,tnickname,cost,addtime FROM".tablename($this->modulename.'_paylog')." WHERE tid = :tid and transaction_id != '' ORDER BY addtime desc",array(':tid' => $openid));
        for ($i=0;$i<count($list);$i++){ 
            $list[$i]['addtime'] = date('Y-m-d H:s:i',$list[$i]['addtime']);  
        }
        return json_encode($list); 
    }
    public function doPageTxlog(){
        global $_GPC, $_W;
        $openid = $_GPC['openid'];
        $list = pdo_fetchall("SELECT * FROM".tablename($this->modulename.'_cashpay')." WHERE openid = :openid and uniacid = :uniacid ORDER BY addtime desc",array(':openid' => $openid,':uniacid' => $_W['uniacid']));
        for ($i=0;$i<count($list);$i++){
            $list[$i]['addtime'] = date('Y-m-d H:s:i',$list[$i]['addtime']);
        }
        return json_encode($list);
    }
    public function doPagePay(){
        global $_GPC, $_W;
        include 'wxpay.php';
        //获取订单号，保证在业务模块中唯一即可
        $out_trade_no = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        $openid = $_GPC['openid'];
        $money = $_GPC['cost'];
        $appid = $_W['account']['key'];
        $mch_id= $_W['account']['setting']['payment']['wechat']['mchid'];
        $signkey = $_W['account']['setting']['payment']['wechat']['signkey'];
        $total_fee = $money*100;
        $cfg = $this->module['config'];
        $body = $cfg['dsdesc'] ? $cfg['dsdesc'] : '打赏';
        $notify = $_W['siteroot'].'addons/hr_album/notify.php';
        $weixinpay = new WeixinPay($appid,$openid,$mch_id,$signkey,$out_trade_no,$body,$total_fee,$notify);
        $return=$weixinpay->pay();
        $data = array(
            'uniacid' => $_W['uniacid'],
            'tid' => $_GPC['tid'],
            'out_trade_no' => $out_trade_no,
            'openid' => $_GPC['openid'],
            'pid' => $_GPC['pid'],
            'nickname' => $_GPC['nickname'],
            'avatar' => $_GPC['avatar'],
            'tnickname' => $_GPC['tnickname'],
            'cost' => $money,
            'addtime' => TIMESTAMP
        );
        pdo_insert($this->modulename.'_paylog',$data);
        $formid = $return['package'];
        $formid = str_replace('prepay_id=','', $formid);
        $formdata = array(
            'uniacid' => $_W['uniacid'],
            'openid' => $openid,
            'formid' => $formid,
            'addtime' => TIMESTAMP
        );
        pdo_insert($this->modulename.'_formdata',$formdata);
        $return['out_trade_no'] = $out_trade_no;
        return json_encode($return);
    }
    public function doPagepayResult() {
        global $_GPC, $_W;
        if($_W['ispost']){
            $trade_no = $_GPC['trade_no'];
            $res = pdo_fetch("SELECT * FROM".tablename($this->modulename.'_paylog')." WHERE openid = :openid and out_trade_no = :out_trade_no",array(':openid' => $_GPC['openid'],':out_trade_no' => $trade_no));
            $this->Sendmsgs($res['cost'],$res['addtime'],$res['openid'],$res['tid']);
        }
    }
    //tid 收到赞赏 openid 赞赏人
    public function Sendmsgs($money,$ztime,$openid,$tid){
        global $_W,$_GPC;
        $formid = 0;
        $list = pdo_fetchall("SELECT id,formid,addtime FROM".tablename($this->modulename.'_formdata')." WHERE openid = :openid",array(':openid' => $tid));
        for ($i=0;$i<count($list);$i++){
            $nowtiems = TIMESTAMP;
            if($nowtiems > strtotime('+ 7 days',$list[$i]['addtime'])){
                pdo_delete($this->modulename.'_formdata',array('id' => $list[$i]['id'],'uniacid' => $_W['uniacid']));
            }else{
                $formid = $list[$i];
                break;
            }
        }
        if($formid){
            $path = 'hr_album/pages/user/user';
            $cfg = $this->module['config'];
            $ztime = date('Y-m-d H:s:i',$ztime);
            $nickname = pdo_fetchcolumn("SELECT nickname FROM".tablename($this->modulename.'_user').' WHERE openid = :openid',array(':openid' => $openid));
            $account_api = WeAccount::create();
            $token = $account_api->getAccessToken();
            load()->func('communication');
            $url = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token='.$token;
            $data = array(
                'touser' => $tid,
                'template_id' => $cfg['templateid'],
                "page"=>$path,
                "form_id"=> $formid['formid'],
                'data' => array(
                    'keyword1' => array(
                        'value' => $nickname,
                        "color"=>"#FF0000"
                    ),
                    'keyword2' => array(
                        'value' => $money.'元',
                        "color"=>"#1803C6"
                    ),
                    'keyword3' => array(
                        'value' => $ztime,
                        "color"=>"#1803C6"
                    ),
                    'keyword4' => array(
                        'value' => $nickname.'觉得你很赞，对你表达了支持哦',
                        "color"=>"#8559e5"
                    )
                ),
                'emphasis_keyword' =>'keyword1.DATA'
            );
            $res = ihttp_post($url, json_encode($data));
            //file_put_contents(IA_ROOT.'/addons/tc_card/11.txt',$paydata['tid']."//".$out_trade_no);
            file_put_contents(IA_ROOT.'/addons/hr_album/log.txt',$res);
            pdo_delete($this->modulename.'_formdata',array('id' => $formid['id']));
            if($res->errcode == 0){
                return $res;
            }else{
                return false;
            }
        }
    }
    public function doPageMoneynum(){
        global $_GPC, $_W;
        if($_W['ispost']){
           $data = pdo_fetchcolumn("SELECT content FROM".tablename($this->modulename.'_paydata').' WHERE uniacid = :uniacid',array(':uniacid' => $_W['uniacid']));
           $data = unserialize($data);
           return json_encode($data);
        }
    }
    public function doPageGetrlist(){
        global  $_GPC,$_W;
        if($_W['ispost']){
            $item = pdo_fetchall("SELECT * FROM".tablename($this->modulename.'_shenhe').' WHERE uniacid = :uniacid order by addtime desc',array(':uniacid' => $_W['uniacid']));
            return json_encode($item);
        }
    }
    public function doPageGetfee(){
        global $_W,$_GPC;
        $openid = $_GPC['openid'];
        $fee = pdo_fetch("SELECT fee FROM".tablename($this->modulename.'_user')." WHERE openid = :openid",array(':openid' => $openid));
        return json_encode($fee);
    }
    protected function template($filename) {
        global $_W;
        $name = strtolower($this->modulename);
        $defineDir = dirname($this->__define);
        $source = IA_ROOT . "/app/themes/{$_W['template']}/{$name}/{$filename}.html";
        $compile = IA_ROOT . "/data/tpl/app/{$_W['template']}/{$name}/{$filename}.tpl.php";
        if(!is_file($source)) {
            $source = $defineDir . "/skin/{$filename}.html";
        }
        $paths = pathinfo($compile);
        $compile = str_replace($paths['filename'], $_W['uniacid'] . '_' . $paths['filename'], $compile);
        if (DEVELOPMENT || !is_file($compile) || filemtime($source) > filemtime($compile)) {
            template_compile($source, $compile, true);
        }
        return $compile;
    }
    //新版
    public function doPageShow(){
        global $_W,$_GPC;
        $cfg = $this->module['config'];
        if ($cfg['remoteskin']) {
            $skinurl = $this->imgurl();
        } else {
            $skinurl = $_W['siteroot'] . 'addons/hr_album/';
        }
        $isapp = pdo_fetchcolumn('select count(*) from'.tablename($this->modulename.'_app').' where uniacid = :uniacid',array(':uniacid' => $_W['uniacid']));
        $id = intval($_GPC['id']);
        $isbested = $_GPC['best_'.$id];
        $item = pdo_fetch("SELECT * FROM" . tablename($this->modulename.'_data'). " WHERE id = :id",array(':id' => $id));
        $char = "。、！？：；﹑•＂…‘’“”〝〞∕¦‖—　〈〉﹞﹝「」‹›〖〗】【»«』『〕〔》《﹐¸﹕︰﹔！¡？¿﹖﹌﹏﹋＇´ˊˋ―﹫︳︴¯＿￣﹢﹦﹤‐­˜﹟﹩﹠﹪﹡﹨﹍﹉﹎﹊ˇ︵︶︷︸︹︿﹀︺︽︾ˉ﹁﹂﹃﹄︻︼（）";
        $pattern = array(
            "/[[:punct:]]/i", //英文标点符号
            '/['.$char.']/u', //中文标点符号
            '/[ ]{2,}/'
        );
        $str = preg_replace($pattern, ' ', $item['title']);
        $str1 = preg_replace($pattern, ' ', $item['desc']);
        $qian=array(" ","　","\t","\n","\r");
        $item['title'] = str_replace($qian, '',$str);
        $item['desc'] = str_replace($qian, '',$str1);
        //$key = $this->vkey();
        $item['music'] = str_replace('ws.stream.qqmusic.qq.com','dl.stream.qqmusic.qq.com',$item['music']);
        //$item['music'] = preg_replace("/&vkey=.*/i","",$item['music']);
        //$item['music'] = $item['music'].'&vkey='.$key;
        if($item['skin']){
            $data = unserialize($item['content']);
            for($i=0;$i<count($data);$i++){
                $ss = str_replace("http://","",$data[$i]['pics']);
                $arr = explode('/',$ss);
                $count = count($arr);
                $arr = explode('.', $arr[$count - 1]);
                $data[$i]['textindex'] =  str_replace('\.jpg|\.jpeg|\.gif|\.png','', $arr[0]);
            }
            $model = $_GPC['type'];
            include $this->template('header');
            include $this->template($item['skin']);
            include $this->template('foot');
        }else{
            include $this->template('404');
        }
    }
    public function doPageUpform(){
        global $_GPC, $_W;
        if($_W['ispost']){
            $data = array(
                'formid' => $_GPC['formid'],
                'openid' => $_GPC['openid'],
                'uniacid' => $_W['uniacid'],
                'addtime' => TIMESTAMP
            );
            pdo_insert($this->modulename.'_formdata',$data);
        }
    }
    public function doPageSharecon(){
        global $_W,$_GPC;
        if($_W['ispost']){
            $cfg = $this->module['config'];
            $id = $_GPC['id'];
            $data = pdo_fetch('select title,content,music from'.tablename($this->modulename.'_data').' where id = :id',array(':id' => $id));
            $content = unserialize($data['content']);
            if($content[0]['pics']){
                $shareimg = $content[0]['pics'];
            }else{
                $shareimg = '';
            }
            $data['music'] = str_replace('ws.stream.qqmusic.qq.com','dl.stream.qqmusic.qq.com',$data['music']);
            $datas = array(
                'sharetitle' => $data['title'],
                'shareimg' => $this->imgurl().$shareimg,
                'paydesc' => $cfg['paydesc'],
                'bgmusic' => $data['music'],
                'llads' => $cfg['llads']
            );
            exit(json_encode($datas));
        }
    }
    public function doPageQrcode(){
        global $_GPC, $_W;
        $id = intval($_GPC['id']);
        $account_api = WeAccount::create();
        $token = $account_api->getAccessToken();
        load()->func('communication');
        $url = 'https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token='.$token;
        $data = array(
            'scene' => urlencode($id),
            'page'=>'hr_album/pages/show/show',
            'width' => '600',
            'auto_color' => true
        );
        $ss = ihttp_post($url, json_encode($data));
        header('Content-type: image/jpg');
        echo $ss['content'];
    }
    public function doPageSaveimg(){
        global $_GPC, $_W;
        $url = $_GPC['url'];
        $img = file_get_contents($url);
        if(stristr($img,'.gif')){
            header('Content-type: image/gif');
        }else{
            header('Content-type: image/jpg');
        }
        echo $img;
    }
    public function doPageHbgimg(){
        global $_GPC, $_W;
        $url = $_GPC['url'];
        $img = file_get_contents(MODULE_ROOT.'/style/images/hbg.png');
        header('Content-type: image/png');
        echo $img;
    }
    public function doPageAppinfo(){
        global $_GPC, $_W;
        $list = pdo_fetchall('select * from'.tablename($this->modulename.'_app').' where uniacid = :uniacid',array(':uniacid' => $_W['uniacid']));
        exit(json_encode($list));
    }
    public function doPageDobest(){
        global $_W, $_GPC;
        if($_W['ispost']){
            $id = intval($_GPC['id']);
            $isbested = $_GPC['best_'.$id];
            if(!$isbested){
                isetcookie ('best_'.$id,1, 86400);
                pdo_query("UPDATE ".tablename($this->modulename.'_data')." SET best = best + 1 WHERE id = :id", array(':id' => $id));
                $data = array(
                    'result' => 1
                );
            }else{
                $data = array(
                    'result' => 0
                );
            }
            echo json_encode($data);

        }
    }
    public function doPageDonesave(){
        global $_W,$_GPC;
        if($_W['ispost']){
            $data = array(
                'uniacid' => $_W['uniacid'],
                'cid' => intval($_GPC['id']),
                'avatar' => $_GPC['avatar'],
                'nickname' => $_GPC['nickname'],
                'content' => $_GPC['content'],
                'addtime' => TIMESTAMP
            );
            pdo_insert($this->modulename.'_pl',$data);
            $rs = pdo_insertid();
            if($rs){
                $datas = array(
                    'result' => $rs
                );
            }else{
                $datas = array(
                    'result' => 0
                );
            }
            exit(json_encode($datas));
        }
    }
    public function doPageDelreview(){
        global $_W,$_GPC;
        if($_W['ispost']){
            $id = $_GPC['id'];
            pdo_delete($this->modulename.'_pl',array('id' => $id));
            $data = array(
                'result' => 1
            );
            exit(json_encode($data));
        }
    }
    public function doPageAclist(){
        global $_W,$_GPC;
        $uniacid = $_W['uniacid'];
        if($_W['ispost']){
            require_once 'func.php';
            $data = acarr();
            exit(json_encode($data));
        }
    }
    public function doPageAcget(){
        global $_W,$_GPC;
        $index = $_GPC['id'];
        if($_W['ispost']){
            require_once 'func.php';
            $data = acarr();
            $data[$index]['contnet'] = htmlspecialchars($data[$index]['contnet']);
            exit(json_encode($data[$index]));
        }
    }
}
