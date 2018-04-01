<?php
// IF SOMEONE CLICK ON 'x' 2 TIMES, THE POPUP WILL NOT SHOW AGAIN... (Gile)
//if(@$_SESSION['newsletter_close_count']>0) return;
?>
<div id="newsletterPopup">
    <div style='padding: 0 3px 0 0; text-align:right'><a href='#' onclick="return closeNLPopup()" style="color: #008988; font-size: 15.5px;">X</a></div>
    <div style='padding:0; margin:50px 0 0 13px;text-align:left'>

        <form method="post" action="{{ url('subscribe') }}" style="margin:0px;">
            {{ csrf_field() }}
            <input type="text" onfocus="blank(this)" onblur="unblank(this)"  name="email" value="Your e-mail" />
            <input type="submit" name="submit" value="Send" />
            <p style="color: #008988; font-size: 12px; margin-top: 5px; margin-left: -15px;">Get your weekly dose of WowMalta</p>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $("#newsletterPopup").slideDown(800);
        }, 20000);
    });
    function closeNLPopup(){
        $("#newsletterPopup").slideUp(500);
        //$.post("{{ url('newsletter/close') }}",{newsletter_close:1},function(data){});
        return false;
    }
</script>