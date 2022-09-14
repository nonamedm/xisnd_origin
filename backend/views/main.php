<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
        <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">

    <div class="wrapper wrapper-content animated fadeInRight">
        <div style="padding: 1em; " >
            <div class="col-sm-12">
                <h3>Content Manage System v-1.2 </h3>
			</div>
		</div>
	</div>
        </div>
        <!--右侧部分结束-->
    </div>
<?php
$this->load->view('footer');
?>
    <!-- 自定义js -->

    <script type="text/javascript" src="<?php echo base_url(); ?>resource/admin/js/index.js"></script>

    <!-- 第三方插件 -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/pace/pace.min.js"></script>