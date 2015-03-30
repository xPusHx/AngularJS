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
			<div class="login-form" ng-controller="loginController as loginCtrl" ng-submit="submit()">
				<form action="" method="post" novalidate  ng-hide="greetingShow">
					<fieldset>
						<legend>Авторизация</legend>
						<div class="input-container">
							<label for="auth-login">Логин</label>
							<input type="text" name="auth_login" id="auth-login" ng-model="login" />
						</div>
						<div class="input-container">
							<label for="auth-password">Пароль</label>
							<input type="password" name="auth_password" id="auth-password" ng-model="password" />
						</div>
						<button type="submit"><span>Авторизироваться</span></button>
					</fieldset>
				</form>
				<span ng-show="greetingShow">Greeting, {{greeting}}!</span>
				<span ng-show="errorShow">{{error}}</span>
			</div>
		</header>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
	<script src="http://code.angularjs.org/1.0.0rc10/angular-cookies-1.0.0rc10.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="scripts/jquery.validate.min.js"></script>
	<script src="scripts/jquery.mask.min.js"></script>
	<script src="scripts/scripts.js"></script>
	<script src="scripts/app.js"></script>
</body>
</html>