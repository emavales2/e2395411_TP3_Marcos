
{{ include('header.php', {title: 'Créer Nouvelle Compte'})}}
<!-- même si le tab dit "admin", cette page utilise les champs de usager de base; sur le formulaire pour le membre il y a plus de champs -->

    {% if privilege_id == 1 %}
    <h2>Créer Nouvelle Compte Admin </h2>
    
    {% elseif privilege_id == 2 %}
    <h2>Créer Nouvelle Compte Membre </h2>
    {% endif %}

    {% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
    {% endif %}

    <!-- Ce message apparaît une fois la compte crée -->
    {% if success_msg is defined %}
    <div class="success">{{ success_msg }}</div>
    {% endif %}

    <article class = "article_form" >

        <form action="{{ path }}user/store" method="post">

            <label>Nom
                <input type="text" name="name">
            </label>

            <label>Username
                <input type="text" name="email_username">
            </label>

            <label>Mot de Passe
                <input type="password" name="password">
            </label>

            <label>Phone
                <input type="text" name="phone">
            </label>

            <!-- ---- Mis en commentaire pcq il n'y a plus besoin de l'avoir dans le formulaire; cette valeur sera pre-assignée à partir de la fonction create dans le controlleur ---- -->
            <label hidden>Privilege
                <input type="text" name="privilege_id" value="{{ privilege_id }}">
            </label>

            <label>Ville
                <select name="city_id">
                    {% for city in cities %}
                    <option value="{{ city.id }}">{{ city.name }}</option>
                    {% endfor %}
                </select>            
                           
            </label>

            <label>Code Postal
                <input type="text" name="postal_code">
            </label>

            <label>Wishlist
                <input type="text" name="wishlist">
            </label>
            
            <div class = "button">
                <input type="submit" value="Save">
            </div>
        </form>
    </article>

</body>
</html>