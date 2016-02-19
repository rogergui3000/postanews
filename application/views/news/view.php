<div class="container">
            
    <div class="row" style="">
		<a href="<?= base_url() ?>" class="btn btn-lg  link"><i class="fa fa-lg  fa-arrow-circle-o-left"></i></a>
    <section  style="width:auto;height:auto;">
		<h1></i><?php echo $news_item['title'] ?></i></h1>
	
      <article style="width:auto;height:30%">
      <img src="<?php echo base_url('img/');?>/<?php echo $news_item['file_name'] ?>" alt="" style="width:50%;hieght:auto;" class="TextWrap">
		  <?php echo $news_item['text'] ?>
      </article>
	<p><span class="fa fa-sm fa-pencil-square-o"></span>by   <?php echo $news_item['username'] ?> <span class="fa fa-sm  fa-clock-o"></span> on  <?php echo $news_item['news_created_at'] ?>  <a href="<?= base_url('newspdf') ?>/<?php echo $news_item['nid'] ?>"><span class="fa fa-lg fa-file-pdf-o"></span>DOWNLOAD THIS ARTICLE PDF FORMAT.</a></p>
    </section>
<hr>
</div>
  
