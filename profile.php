<?php require('header.php'); ?>

<?php require('php/profile_connect.php'); ?>
	<section class="news">
		<div class="content-container">
			<h2>News</h2>
		</div>
	</section>
	<section class="profile" ng-controller="profileController as profileCtrl" ng-init="init()">
		<div class="content-container">
			<h2>Profile</h2>

			<span ng-show="greetingShow">Профиль пользователя <?php echo $username; ?>!</span>
			<span ng-show="youShow">Это вы</span>
			<span ng-show="userExistsShow">Извините, данного пользователя не сущетвует!</span>
		</div>
	</section>

<?php require('footer.php'); ?>