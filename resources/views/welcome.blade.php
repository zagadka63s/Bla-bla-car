<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTogether - Главная страница</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> 
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>GoTogether</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="#" class="button">Знайти поїздку</a></li>
                <li><a href="#" class="button">Створити поїздку</a></li>
                <li><a href="#" class="button secondary">Вхід</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h2>Групові подорожі країною</h2>
        <p>Знаходьте поїздку та заощаджуйте</p>
        <form class="search-form">
            <input type="text" placeholder="Місце відправки">
            <input type="text" placeholder="Місце прибуття">
            <input type="date" placeholder="Дата">
            <button type="submit">Знайти</button>
        </form>
    </section>

    <section class="features">
        <h3>Чому саме GoTogether?</h3>
        <div class="feature-columns">
            <div class="feature-column">
                <ul>
                    <li>Індивідуальний підхід до користувача</li>
                    <li>Низькі комісії</li>
                </ul>
            </div>
            <div class="feature-column">
                <ul>
                    <li>Швидке бронювання та підтримка</li>
                    <li>Безпечне користування</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="benefits">
        <div class="benefit-column">
            <h4>Для попутників</h4>
            <ul>
                <li>Зручність подорожей</li>
                <li>Безпека</li>
                <li>Економія на поїздках</li>
                <li>Швидке бронювання</li>
            </ul>
            <button>Знайти поїздку</button>
        </div>
        <div class="benefit-column">
            <h4>Для водіїв</h4>
            <ul>
                <li>Легке планування поїздок</li>
                <li>Зручність взаємодії з пасажирами</li>
                <li>Можливість заробітку</li>
                <li>Безпека подорожей</li>
            </ul>
            <button>Створити поїздку</button>
        </div>
    </section>

    <footer class="footer">
        <p>© GoTogether - 2024</p>
        <ul>
            <li><a href="#">Про нас</a></li>
            <li><a href="#">Політика конфіденційності</a></li>
            <li><a href="#">Контакти</a></li>
        </ul>
    </footer>
</body>
</html>
