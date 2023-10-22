{{ include('header.php', {title: 'Mon Profil'})}}

<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----?>

    <article class = "article_form" >
    <!-- <article class = "smallarticle"> -->
        <section>
            <div>
                <h3>Nom</h3>
                <p>{{ user.name }}</p>                                         
            </div>

            <div>
                <h3>Username</h3>                                
                <p>{{ user.email_username }}</p>  
            </div> 

            <div>
                <h3>Ville</h3>                                
                <p>{{ cities.city }}</p>  
            </div>

            <div>
                <h3>Code Postale</h3>                                
                <p>{{ user.postal_code }}</p>  
            </div>

            <div>
                <h3>Courriel</h3>                                
                <p>{{ user.email_username }}</p>  
            </div> 

            <div>
                <h3>Phone</h3>                                
                <p>{{ user.phone }}</p>  
            </div>

            <div>
                <h3>Wishlist</h3>                                
                <p>{{ user.wishlist }}</p>  
            </div>
                    
            <button>
                <a  href="{{ path }}user/edit/{{ user.id }}">Mise à jour</a>
            </button>
        </section> 
        

        <form class = "xtra_button" action="{{ path }}user/destroy" method="post">
            <div class="button">
                <input type="hidden" name="id" value="{{ user.id }}">
                <input type="submit" value="Eliminer Compte">
            </div>
        </form>               
    </article>   

</body>
</html>