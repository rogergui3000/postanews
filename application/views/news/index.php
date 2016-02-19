<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
  <div class="row">
    <section id="pinBoot">
		<div class="white-panel">
          <h4>Cut & paste this link to your Feeds reader</h4>
          <p>Gain unlimited access to 10 latest Articles.</p>
          <p class="text-center "><form class="form-inline">
          <input type="text" class="form-control" value="<?= base_url('feed') ?>" style="width: 250px;">
          </p>
          <hr>
        </div>
<?php foreach ($news as $news_item): ?>		
      <article class="white-panel"><img src="<?php echo base_url('img/');?>/<?php echo $news_item['file_name'] ?>" alt="">
        <h4><a href="news/<?php echo $news_item['nid'] ?>"><?php echo $news_item['title'] ?></a></h4>
		   <p><span class="fa fa-sm fa-pencil-square-o"></span><?php echo $news_item['username'] ?> <span class="fa fa-sm  fa-clock-o"></span> on  <?php echo $news_item['news_created_at'] ?></p>
        <div style="height:300px;overflow:hidden"><?php echo $news_item['text'] ?> <a href="news/<?php echo $news_item['nid'] ?>">View article</a></div>
      </article>
<?php endforeach ?>
    </section>

    <hr>
     <div class="well" style="width:282.5px">
        <h4><i class="fa fa-lg fa-newspaper-o"></i> NewsPaper</h4>
          <p>Dowload 10 latest New articles posted, by users around the globe.</p>
          <a href="<?= base_url('newspdf') ?>" style="width:250px" class="btn btn-sm btn-block btn-warning"><i class="fa fa-lg fa-download"></i> Download</a>
        </div>
  </div><!-- end row -->

  