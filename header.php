<?php


namespace alpcitymrplth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> >

	<?php get_template_part( 'parts/head' ); ?>

	<body <?php body_class(); ?> >

		<?php do_action( 'body_start' ); ?>

		<div class="wrapper" id="wrapper">

			<?php get_template_part( 'parts/mobilenav' ); ?>

			<div class="wrapper__item wrapper__item--panel panel" id="panel">
				<div class="container">
					<header class="header" id="header"><a class="custom-logo-link" href="#"><img class="custom-logo" src="./userfiles/logo.png" alt="АльпСити"></a></header>
					<nav class="nav" id="nav">
						<ul class="nav__list list">
							<li class="menu-item"><a href="#">О компании</a></li>
							<li class="menu-item"><a href="#">Наши работы</a></li>
							<li class="menu-item"><a href="#">Каталог материалов</a></li>
							<li class="menu-item"><a href="#">Фасад</a></li>
							<li class="menu-item"><a href="#">Кровля</a></li>
							<li class="menu-item"><a href="#">Контакты</a></li>
						</ul>
						<button class="burger" data-mobilenav="toggle"><span class="line"></span> <span class="line"></span> <span class="line"></span> <span class="sr-only">Открыть меню</span></button>
					</nav>
					<div class="languages" id="languages">
						<div class="current">RU</div>
						<ul>
							<li><a href="#">UA</a></li>
							<li><a href="#">EN</a></li>
						</ul>
					</div><a class="phone" href="tel:380688478820"><span class="value">+38 (068) 847 8820</span></a>
				</div>
			</div>
			<main class="wrapper__item wrapper__item--main main" id="main">