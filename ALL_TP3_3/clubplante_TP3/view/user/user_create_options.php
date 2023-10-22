
{{ include('header.php', {title: 'Ajouter un Usager'})}}

    <h2>Créer Nouvelle Compte </h2>

    <form action="{{ path }}user/create" method="post">

        <!-- ---- Les noms des boutons permettront la fonction 'create' dans le controlleur de pre-assigner le privilege_id au formulaire avant que l'usager le rémplisse ----  -->
        <section>
            <h2>Compte Membre</h2>
            <button type="submit" name="member_account">Créer</button>
        </section>

        <section>
            <h2>Compte Admin</h2>
            <button type="submit" name="admin_account">Créer</button>
        </section>
    </form>

</body>
</html>