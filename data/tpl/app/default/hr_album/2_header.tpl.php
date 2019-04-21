<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<meta charset='utf-8'>
<script type='text/javascript' src='<?php  echo $_W['siteroot'];?>addons/hr_album/style/js/zepto.min.js' charset='utf-8'></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.3.2.js"></script>
<?php  echo register_jssdk(false);?>
<script>
    var _speedMark = new Date();
    function init_viewport()
    {
        if(/Android (\d+\.\d+)/.test(navigator.userAgent))
        {
            var version = parseFloat(RegExp.$1);

            if(version>2.3)
            {
                var width = window.outerWidth == 0 ? window.screen.width : window.outerWidth;
                var phoneScale = parseInt(width)/500;
                document.write('<meta name="viewport" content="width=500, minimum-scale = '+ phoneScale +', maximum-scale = '+ phoneScale +', target-densitydpi=device-dpi">');
            }
            else
            {
                document.write('<meta name="viewport" content="width=500, target-densitydpi=device-dpi">');
            }
        }
        else if(navigator.userAgent.indexOf('iPhone') != -1)
        {
            var phoneScale = parseInt(window.screen.width)/500;
            document.write('<meta name="viewport" content="width=500; min-height=750;initial-scale=' + phoneScale +'; user-scalable=no;" /> ');         //0.75   0.82
        }
        else
        {
            document.write('<meta name="viewport" content="width=500, height=750, initial-scale=0.64" /> ');         //0.75   0.82
        }
    }

    init_viewport();
    document.ontouchmove = function(e)
    {
        e.preventDefault();
    }
    var module_inits = [];
    function load_init_modules()
    {
        for(var i=0; i<module_inits.length; i++)
        {
            module_inits[i]();
        }
    }
    function call_me(fun)
    {
        module_inits.push(fun);
    }
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger')
    {
        wx.ready(load_init_modules);
    }
    else
    {
        onload = load_init_modules;
    }
    var slider_images_url = [];
    <?php  if(is_array($data)) { foreach($data as $items) { ?>
    <?php  if(!empty($items['pics'])) { ?>
    slider_images_url.push('<?php  echo $this->imgurl().$items['pics']?>');
    <?php  } ?>
        <?php  } } ?>
            var pid = <?php  echo $id;?>;
            var e_desc = '<?php  echo $item['desc'];?>';
            var e_title = '<?php  if($item['title']) { ?><?php  echo $item['title'];?><?php  } else { ?>个性相册<?php  } ?>';
            var words = {<?php  if(is_array($data)) { foreach($data as $index => $words) { ?><?php  if($words['text']) { ?>"<?php  echo $words['textindex'];?>":"<?php  echo $words['text'];?>",<?php  } ?><?php  } } ?>};
            var e_music_url = '<?php  if($item['music']) { ?><?php  echo $item['music'];?><?php  } ?>';
</script>
<div style="width:100%;height: 100%;position: fixed;opacity: 0;z-index:40;"></div>