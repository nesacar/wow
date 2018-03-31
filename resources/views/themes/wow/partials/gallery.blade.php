<?php
if(empty($photos)) return;

$firstImg = $photos->last();
?>

<div class="gallery-images">
    <div class="relative">

        @php $bannerIndex = "PR1"; @endphp
        @include('themes.'.$theme.'.partials.revive')

        @php $bannerIndex = "PR2"; @endphp
        @include('themes.'.$theme.'.partials.revive')

        @php $bannerIndex = "MPR1"; @endphp
        @include('themes.'.$theme.'.partials.revive')

        <a href="#"><span class="left-arrow" onClick='return lgShift(-1)'></span></a>
        <a href="#"><span class="right-arrow" onClick='return lgShift(1)'></span></a>

        <div id="bigFrame">
            <img id="bigFrameImg" src="{{ Imagecache::get($post->image, '600x400')->src }}" alt="{{ $post->title }}">
        </div>
    </div><!-- relative -->
    @if(count($photos))
    <ul class="thumbs">
        @foreach($photos as $photo)
        <li>
            <a class='gallery_thumbs' href="{{ Imagecache::get($photo->file_path, '600x400')->src }}" onClick="return false">
                <img src="{{ Imagecache::get($photo->file_path, '93x63')->src }}" alt="{{ $post->title }}" />
            </a>
        </li>
        @endforeach
    </ul>
    @endif

</div>

<script type="text/javascript" src="{{ url('themes/'.$theme.'/js/gclk.js') }}"></script>
<script type="text/javascript">
    var myElement = document.getElementById('bigFrameImg');
    var mc = new Hammer(bigFrameImg);
    // var e = $('.thumbs').find('li').length;
    var items = $('.thumbs').find('li');
    var leng = $('.thumbs li').length;
    var first = items.eq(1);
    var next = items.next();
    var br = 0;
    mc.on('swipeleft', function(ev) {
        console.log(leng);
        if(br === 0) {
            br = leng;
        } else {
            br--;
        }

        console.log('levo');

        $('#bigFrameImg').attr('src',items.eq(br).find('.gallery_thumbs').attr('href'));

    });

    mc.on('swiperight', function(ev) {
        if(br == leng) {
            br = 0;
        } else {
            br++;
        }
        console.log('desno');

        $('#bigFrameImg').attr('src',items.eq(br).find('.gallery_thumbs').attr('href'));
    });


    var lgthumbind = '{{ count($photos)-1 }}';
    var lgthumblen = '{{ count($photos) }}';
    function lgShift(direction){
        var newind = (lgthumblen + lgthumbind + direction) % lgthumblen;
        $('.gallery_thumbs:eq('+newind+')').click();
        return false;
    }

    $(".gallery_thumbs").click(function () {
        var imgbig = $(this).attr('src');
        $('#bigFrameImg').attr('src',$(this).attr('href'));

        var gap = ($(window).height() + $('.stick').height() - $('#bigFrameImg').height()) / 3;
        $('body').animate({scrollTop : $('#bigFrameImg').offset().top - gap},800);
        lgthumbind = $('.gallery_thumbs').index(this);
        @if(rand(1,100) < 0) gclk($('#bigFrame')); @endif
        return false;
    });
</script>
