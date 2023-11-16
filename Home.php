<?php
	$pageTitle = "Home page";
	include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $pageTitle; ?></title>
	<style type="text/css">
		body {
			background: url(bg3.jpg) no-repeat;
			background-size: cover;
		}

		body, h1, p {
    		margin: 0;
    		padding: 0;
		}

		.firstsection {
    		display: flex;
    		justify-content: center;
    		
    		height: 100vh; 
    		margin-left: 20px;
    		margin-top: 100px;
    	}

		.text-big {
    		font-family: 'Piazzolla', serif;
    		font-weight: bold;
    		font-size: 40px;
    		line-height: 1.2;
		}

		.text-big span {
    		color: #007BFF;
		}

		.text-small {
    		font-size: 20px;
    		margin-top: 20px;
    		color: #333;
		}

		.signup_btn {
    		display: inline-block;
    		padding: 10px 20px;
    		margin-top: 40px;
    		background-color: #007BFF; 
    		color: white;
    		text-decoration: none;
    		border-radius: 5px;
    		font-weight: bold;
    		transition: background-color 0.3s;
		}

		.signup_btn:hover {
    		background-color: #0056b3; 
		}

		@media (max-width: 768px) {
    	.text-big {
        	font-size: 28px;
    	}
    
    	.text-small {
        	font-size: 16px;
    	}
    
    	.signup_btn {
        	font-size: 14px;
        	padding: 8px 16px;
    		}
		}
	</style>
</head>

<body>
	<section class="firstsection">
		<div class="box-main">
			<div class="firstHalf">
				<h1 class="text-big" id="web">Online<br><span>Pharmacy</span></h1>
				
				<p class="text-small">
					Welcome to our online pharmacy, your trusted destination for all your healthcare needs. <br>We understand that your well-being is of utmost importance, and that's why we strive to provide convenient<br>access to a wide range of high-quality medications and healthcare products. Whether you're looking for prescription<br>medications, over-the-counter remedies, or even personal care items, our dedicated team is here to assist you every step of the way.<br> With our user-friendly platform, you can browse our extensive catalog, place your order securely, and have your items delivered right to your doorstep.
				<a href="register.php" class="signup_btn">Sign Up</a>
				</p>


			</div>
		</div>
	</section>

	<?php include 'footer.php' ; ?>
</body>

</html>


