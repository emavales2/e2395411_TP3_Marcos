{{ include('header.php', {title: 'Fiche Plante'})}}

<article class = "article_form" >

        <picture class="pic">
            <img src="{{ path }}view/plant/plant_img/stock_plant.jpg" alt="Plant Image">
        </picture>

        <section>
            <div>
                <h3>Nom</h3>
                <p>{{ plant.name }}</p>                                         
            </div>

            <div>
                <h3>Type</h3>                                
                <p>{{ plant.type }}</p>  
            </div>

            <div>
                <h3>Description</h3>                                
                <p>{{ plant.description }}</p>  
            </div> 

            <div>
                <h3>Soins</h3>                                
                <p>{{ plant.care }}</p>  
            </div>
            
            <button>
                <a href="{{ path }}plant/edit/{{ plant.id }}">Mise à jour</a>
            </button>

            <form class="button" action="{{ path }}plant/destroy" method="post">
                <input type="hidden" name="id" value="{{ plant.id }}">
                <input type="submit" value="Eliminer Fiche">
            </form>
       
        </section>        
    </article>

</body>
</html>