<?php include 'header.php';?>
<?php include 'config/config.php';?>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="highlight">
				<?php echo $ads1; ?>
			</div>
		</div>
		<div class="col-md-7">
			<div class="highlight">
  				<ul class="nav nav-tabs nav-justified">
					<li class="active"><a href="#tab-upload-local" data-toggle="pill">Local Upload - Upload From Computer</a></li>
				</ul>
					<div class="tab-content" style="padding: 10px 0;">
						<div id="tab-upload-local" class="tab-pane  active">
							<form action="upload.php" method="POST"  enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-9">
										<input class="form-control" type="file" name="resim" />
									</div>
									<div class="col-md-3">
										<input class="btn pull-right btn-primary" type="submit" name="gonder" value="Upload"/> 
									</div>
								</div>
							</form>
							<hr>
								<ul class="nav nav-tabs nav-justified">
									<li class="active"><a href="#tab-upload-remote" data-toggle="pill">Remote Upload - Upload From URL</a></li>
								</ul>
						</div> 
							<form action="upload_url.php" method="POST"> 
								<div id="tab-upload-remote" class="tab-pane" style="margin-top: 10px;"> 
									<div class="row">
										<div class="col-md-9">
											<input name="url" type="text" placeholder="http://" class="form-control">
										</div>
										<div class="col-md-3">
											<button type="submit" class="btn pull-right btn-success">Upload</button>
										</div>
									</div>
								</div>
							</form> 
					</div>
			</div>
				<div class="highlight">
				<p><?php echo $about; ?></p>
			</div>
		</div>
	</div>
<hr>
© Copyright 2026
</div>
<style>
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
	background-color: #F7F7F9;
}
</style>
</body>
</html>