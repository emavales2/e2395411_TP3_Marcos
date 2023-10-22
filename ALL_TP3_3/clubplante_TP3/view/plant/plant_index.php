{{ include('header.php', {title: 'Liste de Plantes'})}}
    
    <header class = "pg_title">
        <h2>Liste de Plantes</h2>  

        <button>
            <a href="{{ path }}plant/create">Créer Nouvelle Fiche Plante</a>
        </button>
    </header>
      
    <div class="content">

        {% for plant in plants %}

        <article class = "plant_fiche">
            <section>
                <div>
                    <h3>Nom</h3>
                    <h4><a href='{{ path }}plant/show/{{ plant.id }}'>{{ plant.name }}</a></h4>                                         
                </div>

                <div>
                    <h3>Type</h3>                                
                    <h4>{{ plant.type }}</h4>
                </div>
                
                <h5><a href='{{ path }}plant/show/{{ plant.id }}'> > >  Plus d'information</a></h5>
            </section> 
            
            <picture class="pic">
                    <img src="{{ path }}view/plant/plant_img/stock_plant.jpg" alt="Plant Image">
            </picture>
        </article>               

        {% endfor %}
    </div>
</body>
</html>