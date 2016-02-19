<div class="container">
	<div class="row">
        <div class="col-lg-6">
			<a href="<?= base_url('dashboard') ?>" class="btn btn-lg  link"><i class="fa fa-lg  fa-arrow-circle-o-left"></i></a>
          <div class="panel panel-default" id="navs">
            <div class="panel-heading"><i class="fa fa-lg fa-user"></i> </div>
            <div class="panel-body clearfix"> 
				<table class="table table-striped  table-condensed">
              <thead>
                <tr>
                  <th>Name</th>
                  <th><?php echo  $user->username;?></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Email</td>
                  <td><?php echo  $user->email;?></td>
                  <td></td>
                </tr>
			</tbody>
            </table>
			</div>
		   </div>
        </div>

    </div>
	
	
	
