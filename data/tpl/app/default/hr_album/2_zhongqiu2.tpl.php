<?php defined('IN_IA') or exit('Access Denied');?><!--模板开始-->
<style type="text/css">

    *
    {
        padding: 0px;
        margin: 0px;
        -webkit-box-sizing: border-box;
    }

    body
    {
        background-color: white;
    }

    #container
    {
        width: 500px;
        height: 100%;
        position: absolute;
        overflow: hidden;
    }
    #container > div, #container > img
    {
        position: absolute;
    }
    .yulan
    {
        left: 0px;
        top: 0px;
    }
    .hehua
    {
        left: 0px;
        top: 579px;
    }
    #water
    {
        opacity: 0.5;
        top: 367px;
    }

    #pBmF7kZo5-an-obj-2{
        -webkit-transform:translate3d(-28px, -105px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(-17.6deg) scale3d(2, 2, 1);width:56px;height:57px;top:0;left:0;}
    @-webkit-keyframes ani-pBmF7kZo5-an-obj-2-0{0%{-webkit-transform:translate3d(-28px, -105px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(-17.6deg) scale3d(2, 2, 1);-webkit-transform-origin:50% 50%;-webkit-animation-timing-function:linear;opacity:1;}50.7144%{-webkit-transform:translate3d(203px, 211px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(-317.6deg) scale3d(1.5, 1.5, 1);-webkit-transform-origin:50% 50%;-webkit-animation-timing-function:linear;opacity:1;}60.0724%{-webkit-transform:translate3d(274px, 250px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(-384.1deg) scale3d(0.89, 0.89, 1);-webkit-transform-origin:50% 50%;-webkit-animation-timing-function:linear;opacity:1;}70.1348%{-webkit-transform:translate3d(341px, 253px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(-492deg) scale3d(0.54, 0.54, 1);-webkit-transform-origin:50% 50%;-webkit-animation-timing-function:linear;opacity:1;}79.6941%{-webkit-transform:translate3d(387px, 229px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(-622.4deg) scale3d(0.42, 0.42, 1);-webkit-transform-origin:50% 50%;-webkit-animation-timing-function:linear;opacity:1;}89.354%{-webkit-transform:translate3d(416px, 195px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(-717.6deg) scale3d(0.30, 0.30, 1);-webkit-transform-origin:50% 50%;-webkit-animation-timing-function:linear;opacity:1;}100%{-webkit-transform:translate3d(420px, 147px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(-817.6deg) scale3d(0.24, 0.24, 1);-webkit-transform-origin:50% 50%;-webkit-animation-timing-function:linear;opacity:0;}}

    #pBmF7kZo5-an-obj-2{position:absolute;-webkit-animation-name:ani-pBmF7kZo5-an-obj-2-0;-webkit-animation-duration:7s;-webkit-animation-delay:0s;-webkit-animation-fill-mode:infnite;}
    #hua2
    {
        left: -70px;
        top: 11px;
        -webkit-animation: hua2 6s 2s linear infinite;
    }
    @-webkit-keyframes hua2
    {
        0%   {-webkit-transform: translate(-12px,0px) rotate(-30deg) scale(2);opacity: 1;-webkit-animation-timing-function:linear}
        50%  {-webkit-transform: translate(322px,202px) rotate(-275deg) scale(1);opacity: 1;-webkit-animation-timing-function:linear}
        65%  {-webkit-transform: translate(409px,221px) rotate(-375deg) scale(0.7);opacity: 1;-webkit-animation-timing-function:linear}
        84%  {-webkit-transform: translate(461px,195px) rotate(-475deg) scale(0.5);opacity: 1;-webkit-animation-timing-function:linear}
        100%  {-webkit-transform: translate(478px,152px) rotate(-575deg) scale(0.2);opacity: 0;-webkit-animation-timing-function:linear}
        /*100% {opacity: 0}*/
    }
    .moon
    {
        left: 242px;
        top: 64px;
    }
    #hua3
    {
        position: absolute;
        -webkit-animation: hua3 7s linear infinite;
    }
    .huadiv3
    {
        left: 0px;
        top: 300px;
        -webkit-animation: huadiv3 7s cubic-bezier(0,.53,1,.52) infinite;
    }
    @-webkit-keyframes hua3
    {
        from  {-webkit-transform: translate(0px,0px) rotate(0deg) scale(1);}
        to    {-webkit-transform: translate(558px,0px) rotate(400deg) scale(2);}
    }
    @-webkit-keyframes huadiv3
    {
        from  {-webkit-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(0px,-120px);}
    }
    #hua4
    {
        left: 169px;
        top: -93px;
        -webkit-animation: hua4 7s 2s linear infinite;
    }
    @-webkit-keyframes hua4
    {
        0%   {-webkit-transform: translate(0px,0px) rotate(0deg) scale(2);opacity: 1}
        47%  {-webkit-transform: translate(93px,163px) rotate(-153deg) scale(1);opacity: 1}
        65%  {-webkit-transform: translate(149px,189px) rotate(-303deg) scale(0.8);opacity: 1}
        82%  {-webkit-transform: translate(202px,158px) rotate(-411deg) scale(0.6);opacity: 1}
        100% {-webkit-transform: translate(255px,202px) rotate(-476deg) scale(0.3);opacity: 0}
    }
    #pagediv1
    {
        width:340px;
        height:150px;
        top:350px;
        left:80px;
        overflow: hidden;
    }
    #pagediv2
    {
        width:340px;
        height:150px;
        top:500px;
        left:80px;
        overflow: hidden;
        opacity: 0.3;
    }
    @-webkit-keyframes title_in
    {
        from  {-webkit-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(0px,-150px);}
    }
    @-webkit-keyframes title_out
    {
        from  {-webkit-transform: translate(0px,-150px);opacity: 1}
        to    {-webkit-transform: translate(0px,-200px);opacity: 0}
    }
    @-webkit-keyframes daoying_in
    {
        from  {-webkit-transform: translate(0px,0px) scale(1,-1);}
        to    {-webkit-transform: translate(0px,150px) scale(1,-1);}
    }
    @-webkit-keyframes daoying_out
    {
        from  {-webkit-transform: translate(0px,150px) scale(1,-1);opacity: 1}
        to    {-webkit-transform: translate(0px,200px) scale(1,-1);opacity: 0}
    }
    @-webkit-keyframes titlemoving
    {
        from  {-webkit-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(0px,5px);}
    }
    @-webkit-keyframes titlemoving1
    {
        from  {-webkit-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(0px,-5px);}
    }
    #div1h
    {
        left: 50px;
        top: 158px;
        -webkit-animation: div1moving 1.5s linear infinite alternate;
    }
    #div1v
    {
        left: 70px;
        top: 100px;
        -webkit-animation: div1moving 1.5s linear infinite alternate;
    }
    #ying1h
    {
        left: 50px;
        top: 430px;
        opacity: 0.8;
        -webkit-transform: scale(1,-1);
        -webkit-mask: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)), to(rgba(0,0,0,1)));
        -webkit-animation: div1moving1 1.5s linear infinite alternate;
    }
    #ying1v
    {
        left: 70px;
        top: 643px;
        opacity: 0.8;
        -webkit-transform: scale(1,-1);
        -webkit-mask: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)), to(rgba(0,0,0,1)));
        -webkit-animation: div1moving1 1.5s linear infinite alternate;
    }
    .divh
    {
        width: 400px;
        height: 270px;
        background-color: #ccc;
        border: 3px solid #fff;
        overflow: hidden;
        position: absolute;
    }
    .divv
    {
        width: 360px;
        height: 540px;
        background-color: #ccc;
        border: 6px solid #fff;
        overflow: hidden;
        position: absolute;
    }
    .img
    {
        position: absolute;
    }
    #div1
    {
        -webkit-transform: translate(-455px,0px);
    }
    @-webkit-keyframes div1_in
    {
        from   {-webkit-transform: translate(-455px,0px);}
        to     {-webkit-transform: translate(0px,0px);}
    }
    @-webkit-keyframes div1_out
    {
        from   {-webkit-transform: translate(0px,0px);}
        to     {-webkit-transform: translate(455px,0px);}
    }
    @-webkit-keyframes div1moving
    {
        from  {-webkit-transform: translate(-3px,0px);}
        to    {-webkit-transform: translate(3px,0px);}
    }
    @-webkit-keyframes div1moving1
    {
        from  {-webkit-transform: translate(-3px,0px) scale(1,-1);}
        to    {-webkit-transform: translate(3px,0px) scale(1,-1);}
    }
    #div2v,#div3v
    {
        left: 67px;
        top: 102px;
        -webkit-transform: translate(0px,550px);
        display: none;
    }
    #ying2v
    {
        left: 67px;
        top: 0px;
        opacity: 0.6;
        -webkit-transform: translate(0px,-550px) scale(1,-1);
        display: none;
        /*-webkit-mask: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)), to(rgba(0,0,0,1)));*/
    }
    #ying3v
    {
        left: 67px;
        top: 0px;
        /*opacity: 0.6;*/
        -webkit-transform: translate(0px,-550px) scale(1,-1);
        display: none;
    }
    #con2v,#con3v
    {
        width: 500px;
        height: 642px;
        overflow: hidden;
        position: absolute;

    }
    #cony2v,#cony3v
    {
        left: 0px;
        top: 643px;
        width: 500px;
        height: 500px;
        overflow: hidden;
        position: absolute;
    }

    @-webkit-keyframes div2v_in
    {
        from  {-webkit-transform: translate(0px,550px);}
        to    {-webkit-transform: translate(0px,0px);}
    }
    @-webkit-keyframes div2v_out
    {
        from  {-webkit-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(0px,550px);}
    }
    @-webkit-keyframes div2vy_in
    {
        from  {-webkit-transform: translate(0px,-550px) scale(1,-1);}
        to    {-webkit-transform: translate(0px,0px) scale(1,-1);}
    }
    @-webkit-keyframes div2vy_out
    {
        from  {-webkit-transform: translate(0px,0px) scale(1,-1);}
        to    {-webkit-transform: translate(0px,-550px) scale(1,-1);}
    }
    #div2h
    {
        display: none;
        -webkit-transform: translate(0px,280px);
    }
    #ying2h
    {
        display: none;
        opacity: 0.6;
        -webkit-transform: translate(0px,-280px) scale(1,-1);
    }
    #con2h
    {
        left: 50px;
        top: 200px;
        width: 400px;
        height: 270px;
        overflow: hidden;
        position: absolute;
    }
    #con3h
    {
        left: 50px;
        top: 200px;
        width: 400px;
        height: 278px;
        overflow: hidden;
        position: absolute;
    }
    #cony2h
    {
        left: 50px;
        top: 470px;
        height: 270px;
        width: 400px;
        overflow: hidden;
        opacity: 0.8;
        position: absolute;
    }
    #cony3h
    {
        left: 50px;
        top: 470px;
        height: 280px;
        width: 400px;
        overflow: hidden;
        opacity: 0.6;
        position: absolute;
    }
    #cony3v
    {
        opacity: 0.6;
    }
    #ying3h
    {
        top: 10px;
        /*opacity: 0.6;*/
    }
    #ying3v,#div3v
    {
        display: none;
    }
    @-webkit-keyframes div2h_in
    {
        from  {-webkit-transform: translate(0px,280px);}
        to    {-webkit-transform: translate(0px,0px);}
    }
    @-webkit-keyframes div2h_out
    {
        from  {-webkit-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(0px,280px);}
    }
    @-webkit-keyframes ying2h_in
    {
        from  {-webkit-transform: translate(0px,-280px) scale(1,-1);}
        to    {-webkit-transform: translate(0px,0px) scale(1,-1);}
    }
    @-webkit-keyframes ying2h_out
    {
        from  {-webkit-transform: translate(0px,0px) scale(1,-1);}
        to    {-webkit-transform: translate(0px,-280px) scale(1,-1);}
    }
    @-webkit-keyframes div2moving
    {
        from  {-webkit-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(0px,5px);}
    }
    @-webkit-keyframes divy2moving
    {
        from  {-webkit-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(0px,-5px);}
    }
    @-webkit-keyframes ying2moving
    {
        from  {-webkit-transform: translate(0px,0px) scale(1,-1);}
        to    {-webkit-transform: translate(0px,-5px) scale(1,-1);}
    }
    #div3
    {
        left: 450px;
        top: 200px;
        width: 500px;
        height: 815px;
    }
    @-webkit-keyframes div3_in
    {
        from  {-webkti-transform: translate(0px,0px);}
        to    {-webkit-transform: translate(-450px,-200px);}
    }
    @-webkit-keyframes div3_move
    {
        from  {-webkit-transform: translate(-450px,-200px) scale(1);}
        to    {-webkit-transform: translate(-450px,-180px) scale(1.03);}
    }
    @-webkit-keyframes div3h_out
    {
        from  {-webkit-transform: translate(0px,0px);opacity: 1}
        to    {-webkit-transform: translate(-200px,-200px);opacity: 0}
    }
    @-webkit-keyframes ying3h_out
    {
        from  {-webkit-transform: translate(0px,0px);opacity: 0.6}
        to    {-webkit-transform: translate(-200px,200px);opacity: 0}
    }
    .wordspanh
    {
        width: 280px;
        /*height: 100px;*/
        color: #fff;
        font-family: bold;
        text-shadow: 1px 1px 2px #000;
        font-size: 25px;
        position: absolute;
        text-align: center;
        left: 59px;
        bottom: 10px;
        font-weight: bold;
    }
    .wordspanv
    {
        width: 280px;
        /*height: 100px;*/
        color: #fff;
        font-family: bold;
        text-shadow: 1px 1px 2px #000;
        font-size: 25px;
        position: absolute;
        text-align: center;
        left: 37px;
        bottom: 20px;
        font-weight: bold;
    }
    /*#ying3v,#ying3h
    {
        opacity: 0.6;
    }*/
</style>

<div id='container'>
    <img src='<?php  echo $skinurl;?>skin/zhongqiu2/bg.jpg'>


    <img id='water'>
    

    <img class='moon' src='<?php  echo $skinurl;?>skin/zhongqiu2/moon.png'>

    <div id='pagediv1'>
        <div id='pagetitle1' style='position:absolute;width:340px;height:150px;top:150px;'>
            <div style='position:absolute;width:340px;height:150px;overflow:hidden;display:table'>
                <div id='titlecontent1' style='width:340px;height:150px;vertical-align:middle;display:table-cell;text-align:center;font-size:30px;line-height:45px;color: #fff;'></div>
            </div>
        </div>
    </div>
    <div id='pagediv2'>
        <div id='pagetitle2' style='position:absolute;width:340px;height:150px;top:-150px;-webkit-transform: scale(1,-1)'>
            <div style='position:absolute;width:340px;height:150px;overflow:hidden;display:table'>
                <div id='titlecontent2' style='width:340px;height:150px;vertical-align:middle;display:table-cell;text-align:center;font-size:30px;line-height:45px;color: #fff;'></div>
            </div>
        </div>
    </div>

    <div id='div1' style='display:none'>
        <div id='div1h' class='divh'>
            <img id='img1h' class='img'>
            <div id='word1h' class='wordspanh'></div>
        </div>
        <div id='ying1h' class='divh'>
            <img id='imgy1h' class='img'>
            <div id='wordy1h' class='wordspanh'></div>
        </div>

        <div id='div1v' class='divv'>
            <img id='img1v' class='img'>
            <div id='word1v' class='wordspanv'></div>
        </div>
        <div id='ying1v' class='divv'>
            <img id='imgy1v' class='img'>
            <div id='wordy1v' class='wordspanv'></div>
        </div>
    </div>


    <div id='con2v'>
        <div id='div2v' class='divv'>
            <img id='img2v' class='img'>
            <div id='word2v' class='wordspanv'></div>
        </div>
    </div>
    <div id='cony2v'>
        <div id='ying2v' class='divv'>
            <img id='imgy2v' class='img'>
            <div id='wordy2v' class='wordspanv'></div>
        </div>
    </div>

    <div id='con2h'>
        <div id='div2h' class='divh'>
            <img id='img2h' class='img'>
            <div id='word2h' class='wordspanh'></div>
        </div>
    </div>
    <div id='cony2h'>
        <div id='ying2h' class='divh'>
            <img id='imgy2h' class='img'>
            <div id='wordy2h' class='wordspanh'></div>
        </div>
    </div>

    <div id='div3'>
        <div id='con3h'>
            <div id='div3h' class='divh'>
                <img id='img3h' class='img'>
                <div id='word3h' class='wordspanh'></div>
            </div>
        </div>
        <div id='cony3h'>
            <div id='ying3h' class='divh'>
                <img id='imgy3h' class='img'>
                <div id='wordy3h' class='wordspanh'></div>
            </div>
        </div>

        <div id='con3v'>
            <div id='div3v' class='divv'>
                <img id='img3v' class='img'>
                <div id='word3v' class='wordspanv'></div>
            </div>
        </div>
        <div id='cony3v'>
            <div id='ying3v' class='divv'>
                <img id='imgy3v' class='img'>
                <div id='wordy3v' class='wordspanv'></div>
            </div>
        </div>
    </div>


    <div id="pBmF7kZo5-an-obj-2"><div><img  height="57" width="56"  src="<?php  echo $skinurl;?>skin/zhongqiu2/ban2.png"></div></div>
    <img id='hua2'  src="<?php  echo $skinurl;?>skin/zhongqiu2/ban2.png">
    <div class='huadiv3'>
        <img id='hua3' src='<?php  echo $skinurl;?>skin/zhongqiu2/ban1.png'>
    </div>
    <img id='hua4' src='<?php  echo $skinurl;?>skin/zhongqiu2/ban2.png'>


    <img class='hehua' src='<?php  echo $skinurl;?>skin/zhongqiu2/hehua.png'>
    <img class='yulan' src='<?php  echo $skinurl;?>skin/zhongqiu2/hua.png'>
</div>

<script>

    function id(name)
    {
        return document.getElementById(name);
    }

    function watermoving()
    {
        var water = id('water');
        water_index = 0;
        tt = setInterval(function()
        {
            water_index ++;
            if(water_index == water_arr.length)
                water_index  = 0;
            water.src = water_arr[water_index];

        },100)
    }


    var water_arr = ['<?php  echo $skinurl;?>skin/zhongqiu2/O0001.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0002.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0003.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0004.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0005.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0006.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0007.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0008.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0009.jpg','<?php  echo $skinurl;?>skin/zhongqiu2/O0010.jpg'];



    function showtitle()
    {
        id('pagediv1').style.overflow = 'hidden';
        id('pagediv2').style.overflow = 'hidden';
        id('pagetitle1').style.webkitAnimation = 'title_in 2s ease-in-out both';
        id('pagetitle2').style.webkitAnimation = 'daoying_in 2s ease-in-out both';
        id('pagediv1').style.webkitAnimation = 'titlemoving 1s 2s linear infinite alternate';
        id('pagediv2').style.webkitAnimation = 'titlemoving1 1s 2s linear infinite alternate';

        id('titlecontent1').innerHTML = e_title;
        id('titlecontent2').innerHTML = e_title;

    }

    function kuxuan()
    {
        id('pagediv1').style.overflow = 'visible';
        id('pagediv2').style.overflow = 'visible';
        id('pagetitle1').style.webkitAnimation = 'title_out 1.5s ease-in both';
        id('pagetitle2').style.webkitAnimation = 'daoying_out 1.5s ease-in both';

        timeout[1] = setTimeout(show1,1500)
    }

    function show1()
    {
        id('div1').style.display = 'block';
        setImage('1');

        id('div1').style.webkitAnimation = 'div1_in 3.5s ease-out both';


        timeout[2] = setTimeout(show2,6000)
    }

    function show2()
    {
        setImage('2');

        id('div2v').style.webkitAnimation = '';
        id('ying2v').style.webkitAnimation = '';

        id('div2h').style.webkitAnimation = '';
        id('ying2h').style.webkitAnimation = '';

        id('div1').style.webkitAnimation = 'div1_out 2.5s ease-in both';

        timeout[3] = setTimeout(function()
        {
            id('div2v').style.webkitAnimation = 'div2v_in 3s ease-out both';
            id('ying2v').style.webkitAnimation = 'div2vy_in 3s ease-out both';

            id('div2h').style.webkitAnimation = 'div2h_in 3s ease-out both';
            id('ying2h').style.webkitAnimation = 'ying2h_in 3s ease-out both';



            // id('con2v').style.webkitAnimation = 'div2moving 1.2s 4 3s linear alternate';
            // id('cony2v').style.webkitAnimation = 'divy2moving 1.2s 4 3s linear alternate';

            // id('con2h').style.webkitAnimation = 'div2moving 1.2s 4 3s linear alternate';
            // id('cony2h').style.webkitAnimation = 'divy2moving 1.2s 4 3s linear alternate'; 

        },2500)

        id('div3').style.webkitAnimation = '';
        id('con3h').style.webkitAnimation = '';
        id('cony3h').style.webkitAnimation = '';
        id('con3v').style.webkitAnimation = '';
        id('cony3v').style.webkitAnimation = '';
        id('div3h').style.webkitAnimation = '';
        id('ying3h').style.webkitAnimation = '';
        id('div3v').style.webkitAnimation = '';
        id('ying3v').style.webkitAnimation = '';

        timeout[4] = setTimeout(show3,10000)
    }

    function show3()
    {
        setImage('3');
        id('div2h').style.webkitAnimation = 'div2h_out 2.5s ease-in both';
        id('ying2h').style.webkitAnimation = 'ying2h_out 2.5s ease-in both';

        id('div2v').style.webkitAnimation = 'div2v_out 2.5s ease-in both';
        id('ying2v').style.webkitAnimation = 'div2vy_out 2.5s ease-in both';



        id('div3h').style.webkitAnimation = 'div2h_in 4s ease-out both';
        id('ying3h').style.webkitAnimation = 'ying2h_in 4s ease-out both';
        id('div3v').style.webkitAnimation = 'div2v_in 4s ease-out both';
        id('ying3v').style.webkitAnimation = 'div2vy_in 4s ease-out both';
        id('div3').style.webkitAnimation = 'div3_in 4s ease-out both';

        // setTimeout(function()
        // {
        //     id('div3').style.webkitAnimation = 'div3_move 2s 2 4s linear alternate';
        // },4000)


        timeout[5] = setTimeout(show4,8000)

    }

    function show4()
    {
        setImage('1');
        id('con3h').style.webkitAnimation = 'div3h_out 3s ease-in both';
        id('cony3h').style.webkitAnimation = 'ying3h_out 3s ease-in both';

        id('con3v').style.webkitAnimation = 'div3h_out 3s ease-in both';
        id('cony3v').style.webkitAnimation = 'ying3h_out 3s ease-in both';

        id('div1').style.webkitAnimation = 'div1_in 3.5s 2.5s ease-out both';

        timeout[6] = setTimeout(show2, 10000);
    }



    var image_size_width=[];
    var image_size_height=[];
    var image_url_index=0;
    var have_num = 0;
    var error_num = 0;
    var canshow = true;
    var reshow = false;
    var delaytime = 5000;
    var timeout = [];
    var showfont = false;
    var imgtype = 0;

    function load_images()
    {
        reshow = false;
        image_size_width=[];
        image_size_height=[];
        Onload_imgs_url=[];
        image_url_index=0;
        have_num = 0;
        error_num = 0;
        begin_titletime = new Date();
        begin_titletime = begin_titletime.getTime();
        canshow = true;
        showtitle();
        bl_keepload = 'first';
        // loading_first(); 
        step_load();
    }

    function image_onerror(event)
    {
        var img = event.target;
        var index = img.index;
        if(index<step_loadnum)
            error_num ++;
        Onload_imgs_url[index] = 'not find';

        if((have_num+error_num >= step_loadnum || slider_images_url.length == (have_num+error_num)) && canshow == true)
        {
            reshow = false;
            canshow =false;
            if(have_num == 0)
                return;
            var end_titletime = new Date();
            end_titletime = end_titletime.getTime();
            var dis_titletime = Math.abs(end_titletime-begin_titletime);
            if(dis_titletime>delaytime)
            {
                kuxuan();
            }
            else
            {
                dis_titletime = delaytime- dis_titletime;
                timeout[0] = setTimeout(function()
                {
                    kuxuan();
                },dis_titletime);
            }
        }
    }

    function image_onload(event)
    {
        if(reshow == true)
            return;

        var img = event.target;
        var index = img.index;

        if(index<step_loadnum)
        {
            have_num++;
        }
        Onload_imgs_url[index] = img.src;
        image_size_height[index] = img.height;
        image_size_width[index] = img.width;

        console.log(Onload_imgs_url[index]);

        if((have_num + error_num >= step_loadnum || slider_images_url.length == (have_num+error_num)) && canshow == true)
        {
            reshow = false;
            canshow =false;
            if(have_num == 0)
                return;
            var end_titletime = new Date();
            end_titletime = end_titletime.getTime();
            var dis_titletime = Math.abs(end_titletime-begin_titletime);
            if(dis_titletime>delaytime)
            {
                kuxuan();
            }
            else
            {
                dis_titletime = delaytime- dis_titletime;
                timeout[0] = setTimeout(function()
                {
                    kuxuan();
                },dis_titletime);
            }

        }
    }
    //每次执行加载后5张图片
    var bl_keepload = 'first';
    var step_loadnum = 5;
    function step_load()
    {
        var load_num = 0
        //初步加载X张
        if(image_url_index  == 0 && bl_keepload == 'first')
        {
            console.log('loading continue');
            if(slider_images_url.length > step_loadnum)
            {
                load_num = step_loadnum;
                bl_keepload = 'next';
            }
            else
            {
                load_num = slider_images_url.length;
                bl_keepload = 'end';
            }
            for(var i = 0; i< load_num; i++)
            {
                var img=new Image();
                img.index=i;
                img.src=slider_images_url[i];
                img.onload=image_onload;
                img.onerror= image_onerror;
                Onload_imgs_url[i] = 'loading';
            }
        }
        else if(bl_keepload == 'end')
        {
            return;
        }
        else
        {
            console.log('loading continue');
            if(slider_images_url.length - image_url_index >step_loadnum*2)
            {
                load_num = step_loadnum;
            }
            else
            {
                load_num = slider_images_url.length - image_url_index - step_loadnum;
                bl_keepload = 'end';
            }
            for(var i = image_url_index +step_loadnum; i< image_url_index + step_loadnum + load_num; i++)
            {
                var img=new Image();
                img.index=i;
                img.src=slider_images_url[i];
                img.onload=image_onload;
                img.onerror= image_onerror;
                Onload_imgs_url[i] = 'loading';
            }
        }
    }

    function setImage(idname)
    {
        if(reshow == true)
            return;

        while(Onload_imgs_url[image_url_index] == 'not find' || Onload_imgs_url[image_url_index] == 'loading')
        {
            if(image_url_index % step_loadnum == 0)
            {
                step_load();
            }
            image_url_index++;
            if(image_url_index == Onload_imgs_url.length)
                image_url_index = 0;
        }

        if(image_url_index % step_loadnum == 0)
        {
            step_load();
        }
        var img_bili = image_size_width[image_url_index]/image_size_height[image_url_index];

        var hname = idname + 'h';
        var vname = idname + 'v';

        if(img_bili > 1)
        {

            var img = id('img'+hname);
            var imgy = id('imgy' +hname);

            var word = id('word'+hname);
            var wordy = id('wordy' +hname);

            var div = id('div' + hname);
            var ying = id('ying' + hname);

            var div1 = id('div' + vname);
            var ying1 = id('ying' + vname);

            width = 400;
            height = 270;

        }
        else
        {
            var img = id('img'+vname);
            var imgy = id('imgy' +vname);

            var word = id('word'+vname);
            var wordy = id('wordy' +vname);

            var div = id('div' + vname);
            var ying = id('ying' + vname);

            var div1 = id('div' + hname);
            var ying1 = id('ying' + hname);

            width = 360;
            height = 540;
        }

        div.style.display = 'block';
        ying.style.display = 'block';
        div1.style.display = 'none';
        ying1.style.display = 'none';

        var str = words[get_pid(Onload_imgs_url[image_url_index])];
        if(str != undefined)
        {
            word.innerHTML = str;
            wordy.innerHTML = str;
        }
        else
        {
            word.innerHTML = '';
            wordy.innerHTML = '';
        }
        img.src = Onload_imgs_url[image_url_index];
        imgy.src = Onload_imgs_url[image_url_index];


        if(img_bili > (width/height))
        {
            img.style.top = '0px';
            img.style.height = height + 'px';
            img.style.width = height*img_bili + 'px';
            img.style.left = -((height*img_bili-width)/2)+'px';

            imgy.style.top = '0px';
            imgy.style.height = height + 'px';
            imgy.style.width = height*img_bili + 'px';
            imgy.style.left = -((height*img_bili-width)/2)+'px';
        }
        else
        {
            img.style.left = '0px';
            img.style.width = width+'px';
            img.style.height = width/img_bili + 'px';
            img.style.top = -((width/img_bili-height)/2) + 'px';

            imgy.style.left = '0px';
            imgy.style.width = width+'px';
            imgy.style.height = width/img_bili + 'px';
            imgy.style.top = -((width/img_bili-height)/2) + 'px';
        }

        image_url_index ++;
        if(image_url_index == Onload_imgs_url.length)
            image_url_index = 0;

    }

    call_me(loading);

    function loading()
    {
        watermoving();
        load_images();

    }


    function reload_scene()
    {
        clearnode();
        reshow = true;
        setTimeout(load_images,100);
    }

    function clearnode()
    {

        for(var i = 0; i<timeout.length; i++)
        {
            clearTimeout(timeout[i])
        }

        var itemlist = ['div1h','div1v','ying1h','ying1v','div2h','div2v','ying2h','ying2v','div3h','div3v','ying3v','ying3h'];

        for(var i =0; i<itemlist.length;i++)
        {
            id(itemlist[i]).style.display = 'none';
        }

        id('pagediv1').style.overflow = 'hidden';
        id('pagediv2').style.overflow = 'hidden';
        id('pagetitle1').style.webkitAnimation = '';
        id('pagetitle2').style.webkitAnimation = '';
        id('pagediv1').style.webkitAnimation = '';
        id('pagediv2').style.webkitAnimation = '';
        id('div1').style.webkitAnimation = '';

        id('div2v').style.webkitAnimation = '';
        id('ying2v').style.webkitAnimation = '';
        id('div2h').style.webkitAnimation = '';
        id('ying2h').style.webkitAnimation = '';

        id('div3').style.webkitAnimation = '';
        id('con3h').style.webkitAnimation = '';
        id('cony3h').style.webkitAnimation = '';
        id('con3v').style.webkitAnimation = '';
        id('cony3v').style.webkitAnimation = '';
        id('div3h').style.webkitAnimation = '';
        id('ying3h').style.webkitAnimation = '';
        id('div3v').style.webkitAnimation = '';
        id('ying3v').style.webkitAnimation = '';


    }
    var get_pid = function(url)
    {
        var index1 = url.indexOf("?");
        if(index1 != -1)
        {
            url = url.substr(0, index1);
        }
        return url.toString().substr(url.lastIndexOf("/") + 1);
    }

</script>
<!--模板结束-->