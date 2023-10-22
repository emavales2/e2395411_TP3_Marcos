
{{ include('header.php', {title: 'Mettre a Jour un Membre'})}}

    <h2>Mise à Jour</h2>

    <article class = "article_form">

        <form  action="{{ path }}user/update" method="post">

            <input type="hidden" name="id" value="{{ user.id }}">
            
            <label>Nom
                <input type="text" name="name" value="{{ user.name }}">
            </label>

            <label>Ville
                <select name="city_id">
                    {% for city in cities %}
                    <option value="{{ city.id }}"  {% if  city.id == user.city_id %} selected {% endif %}>{{ city.name }}</option>
                    {% endfor%}
                </select>
            </label>      

            <label>Code Postal
                <input type="text" name="postal_code" value="{{ user.postal_code }}">
            </label>

            <label>Courriel
                <input type="email" name="courriel" value="{{ user.email_username }}">
            </label>

            <label>Phone
                <input type="text" name="phone" value="{{ user.phone }}">
            </label>

            <label>Wishlist
                <input type="text" name="wishlist" value="{{ user.wishlist }}">
            </label>

            <div class = "button" >
                <input type="submit" value="Save">
            </div>
        </form>

        <form class = "xtra_button" action="{{ path }}user/destroy" method="post">
            <div class="button">
                <input type="hidden" name="id" value="{{ user.id }}">
                <input type="submit" value="Eliminer Compte">
            </div>

        </form>

    </article>

</body>
</html>