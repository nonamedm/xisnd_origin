<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-4">
                <div id="nestable-menu">
                    <button type="button" data-action="expand-all" class="btn btn-white btn-sm">展开所有</button>
                    <button type="button" data-action="collapse-all" class="btn btn-white btn-sm">收起所有</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>NestTable Tree</h5>
                    </div>
                    <div class="ibox-content">

                        <p class="m-b-lg">
                            <strong>Nestable</strong> 树形数据。
                        </p>

                        <div class="dd" id="nestable">
                                <ol class="dd-list">
                                <li class="dd-item" data-id="1" >
                                    <div class="dd-handle">1 - 列表
                                    </div>
                                    
                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
                                    </span>
                                    
                                </li>
                                <li class="dd-item" data-id="2">
                                    <div class="dd-handle">2 - 列表</div>
                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
									 </span>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="3" >
                                            <div class="dd-handle">3 - 列表</div>
                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
									 </span>
                                        </li>
                                        <li class="dd-item" data-id="4" >
                                            <div class="dd-handle">4 - 列表</div>
                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
									 </span>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="5">
                                    <div class="dd-handle">5 - 列表</div>

                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
									 </span>

                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="6">
                                            <div class="dd-handle">6 - 列表</div>
                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
									 </span>
                                        </li>
                                        <li class="dd-item" data-id="7">
                                            <div class="dd-handle">7 - 列表</div>
                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
									 </span>
                                        </li>
                                    </ol>
                                </li>

                                <li class="dd-item" data-id="8">
                                    <div class="dd-handle">8 - 列表</div>
                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
									</span>
                                </li>

                                <li class="dd-item" data-id="9">
                                    <div class="dd-handle">9 - 列表</div>
                                    <span class="pull-right" style="position: absolute; top:5px; right: 5px;">
                                    <button type="button" class="btn btn-primary btn-xs text">修改</button>
                                    <button type="button" class="btn btn-danger btn-xs">删除</button>
                                    <button type="button" class="btn btn-success btn-xs">其他</button>
									</span>
                                </li>

                            </ol>
                        </div>
                        <div class="m-t-md">
                            <h5>数据：</h5>
                        </div>
                        <textarea id="nestable-output" class="form-control"></textarea>
                    </div>
                </div>
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

	<script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>

    <!-- 第三方插件 -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/pace/pace.min.js"></script>

    <!-- Nestable List -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/nestable/jquery.nestable.js"></script>
    <script>
        $(document).ready(function () {



            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                } else {
                    output.val('浏览器不支持');
                }
            };


$(".text").click(function(){
				 /*
				var now = $(this).parent().parent().attr("data-id");
				*/
				/*itemNodeName*/

                  console.log($(this).parent().parent().data());
				
				 var arr = new Array();
				 var now_fid=$(this).parent().parent().parent().parent().attr("data-id");
				 var now_id = $(this).parent().parent().attr("data-id");
				 var now_index =$(this).parent().parent().index();
				 if(now_fid == undefined){
					 arr.push(["id",now_id,"fid",0,"now_index",now_index+1]);
				 }else{
					 arr.push(["id",now_id,"fid",now_fid,"now_index",now_index+1]);
				 }
				 
				 
    $(this).parent().parent().find("li").each(function(){
		
	    var pId = $(this).attr("data-id");
		var fid = $(this).parent().parent().attr("data-id");
		var index_this = $(this).index();
		arr.push(["id",pId,"fid",fid,"now_index",index_this+1]);

    });
				 
				 console.log(arr);
		
			 });

            // activate Nestable for category
            $('#nestable').nestable({
                group: 1
            }).on('change', updateOutput);
           
            // output initial serialised data
            updateOutput($('#nestable').data('output', $('#nestable-output')));
           
        });
    </script>