<?php
session_start();

if (isset($_SESSION['userid'])) {


	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';

	// $exercises = get_all_exercises($connection);
	// $workouts = get_all_workouts($connection);
	// $diets = get_all_diets($connection);
	// $posts = get_all_posts($connection);

	// $tags_total = number_tags($connection);
	// $posts_total = number_posts($connection);
	// $exercises_total = number_exercises($connection);
	// $workouts_total = number_workouts($connection);
	// $diets_total = number_diets($connection);
	// $goals_total = number_goals($connection);
	// $levels_total = number_levels($connection);
	// $quotes_total = number_quotes($connection);
	// $bodyparts_total = number_bodyparts($connection);
	// $equipments_total = number_equipments($connection);
	// $categories_total = number_categories($connection);
	$total_users = number_users($connection);

	$title_page = 'Dashboard';

	require '../views/header.view.php';
	require '../views/navbar.view.php';
	require '../views/home.view.php';
	require '../views/footer.view.php';
} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
