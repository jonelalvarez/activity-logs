<?php

require_once 'dbConfig.php';
require_once 'models.php';


if (isset($_POST['insertUserBtn'])) {
	$insertUser = insertNewUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['suffix'], $_POST['bdate'], $_POST['gender'], $_POST['nationality'], $_POST['email']);

	if ($insertUser) {
		$_SESSION['message'] = "Successfully inserted!";
		$_SESSION['status'] = "success";
	} else {
		$_SESSION['message'] = "Failed to insert!";
		$_SESSION['status'] = "error";
	}
	header("Location: ../index.php");
}



if (isset($_POST['editUserBtn'])) {
	$editUser = editUser($pdo, $_POST['gender'], $_POST['nationality'], $_POST['email'], $_GET['astronaut_id']);

	if ($editUser) {
		$_SESSION['message'] = "Successfully edited!";
		$_SESSION['status'] = "success";
	} else {
		$_SESSION['message'] = "Failed to edit!";
		$_SESSION['status'] = "error";
	}
	header("Location: ../index.php");
}


if (isset($_POST['deleteUserBtn'])) {
	$deleteUser = deleteUser($pdo, $_GET['astronaut_id']);

	if ($deleteUser) {
		$_SESSION['message'] = "Successfully deleted!";
		$_SESSION['status'] = "success";
	} else {
		$_SESSION['message'] = "Failed to delete!";
		$_SESSION['status'] = "error";
	}
	header("Location: ../index.php");
}


if (isset($_GET['searchBtn'])) {
	$searchForAUser = searchForAUser($pdo, $_GET['searchInput']);
	foreach ($searchForAUser as $row) {
		echo "<tr> 
				<td>{$row['astronaut_id']}</td>
				<td>{$row['first_name']}</td>
				<td>{$row['last_name']}</td>
				<td>{$row['suffix']}</td>
				<td>{$row['bdate']}</td>
				<td>{$row['gender']}</td>
				<td>{$row['nationality']}</td>
				<td>{$row['email']}</td>
				<td>{$row['status']}</td>
			  </tr>";
	}
}


// NEW FUNCTIONS
if (isset($_POST['insertNewUserBtn'])) {
	$username = trim($_POST['username']);
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);

	if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($password) && !empty($confirm_password)) {

		if ($password == $confirm_password) {

			$insertQuery = insertNewUserAccount($pdo, $username, $first_name, $last_name, password_hash($password, PASSWORD_DEFAULT));
			$_SESSION['message'] = $insertQuery['message'];

			if ($insertQuery['status'] == '200') {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../login.php");
			}

			else {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../register.php");
			}

		}
		else {
			$_SESSION['message'] = "Please make sure both passwords are equal";
			$_SESSION['status'] = '400';
			header("Location: ../register.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}
}

if (isset($_POST['loginUserBtn'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$loginQuery = checkIfUserExists($pdo, $username);
		$userIDFromDB = $loginQuery['userInfoArray']['user_id'];
		$usernameFromDB = $loginQuery['userInfoArray']['username'];
		$passwordFromDB = $loginQuery['userInfoArray']['password'];

		if (password_verify($password, $passwordFromDB)) {
			$_SESSION['user_id'] = $userIDFromDB;
			$_SESSION['username'] = $usernameFromDB;
			header("Location: ../index.php");
		}

		else {
			$_SESSION['message'] = "Username/password invalid";
			$_SESSION['status'] = "400";
			header("Location: ../login.php");
		}
	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}

}


if (isset($_POST['insertNewBranchBtn'])) {
	$address = trim($_POST['address']);
	$head_manager = trim($_POST['head_manager']);
	$contact_number = trim($_POST['contact_number']);

	if (!empty($address) && !empty($head_manager) && !empty($contact_number)) {
		$insertABranch = insertABranch($pdo, $address, $head_manager, 
			$contact_number, $_SESSION['username']);
		$_SESSION['status'] =  $insertABranch['status']; 
		$_SESSION['message'] =  $insertABranch['message']; 
		header("Location: ../index.php");
	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../index.php");
	}

}

if (isset($_POST['updateBranchBtn'])) {

	$address = $_POST['address'];
	$head_manager = $_POST['head_manager'];
	$contact_number = $_POST['contact_number'];
	$date = date('Y-m-d H:i:s');

	if (!empty($address) && !empty($head_manager) && !empty($contact_number)) {

		$updateBranch = updateBranch($pdo, $address, $head_manager, $contact_number, 
			$date, $_SESSION['username'], $_GET['branch_id']);

		$_SESSION['message'] = $updateBranch['message'];
		$_SESSION['status'] = $updateBranch['status'];
		header("Location: ../index.php");
	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}

}

if (isset($_POST['deleteBranchBtn'])) {
	$branch_id = $_GET['branch_id'];

	if (!empty($branch_id)) {
		$deleteBranch = deleteABranch($pdo, $branch_id);
		$_SESSION['message'] = $deleteBranch['message'];
		$_SESSION['status'] = $deleteBranch['status'];
		header("Location: ../index.php");
	}
}

if (isset($_GET['logoutUserBtn'])) {
	unset($_SESSION['username']);
	header("Location: ../login.php");
}


?>