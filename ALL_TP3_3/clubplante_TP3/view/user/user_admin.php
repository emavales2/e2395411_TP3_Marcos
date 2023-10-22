
{{ include('header.php', {title: 'Ajouter un Admin'})}}
<!-- même si le tab dit "admin", cette page utilise les champs de usager de base; sur le formulaire pour le membre il y a plus de champs -->

    <h2>Créer Nouvelle Compte Admin </h2>

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
                <input type="text" name="privilege_id" value="1">
            </label>
            
            <div class = "button">
                <input type="submit" value="Save">
            </div>
        </form>
    </article>

</body>
</html>