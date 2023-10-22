{{ include('header.php', {title: 'Login'})}}


    {% if errors is defined %}
    <span class="error">{{ errors|raw }}</span>
    {% endif %}

    <h2>Login</h2>

    <article class = "article_form" >
        <form action="{{ path }}login/auth" method="post">

                <label>Username
                    <input type="email" name="username" value="{{data.username}}">
                </label>

                <label>Password
                    <input type="password" name="password">
                </label>

                <div class = "button">
                    <input type="submit" value="LOG IN">
                </div>
        </form>
    </article>

</body>
</html>