<style>

    a {
        color: #000;
        font-family: "Josefin Sans", sans-serif;

    }

    /* header */

    .header {
        background-image: linear-gradient(260deg, #2376ae 0%, lightgreen 100%);
        position: fixed;
        width: 100%;
        z-index: 3;
    }

    .header ul {
        margin: 0;
        padding: 0;
        list-style: none;
        overflow: hidden;
        background-image: linear-gradient(260deg, #2376ae 0%, lightgreen 100%);
    }

    .header li a {
        display: block;
        padding: 20px 20px;
        text-decoration: none;
        cursor: pointer;
    }

    .header li a:hover,
    .header .nav_span:hover {
        background-image: linear-gradient(260deg, #2376ae 0%, lightgreen 100%);
    }

    .header .logo {
        display: block;
        float: left;
        font-size: 2em;
        padding: 10px 20px;
        text-decoration: none;
    }

    /* list */

    .header .list {
        clear: both;
        max-height: 0;
        transition: max-height .2s ease-out;
    }

    /* list icon */

    .header .label-burger {
        cursor: pointer;
        display: inline-block;
        float: right;
        padding: 28px 20px;
        position: relative;
        user-select: none;
    }

    .header .label-burger .nav_burger {
        background: #333;
        display: block;
        height: 2px;
        position: relative;
        transition: background .2s ease-out;
        width: 18px;
    }

    .header .label-burger .nav_burger:before,
    .header .label-burger .nav_burger:after {
        background: #333;
        content: '';
        display: block;
        height: 100%;
        position: absolute;
        transition: all .2s ease-out;
        width: 100%;
    }

    .header .label-burger .nav_burger:before {
        top: 5px;
    }

    .header .label-burger .nav_burger:after {
        top: -5px;
    }

    /* list btn */

    .header .nav_span {
        display: none;
    }

    .header .nav_span:checked ~ .list {
        max-height: 240px;
    }

    .header .nav_span:checked ~ .label-burger .nav_burger {
        background: transparent;
    }

    .header .nav_span:checked ~ .label-burger .nav_burger:before {
        transform: rotate(-45deg);
    }

    .header .nav_span:checked ~ .label-burger .nav_burger:after {
        transform: rotate(45deg);
    }

    .header .nav_span:checked ~ .label-burger:not(.steps) .nav_burger:before,
    .header .nav_span:checked ~ .label-burger:not(.steps) .nav_burger:after {
        top: 0;
    }

    @media (min-width: 768px) {
        .header li {
            float: left;
        }
        .header li a {
            padding: 20px 30px;
        }
        .header .list {
            clear: none;
            text-align: center;
            max-height: none;
        }
        .header .label-burger {
            display: none;
        }
    }

</style>

<header class="header">
    <input class="nav_span" type="checkbox" id="nav_span" />
    <label class="label-burger" for="nav_span"><span class="nav_burger"></span></label>
    <ul class="list">
        <li><a href="homepage.php" class="link">Home</a></li>
        <li><a href="todo.php" class="link">To Do</a></li>
        <li><a href="food.php" class="link">Food</a></li>
        <li><a href="festival.php" class="link">Festivals</a></li>
        <li><a href="trip.php" class="link">Hotels</a></li>
        <li><a href="study.php" class="link">Study</a></li>
        <li><a href="survey.php" class="link">Survey</a></li>
    </ul>
</header>
</body>
