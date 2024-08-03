<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies</title>
    <link rel="stylesheet" href=css/style.css>
</head>
<body>
<main class="main-container">
    <div class="main">
        <section>
            <h1 class="filters-title">Filmų Sąrašo Filtravimas</h1>
            <div class="filters-form-container">
                <form method="post" class="filters">
                    <div class="filter-name">
                        <label for="name">Pavadinimas</label>
                        <input id="name" type="text">
                    </div>
                    <div class="filter-time">
                        <label for="runtimeTo">Trukmė</label>
                        <select name="runtimeOption" id="runtimeOption">
                            <option value="more">daugiau</option>
                            <option value="less">mažiau</option>
                        </select>
                        <input class="runtime-input" id="runtimeTo" type="text" required="">
                        <span>min.</span>
                    </div>
                    <input type="submit" value="Filtruoti">
            </form>
            </div>
        </section>
        <section>
            <h2 class="movies-title"> Filmų sąrašas</h2>
                <div class="movie-card">
                    <div class="movie-card-info">
                        <span class="movie-card-title"></span>
                        <div class="movie-card-time">
                            <span>Trukmė:</span>
                            <span class="movie-card-time"></span>
                            <span>min.</span>
                        </div>
                        <span class="movie-card-description">Some description here</span>
                    </div>
                </div>
        </section>
    </div>
</main>
</body>
</html> 