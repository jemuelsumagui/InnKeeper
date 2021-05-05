<!--div class="modal" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		 <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="msgModalLabel"><?php echo $msg['type']; ?><?php echo $msg['title']; ?></h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body"><?php echo $msg['body']; ?></div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="button" class="btn btn-primary">Save changes</button>
			</div>
		 </div>
	  </div>
	</div-->
<div class="shadow-lg p-3 mb-5 bg-white rounded">	
		<div class="jumbotron">
			<h2>BBM - Login</h2>
			<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
			<hr class="my-4">
			<?php if (!is_null($msg['type'])) { ?>
<div class="alert alert-<?php echo httpStatecode2bootstrapAlerts($msg['type']); ?>" role="alert">
  <h3 class="alert-heading"><?php echo ($msg['type']); ?> - <?php echo $msg['title']; ?></h3>
  <p><?php echo $msg['body']; ?></p>
  <hr>
  <p class="mb-0"><?php echo $msg['hint']; ?></p>
</div>
<?php } else { ?>

			<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
<?php } ?>

			<form>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampltu
																					snaeI
																					nputPassword1" placeholder="Password">
				</div>
				<div class="row">
					<div class="col-6"><a class="btn btn-success btn-lg" href="#" role="button">Registrati</a></div>
					<div class="col-6 text-right"><button type="submit" class="btn btn-primary btn-lg">Entra</button></div>
				</div>
			</form>
		</div>
	</div>
