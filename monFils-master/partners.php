<?php
/*
Template Name: Liste des partenaires
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <header class="page-header">
            <h1 class="page-title">Nos partenaires</h1>
        </header><!-- .page-header -->

        <?php 
    // On récupère tous les partenaires enregistrés avec CPTUI
    $partners = get_posts(array(
        'post_type' => 'partenaire',
        'posts_per_page' => -1,
    ));
    // On vérifie si on a des partenaires
    if($partners) {
        // On boucle sur les partenaires
        foreach($partners as $partner) {
            // On récupère les données du groupe de champs personnalisé 'partenaire_details'
            $partner_name = get_field('nom_du_partenaire', $partner->ID) ;
            $partner_logo = get_field('logo_partenaire', $partner->ID);
            $partner_url = get_field('url_partenaire', $partner->ID);
            $partner_description = get_field('description_partenaire', $partner->ID);
            $partner_debut = get_field('debut_partenariat', $partner->ID);
            $partner_fin = get_field('fin_partenariat', $partner->ID);

            // On affiche les détails du partenaire
            echo '<div class="partner">';
				echo '<h2 class="nompart">' . $partner_name . '</h2>';
                echo '<img class="imgpart" src="' . $partner_logo['url'] . '" alt="Logo de ' . $partner_name . '">';
                echo '<p class="descpart">' . $partner_description . '</p>';
                echo '<p class="datespart">Partenariat du : '.$partner_debut.' au : '.$partner_fin.' </p>';
                echo '<a class="urlpart" href="' . $partner_url . '">Visiter le site web</a>';
            echo '</div>';
        }
    } else {
        // On affiche un message si on n'a pas de partenaires
        echo '<p>Aucun partenaire trouvé</p>';
    }
?>



    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>