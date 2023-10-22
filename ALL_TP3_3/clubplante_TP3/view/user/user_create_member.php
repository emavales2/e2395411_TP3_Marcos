
{{ include('header.php', {title: 'Ajouter un Membre'})}}

    <h2>Créer Nouvelle Compte Membre</h2>

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

            <label hidden>Privilege
                <input type="text" name="privilege_id" value="2">
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