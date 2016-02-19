
<div class="container">
            
    <div class="row" style="">

<a href="<?= base_url('dashboard') ?>" class="btn btn-lg  link"><i class="fa fa-lg  fa-arrow-circle-o-left"></i></a>
<br>
<div class="panel panel-default" id="forms">
        <div class="panel-heading"><i class="fa fa-lg fa-plus-circle"></i> Article Form
        </div>
        <div class="panel-body">
			<?php echo form_open_multipart('writenews/do_upload/');?>
			<?php echo $error; ?>

          <fieldset>
            <legend><i class="fa fa-lg fa-keyboard-o"></i> Start typing</legend>
            <div class="form-group">
              <label for="exampleInputEmail"><i class="fa fa-sm fa-header"></i>ead Article </label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail" placeholder="Enter Title" size="100" style="width: 80%;" required>
				
   
            </div>
            <div class="form-group">
              <label for="exampleInputFile"><i class="fa fa-sm fa-file-picture-o"></i> Images input</label>
              <input type="file" name="userfile" size="20" />
              <p class="help-block"></p>
            </div>
			<div class="form-group">
			  <h4> <i class="fa fa-sm fa-text-height"></i>Text</h4>
       			<textarea type="text" name="description" style="width: 80%;" size="2000" required>
       			
        		</textarea><br />
			</div>
            <button value="upload" type="submit" type="submit" class="btn btn-default"><i class="fa fa-lg  fa-save"></i> Save</button>
			<a href="<?= base_url('dashboard') ?>" class="link">Cancel</a>
          </fieldset>
			</form>
	</br>
        </div>
      </div>



<label class="lead well" style="font-size:10px">Upload a image for  your article so that it can be publish you can only insert file type like gif|jpg|png and width max size: width 2024 and height 2024px</label>
