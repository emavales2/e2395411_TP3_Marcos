
{{ include('header.php', {title: 'Mettre a Jour Fiche Plante'})}}

    <h2>Mise à Jour</h2>

    <article class = "article_form">

        <form action="{{ path }}plant/update" method="post">

            <input type="hidden" name="id" value="{{ plant.id }}">
            
            <label>Nom
                <input type="text" name="name" value="{{ plant.name }}">
            </label>    

            <label>Type
                <input type="text" name="type" value="{{ plant.type }}">
            </label>

            <label>Description
                <textarea name="description" rows="6" cols="40">{{ plant.description }}</textarea>
            </label>

            <label>Soins
                <textarea name="care" rows="6" cols="40">{{ plant.care }}</textarea>
            </label>

            <!-- <label>Image
                <input type="blob" name="image" value="">
            </label> -->

            <input class="button" type="submit" value="Save">
        </form>

        <form class = "xtra_button" action="{{ path }}plant/destroy" method="post">            
            <div class="button">
                <input type="hidden" name="id" value="{{ plant.id }}">
                <input type="submit" value="Eliminer Fiche">
            </div>
        </form>

    </article>

</body>
</html>