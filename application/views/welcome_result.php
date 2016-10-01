<!DOCTYPE html>
<html>
<head>
	<title>Demo Upload Image using Ajax on Codeigniter</title>
	<style type="text/css">
		.container {
			padding: 10px;
		}

		.error {
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Result Upload Image</h1>
		<?php if($image): ?>
			<table>
				<tr>
					<td>filename</td>
					<td>:</td>
					<td><b><?php echo $image->filename;?></b></td>
				</tr>
				<tr>
					<td>Created At</td>
					<td>:</td>
					<td><b><?php echo $image->created_at;?></b></td>
				</tr>
				<tr>
					<td>Preview</td>
					<td>:</td>
					<td>
						<img src="<?php echo base_url('uploads/'.$image->filename);?>" />
					</td>
				</tr>
			</table>
		<?php else: ?>
			<p>No result</p>
		<?php endif;?>
		<p>
			<a href="<?php echo site_url('');?>">back to form upload image</a>
		</p>
	</div>
</body>
</html>