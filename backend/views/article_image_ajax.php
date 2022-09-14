<?php foreach($article_image as $v): ?>                            
<a class="hover_delete" style="position:relative; float:left; overflow:hidden;"><img data-image-index="<?php echo $v['article_image_index']; ?>"  data-article-index="<?php echo $article_index; ?>" src="<?php echo base_url().$v['article_image_url']; ?>">
<p class="file-panel"><i class="fa fa-times" style="color:#fff;"></i></p>
</a>
<?php endforeach; ?>
<script src="<?php echo base_url(); ?>resource/admin/js/jquery.min.js?v=2.1.4"></script>
             <script>

        $(document).ready(function () {
          $(".hover_delete .file-panel").on("click",function(){
                var confirm_true=confirm("Confirmed to delete")
               if (confirm_true==true){
                          var data_image_index = $(this).parent().find("img").attr("data-image-index");
				var data_article_index = $(this).parent().find("img").attr("data-article-index");

	            htmlobj = $.ajax({
					url:"<?php echo site_url('article/ajaxRemoveImage'); ?>",
					type: "POST",
					async:false,
					dataType: "json",
					data: {
						   article_image_index:data_image_index,
						   article_index:data_article_index
						  }
				    });

                $("#delete_img_ajax").html(htmlobj.responseText);
                     }
                      else
                     {
                          
                     }
            });
     });
    </script>