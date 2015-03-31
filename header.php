<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Angular JS</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="telephone=no" />

	<script src="scripts/css_browser_selector.js"></script>
	<link href="styles/main.css" rel="stylesheet" />
	<script src="scripts/modernizr.js"></script>
</head>

<body>
<div class="container" ng-app="testApp">
	<header>
		<div class="login-form" ng-controller="authController as authCtrl" ng-submit="submit()" ng-init="init()">
			<form action="" method="post" ng-hide="greetingShow" novalidate>
				<fieldset>
					<legend>Авторизация</legend>
					<div class="input-container">
						<label for="auth-login">Логин</label>
						<input type="email" name="auth_login" id="auth-login" ng-model="login" ng-pattern="/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/" required />
					</div>
					<div class="input-container">
						<label for="auth-password">Пароль</label>
						<input type="password" name="auth_password" id="auth-password" ng-model="password" required />
					</div>
					<button type="submit"><span>Авторизироваться</span></button>
				</fieldset>
			</form>
			<span ng-show="greetingShow">Добро пожаловать, <a href="profile.php?id={{id}}">{{username}}</a>!</span>
			<span ng-show="errorShow">{{error}}</span>
		</div>
	</header>