
<?php
//require_once "./jssdk/jssdk.php";
//$jssdk = new JSSDK("wxec922c3d4a72e663", "5713099035abeb3bed67981b1b97d261");
//$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>

<head>
  <title>我们结婚啦</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=320, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="description" itemprop="description" content="我们的幸福，有你的见证">
  <meta itemprop="name" content="我们结婚啦">

  <style>#card {transform-origin: top center;}</style>

  <link rel="stylesheet" href="https://cdn.yehui.site/z/css/index.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.yehui.site/z/css/all.css?v=1.1.2" />

  <script src="https://cdn.yehui.site/z/js/card-view.js?_=112" type="text/javascript" charset="utf-8"></script>
  <script src="https://cdn.yehui.site/z/js/mdata.js?s=112118" type="text/javascript" charset="utf-8"></script>

</head>

<body>
<div class="LoadIngBox">

  <div class="PageLoadBox">
    <div class="LoadBox">
      <canvas id="LoadCanvas" width="120" height="120"></canvas>
      <div class="loadImg">
        <img src="https://cdn.yehui.site/z/img/logo.png" />
      </div>
    </div>
    <p class="loadTxt"></p>

  </div>
</div>

<div id="card-music"><img src="https://cdn.yehui.site/z/img/music.png" style="width: 35px;" /></div>
<div class="h-list-Photo-l swiper-container" id="card"></div>
<script type="text/javascript">
  var data = mdata;

  var bg = document.getElementById('LoadCanvas');
  var ctx = bg.getContext('2d');
  var circ = Math.PI * 2;
  var quart = Math.PI / 2;
  var imd = null;
  var circ = Math.PI * 2;
  var quart = Math.PI / 2;

  ctx.beginPath();
  ctx.strokeStyle = '#ec1f2e';
  ctx.lineCap = 'square';
  ctx.closePath();
  ctx.fill();
  ctx.lineWidth = 10.0;

  imd = ctx.getImageData(0, 0, 240, 240);

  function draw(current) {
    ctx.putImageData(imd, 0, 0);
    ctx.beginPath();
    ctx.arc(60, 60, 55, -(quart), ((circ) * current) - quart, false);
    ctx.stroke();
  }
  var t = 0;
  var now = 0
  var timer = null;
  var loadTxt = document.querySelector('.loadTxt');

  function loadCanvas() {
    timer = setInterval(function() {
      t += (now - t) / 20;
//      console.log(t)
      if(t >= 1) {
        clearTimeout(timer)
        t = 1;
        $('.LoadIngBox').remove()
      }
      draw(t);
      loadTxt.innerHTML = Math.floor(t * 100) + '%'
    }, 20);
  }


  function createLoader(list, pre) {
    pre = pre ? parseInt(pre) : 0

    pre += list.length - 1

    var loader = function (n) {
      now += n / pre
    }

    list.map(function (t) {
      var img = new Image()
      img.src = t
      img.onload = img.onerror = function () {loader(1)}
    })

    loadCanvas();

    return loader
  }

  var list = data && data[0] && data[0].elements ? data[0].elements.filter(function (t) {
    return t && t.content && /<img.+?src="(.+?)"/.test(t.content)
  }).map(function (t) {
    return t.content.match(/<img.+?src="(.+?)"/)[1]
  }) : [];

  var loader = createLoader(list, 20)
</script>

<div class="myview">

  <div ui-view></div>
</div>



<script src="https://cdn.yehui.site/z/js/jquery.min.js" type="text/javascript" charset="utf-8" onload="loader(5)"></script>

<link rel="stylesheet" href="https://cdn.yehui.site/z/css/card-view.css?t=asdf" />
<link rel="stylesheet" href="https://cdn.yehui.site/z/css/swiper.min.css" />
<link rel="stylesheet" href="https://cdn.yehui.site/z/css/origin.min.css" />
<script src="js/swiper.min.js" onload="loader(11)"></script>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" onload="loader(4)"></script>


<script>
  window.MODE = {
    visit_mode: ['', '', '', '', '', '', '', ''][0],
    effect: ['slide', 'fade', 'coverflow', 'flip'][0],
    autoplay: !!window ? 3 * 3000 : 0,
    loop: true
  }


    var card = document.getElementById('card');
    window.swiper = Card.render(data, card, MODE);
    card.style.transform = 'scale(' + window.innerWidth/320 + ',' + window.innerHeight/486 + ')'


  var player = document.createElement('audio');
  var song = {
    "src":"https://cdn.yehui.site/z/d.mp3"
  };
  if (song) {
    player.loop = true;
    player.preload = true;
    player.src = song.src;
    $('#card-music').click(function () {
      player.paused ? player.play() : player.pause()
    })
  }

  $(player)
    .on('play', function () {
      $('#card-music').addClass('play')
    })
    .on('pause', function () {
      $('#card-music').removeClass('play')
    })

  $(function () {
    player.play();

    $('#card').one('touchstart',function(){
      player.play();
    });
  })







</script>

</body>

</html>