<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTogether - Главная страница</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>GoTogether</h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="{{ route('trip.search') }}" class="button">Знайти поїздку</a></li>
                <li><a href="{{ route('trip.create') }}" class="button">Створити поїздку</a></li>
                <li><a href="{{ route('login') }}" class="button secondary">Вхід</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h2>Групові подорожі країною</h2>
        <p>Знаходьте поїздку та заощаджуйте</p>
        <form class="search-form" action="{{ route('trip.search') }}" method="GET" style="position: relative;">
            <input type="text" id="departure" name="departure" placeholder="Місце відправки" autocomplete="off">
            <input type="text" id="destination" name="destination" placeholder="Місце прибуття" autocomplete="off">
            <input type="date" name="date" placeholder="Дата">
            <button type="submit" class="button">Знайти</button>
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
        <div class="feature-icons">
            <img src="{{ asset('images/Group 27.png') }}" alt="Icon 1">
            <img src="{{ asset('images/Group 28.png') }}" alt="Icon 2">
            <img src="{{ asset('images/Group 29.png') }}" alt="Icon 3">
            <img src="{{ asset('images/Group 30.png') }}" alt="Icon 4">
        </div>
    </section>

    <section class="benefits">
        <div class="benefit-column">
            <h4>Для попутників</h4>
            <ul>
                <li><img src="{{ asset('images/Vector 13.png') }}" alt="Галочка"> Зручність подорожей</li>
                <li><img src="{{ asset('images/Vector 13.png') }}" alt="Галочка"> Безпека</li>
                <li><img src="{{ asset('images/Vector 13.png') }}" alt="Галочка"> Економія на поїздках</li>
                <li><img src="{{ asset('images/Vector 13.png') }}" alt="Галочка"> Швидке бронювання</li>
            </ul>
            <a href="{{ route('trip.search') }}" class="button">Знайти поїздку</a>
        </div>
        <div class="benefit-column">
            <h4>Для водіїв</h4>
            <ul>
                <li><img src="{{ asset('images/Vector 13.png') }}" alt="Галочка"> Легке планування поїздок</li>
                <li><img src="{{ asset('images/Vector 13.png') }}" alt="Галочка"> Зручність взаємодії з пасажирами</li>
                <li><img src="{{ asset('images/Vector 13.png') }}" alt="Галочка"> Можливість заробітку</li>
                <li><img src="{{ asset('images/Vector 13.png') }}" alt="Галочка"> Безпека подорожей</li>
            </ul>
            <a href="{{ route('trip.create') }}" class="button">Створити поїздку</a>
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

    <!-- Скрипт для автозаполнения городов -->
    <script>
        const cities = ["Київ", "Львів", "Одеса", "Харків", "Дніпро", "Запоріжжя", "Вінниця", "Миколаїв", "Чернігів"];

        function setupAutocomplete(inputId) {
            const input = document.getElementById(inputId);
            $(input).on("input", function() {
                let val = this.value;
                closeAllLists();
                if (!val) return false;
                
                const list = $("<div>", { class: "autocomplete-list" }).css({
                    "position": "absolute",
                    "top": $(this).outerHeight() + "px",
                    "left": 0,
                    "width": $(this).outerWidth() + "px",
                    "background-color": "white",
                    "border": "1px solid #ccc",
                    "z-index": "99"
                }).insertAfter(this);

                cities.filter(city => city.toLowerCase().startsWith(val.toLowerCase())).forEach(city => {
                    $("<div>").text(city).css({
                        "padding": "10px",
                        "cursor": "pointer",
                        "color": "#333", /* Сделал текст темнее для видимости */
                        "font-weight": "bold"
                    }).appendTo(list).click(function() {
                        input.value = city;
                        closeAllLists();
                    });
                });
            });
        }

        function closeAllLists() {
            $(".autocomplete-list").remove();
        }

        $(document).on("click", function(e) {
            if (!$(e.target).closest(".autocomplete-list, input").length) {
                closeAllLists();
            }
        });

        $(document).ready(function() {
            setupAutocomplete("departure");
            setupAutocomplete("destination");
        });
    </script>
</body>
</html>
