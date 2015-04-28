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

<body ng-app="testApp">
<div class="container">
	<header>
		<section class="header-row">
			<div class="content-container">
				<div class="block-left">
					<div class="main-menu">
						<nav>
							<ul>
								<li><a href="#">Главная</a></li>
								<li><a href="#">Новости</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="block-right">
					<div class="login-form" ng-controller="authController as authCtrl" ng-cloak>
						<form name="auth_form" ng-hide="greetingShow" ng-submit="authSubmit()" novalidate>
							<fieldset>
								<legend>Авторизация</legend>
								<div class="input-container">
									<label for="auth-login">Логин</label>
									<input type="email" name="auth_login" id="auth-login" ng-model="loginForm.login" ng-pattern="/^[_a-zA-Z0-9]+(\.[_a-zA-Z0-9]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,4})$/" ng-required="true" />
								</div>
								<div class="input-container">
									<label for="auth-password">Пароль</label>
									<input type="password" name="auth_password" id="auth-password" ng-model="loginForm.password" ng-required="true" />
								</div>
							</fieldset>
							<div class="submit-container">
								<button type="submit" ng-disabled="checkEmpty('#auth-login') || checkEmpty('#auth-password')"><span>Авторизироваться</span></button>
							</div>
						</form>
						<span ng-show="greetingShow">Добро пожаловать, <a href="{{baseUrl}}profile">{{user.name}}</a>! <a ng-click="logout()">Выйти</a></span>
						<span ng-show="errorShow">{{error}}</span>
					</div>

					<div footerDir></div>
				</div>
			</div>
		</section>
	</header>

	<section class="main">