<html><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type="text/javascript" src="/js/lib/dummy.js"></script>
  
  <link rel="stylesheet" type="text/css" href="/css/normalize.css">
  
  
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
  <style type="text/css">
    #menu {
    background: #aaa;
    position: relative;
    width: 200px;
    height: 200px;
    margin: 0 auto;
    overflow: hidden;
    border-radius: 100px;
    -moz-border-radius: 100px;
    -webkit-border-radius: 100px;
}
#center {
    position: absolute;
    left: 70px;
    top: 70px;
    width: 60px;
    height: 60px;
    z-index: 10;
    background: #eee;
    background: linear-gradient(top, #eee, #aaa);
    background: -moz-linear-gradient(top, #eee, #aaa);
    background: -webkit-gradient(linear, left top, left bottom, from(#eee), to(#aaa));
    border-radius: 30px;
    -moz-border-radius: 30px;
    -webkit-border-radius: 30px;
}
#center a {
    display: block;
    width: 100%;
    height: 100%
}
.item {
    background: #aaa;
    overflow: hidden;
    position: absolute;
    width: 100px;
    height: 100px;
    transform-origin: 100% 100%;
    -moz-transform-origin: 100% 100%;
    -webkit-transform-origin: 100% 100%;
    transition: background .5s;
    -moz-transition: background .5s;
    -webkit-transition: background .5s;
    -o-transition: background .5s;
    -ms-transition: background .5s;
}
.item:hover {
    background: #eee
}
.item1 {
    z-index: 1;
    transform: rotate(60deg);
    -moz-transform: rotate(60deg);
    -webkit-transform: rotate(60deg);
}
.item2 {
    z-index: 2;
    transform: rotate(120deg);
    -moz-transform: rotate(120deg);
    -webkit-transform: rotate(120deg);
}
.item3 {
    z-index: 3;
    transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
}
.item4 {
    z-index: 4;
    transform: rotate(240deg);
    -moz-transform: rotate(240deg);
    -webkit-transform: rotate(240deg);
}
.item5 {
    z-index: 5;
    transform: rotate(300deg);
    -moz-transform: rotate(300deg);
    -webkit-transform: rotate(300deg);
}
.item6 {
    border: none;
    position: absolute;
    z-index: 6;
    transform: rotate(-30deg);
    -moz-transform: rotate(-30deg);
    -webkit-transform: rotate(-30deg);
}
#wrapper6 {
    position: absolute;
    width: 100px;
    height: 100px;
    overflow: hidden;
    transform-origin: 100% 100%;
    -moz-transform-origin: 100% 100%;
    -webkit-transform-origin: 100% 100%;
}
.item1 .content {
    left: -10px;
    top: 15px;
    transform: rotate(-60deg);
    -moz-transform: rotate(-60deg);
    -webkit-transform: rotate(-60deg);
}
.item2 .content {
    left: -11px;
    top: 16px;
    transform: rotate(-120deg);
    -moz-transform: rotate(-120deg);
    -webkit-transform: rotate(-120deg);
}
.item3 .content {
    left: -7px;
    top: 12px;
    transform: rotate(-180deg);
    -moz-transform: rotate(-180deg);
    -webkit-transform: rotate(-180deg);
}
.item4 .content {
    left: -5px;
    top: 18px;
    transform: rotate(-240deg);
    -moz-transform: rotate(-240deg);
    -webkit-transform: rotate(-240deg);
}
.item5 .content {
    left: -10px;
    top: 20px;
    transform: rotate(-300deg);
    -moz-transform: rotate(-300deg);
    -webkit-transform: rotate(-300deg);
}
.item6 .content {
    left: 20px;
    top: -10px;
    transform: rotate(30deg);
    -moz-transform: rotate(30deg);
    -webkit-transform: rotate(30deg);
}
.content, .content a {
    width: 100%;
    height: 100%;
    text-align: center
}
.content {
    position: absolute;
}
.content a {
    line-height: 100px;
    display: block;
    position: absolute;
    text-decoration: none;
    font-family: 'Segoe UI', Arial, Verdana, sans-serif;
    font-size: 20px;
    text-shadow: 1px 1px #eee;
    text-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 5px #fff
}
.display-target {
    display: none;
    text-align: center;
    opacity: 0;
}
.display-target:target {
    display: block;
    opacity: 1;
    animation: fade-in 1s;
    -moz-animation: fade-in 1s;
    -webkit-animation: fade-in 1s;
    -o-animation: fade-in 1s;
    -ms-animation: fade-in 1s;
}
@keyframes fade-in {
    from { opacity: 0 }
    to { opacity: 1 }
}
@-moz-keyframes fade-in {
    from { opacity: 0 }
    to { opacity: 1 }
}
@-webkit-keyframes fade-in {
    from { opacity: 0 }
    to { opacity: 1 }
}
@-o-keyframes fade-in {
    from { opacity: 0 }
    to { opacity: 1 }
}
@-ms-keyframes fade-in {
    from { opacity: 0 }
    to { opacity: 1 }
}
  </style>
  


<script type="text/javascript">//<![CDATA[ 


//]]>  

</script>


</head>
<body>
      <div id="menu">
        <div class="item1 item">
            <div class="content"><a href="#one">one</a></div>
        </div>
        <div class="item2 item">
            <div class="content"><a href="#two">two</a></div>
        </div>
        <div class="item3 item">
            <div class="content"><a href="#three">three</a></div>
        </div>
        <div class="item4 item">
            <div class="content"><a href="#four">four</a></div>
        </div>
        <div class="item5 item">
            <div class="content"><a href="#five">five</a></div>
        </div>
        <div id="wrapper6">
            <div class="item6 item">
                <div class="content"><a href="#six">six</a></div>
            </div>
        </div>
        <div id="center">
            <a href="#"></a>
        </div>
    </div>
    <div id="one" class="display-target">Welcome!<br>This changing effect is done by ...</div>
    <div id="two" class="display-target">... having <code>&lt;div&gt;</code>s with <code>id</code>s ... </div>
    <div id="three" class="display-target">... that have the style <code>display: none</code> and the style
<pre style="text-align: left">:target {
    display: block;
}</pre>so that these messages appear when there is a hash tag like <code>#three</code> (look at the address bar!)</div>
    <div id="four" class="display-target">Look at the source of this page ...</div>
    <div id="five" class="display-target">... to see how the circular menu works.</div>
    <div id="six" class="display-target">By Shaquin Trifonoff</div>
<p><a href="http://stackoverflow.com/users/1421049/shaquin-trifonoff" title="My profile on Stack Overflow">By Shaquin Trifonoff</a></p>

  





</body></html>