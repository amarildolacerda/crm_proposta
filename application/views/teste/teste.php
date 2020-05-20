<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Document</title>
</head>
<body>
    <p id="top">Projeto</p>

<div class="post">1</div>
<div class="post">2</div>
<div class="post">3</div>
<div class="post">4</div>
<div class="post">5</div>
<div class="post">6</div>
<div class="post">7</div>
<div class="post">8</div>
<div class="post">9</div>
<div class="post">7</div>
<div class="post">8</div>
<div class="post">9</div>
<div class="post">10</div>
<div class="post">11</div>
<div class="post">12</div>
<div class="post">13</div>
<div class="post">14</div>
<div class="post">15</div>

<a href="#" id="loadmore">Mais</p>

<a href="#" id="totop">Para o topo</a> 
</body>
</html>

<script>
$(function () {
  num_posts_show = 3;
  speed_to_top = 1000; // in ms
  
    $(".post").slice(0, num_posts_show).show();
    $("#loadmore").on('click', function (e) {
        e.preventDefault();
        $("div:hidden").slice(0, num_posts_show).slideDown();
        if ($("div:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});

$('#totop').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, speed_to_top);
    return false;
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('#totop').fadeIn();
    } else {
        $('#totop').fadeOut();
    }
});
</script>