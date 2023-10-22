
{{ include('header.php', {title: 'Ajouter une Fiche Plante'})}}

    <h2>Nouvelle Fiche Plante</h2>

    <article class = "article_form" >

        <form action="{{ path }}plant/store" method="post">

            <label>Nom
                <input type="text" name="name">

                {% if errors.name %}
                <span class="error">{{ errors.name }}</span>
                {% endif %}
            </label>

            <label>Type
                <input type="text" name="type">
            </label>

            <label>Description
                <textarea name="description" rows="6" cols="40"> 
                </textarea>
            </label>

            <label>Soins
                <textarea name="care" rows="6" cols="40"> 
                </textarea>
            </label>

            <label>Proposée par
                <input type="text" name="offered_by">
            </label>

            <!-- <label>Image
                <input type="blob" name="image" value="">
            </label> -->
            
            <input class="button" type="submit" value="Save">
        </form>
    </article>
</body>
</html>