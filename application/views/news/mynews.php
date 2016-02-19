
<div class="container">
  <div class="row">
    <div class="col-md-3">            
      <div class="input-group">
        <p><i class="fa fa-lg fa-hands"></i> </p>
        
      </div>
      <button type="button" class="btn btn-default btn-sm btn-block hidden-lg hidden-md" data-toggle="collapse" data-target="#demo">Refine your search <span class="caret"></span>
        
      </button>
      
      <div id="demo" class="collapse in">
        <hr>
        <div class="list-group list-group">
          <h4 class=""> </h4>
          <p class="list-group-item"> Status <span class="text-success">Online</span></p>
       	  <a href="<?= base_url('account') ?>" class="list-group-item"><i class="fa fa-lg fa-user"></i> My Account</a>
                    
          <hr class="">
   
			<a href="<?= base_url('writenews') ?>" class="list-group-item link"><i class="fa fa-lg fa-pencil"></i> Write new Article</a>
          <hr class="">	
          
        </div>
      </div>
      
      
      
      <div class="hidden-sm hidden-xs">
        
        <hr>
        <div class="well">
          
          <h4><i class="fa fa-lg fa-newspaper-o"></i> NewsPaper</h4>
          <p>Dowload 10 latest New articles posted, by users around the globe.</p>
          <button class="btn btn-sm btn-block btn-warning"><i class="fa fa-lg fa-download"></i> Download</button>
        </div>
        
        <hr>
        
    
      </div>
      
    </div>
    <div class="col-md-9">
		<h1>My Articles</h1>
		 <?php foreach ($query->result() as $result) : ?>	
      <div class="row">
		  	
        <div class="col-sm-4"><a href="#" class=""><img src="<?php echo base_url('img/');?>/<?php  echo $result->file_name;?>" class="img-responsive"></a>
        </div>
	
        <div class="col-sm-8" >
	      <a href="news/<?php echo $result->nid;?>" class="title"><i class="fa fa-sm fa-eye"></i> <?php echo$result->title;?></a>
          <p class="text-muted"><i class="fa fa-sm fa-clock-o"></i> <?php echo $result->news_created_at ; ?></p>
          <div style="height:100px;overflow:hidden"><?php echo $result->text ; ?></div>
          
          <p class="text-muted"><a href="deletenews/<?php echo $result->nid;?>"><i class="fa fa-sm fa-minus-circle"></i> Delete</a></p>
        </div>
		
      </div>
		 <?php endforeach ; ?>
      <hr>
     
      
    </div>
  </div>

	
	
	
