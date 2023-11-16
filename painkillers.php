<?php
$pageTitle = "Painkillers";
include("header.php");
include("side_panel.php");
$drugs = [
    [
        'image' => 'p1.jpg',
        'name' => 'Paracetamol',
        'alt' => 'p1',
        'description' => 'Add a description of the image here 4',
    ],
    [
        'image' => 'p2.jpg',
        'name' => 'Action',
        'alt' => 'p2',
        'description' => 'Add a description of the image here 1',
    ],
    [
        'image' => 'p3.jpg',
        'name' => 'Adol',
        'alt' => 'p3',
        'description' => 'Add a description of the image here 2',
    ],
    [
        'image' => 'p4.jpg',
        'name' => 'Alka Seltzer',
        'alt' => 'p4',
        'description' => 'Add a description of the image here 3',
    ],
    [
        'image' => 'p5.jpg',
        'name' => 'Anomex',
        'alt' => 'p5',
        'description' => 'Add a description of the image here 3',
    ],
    [
        'image' => 'p6.jpg',
        'name' => 'Anusol',
        'alt' => 'p6',
        'description' => 'Add a description of the image here 3',
    ],
];
?>

<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
  margin-top: 30px;
  margin-right: 30px;
  margin-left: 200px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
  text-align: center;
  position: relative;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

.button-container {
    position: absolute; /* Position absolute to place the button */
    bottom: 0; /* Align the button to the bottom of the container */
    left: 0; /* Align the button to the left of the container */
    right: 0; /* Align the button to the right of the container */
    padding: 10px 0; /* Padding for better appearance */
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background color */
    display: none; /* Hide the container by default */
  }

  .view-button {
    background-color: #0074d9; /* Button background color */
    color: #fff; /* Button text color */
    border: none; /* Remove button border */
    padding: 5px 10px; /* Padding for better appearance */
    cursor: pointer; /* Add a pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth hover effect */
  }

  .view-button:hover {
    background-color: #0056b3; /* Darker color on hover */
  }

  .gallery:hover .button-container {
    display: block;
  }

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}
</style>
<title><?echo $pageTitle; ?></title>
</head>
<body>
    <div id="gallery">
        <?php
        foreach ($drugs as $drug) {
          echo '<div class="gallery">';
          echo '<a target="_blank" href="' . $drug['image'] . '">';
          echo '<img src="' . $drug['image'] . '" alt="' . $drug['name'] . '" width="600" height="400">';
          echo '</a>';
          echo '<div class="desc">' . $drug['name'] . '</div>';
          echo '<form method="get" action="details.php">';
          echo '<input type="hidden" name="image" value="' . $drug['image'] . '">';
          echo '<input type="submit" class="view-button" value="View Details">';
          echo '</form>';
          echo '</div>';
        }
        ?>
    </div>
</body>
</html>
