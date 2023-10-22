{{ include('header.php', {title: 'Espace Usager'})}}
    
    <header class = "pg_title">
        <h2>Liste de Membres</h2>
    </header>
        
    <div class="content">
    
    {% for user in users %}
    
        <!-- --- Ce boucle montrera seulement les membres (un admin a le droit de voir tous les membres et son propre profil, mais pas les profils des autres admins --- -->
        {% if user.privilege_id == 2 %} 
        
        <article class = "smallarticle">
            <section>
                <div>
                    <h3>Nom</h3>
                    <h4><a href="{{ path }}user/show/{{ user.id }}">{{ user.name }}</a></h4> 
                </div>
                <div>
                    <h3>Membre depuis</h3>
                    <h4><a href="{{ path }}user/show/{{ user.id }}">{{ user.created_on|date('Y-m-d') }}</a></h4>                                         
                </div>
                <div>
                    <h3>Wishlist</h3>                                
                    <h4>{{ user.wishlist }}</h4>
                </div>                
                <h5><a href="{{ path }}user/show/{{ user.id }}"> > >  Plus d'information</a></h5>
            </section>            
        </article> 
        {% endif %}              
    {% endfor %}
        
    </div>
</body>
</html>