<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Adoptapal</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="icon/x-icon" href="resources/logoo.png">
    <style>
        *::selection {
            background-color: #3d3d3d;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <main style="background-color: rgb(251, 245, 235); ">
        <section class="hero">  
            <div class="hero-content">
                <h1>Adopt, Don't Shop</h1>
                <p>Give a loving home to a furry companion and change a life forever.</p>
                <a href="adopt.php"><button>Adopt Now</button></a>
            </div>
        </section>
 
        <section class="featured-pets">
            <h2>Featured Pets</h2>
            <div class="pet-cards">
                <div class="pet-card">
                    <a href="adopt.php"><img src="resources/mita.jpg" alt="Featured Pet 1"></a>
                    <h3>Mita</h3>
                    <p>Dog</p>
                    <a href="adopt.php" class="adopt-btn">Adopt Me</a>
                </div>
                <div class="pet-card">
                    <a href="adopt.php"><img src="resources/tala.jpg" alt="Featured Pet 2"></a>
                    <h3>Tala</h3>
                    <p>Cat</p>
                    <a href="adopt.php" class="adopt-btn">Adopt Me</a>
                </div>
                <div class="pet-card">
                    <a href="adopt.php"><img src="resources/Whitey.jpg" alt="Featured Pet 3"></a>
                    <h3>Whitey</h3>
                    <p>Dog</p>
                    <a href="adopt.php" class="adopt-btn">Adopt Me</a>
                </div>
            </div>
        </section>
    </main>

    <script src="main.js"></script>
</body>
</html>

<?php include('footer.php'); ?>