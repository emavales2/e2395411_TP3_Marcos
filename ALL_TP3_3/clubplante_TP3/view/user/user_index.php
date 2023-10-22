{{ include('header.php', {title: 'Espace Usager'})}}
    
    <header class = "pg_title">
    <h2>Bienvenu/e {{ user_name }} !</h2>

    <!-- Ce if fait un check que l'usager logged in a une privilege_id == 1 -->
    {% if session.privilege == 1 %}  
        <h2>ESPACE ADMIN</h2>

        <!-- <button>
            <a href="{{ path }}user/user_member_list">Parcourez la Liste de Membres</a>
        </button>   -->
        
    {% elseif session.privilege == 2 %}  
        <h2>ESPACE MEMBRE</h2>
    {% endif %}
        <!-- Maybe put a dashboard image? -->        
    </header>

    <div class="content">

    {% if session.privilege == 1 %}  
        <button>
            <a href="{{ path }}user/member_list">Parcourez la Liste de Membres</a>
        </button>
    {% endif %}          
    

        <button>
            <a href="{{ path }}plant/index">Parcourez les Plantes Disponibles</a>
        </button>   
   
</body>
</html>