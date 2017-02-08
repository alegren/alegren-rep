<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title>Title</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">

	<link rel="stylesheet" href="css/main.min.css">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">

</head>

<body>
	<div class="loader">
		<div class="loader_inner"></div>
	</div>
	<!-- begin section_them_today -->
	<section class="section_them_today section">
		<!-- begin flex-container -->
		<div class="flex-container-1">
			<!-- begin section-header -->
			<div class="section-header">
				<div class="date">
					<p class="date_day-of-the-week">

						<?php echo date('l'); ?>

					</p>
					<p class="date_date">

						<?php echo date('j.m'); ?>

					</p>
				</div>
				<img class="icon-wether" src="img/sun.png" alt="alt">		
			</div>
			<!-- end section-header -->
			<h1 class="temperature">

				<?php 
					include('libs/forecast.io-php-api-master/lib/forecast.io.php');

					$api_key = '';
					$latitude = '';
					$longitude = '';
					$units = 'auto';
					$lang = 'en';

					$forecast = new ForecastIO($api_key, $units, $lang);
					$condition = $forecast->getCurrentConditions($latitude, $longitude);

					echo round(''.$condition->getTemperature());
				?><sup class="temperature_degree">0</sup>

			</h1>
			<!-- begin inner-foot -->
			<div class="inner-foot">
				<!-- begin b-footer -->
				<div class="b-footer flex-container">					
					<ul class="city-choice">
						<li class="city-choice_item">Vars</li>				
						<li class="city-choice_item">Alpes d'huez</li>				
						<li class="city-choice_item">Nice</li>
					</ul>					
				</div>
				<!-- end b-footer -->
			</div>
			<!-- end inner-foot -->			
		</div>
		<!-- end flex-container -->	
	</section>
	<!-- end section_them_today -->
	
<!-- begin section_them_tomorrow -->
	<section class="section_them_tomorrow section">
		<!-- begin flex-container -->
		<div class="flex-container-2">
			<!-- begin section-header -->
			<div class="section-header">
				<div class="date">
					<p class="date_day-of-the-week">

						<?php echo date('l', strtotime('+1 day')); ?>
					
					</p>
					<p class="date_date">
					
						<?php echo date('j.m', strtotime('+1 day')); ?>
					
					</p>
				</div>
				<img class="icon-wether" src="img/sun.png" alt="alt">						
			</div>
			<!-- end section-header -->
			<h1 class="temperature">

				<?php					
					$forecast_week = $forecast->getForecastWeek($latitude, $longitude);
					foreach ($forecast_week as $condition) {
						if ($condition->getTime('d.m') == date('d.m', strtotime('+1 day'))) {
							echo round(''.$condition->getMinTemperature()).'<sup class="temperature_degree">0</sup>';
							echo '<sub style="font-size: 20rem">/ </sub>';
							echo round(''.$condition->getMaxTemperature());							
						}
					}
				?><sup class="temperature_degree">0</sup>

			</h1>			
			<!-- begin inner-foot -->
			<div class="inner-foot">
				<!-- begin b-footer -->
				<div class="b-footer flex-container">					
					<ul class="city-choice">
						<li class="city-choice_item">Vars</li>				
						<li class="city-choice_item">Alpes d'huez</li>				
						<li class="city-choice_item">Nice</li>
					</ul>					
				</div>
				<!-- end b-footer -->
			</div>
			<!-- end inner-foot -->			
		</div>
		<!-- end flex-container -->	
	</section>
	<!-- end section_them_tomorrow -->

	<!-- begin section_them_today -->
	<section class="section_them_aftertomorrow section">
		<!-- begin flex-container -->
		<div class="flex-container-3">
			<!-- begin section-header -->
			<div class="section-header">
				<div class="date">
					<p class="date_day-of-the-week">

						<?php echo date('l', strtotime('+2 day')); ?>

					</p>
					<p class="date_date">

						<?php echo date('j.m', strtotime('+2 day')); ?>

					</p>
				</div>
				<img class="icon-wether" src="img/sun.png" alt="alt">		
			</div>
			<!-- end section-header -->
			<h1 class="temperature">

				<?php
					foreach ($forecast_week as $condition) {
						if ($condition->getTime('d.m') == date('d.m', strtotime('+2 day'))) {
							echo round(''.$condition->getMinTemperature()).'<sup class="temperature_degree">0</sup>';
							echo '<sub style="font-size: 20rem">/ </sub>';
							echo round(''.$condition->getMaxTemperature());							
						}
					}
				?><sup class="temperature_degree">0</sup>

			</h1>
			<!-- begin inner-foot -->
			<div class="inner-foot">
				<!-- begin b-footer -->
				<div class="b-footer flex-container">					
					<ul class="city-choice">
						<li class="city-choice_item">Vars</li>				
						<li class="city-choice_item">Alpes d'huez</li>				
						<li class="city-choice_item">Nice</li>
					</ul>
				</div>
				<!-- end b-footer -->
			</div>
			<!-- end inner-foot -->			
		</div>
		<!-- end flex-container -->
	</section>
	<!-- end section_them_today -->

	<script src="js/scripts.min.js"></script>

</body>
</html>
