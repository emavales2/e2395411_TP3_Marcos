
{{ include('header.php', {title: 'Welcome'})}}
{# comments #}

    <header class = "pg_title">
        <h1>Club Plantastic</h1>

        <div class="item_row">
            <button>
            <a href="{{ path }}user/create_options">Créer Nouvelle Compte</a> 
            </button>

            <button>
            <a href="{{ path }}login">LOG IN</a>
            </button>
        </div>
    </header>

    <div class="content">
        <picture class="pic">
            <!-- <img src="{{ path }}plant/plant_img/stock_plant.jpg" alt="Plant Image"> -->
            <img src="{{ path }}view/plant/plant_img/stock_plant.jpg" alt="Plant Image">
        </picture>
    </div>
    
</body>
</html>
