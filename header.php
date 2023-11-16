<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle;?></title>
    <style type="text/css">

body {
    margin: 0;
    padding: 0;
}
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #007BFF;
    padding: 10px 20px;
    color: white;
    font-weight: bold;
    position: sticky;
    top: 0;
    z-index: 100;
    margin: 0;
    padding: 0; 
}

.nav-list {
    list-style: none;
    display: flex;
    align-items: center;
}

.nav-list li {
    margin-right: 20px;
}

.nav-list a {
    text-decoration: none;
    color: white;
    transition: color 0.3s;
}

.nav-list a:hover {
    color: #0056b3;
}

.logo {
    display: flex;
    align-items: center;
    font-size: 24px;
    margin-right: 50px;
}

.logo img {
    width: 30px;
    height: 30px;
}

.rightNav {
    display: flex;
    align-items: center;
}

#search {
    padding: 5px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
}

.btn {
    padding: 8px 16px;
    margin-left: 10px;
    background-color: #0056b3;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #004288;
}

@media (max-width: 768px) {
    .nav-list {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .nav-list li {
        margin-bottom: 10px;
    }
    
    .logo {
        font-size: 20px;
    }
}

    </style>
</head>
<body>
    <nav class="navbar background">
        <ul class="nav-list">
            <div class="logo">
                <li>PillPortal</li>
                <img src="pharmacy.png">
            </div>
            <li><a href="Home.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="index.php">Shop</a></li>
        </ul>

        <div class="rightNav">
            <input type="text" name="search" id="search">
            <button class="btn btn-sm">Search</button>
        </div>
    </nav>
</body>
</html>