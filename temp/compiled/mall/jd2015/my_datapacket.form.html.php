<?php echo $this->fetch('member.header.html'); ?>
<style>
.table .ware_text {width:290px;}
.btn-create a{display:inline-block;border:1px #ddd solid;width:200px; height:30px; line-height:30px; text-align:center; text-decoration:none; background:#f1f1f1;color:#3e3e3e;}
.btn-create a:hover{background:#fff;}
</style>
<div class="content">
    <div class="totline">
	</div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">
            <div class="public table">
            	<div class="btn-create">
                	<a  href="<?php echo url('app=my_datapacket&act=create&goods=store_all'); ?>">本店商品生成数据包</a>
                </div>
            </div>
            <div class="wrap_bottom"></div>
        </div>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<iframe id='iframe_post' name="iframe_post" src="about:blank" frameborder="0" width="0" height="0"></iframe>
<?php echo $this->fetch('footer.html'); ?>