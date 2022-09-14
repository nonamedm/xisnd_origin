
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
<!--右侧部分开始-->
<div id="page-wrapper">
<!-- data table begin-->
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5 style="width:100%"><span style="margin-right: 100px;">주요연혁</span>
                        <?php foreach($cate_date as $v):?>
                            <a href="<?php echo site_url('article_date/article_date_list/'.$v['category_date_index']);?>"><button type="button" class="btn btn-success" <?php if($id['category_index'] == $v['category_date_index']):?>style="background-color:#23b7e5;border-color:#23b7e5;"<?php endif;?>><?php echo $v['category_date_name']?></button></a>
                        <?php endforeach; ?>
                        <a href="<?php echo site_url('article_date/add_article_date');?>" style='float:right;margin-right:10px;'><button type="button" class="btn btn-primary btn-sm">add article date</button></a></h5> 
                        
                    </div>
                    <div class="ibox-content">
                        <table class=" table-bordered my_form_table">
                            <thead>
                                <tr>
                                    <th>분류</th>
                                    <th>연</th>
                                    <th>월</th>
                                    <th>내용</th>
                                    <th>정렬</th>
                                    <th>날짜</th>
                                    <th>관리</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($article_date_list as $v):?>
                                <tr>
                                    <td class="center"><?php foreach($cate_date as $c):?><?php if($v['category_date_index'] == $c['category_date_index']):?><?php echo $c['category_date_name']?><?php endif;?><?php endforeach;?></td>
                                   
                                    <td class="center"><b><?php echo $v['article_date_title'];?></b></td>

                                    <td class="center"><b><?php echo str_pad($v['article_date_month'],2,'0',STR_PAD_LEFT);?></b></td>

                                    <td><b><?php echo mb_strlen( $v['article_date_content'] ) > 20 ?  mb_substr($v['article_date_content'],0,20,"UTF8")."..." : $v['article_date_content'];?></b></td>

                                    <td class="center"><?php echo $v['article_date_sort'] ?></td>

                                    <td class="center"><?php echo date('Y-m-d',$v['create_time']);?></td>

                                    <td class="center">
                                    
                                    <a href="<?php echo site_url('article_date/edit_article_date'.'/'.$v['category_date_index'].'/'.$v['article_date_index']); ?>"><button class="btn btn-success" type="button"  style="margin-bottom: 0px;"><i class="fa fa-paste"></i>  수정</button></a>
                                    <a href="<?php echo site_url('article_date/remove'.'/'.$v['category_date_index'].'/'.$v['article_date_index']); ?>" onclick="javascript:return del();"><button class="btn btn-danger" type="button" style="margin-bottom: 0px;"><i class="fa fa-times"></i>  삭제</button></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                       <nav aria-label="Page navigation" style="text-align: center;">
                            <?php echo $page_nav;?>
                       </nav>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
<!-- data table end -->
</div>
<!--右侧部分结束-->
</div>
<?php
$this->load->view('include/footer');
?>
    <!-- 全局 js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/jeditable/jquery.jeditable.js"></script>
