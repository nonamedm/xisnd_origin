<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
$this->load->view( 'header' );
?>
<!--右侧部分开始-->
<div id="page-wrapper">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>주요연혁</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-bordered form_table">
                            <tbody>
                                <form id="article" method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('article_date/insert_article_date'); ?>">
                                    <tr>
                                        <td class="left">분류</td>
                                        <td>
                                            <select class="form-control my_form_input" name="category_date_index" id="category_date_index">
                                                <?php foreach($cate_date as $v):?>
                                                <option value="<?php echo $v['category_date_index']; ?>" data-type="">
                                                    <?php echo $v['category_date_name']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">연</td>
                                        <td>
                                            <!-- <input type="text" placeholder="" class="form-control my_form_input" name="article_date_title" id="article_date_title"> -->
                                            <select class="form-control my_form_input" name="article_date_title" id="article_date_title">
                                                <?php for( $i = ( date('Y')-30); $i <= ( date('Y')+30); $i++):?>
                                                <option value="<?php echo $i ?>" data-type="">
                                                    <?php echo $i ?>
                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                            <script>
                                                document.querySelector('[name="article_date_title"]').value='<?php echo date("Y")?>';
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">월</td>
                                        <td>
                                            <!-- <input type="text" placeholder="" class="form-control my_form_input" name="article_date_month" id="article_date_month"> -->
                                            <select class="form-control my_form_input" name="article_date_month" id="article_date_month">
                                                <?php for( $i = 1; $i <= 12; $i++):?>
                                                <option value="<?php echo str_pad($i,2,'0',STR_PAD_LEFT) ?>" data-type="">
                                                    <?php echo str_pad($i,2,'0',STR_PAD_LEFT) ?>
                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                            <script>
                                                document.querySelector('[name="article_date_month"]').value='<?php echo str_pad($single_article_date['article_date_month'],2,'0',STR_PAD_LEFT)?>';
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">정렬</td>
                                        <td>
                                            <input type="text" class="form-control  my_form_input" name="article_date_sort" id="article_date_sort" value="100">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="left">내용</td>
                                        <td>
                                            <textarea class="form-control my_form_input" id="editor" rows="5" name="article_date_content"></textarea>
                                            <script>

                                        var editor_parents_01 = document.getElementById( 'editor' );

                                        CKEDITOR.replace( 'editor', {
                                            language: 'ko-kr',
                                            toolbar : 'MyConfig',
                                        }).on( 'blur' , function(){
                                            
                                            $( editor_parents_01 ).val( CKEDITOR.instances[ 'editor' ].getData() ).change();
                                            
                                        } );
                                        
                                        editor_list.push(function(){
                                            
                                            $( editor_parents_01 ).val( CKEDITOR.instances[ 'editor' ].getData() ).change();
                                            
                                        });

                                    </script>
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
                        <div style="text-align: right;">
                            <button class="btn btn-primary" type="submit" name="submit">저장하기</button>
                            <?php if($id['category_index'] == ""){?>
                                <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo site_url('article_date/article_date_list');?>'">목록</button>
                            <?php }else{?>
                                <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo site_url('article_date/article_date_list/'.$id['categpry_index']);?>'">목록</button>
                            <?php }?>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--右侧部分结束-->
</div>
<?php $this->load->view('include/footer');?>