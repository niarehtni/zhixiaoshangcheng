<style>
    .order_notice{width:250px; display:block;position:fixed;bottom:10px;right:20px;  overflow-x:hidden; overflow-y:scroll; font-family: microsoft yahei;z-index: 9999;}
    .order_notice_detail{border:2px solid #b10000;border-radius:4px;margin-bottom: 8px;background-color: #fff}
    .order_notice_top{background-color: #b10000;height:25px;padding: 0 8px;line-height: 25px;}
    .order_notice_top span{float: left;color:#fff}
    .order_notice_top a {float: right;margin-left: 10px;text-decoration: none;color: #fff}
    .order_notice_bottom{margin: 10px;}
    .order_notice_bottom a{text-decoration: none;line-height: 20px;}
    .order_notice_bottom a:hover{color:red}
</style>
<div class="order_notice">
</div>

<script language="javascript">
    <?php if ($this->_var['visitor']['user_id']): ?>
    setInterval("load_order_information()",5000);
    <?php endif; ?>
    function load_order_information()
    {
        $.getJSON('index.php?app=default&act=ajaxorder', function(result) {
            if (result) {
                if(result.order_log_num > 0){
                    var i = 0;
                    var data = result['list'];
                    $(".order_notice").html('');
                    for (i = 0; i < result.order_log_num; i++){
                        var html = '';
                        html += '<div class="order_notice_detail" id="order_log_'+data[i]['log_id']+'"><div class="order_notice_top"><span>'+data[i]['notice']+'</span><a href="javascript:void()"  onclick="view_order_log(\''+data[i]['url']+'\',\''+data[i]['log_id']+'\');" target="_blank">查看</a><a href="javascript:del_order_log(\''+data[i]['log_id']+'\')">忽略</a></div><div class="order_notice_bottom"><a href="javascript:void()"  onclick="view_order_log(\''+data[i]['url']+'\',\''+data[i]['log_id']+'\');" target="_blank">'+data[i]['title']+'</a></div></div>';
                        html += '<audio id="music" src="<?php echo $this->res_base . "/" . 'tishi.mp3'; ?>" autoplay="autoplay"></audio>';
                        $(".order_notice").append(html);
                    }
                }
            }
        });
    }
    
    function del_order_log(log_id)
    {
        var tr = $('#order_log_' + log_id);
        $.getJSON('index.php?app=default&act=ajaxorderdrop&log_id=' + log_id, function(result) {
            if(result.done=='true'){
                tr.remove();
                load_order_information();
            }else{
                tr.remove();
                load_order_information();
            }
        });
    }
    
    function view_order_log(url,log_id)
    {
        var tr = $('#order_log_' + log_id);
        tr.remove();
		window.location.href = url;
        //window.open(url);
    }
    
</script>