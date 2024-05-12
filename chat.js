function getCurrentTime(){
    var now = new Date();
    var hh = now.getHours();
    var min = now.getMinutes();
    var ampm = (hh>=12)?'PM':'AM';
    hh = hh%12;
    hh = hh?hh:12;
    hh = hh<23?'0'+hh:hh;
    min = min<23?'0'+min:min;
    var time = hh+":"+min+" "+ampm;
    return time;
 }
 function send_msg(){
    jQuery('.start_chat').hide();
    var txt=jQuery('#input-me').val();
    var html='<div class="msg right-msg"><div class="msg-img" style="background-image: url(./imgs/client.png)"></div><div class="msg-bubble"><div class="msg-info"><div class="msg-info-name">Client</div><div class="msg-info-time">'+getCurrentTime()+'</div></div><div class="msg-text">'+txt+'</div></div></div>';

    jQuery('.messages-list').append(html);
    jQuery('#input-me').val('');
    if(txt){
        jQuery.ajax({
            url:'get_bot_message.php',
            type:'post',
            data:'txt='+txt,
            success:function(result){



                var html='<div class="msg left-msg"><div class="msg-img" style="background-image: url(./imgs/admin.jpg)"></div><div class="msg-bubble"><div class="msg-info"><div class="msg-info-name">CONSULTANT</div><div class="msg-info-time">'+getCurrentTime()+'</div></div><div class="msg-text">'+result+'</div></div></div>';

                
                jQuery('.messages-list').append(html);
                jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
            },
            
        });
    }
 }