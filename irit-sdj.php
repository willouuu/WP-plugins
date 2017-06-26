<?php

/**
 * Plugin Name: IRITWidgetSdJ
 * Plugin URI: https://www.irit.fr
 * Description: Display Service du jour IRIT
 * Version: 0.1
 * Author: William VINCENT
 * Author URI: https://www.irit.fr
 * License: GPLv2
 * Text Domain: HomeIRIT
 * @package  irit-sdj
 */


/**
 * Example Widget Class
 */
class iritsdj extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function iritsdj() {
        parent::WP_Widget(false, $name = 'IRIT Service du Jour');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args) {	
        extract( $args );
	
	# On affiche le debut du bloc
	echo $before_widget;
	$title      ='<i class="iconService fa fa-info-circle" aria-hidden="true"></i>Service du jour';


        echo $before_title . $title . $after_title;



	# On recupere les ID de toutes les fiches
	$loop = new WP_Query( array( 'post_type' => 'fiche', 'posts_per_page' => -1 ) );
	$allID = array();
	while ( $loop->have_posts() ) : $loop->the_post(); 
		$allID[] = get_the_ID(); 
	endwhile;                                                                       

 
	# On selectionne un article
	$idRand=array_rand($allID,2);
	$idSave=$allID[$idRand[1]];
	//$idSave=$idRand;
	//echo $idSave;

	# On recupère le texte depuis la fiche de service
	$fieldContent = get_field("texte_service_du_jour",$idSave);
	
	# On affiche le resultat

#        echo '<div class="textwidget">
#                <div class="blockService">
#                        <p class="titleService ">'.get_the_title($idSave).'</p>
#                </div>  ';
#        echo $fieldContent;
#        echo '<p class="text-center"><a href="'.get_permalink($idSave).'">Cliquez ici pour acceder à la fiche service</a></p>';
#        echo '</div>';

        echo '<div class="textwidget">
                <div class="blockService">
                        <p class="titleService ">Bientôt disponible</p>
                </div>  ';
        echo $field;
        echo '  <p class="text-center">Les services du jours seront prochainement en ligne sur le site de nos offres de services</p>';
        echo '</div>';



	# On affiche la fin du bloc
        echo $after_widget;
    }
 
 
} // end class iritsdj

class iritsdjen extends WP_Widget {


    /** constructor -- name this the same as the class above */
    function iritsdjen() {
        parent::WP_Widget(false, $name = 'IRIT Service to Day');
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args) {
        extract( $args );

        # On affiche le debut du bloc
        echo $before_widget;
        $title      ='<i class="iconService fa fa-info-circle" aria-hidden="true"></i> Day Service';


        echo $before_title . $title . $after_title;



        # On recupere les ID de toutes les fiches
        $loop = new WP_Query( array( 'post_type' => 'fiche', 'posts_per_page' => -1 ) );
        $allID = array();
        while ( $loop->have_posts() ) : $loop->the_post();
                $allID[] = get_the_ID();
        endwhile;


        # On selectionne un article
        $idRand=array_rand($allID,2);
        $idSave=$allID[$idRand[1]];
        //echo $idSave;

        # On recupère le texte depuis la fiche de service
        $field = get_field("texte_service_du_jour",$idSave);

        # On affiche le resultat
#        echo '<div class="textwidget">
#		<div class="blockService">
#			<p class="titleService ">'.get_the_title($idSave).'</p>
#		</div>	';
#        echo $field;
#        echo '	<p class="text-center"><a href="'.get_permalink($idSave).'">Clic here to access the service description</a></p>';
#        echo '</div>';



        echo '<div class="textwidget">
                <div class="blockService">
                        <p class="titleService ">Coming soon</p>
                </div>  ';
        echo $field;
        echo '  <p class="text-center">Day services are soon online on the site </p>';
        echo '</div>';




        # On affiche la fin du bloc
        echo $after_widget;
    }
 

} // end class iritsdj




add_action('widgets_init', create_function('', 'return register_widget("iritsdj");'));
add_action('widgets_init', create_function('', 'return register_widget("iritsdjen");'));
?>
