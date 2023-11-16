<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Times New Roman;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 100px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  display: block;
}

.sidenav a:hover {
  color: gray;
}

.sidenav h4 {
  color: white;
  font-size: 18px;
  font-family: Times New Roman;
  padding: 6px 8px 8px 16px;
  margin-bottom: 10px;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 15px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <h4>Categories:</h4>
  <a href="painkillers.php">1) Painkillers</a>
  <a href="antibiotics.php">2) Antibiotics</a>
  <a href="suppliments.php">3) Suppliments</a>
  <a href="skincare.php">4) Skin Care</a>
</div>

<div class="main">

</div>
   
</body>
</html> 
