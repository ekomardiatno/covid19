<div class="card shadow">
	<div class="card-body">
		<h1>Welcome to Admin Panel, <?= Auth::user('name'); ?></h1>
		<p>This page can only be accessed by users who are already registered on the application. To exit please click <a href="<?= Web::url('admin.logout'); ?>">logout</a>.</p>
	</div>
</div>