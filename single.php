<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */

get_header();

if (get_post_type() == 'products' && false):
	echo '<div class="header-internas">
			<div class="container">
				<div class="text-center title-container no-line">
					<i class="icon icon-produtos center-block"></i>
					<h2>
						Nossa linha de <span class="black">Produtos</span>
					</h2>
				</div>
				<ul id="breadcrumb">
					<li>Você está em: QT EQUIPAMENTOS </li>
					<li><a href="https://qtequipamentos.com.br/" title="Ir para a Home"> &gt; Home</a></li>
					<li><a href="https://qtequipamentos.com.br/produtos" title="Ir para a produtos"> &gt; Produtos</a></li>
					<li><a href="https://qtequipamentos.com.br/produtos/caixas-as-1000" title=""> &gt; Caixas AS 1000</a></li>
					<li> &gt; Caixas AS 1000</li>
				</ul>
			</div>
		</div>';
endif;

?>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
			<?php
			
				if( get_post_meta( get_the_ID(), 'mfn-post-template', true ) == 'builder' ){
						
					// Template | Builder -----------------------------------------------
						
					$single_post_nav = array(
						'hide-sticky'	=> false,
						'in-same-term'	=> false,
					);
						
					$opts_single_post_nav = mfn_opts_get( 'prev-next-nav' );
					if( isset( $opts_single_post_nav['hide-sticky'] ) ){
						$single_post_nav['hide-sticky'] = true;
					}
						
					// single post navigation | sticky
					if( ! $single_post_nav['hide-sticky'] ){
						if( isset( $opts_single_post_nav['in-same-term'] ) ){
							$single_post_nav['in-same-term'] = true;
						}
							
						$post_prev = get_adjacent_post( $single_post_nav['in-same-term'], '', true );
						$post_next = get_adjacent_post( $single_post_nav['in-same-term'], '', false );
							
						echo mfn_post_navigation_sticky( $post_prev, 'prev', 'icon-left-open-big' );
						echo mfn_post_navigation_sticky( $post_next, 'next', 'icon-right-open-big' );
					}
						
				
					while( have_posts() ){
						the_post();							// Post Loop
						mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
					}
						
				} else {
						
					// Template | Default -----------------------------------------------
						
					while( have_posts() ){
						the_post();
						get_template_part( 'includes/content', 'single' );
					}
	
				}

			?>
		</div>
		
		<!-- .four-columns - sidebar -->
		<?php get_sidebar(); ?>
			
	</div>
</div>

<?php get_footer();

// Omit Closing PHP Tags