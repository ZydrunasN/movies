<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="main-container">
    <div class="main">
        <section>
            <h1 class="filters-title">Filmų Sąrašo Filtravimas</h1>
            <div class="filters-form-container">
                <form action="submitFilters" method="post" class="filters">
                    <div class="filter-name">
                        <label for="name">Pavadinimas</label>
                        <input id="name" name="name" type="text">
                    </div>
                    <div class="filter-time">
                        <label for="runtimeTo">Trukmė</label>
                        <select name="runtimeOption" id="runtimeOption">
                            <option value="more">daugiau</option>
                            <option value="less">mažiau</option>
                        </select>
                        <input class="runtime-input" id="runtimeTo" name="runtimeTo" type="text">
                        <span>min.</span>
                    </div>
                    <input type="submit" value="Filtruoti">
                </form>
            </div>
        </section>
        <section>
        <?php if (!empty($movies)) { ?>
            <h2 class="movies-title">Filmų sąrašas</h2>
            <?php foreach ($movies as $movie) { ?>
            <div class="movie-card">
                <div class="movie-card-img">
                <img src="<?php echo htmlspecialchars($movie->getImage()); ?>" style="width: 10vh;" alt="image">
                </div>
                <div class="movie-card-info">
                    <span class="movie-card-title"><?php echo htmlspecialchars($movie->getTitle()); ?></span>
                    <div class="movie-card-time">
                        <span>Trukmė:</span>
                        <span class="movie-card-time"><?php echo htmlspecialchars($movie->getRunningTime()); ?></span>
                        <span>min.</span>
                    </div>
                    <span class="movie-card-description"><?php echo htmlspecialchars($movie->getDescription()); ?></span>
                </div>
            </div>
            <?php } ?>
        <?php } else { ?>
            <span class="movies-not-found-title">Nerasta jokiu filmų.</span>
        <?php } ?>
        </section>
    </div>
</main>
</body>
</html>