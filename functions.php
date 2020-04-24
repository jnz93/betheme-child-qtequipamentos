<?php
/**
 * Create CPT 
 * 
 * @link https://developer.wordpress.org/reference/functions/register_post_type/ 
 */
add_action('init', 'register_cpt_products');
function register_cpt_products()
{
    $post_type = 'products';
    $labels = array(
        'name'                  => _x( 'Produtos', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Produto', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Produtos', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Produto', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Adicionar novo', 'textdomain' ),
        'add_new_item'          => __( 'Adicionar novo Produto', 'textdomain' ),
        'new_item'              => __( 'Novo Produto', 'textdomain' ),
        'edit_item'             => __( 'Editar Produto', 'textdomain' ),
        'view_item'             => __( 'Ver Produto', 'textdomain' ),
        'all_items'             => __( 'Todos Produtos', 'textdomain' ),
        'search_items'          => __( 'Procurar Produtos', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Produtos:', 'textdomain' ),
        'not_found'             => __( 'Nenhum produto encontrado.', 'textdomain' ),
        'not_found_in_trash'    => __( 'Nenhum produto encontrado na lixeira.', 'textdomain' ),
        'featured_image'        => _x( 'Imagem destaque do Produto', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Adicionar capa do produto', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remover capa', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Usar como capa', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Produto arquivos', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Inserir no Produto', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Enviar para o Produto', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filtrar a lista Produtos', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Produtos lista de navegação', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Produtos Lista', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'produto' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'menu_icon'             => 'dashicons-cart'
    );

    register_post_type($post_type, $args);
}

/**
 * Create custom taxonomies
 * 
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function create_custom_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categorias', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Categoria', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Procurar Categorias', 'textdomain' ),
		'all_items'         => __( 'Todas Categorias', 'textdomain' ),
		'parent_item'       => __( 'Categoria ascendente', 'textdomain' ),
		'parent_item_colon' => __( 'Categoria ascendente:', 'textdomain' ),
		'edit_item'         => __( 'Editar Categoria', 'textdomain' ),
		'update_item'       => __( 'Atualizar Categoria', 'textdomain' ),
		'add_new_item'      => __( 'Adicionar Categoria', 'textdomain' ),
		'new_item_name'     => __( 'Novo nome da Categoria', 'textdomain' ),
		'menu_name'         => __( 'Categorias', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'categoria' ),
	);

    register_taxonomy('categorias', array('products'), $args);
}
add_action( 'init', 'create_custom_taxonomies', 0 );

/**
 * Serialize and import old categories
 * 
 */
function serialize_and_import_old_categories()
{
    $categories = array(
        array('id' => '31','id_categoria_pai' => '0','nome_pt' => 'QGBT / CCM','nome_es' => 'QGBT / CCM','nome_en' => '0','nome_seo' => 'qgbt-ccm','resumo' => 'Quadro Geral de Baixa Tensão<br />Centro de Controle de Motores','ordem' => '3','nivel' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'data_update' => '2018-03-16 20:44:24','usuario_update' => 'rafaeldusantos'),
        array('id' => '34','id_categoria_pai' => '0','nome_pt' => 'Caixas e Paineis','nome_es' => 'Caixas e Painéis','nome_en' => 'Caixas e Painéis','nome_seo' => 'caixas-e-paineis','resumo' => 'Certificados de Baixa<br />Tensão','ordem' => '1','nivel' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'data_update' => '2018-03-19 20:44:57','usuario_update' => 'rafaeldusantos'),
        array('id' => '33','id_categoria_pai' => '0','nome_pt' => 'Cubículos','nome_es' => '','nome_en' => '0','nome_seo' => 'cubiculos','resumo' => 'Certificados de Média<br />Tensão','ordem' => '2','nivel' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'data_update' => '2018-03-16 20:44:18','usuario_update' => 'rafaeldusantos'),
        array('id' => '36','id_categoria_pai' => '34','nome_pt' => 'Série CM','nome_es' => 'Série CM','nome_en' => 'Série CM','nome_seo' => 'serie-cm','resumo' => '','ordem' => '1','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-16 20:53:31','usuario_update' => 'rafaeldusantos'),
        array('id' => '37','id_categoria_pai' => '34','nome_pt' => 'Série CW','nome_es' => 'Série CW','nome_en' => '0','nome_seo' => 'serie-cw','resumo' => NULL,'ordem' => '2','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 10:44:28','usuario_update' => 'adminprocan'),
        array('id' => '47','id_categoria_pai' => '46','nome_pt' => 'Acessórios - Série GF','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-serie-gf','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 16:33:41','usuario_update' => 'adminprocan'),
        array('id' => '39','id_categoria_pai' => '34','nome_pt' => 'Caixas AS 1000','nome_es' => 'Caixas AS 1000','nome_en' => '0','nome_seo' => 'caixas-as-1000','resumo' => NULL,'ordem' => '5','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-23 09:32:47','usuario_update' => 'adminprocan'),
        array('id' => '40','id_categoria_pai' => '34','nome_pt' => 'Acessórios','nome_es' => 'Acessórios','nome_en' => '0','nome_seo' => 'acessorios','resumo' => NULL,'ordem' => '5','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-16 21:25:44','usuario_update' => 'rafaeldusantos'),
        array('id' => '53','id_categoria_pai' => '34','nome_pt' => 'Consoles','nome_es' => '','nome_en' => '0','nome_seo' => 'consoles','resumo' => NULL,'ordem' => '4','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-23 09:45:24','usuario_update' => 'adminprocan'),
        array('id' => '42','id_categoria_pai' => '37','nome_pt' => 'Acessórios  CW','nome_es' => 'Acessórios','nome_en' => '0','nome_seo' => 'acessorios-cw','resumo' => NULL,'ordem' => '4','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 15:15:11','usuario_update' => 'adminprocan'),
        array('id' => '43','id_categoria_pai' => '33','nome_pt' => 'QT MAC até 24kV','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-mac-ate-24kv','resumo' => NULL,'ordem' => '2','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-05 10:42:23','usuario_update' => 'adminprocan'),
        array('id' => '46','id_categoria_pai' => '34','nome_pt' => 'Gabinetes','nome_es' => '','nome_en' => '0','nome_seo' => 'gabinetes','resumo' => NULL,'ordem' => '3','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 16:24:44','usuario_update' => 'adminprocan'),
        array('id' => '44','id_categoria_pai' => '36','nome_pt' => 'Acessórios CM','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-cm','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 15:32:57','usuario_update' => 'adminprocan'),
        array('id' => '52','id_categoria_pai' => '39','nome_pt' => 'Acessórios Caixas AS 1000','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-caixas-as-1000','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-23 08:46:42','usuario_update' => 'adminprocan'),
        array('id' => '51','id_categoria_pai' => '46','nome_pt' => 'Acessórios - Série G','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-serie-g','resumo' => NULL,'ordem' => '2','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-21 10:10:21','usuario_update' => 'adminprocan'),
        array('id' => '54','id_categoria_pai' => '0','nome_pt' => 'QTSERV','nome_es' => 'QTSERV','nome_en' => '0','nome_seo' => 'qtserv','resumo' => 'Quadro Geral de Baixa Tensão<br />
        Centro de Controle de Motores','ordem' => '4','nivel' => '0','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-26 21:26:23','usuario_update' => 'rafaeldusantos'),
        array('id' => '55','id_categoria_pai' => '33','nome_pt' => 'QT MAC até 36kV','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-mac-ate-36kv','resumo' => NULL,'ordem' => '2','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-05 10:53:22','usuario_update' => 'adminprocan'),
        array('id' => '56','id_categoria_pai' => '33','nome_pt' => 'QT CLAD / QT SIEM','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-clad-qt-siem','resumo' => NULL,'ordem' => '3','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-06 09:34:17','usuario_update' => 'adminprocan'),
        array('id' => '57','id_categoria_pai' => '56','nome_pt' => 'Acessórios','nome_es' => 'Acessórios','nome_en' => 'Acessórios','nome_seo' => 'qt-clad-qt-siem-acessorios','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-14 13:59:55','usuario_update' => 'rafaeldusantos'),
        array('id' => '58','id_categoria_pai' => '33','nome_pt' => 'QT ME','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-me','resumo' => NULL,'ordem' => '4','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-06 14:39:24','usuario_update' => 'adminprocan'),
        array('id' => '59','id_categoria_pai' => '58','nome_pt' => 'Acessórios','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-me-acessorios','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-14 14:00:44','usuario_update' => 'rafaeldusantos'),
        array('id' => '60','id_categoria_pai' => '33','nome_pt' => 'Acessórios das Linhas','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-das-linhas','resumo' => NULL,'ordem' => '5','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-06 16:25:54','usuario_update' => 'adminprocan')
    );

    # Definição das categorias pais
    $super_parent_categories = array();
    $anothers_categories = array();
    foreach ($categories as $category) :
        $term           = $category['nome_pt'];
        $term_desc      = $category['resumo'];
        $term_id        = $category['id'];
        $parent_id      = $category['id_categoria_pai'];

        if ($parent_id == '0') :
            $super_parent_categories[$term_id] = array(
                'term_name' => $term, 
                'term_desc' => $term_desc, 
                'old_id'    => $term_id
            );
        else :
            $anothers_categories[$term_id] = array(
                'term_name' => $term, 
                'term_desc' => $term_desc, 
                'term_id'   => $term_id,
                'parent_id' => $parent_id,
            );
        endif;
    endforeach;

    # Definição das categorias pais e filhas
    $parent_categories      = array();
    $children_categories    = array();
    foreach ($anothers_categories as $category) :
        $term       = $category['term_name'];
        $term_desc  = $category['term_desc'];
        $term_id    = $category['term_id'];
        $parent_id  = $category['parent_id'];

        if (array_key_exists($parent_id, $super_parent_categories)) :
            $parent_categories[$term_id] = array(
                'term_name' => $term, 
                'term_desc' => $term_desc, 
                'parent_name' => $super_parent_categories[$parent_id]['term_name']
            );
        else :
            $children_categories[] = array(
                'term_name' => $term, 
                'term_desc' => $term_desc,
                'term_id'   => $term_id,
                'parent_name' => $anothers_categories[$parent_id]['term_name']
            );
        endif;
    endforeach;

    # Inserção das super paterns
    foreach ($super_parent_categories as $category) :
        $taxonomy       = 'categorias';
        $term           = $category['term_name'];
        $args           = array(
            'description'   => $category['term_desc'],
        );

        wp_insert_term($term, $taxonomy, $args);
    endforeach;

    # Inserção das parents
    foreach ($parent_categories as $category) :
        $taxonomy       = 'categorias';
        $term           = $category['term_name'];
        $parent_term    = get_term_by('name', $category['parent_name'], $taxonomy);
        $parent_id      = $parent_term->term_id;
        $args           = array(
            'description'   => $category['term_desc'],
            'parent'        => $parent_id,
        );

        wp_insert_term($term, $taxonomy, $args);
    endforeach;


    # Inserção dos childrens
    foreach ($children_categories as $category) :
        $taxonomy       = 'categorias';
        $term           = $category['term_name'];
        $parent_term    = get_term_by('name', $category['parent_name'], $taxonomy);
        $parent_id      = $parent_term->term_id;
        $args           = array(
            'description'   => $category['term_desc'],
            'parent'        => $parent_id,
        );

        wp_insert_term($term, $taxonomy, $args);
    endforeach;
}
// add_action('wp_footer', 'serialize_and_import_old_categories');

/**
 * Retorna um array com produtos e o nome da categoria que ele pertence
 * 
 * @return array
 */
function products_has_category_name()
{
    $categorias = array(
        array('id' => '31','id_categoria_pai' => '0','nome_pt' => 'QGBT / CCM','nome_es' => 'QGBT / CCM','nome_en' => '0','nome_seo' => 'qgbt-ccm','resumo' => 'Quadro Geral de Baixa Tensão<br />Centro de Controle de Motores','ordem' => '3','nivel' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'data_update' => '2018-03-16 20:44:24','usuario_update' => 'rafaeldusantos'),
        array('id' => '34','id_categoria_pai' => '0','nome_pt' => 'Caixas e Paineis','nome_es' => 'Caixas e Painéis','nome_en' => 'Caixas e Painéis','nome_seo' => 'caixas-e-paineis','resumo' => 'Certificados de Baixa<br />Tensão','ordem' => '1','nivel' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'data_update' => '2018-03-19 20:44:57','usuario_update' => 'rafaeldusantos'),
        array('id' => '33','id_categoria_pai' => '0','nome_pt' => 'Cubículos','nome_es' => '','nome_en' => '0','nome_seo' => 'cubiculos','resumo' => 'Certificados de Média<br />Tensão','ordem' => '2','nivel' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'data_update' => '2018-03-16 20:44:18','usuario_update' => 'rafaeldusantos'),
        array('id' => '36','id_categoria_pai' => '34','nome_pt' => 'Série CM','nome_es' => 'Série CM','nome_en' => 'Série CM','nome_seo' => 'serie-cm','resumo' => '','ordem' => '1','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-16 20:53:31','usuario_update' => 'rafaeldusantos'),
        array('id' => '37','id_categoria_pai' => '34','nome_pt' => 'Série CW','nome_es' => 'Série CW','nome_en' => '0','nome_seo' => 'serie-cw','resumo' => NULL,'ordem' => '2','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 10:44:28','usuario_update' => 'adminprocan'),
        array('id' => '47','id_categoria_pai' => '46','nome_pt' => 'Acessórios - Série GF','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-serie-gf','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 16:33:41','usuario_update' => 'adminprocan'),
        array('id' => '39','id_categoria_pai' => '34','nome_pt' => 'Caixas AS 1000','nome_es' => 'Caixas AS 1000','nome_en' => '0','nome_seo' => 'caixas-as-1000','resumo' => NULL,'ordem' => '5','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-23 09:32:47','usuario_update' => 'adminprocan'),
        array('id' => '40','id_categoria_pai' => '34','nome_pt' => 'Acessórios','nome_es' => 'Acessórios','nome_en' => '0','nome_seo' => 'acessorios','resumo' => NULL,'ordem' => '5','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-16 21:25:44','usuario_update' => 'rafaeldusantos'),
        array('id' => '53','id_categoria_pai' => '34','nome_pt' => 'Consoles','nome_es' => '','nome_en' => '0','nome_seo' => 'consoles','resumo' => NULL,'ordem' => '4','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-23 09:45:24','usuario_update' => 'adminprocan'),
        array('id' => '42','id_categoria_pai' => '37','nome_pt' => 'Acessórios  CW','nome_es' => 'Acessórios','nome_en' => '0','nome_seo' => 'acessorios-cw','resumo' => NULL,'ordem' => '4','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 15:15:11','usuario_update' => 'adminprocan'),
        array('id' => '43','id_categoria_pai' => '33','nome_pt' => 'QT MAC até 24kV','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-mac-ate-24kv','resumo' => NULL,'ordem' => '2','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-05 10:42:23','usuario_update' => 'adminprocan'),
        array('id' => '46','id_categoria_pai' => '34','nome_pt' => 'Gabinetes','nome_es' => '','nome_en' => '0','nome_seo' => 'gabinetes','resumo' => NULL,'ordem' => '3','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 16:24:44','usuario_update' => 'adminprocan'),
        array('id' => '44','id_categoria_pai' => '36','nome_pt' => 'Acessórios CM','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-cm','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-20 15:32:57','usuario_update' => 'adminprocan'),
        array('id' => '52','id_categoria_pai' => '39','nome_pt' => 'Acessórios Caixas AS 1000','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-caixas-as-1000','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-23 08:46:42','usuario_update' => 'adminprocan'),
        array('id' => '51','id_categoria_pai' => '46','nome_pt' => 'Acessórios - Série G','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-serie-g','resumo' => NULL,'ordem' => '2','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-21 10:10:21','usuario_update' => 'adminprocan'),
        array('id' => '54','id_categoria_pai' => '0','nome_pt' => 'QTSERV','nome_es' => 'QTSERV','nome_en' => '0','nome_seo' => 'qtserv','resumo' => 'Quadro Geral de Baixa Tensão<br />
        Centro de Controle de Motores','ordem' => '4','nivel' => '0','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-03-26 21:26:23','usuario_update' => 'rafaeldusantos'),
        array('id' => '55','id_categoria_pai' => '33','nome_pt' => 'QT MAC até 36kV','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-mac-ate-36kv','resumo' => NULL,'ordem' => '2','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-05 10:53:22','usuario_update' => 'adminprocan'),
        array('id' => '56','id_categoria_pai' => '33','nome_pt' => 'QT CLAD / QT SIEM','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-clad-qt-siem','resumo' => NULL,'ordem' => '3','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-06 09:34:17','usuario_update' => 'adminprocan'),
        array('id' => '57','id_categoria_pai' => '56','nome_pt' => 'Acessórios','nome_es' => 'Acessórios','nome_en' => 'Acessórios','nome_seo' => 'qt-clad-qt-siem-acessorios','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-14 13:59:55','usuario_update' => 'rafaeldusantos'),
        array('id' => '58','id_categoria_pai' => '33','nome_pt' => 'QT ME','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-me','resumo' => NULL,'ordem' => '4','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-06 14:39:24','usuario_update' => 'adminprocan'),
        array('id' => '59','id_categoria_pai' => '58','nome_pt' => 'Acessórios','nome_es' => '','nome_en' => '0','nome_seo' => 'qt-me-acessorios','resumo' => NULL,'ordem' => '1','nivel' => '2','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-14 14:00:44','usuario_update' => 'rafaeldusantos'),
        array('id' => '60','id_categoria_pai' => '33','nome_pt' => 'Acessórios das Linhas','nome_es' => '','nome_en' => '0','nome_seo' => 'acessorios-das-linhas','resumo' => NULL,'ordem' => '5','nivel' => '1','status' => '1','seo_title' => '0','seo_description' => '0','seo_keywords' => '0','data_update' => '2018-04-06 16:25:54','usuario_update' => 'adminprocan')
    );

    $produtos_has_categoria = array(
        array('id' => '1','id_categoria' => '36','id_produto' => '177'),
        array('id' => '2','id_categoria' => '41','id_produto' => '178'),
        array('id' => '3','id_categoria' => '37','id_produto' => '179'),
        array('id' => '5','id_categoria' => '40','id_produto' => '181'),
        array('id' => '6','id_categoria' => '44','id_produto' => '182'),
        array('id' => '7','id_categoria' => '44','id_produto' => '183'),
        array('id' => '8','id_categoria' => '44','id_produto' => '184'),
        array('id' => '9','id_categoria' => '44','id_produto' => '185'),
        array('id' => '10','id_categoria' => '44','id_produto' => '186'),
        array('id' => '11','id_categoria' => '44','id_produto' => '187'),
        array('id' => '12','id_categoria' => '44','id_produto' => '188'),
        array('id' => '13','id_categoria' => '44','id_produto' => '189'),
        array('id' => '14','id_categoria' => '44','id_produto' => '190'),
        array('id' => '15','id_categoria' => '44','id_produto' => '191'),
        array('id' => '16','id_categoria' => '44','id_produto' => '192'),
        array('id' => '17','id_categoria' => '44','id_produto' => '193'),
        array('id' => '18','id_categoria' => '37','id_produto' => '194'),
        array('id' => '19','id_categoria' => '37','id_produto' => '195'),
        array('id' => '20','id_categoria' => '37','id_produto' => '195'),
        array('id' => '21','id_categoria' => '37','id_produto' => '196'),
        array('id' => '22','id_categoria' => '42','id_produto' => '197'),
        array('id' => '23','id_categoria' => '42','id_produto' => '198'),
        array('id' => '24','id_categoria' => '42','id_produto' => '199'),
        array('id' => '25','id_categoria' => '42','id_produto' => '200'),
        array('id' => '26','id_categoria' => '42','id_produto' => '201'),
        array('id' => '27','id_categoria' => '46','id_produto' => '202'),
        array('id' => '28','id_categoria' => '37','id_produto' => '203'),
        array('id' => '29','id_categoria' => '37','id_produto' => '204'),
        array('id' => '30','id_categoria' => '37','id_produto' => '205'),
        array('id' => '31','id_categoria' => '37','id_produto' => '204'),
        array('id' => '32','id_categoria' => '37','id_produto' => '204'),
        array('id' => '33','id_categoria' => '37','id_produto' => '206'),
        array('id' => '34','id_categoria' => '37','id_produto' => '205'),
        array('id' => '35','id_categoria' => '37','id_produto' => '206'),
        array('id' => '36','id_categoria' => '37','id_produto' => '207'),
        array('id' => '37','id_categoria' => '37','id_produto' => '208'),
        array('id' => '39','id_categoria' => '42','id_produto' => '210'),
        array('id' => '40','id_categoria' => '42','id_produto' => '211'),
        array('id' => '41','id_categoria' => '42','id_produto' => '212'),
        array('id' => '42','id_categoria' => '42','id_produto' => '213'),
        array('id' => '43','id_categoria' => '46','id_produto' => '214'),
        array('id' => '44','id_categoria' => '47','id_produto' => '215'),
        array('id' => '45','id_categoria' => '47','id_produto' => '215'),
        array('id' => '46','id_categoria' => '47','id_produto' => '216'),
        array('id' => '47','id_categoria' => '47','id_produto' => '217'),
        array('id' => '50','id_categoria' => '47','id_produto' => '220'),
        array('id' => '52','id_categoria' => '47','id_produto' => '222'),
        array('id' => '53','id_categoria' => '47','id_produto' => '223'),
        array('id' => '54','id_categoria' => '47','id_produto' => '224'),
        array('id' => '55','id_categoria' => '47','id_produto' => '225'),
        array('id' => '56','id_categoria' => '46','id_produto' => '226'),
        array('id' => '57','id_categoria' => '46','id_produto' => '227'),
        array('id' => '58','id_categoria' => '46','id_produto' => '228'),
        array('id' => '59','id_categoria' => '51','id_produto' => '229'),
        array('id' => '60','id_categoria' => '51','id_produto' => '230'),
        array('id' => '61','id_categoria' => '51','id_produto' => '231'),
        array('id' => '62','id_categoria' => '51','id_produto' => '232'),
        array('id' => '63','id_categoria' => '51','id_produto' => '233'),
        array('id' => '64','id_categoria' => '51','id_produto' => '229'),
        array('id' => '65','id_categoria' => '51','id_produto' => '230'),
        array('id' => '66','id_categoria' => '51','id_produto' => '229'),
        array('id' => '67','id_categoria' => '46','id_produto' => '226'),
        array('id' => '68','id_categoria' => '46','id_produto' => '226'),
        array('id' => '69','id_categoria' => '46','id_produto' => '234'),
        array('id' => '70','id_categoria' => '46','id_produto' => '235'),
        array('id' => '71','id_categoria' => '46','id_produto' => '236'),
        array('id' => '72','id_categoria' => '51','id_produto' => '237'),
        array('id' => '73','id_categoria' => '51','id_produto' => '238'),
        array('id' => '77','id_categoria' => '51','id_produto' => '242'),
        array('id' => '78','id_categoria' => '51','id_produto' => '243'),
        array('id' => '80','id_categoria' => '51','id_produto' => '245'),
        array('id' => '81','id_categoria' => '51','id_produto' => '246'),
        array('id' => '82','id_categoria' => '51','id_produto' => '247'),
        array('id' => '83','id_categoria' => '51','id_produto' => '248'),
        array('id' => '84','id_categoria' => '51','id_produto' => '249'),
        array('id' => '85','id_categoria' => '51','id_produto' => '250'),
        array('id' => '86','id_categoria' => '51','id_produto' => '251'),
        array('id' => '87','id_categoria' => '51','id_produto' => '252'),
        array('id' => '88','id_categoria' => '51','id_produto' => '253'),
        array('id' => '89','id_categoria' => '51','id_produto' => '254'),
        array('id' => '91','id_categoria' => '51','id_produto' => '255'),
        array('id' => '92','id_categoria' => '51','id_produto' => '256'),
        array('id' => '93','id_categoria' => '51','id_produto' => '257'),
        array('id' => '95','id_categoria' => '51','id_produto' => '258'),
        array('id' => '98','id_categoria' => '51','id_produto' => '261'),
        array('id' => '99','id_categoria' => '51','id_produto' => '262'),
        array('id' => '100','id_categoria' => '51','id_produto' => '263'),
        array('id' => '101','id_categoria' => '51','id_produto' => '264'),
        array('id' => '102','id_categoria' => '51','id_produto' => '266'),
        array('id' => '103','id_categoria' => '51','id_produto' => '267'),
        array('id' => '104','id_categoria' => '51','id_produto' => '268'),
        array('id' => '106','id_categoria' => '51','id_produto' => '270'),
        array('id' => '110','id_categoria' => '39','id_produto' => '271'),
        array('id' => '111','id_categoria' => '52','id_produto' => '272'),
        array('id' => '112','id_categoria' => '52','id_produto' => '273'),
        array('id' => '113','id_categoria' => '52','id_produto' => '274'),
        array('id' => '114','id_categoria' => '52','id_produto' => '275'),
        array('id' => '115','id_categoria' => '52','id_produto' => '276'),
        array('id' => '116','id_categoria' => '52','id_produto' => '277'),
        array('id' => '117','id_categoria' => '52','id_produto' => '278'),
        array('id' => '118','id_categoria' => '52','id_produto' => '279'),
        array('id' => '119','id_categoria' => '52','id_produto' => '280'),
        array('id' => '122','id_categoria' => '53','id_produto' => '282'),
        array('id' => '123','id_categoria' => '53','id_produto' => '283'),
        array('id' => '124','id_categoria' => '53','id_produto' => '284'),
        array('id' => '125','id_categoria' => '53','id_produto' => '285'),
        array('id' => '126','id_categoria' => '40','id_produto' => '286'),
        array('id' => '127','id_categoria' => '40','id_produto' => '287'),
        array('id' => '128','id_categoria' => '40','id_produto' => '288'),
        array('id' => '129','id_categoria' => '40','id_produto' => '289'),
        array('id' => '130','id_categoria' => '40','id_produto' => '290'),
        array('id' => '131','id_categoria' => '40','id_produto' => '291'),
        array('id' => '132','id_categoria' => '40','id_produto' => '292'),
        array('id' => '133','id_categoria' => '40','id_produto' => '293'),
        array('id' => '134','id_categoria' => '40','id_produto' => '294'),
        array('id' => '135','id_categoria' => '40','id_produto' => '295'),
        array('id' => '137','id_categoria' => '40','id_produto' => '297'),
        array('id' => '138','id_categoria' => '40','id_produto' => '298'),
        array('id' => '139','id_categoria' => '40','id_produto' => '299'),
        array('id' => '140','id_categoria' => '40','id_produto' => '300'),
        array('id' => '141','id_categoria' => '40','id_produto' => '301'),
        array('id' => '142','id_categoria' => '40','id_produto' => '302'),
        array('id' => '143','id_categoria' => '40','id_produto' => '303'),
        array('id' => '144','id_categoria' => '40','id_produto' => '304'),
        array('id' => '145','id_categoria' => '40','id_produto' => '305'),
        array('id' => '146','id_categoria' => '40','id_produto' => '306'),
        array('id' => '147','id_categoria' => '40','id_produto' => '307'),
        array('id' => '148','id_categoria' => '40','id_produto' => '308'),
        array('id' => '158','id_categoria' => '43','id_produto' => '309'),
        array('id' => '162','id_categoria' => '43','id_produto' => '312'),
        array('id' => '165','id_categoria' => '43','id_produto' => '316'),
        array('id' => '166','id_categoria' => '43','id_produto' => '314'),
        array('id' => '169','id_categoria' => '55','id_produto' => '319'),
        array('id' => '171','id_categoria' => '55','id_produto' => '321'),
        array('id' => '173','id_categoria' => '55','id_produto' => '323'),
        array('id' => '175','id_categoria' => '55','id_produto' => '325'),
        array('id' => '181','id_categoria' => '56','id_produto' => '330'),
        array('id' => '183','id_categoria' => '56','id_produto' => '331'),
        array('id' => '184','id_categoria' => '57','id_produto' => '332'),
        array('id' => '186','id_categoria' => '57','id_produto' => '334'),
        array('id' => '188','id_categoria' => '57','id_produto' => '336'),
        array('id' => '194','id_categoria' => '57','id_produto' => '342'),
        array('id' => '200','id_categoria' => '57','id_produto' => '346'),
        array('id' => '206','id_categoria' => '58','id_produto' => '349'),
        array('id' => '207','id_categoria' => '59','id_produto' => '350'),
        array('id' => '208','id_categoria' => '59','id_produto' => '351'),
        array('id' => '209','id_categoria' => '59','id_produto' => '352'),
        array('id' => '210','id_categoria' => '59','id_produto' => '353'),
        array('id' => '211','id_categoria' => '59','id_produto' => '354'),
        array('id' => '212','id_categoria' => '59','id_produto' => '355'),
        array('id' => '213','id_categoria' => '59','id_produto' => '356'),
        array('id' => '214','id_categoria' => '59','id_produto' => '357'),
        array('id' => '215','id_categoria' => '59','id_produto' => '358'),
        array('id' => '216','id_categoria' => '59','id_produto' => '359'),
        array('id' => '217','id_categoria' => '59','id_produto' => '360'),
        array('id' => '218','id_categoria' => '60','id_produto' => '361'),
        array('id' => '219','id_categoria' => '60','id_produto' => '362'),
        array('id' => '220','id_categoria' => '60','id_produto' => '363'),
        array('id' => '222','id_categoria' => '52','id_produto' => '281'),
        array('id' => '225','id_categoria' => '47','id_produto' => '219'),
        array('id' => '226','id_categoria' => '47','id_produto' => '221'),
        array('id' => '227','id_categoria' => '51','id_produto' => '239'),
        array('id' => '229','id_categoria' => '51','id_produto' => '259'),
        array('id' => '231','id_categoria' => '60','id_produto' => '364'),
        array('id' => '232','id_categoria' => '51','id_produto' => '269'),
        array('id' => '233','id_categoria' => '51','id_produto' => '240'),
        array('id' => '234','id_categoria' => '51','id_produto' => '241'),
        array('id' => '235','id_categoria' => '47','id_produto' => '218'),
        array('id' => '236','id_categoria' => '51','id_produto' => '244'),
        array('id' => '237','id_categoria' => '51','id_produto' => '260'),
        array('id' => '238','id_categoria' => '36','id_produto' => '180'),
        array('id' => '239','id_categoria' => '37','id_produto' => '209'),
        array('id' => '240','id_categoria' => '51','id_produto' => '365'),
        array('id' => '243','id_categoria' => '40','id_produto' => '296'),
        array('id' => '245','id_categoria' => '55','id_produto' => '317'),
        array('id' => '248','id_categoria' => '43','id_produto' => '311'),
        array('id' => '249','id_categoria' => '43','id_produto' => '310'),
        array('id' => '250','id_categoria' => '55','id_produto' => '318'),
        array('id' => '251','id_categoria' => '43','id_produto' => '313'),
        array('id' => '252','id_categoria' => '55','id_produto' => '320'),
        array('id' => '253','id_categoria' => '43','id_produto' => '315'),
        array('id' => '254','id_categoria' => '55','id_produto' => '322'),
        array('id' => '255','id_categoria' => '55','id_produto' => '324'),
        array('id' => '256','id_categoria' => '56','id_produto' => '327'),
        array('id' => '257','id_categoria' => '56','id_produto' => '326'),
        array('id' => '258','id_categoria' => '56','id_produto' => '328'),
        array('id' => '259','id_categoria' => '56','id_produto' => '329'),
        array('id' => '262','id_categoria' => '57','id_produto' => '333'),
        array('id' => '263','id_categoria' => '57','id_produto' => '335'),
        array('id' => '264','id_categoria' => '57','id_produto' => '338'),
        array('id' => '265','id_categoria' => '57','id_produto' => '339'),
        array('id' => '266','id_categoria' => '57','id_produto' => '340'),
        array('id' => '267','id_categoria' => '57','id_produto' => '347'),
        array('id' => '268','id_categoria' => '57','id_produto' => '348'),
        array('id' => '271','id_categoria' => '57','id_produto' => '345'),
        array('id' => '272','id_categoria' => '57','id_produto' => '344'),
        array('id' => '273','id_categoria' => '57','id_produto' => '343'),
        array('id' => '274','id_categoria' => '57','id_produto' => '337')
    );
    
    $arr = array();
    for($i = 0; $i < sizeof($produtos_has_categoria); $i++) :

        for ($j = 0; $j < sizeof($categorias); $j++) :
            
            if ($produtos_has_categoria[$i]['id_categoria'] == $categorias[$j]['id']) :

                $arr[$i] = array("id_produto" => $produtos_has_categoria[$i]['id_produto'], "nome_categoria" => $categorias[$j]['nome_pt']);
                
            endif;

        endfor;

    endfor;
 
    return $arr;
}
// add_action('wp_footer', 'products_has_category_name');

/**
 * Register meta box(es).
 * 
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */
function register_metaboxes() {
    add_meta_box( 'product-old-id', __( 'ID antigo', 'textdomain' ), 'metaboxes_display_callback', 'products' );
}
add_action( 'add_meta_boxes', 'register_metaboxes');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function metaboxes_display_callback( $post ) {
    $old_id = get_post_meta($post->ID, 'product_old_id', true);
    ?>
    <div class="inside">
        <label class="screen-reader-text" for="excerpt">ID de importação</label>
        <input name="product_old_id" id="product_old_id" type="number" value="<?php echo $old_id; ?>" disabled>
        <p>ID de importação. Utilizado em operações relacionadas a importação de imagens do banco antigo. Novos produtos não precisam desse campo.</p>
    </div>
    <?php
}

/**
 * Enqueue child styles and scripts
 * 
 */
function enqueue_child_scripts()
{
    $parent_style = 'parent-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_child_scripts');

/**
 * Publish products from importation archive
 * 
 */
function publish_products_from_old_db($arr)
{
    $products_has_category = products_has_category_name();

    $postarr = array(
        'post_type'     => 'products',
        'post_status'   => 'publish',
        'post_title'    => $arr['nome_pt'],
        'post_content'  => $arr['descricao_pt'],
    );

    $post_id = wp_insert_post($postarr, $wp_error);

    if (!is_wp_error($post_id)) :

        # UPDATE POST META
        update_post_meta($post_id, 'product_old_id', $arr['id']);

        # SET CATEGORY
        for ($i = 0; $i < sizeof($products_has_category); $i++) :
            $categoria = $products_has_category[$i]['nome_categoria'];

            if ($products_has_category[$i]['id_produto'] == $arr['id']) :
                wp_set_object_terms($post_id, array($categoria), 'categorias');
            endif;
            // set_post_thumbnail($post, $thumbnail_id)
        endfor;

        # SET IMAGES
        $produtos_has_imagens = array(
            array('id' => '664','id_produto' => '180','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto3_-_Flange_superior_e_inferior_-_pag._A8_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '663','id_produto' => '180','descricao_pt' => 'Detalhes internos','descricao_es' => '','descricao_en' => '','imagem' => 'Detalhes_Internos1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '665','id_produto' => '180','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto4_-_Suporte_para_parede_-_pag._A8_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '666','id_produto' => '180','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto5_-_Esquema_-_pag._A9_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '667','id_produto' => '183','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto_3A_-_pag_A10.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '668','id_produto' => '183','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto_3B_-_pag_A10.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '669','id_produto' => '184','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto_5_-_pag_A10.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '670','id_produto' => '190','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_J_-_pagA12.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '671','id_produto' => '191','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_K_-_Caixa_CMCD.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '672','id_produto' => '191','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_L_-_Caixa_CMCD_A12.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '673','id_produto' => '191','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_M_-_pagA12.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '674','id_produto' => '191','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_O_-_pagA13.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '675','id_produto' => '191','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_P_-_pagA13.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '676','id_produto' => '191','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_Q_-_pagA13.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '677','id_produto' => '197','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_B_-_pag_A16.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '678','id_produto' => '197','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_C_-_pag_A16.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '696','id_produto' => '214','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_E_-_pag._A19_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '695','id_produto' => '214','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_D_-_pag._A19_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '694','id_produto' => '214','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_C_-_pag._A19_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '693','id_produto' => '214','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_B_-_pag._A19_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '692','id_produto' => '212','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_I_-_pag_A163.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '691','id_produto' => '211','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_I_-_pag_A162.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '690','id_produto' => '210','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_F_-_pag_A16.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '697','id_produto' => '214','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_F_-_pag._A19_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '698','id_produto' => '214','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_G_-_pag._A19_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '699','id_produto' => '214','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_H_-_pag._A19_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '700','id_produto' => '220','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '701','id_produto' => '220','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto2_-_Esquema_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '702','id_produto' => '221','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto11.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '703','id_produto' => '221','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto2_-_Esquema_11.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '704','id_produto' => '223','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto12.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '705','id_produto' => '223','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto2.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '706','id_produto' => '224','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto13.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '731','id_produto' => '235','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto61.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '730','id_produto' => '235','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto5_-_Esquema_31.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '729','id_produto' => '235','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto4_-_Esquema_21.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '728','id_produto' => '235','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto3_-_Esquema_11.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '727','id_produto' => '235','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto2_-_Detalhe_do_fecho2.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '726','id_produto' => '234','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto7_-_Esquema_41.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '725','id_produto' => '234','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto6_-_Esquema_31.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '724','id_produto' => '234','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto5_-_Esquema_21.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '723','id_produto' => '234','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto4_-_Esquema_11.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '722','id_produto' => '234','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto3_-_Detalhe_do_Fecho1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '721','id_produto' => '234','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto2_-_Imagem_Explodida1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '732','id_produto' => '236','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto2_-_Detalhe_do_fecho3.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '733','id_produto' => '236','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto3_-_Imagem_Explodida1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '734','id_produto' => '236','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto41.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '735','id_produto' => '242','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto21.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '736','id_produto' => '242','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto3.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '737','id_produto' => '244','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto22.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '738','id_produto' => '244','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto31.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '739','id_produto' => '252','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto1_-_Bandeja_para_Capacitores.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '740','id_produto' => '252','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto2_-_Bandeja_para_Capacitores.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '741','id_produto' => '258','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto2_-_Blindagem_de_Barramento.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '742','id_produto' => '258','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto3_-_Blindagem_de_Barramento.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '743','id_produto' => '260','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_1_-_pag._A37_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '744','id_produto' => '260','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_3_-_pag._A37_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '745','id_produto' => '260','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_4_-_pag._A37_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '746','id_produto' => '260','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_2_-_pagA37.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '747','id_produto' => '260','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_A_-_pagA37.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '748','id_produto' => '261','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_2_-_pag._A38_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '749','id_produto' => '264','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto_6_-_pág._A38_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '750','id_produto' => '267','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto_3_-_págA39.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '751','id_produto' => '267','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto_4_-_págA39.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '752','id_produto' => '267','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto_5_-_págA39.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '753','id_produto' => '270','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Foto_2_-_págA40.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '754','id_produto' => '271','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_1_-_págA47.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '755','id_produto' => '271','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_2_-_págA48.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '756','id_produto' => '271','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_3_-_págA48.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '757','id_produto' => '271','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_4_-_págA48.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '758','id_produto' => '271','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_5_-_págA48.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '759','id_produto' => '271','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_prod47.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '760','id_produto' => '271','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_prodA47.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '761','id_produto' => '271','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_prod_AS_1013_-_pág_A47.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '762','id_produto' => '284','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_4_-_pág_A44.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '763','id_produto' => '284','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_5_-_pág_A44.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '764','id_produto' => '285','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_6_-_págA44.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '765','id_produto' => '299','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_2.1_-_pág_A55_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '766','id_produto' => '299','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_2.2_-_pág_A55_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '767','id_produto' => '299','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_2.3_-_pág_A55_.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '768','id_produto' => '300','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_32_-_pág_A56.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '769','id_produto' => '305','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_82_-_pág_A57.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '770','id_produto' => '307','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_102_-_pág_A57.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '771','id_produto' => '317','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '774','id_produto' => '317','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_21.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '773','id_produto' => '317','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_3.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '775','id_produto' => '324','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_22.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '776','id_produto' => '324','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_31.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '777','id_produto' => '325','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_23.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '778','id_produto' => '325','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_32.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '779','id_produto' => '329','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_24.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '780','id_produto' => '331','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_11.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '781','id_produto' => '331','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_33.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '782','id_produto' => '332','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_12.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '783','id_produto' => '332','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_25.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '784','id_produto' => '340','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_13.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '785','id_produto' => '340','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_26.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '786','id_produto' => '342','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem1.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '787','id_produto' => '342','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem2.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '788','id_produto' => '344','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_14.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '789','id_produto' => '346','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_27.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '790','id_produto' => '349','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_15.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '791','id_produto' => '349','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_28.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '792','id_produto' => '351','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_16.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '793','id_produto' => '351','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_29.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '794','id_produto' => '357','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_17.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '795','id_produto' => '358','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_18.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '796','id_produto' => '359','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_19.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '797','id_produto' => '360','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_110.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '798','id_produto' => '362','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'Imagem_111.jpg','gabarito' => NULL,'principal' => NULL),
            array('id' => '799','id_produto' => '213','descricao_pt' => NULL,'descricao_es' => NULL,'descricao_en' => NULL,'imagem' => 'foto_2_-_pag_A171.jpg','gabarito' => NULL,'principal' => NULL)
        );

        foreach ($produtos_has_imagens as $imagem) :
            $attached_id    = $imagem['id_produto'];
            $url            = 'https://qtequipamentos.com.br/midias/produtos/principal/' . $imagem['imagem'];

            if ($attached_id == $arr['id']) :
                $attach_id = upload_thumbnail($url, $post_id);
                set_post_thumbnail($post_id, $attach_id);
            endif;

        endforeach;
    
    endif;
}

/**
 * Read data importation and call publish products function
 */
function import_read_and_publish_products()
{
    $produtos = array(
        array('id' => '180','nome_pt' => 'Caixas de Sobrepor','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'caixas-de-sobrepor','descricao_pt' => '<p>As Caixas de Montagem QTTA - S&eacute;rie CM s&atilde;o fabricadas atrav&eacute;s de processos de &uacute;ltima gera&ccedil;&atilde;o. Especialmente desenvolvidas para uso ao tempo, s&atilde;o dur&aacute;veis, seguras, pr&aacute;ticas e econ&ocirc;micas. Atendem as Normas: NBR5410, NBR - IEC - 62208.<br />Sua constru&ccedil;&atilde;o atende a norma NBR 60439 - 1/2/3.</p>
        <p>As Caixas de Montagem QTTA - S&eacute;rie CM s&atilde;o com flange superior e inferior.<br /> <br />Fornecidas sem placa de montagem, sendo item opcional. <br />As Caixas com alturas de 500 at&eacute; 1200mm possuem dois fechos e tr&ecirc;s dobradi&ccedil;as.</p>
        <p>Especifica&ccedil;&otilde;es:</p>
        <p>Caixa:<br />Constru&ccedil;&atilde;o monobloco em chapa de a&ccedil;o.<br />As espessuras das chapas de a&ccedil;o est&atilde;o especificadas junto com as refer&ecirc;ncias.</p>
        <p>Porta:<br />Em chapa de a&ccedil;o, com espessuras especificadas junto com as refer&ecirc;ncias.<br />Abertura: 100 graus.</p>
        <p>Visor de Policarbonato:<br />Com espessura de 3mm. &Eacute; fixado atrav&eacute;s de cola na parte interna da porta.</p>
        <p>Placa de Montagem: Opcional.</p>
        <p>Fecho:<br />Para caixas em a&ccedil;o carbono ou inox utiliza-se fecho de poliamida com miolo tipo fenda.<br />Nas caixas de inox podem ser utilizados fechos de a&ccedil;o inox: Sob consulta.</p>
        <p>Acabamento:<br />Para a caixa pintura eletrost&aacute;tica poli&eacute;ster p&oacute; na cor RAL 7035.</p>
        <p>Fornecimento Standard:<br />Caixa com porta em a&ccedil;o 1010 -1020, dobradi&ccedil;a e fecho.<br />A placa de montagem &eacute; ACESS&Oacute;RIO fornecida em chapa de a&ccedil;o galvanizado tipo Z 275.<br />As caixas/portas podem ser fornecidas em chapa de a&ccedil;o inox (304 - 316 - 430) ou em alum&iacute;nio (consultar).</p>
        <p>Prote&ccedil;&atilde;o:<br />IP 55 - Standard <br />IP 65 e IP66 - Utilizar o fecho IP66.</p>
        <p>Tipo de Montagem e Constru&ccedil;&atilde;o:<br />Tipo de montagem standard: Tipo 1: Para atender a NR10/12 &eacute; aconselh&aacute;vel o uso de porta interna ou protetor de policarbonato, para a prote&ccedil;&atilde;o das partes energizadas. <br />Para atender os tipos de montagens 2A e 2 B : Consultar<br />Constru&ccedil;&atilde;o conforme NBR IEC 60439-1/2/3.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto Principal pagA8_957313501.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:56:35','usuario_update' => 'adminprocan'),
        array('id' => '365','nome_pt' => 'Espelhos CD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'espelhos-cd','descricao_pt' => '<p>Espelhos CD</p>
        <p>Os espelhos tem como finalidade proteger o acesso as partes energizadas dos componentes.<br />S&atilde;o fornecidos cegos ou vazados para disjuntores tipo DIN de fixa&ccedil;&atilde;o r&aacute;pida em perfil DIN. Este tem capacidade para 21 m&oacute;dulos de 18mm, para molduras de 600mm e de 32 m&oacute;dulos de 18mm para molduras de 800mm.<br />Para disjuntores em caixa moldada, os espelhos s&atilde;o cegos. Os vazados devem ser feitos no local.<br />Fornecido em chapa de a&ccedil;o pintada em poli&eacute;ster p&oacute;, na cor RAL 7032.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1362779448.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-09 11:48:37','usuario_update' => 'adminprocan'),
        array('id' => '181','nome_pt' => 'Base Soleira','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'base-soleira','descricao_pt' => '<p>Base Soleira</p>
        <p>Em chapa de a&ccedil;o 1,95mm de espes- sura, pintura eletrost&aacute;tica p&oacute; preta RAL 9011.</p>
        <p>Dispon&iacute;vel em A&ccedil;o ou Inox.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 1 - pag A10_1780512806.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 14:36:01','usuario_update' => 'adminprocan'),
        array('id' => '182','nome_pt' => 'Base Soleira','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'base-soleira','descricao_pt' => '<p>Base Soleira</p>
        <p>Em chapa de a&ccedil;o 1,95mm de espes- sura, pintura eletrost&aacute;tica p&oacute; preta RAL 9011.</p>
        <p>Dispon&iacute;vel em A&ccedil;o ou Inox.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 1 - pag A10_1522577465.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 14:42:05','usuario_update' => 'adminprocan'),
        array('id' => '183','nome_pt' => 'Porta Interna','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'porta-interna','descricao_pt' => '<p>Porta Interna</p>
        <p>Em chapa de a&ccedil;o 1,2mm de espes- sura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7035.<br />As portas com altura maior de 600 mm possuem dois fechos.<br />Fornecimento STD tipo FIXO.<br />Para utiliza&ccedil;&atilde;o do tipo ajust&aacute;vel usar SUPORTE REGULADOR - Item 1.6.<br />Grau de Prote&ccedil;&atilde;o interna: IP20.</p>
        <p>Acompanham os acess&oacute;rios para montagem.</p>
        <p>Dispon&iacute;vel em A&ccedil;o ou Inox.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 2 - pag A10_1754552086.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 14:44:35','usuario_update' => 'adminprocan'),
        array('id' => '217','nome_pt' => 'Colunas Auxiliares','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'colunas-auxiliares','descricao_pt' => '<p>Colunas Auxiliares<br />As colunas auxiliares s&atilde;o para diversas aplica&ccedil;&otilde;es: Colunas de cabos, colunas de barramento, colunas de entrada com o disjuntor geral.<br />Esta situa&ccedil;&atilde;o permite a configura&ccedil;&atilde;o 3B.<br />No espa&ccedil;o das laterais podem ser colocados materiais isolantes para compartimentar a coluna auxiliar.<br />Acompanha placa de montagem.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_699770916.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 17:24:02','usuario_update' => 'adminprocan'),
        array('id' => '184','nome_pt' => 'Espelho Interno','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'espelho-interno','descricao_pt' => '<p>Espelho Interno</p>
        <p>Em chapa de a&ccedil;o 1,2mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7035. Permite regulagem de altura para ajuste conforme &agrave;s necessidades.<br />Grau de Prote&ccedil;&atilde;o Interna: IP10.<br />Para IP20 adicionar complementos.<br />Acompanham os acess&oacute;rios para montagem.</p>
        <p>Dispon&iacute;vel em A&ccedil;o ou Inox.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 4 - pag A10_754510075.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 14:58:47','usuario_update' => 'adminprocan'),
        array('id' => '185','nome_pt' => 'Placa de Montagem Cega','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'placa-de-montagem-cega','descricao_pt' => '<p>Placa de Montagem Cega</p>
        <p>Fabricada em chapa de a&ccedil;o galvanizado.<br />Espessuras: Inox: 1,5 - 2,0mm.</p>
        <p>Dispon&iacute;vel em A&ccedil;o galvanizado.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto D - pag A11_1080825531.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:01:08','usuario_update' => 'adminprocan'),
        array('id' => '186','nome_pt' => 'Teto Protetor','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'teto-protetor','descricao_pt' => '<p>Teto Protetor</p>
        <p>Constru&iacute;do em chapa de a&ccedil;o 1,5mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7035.<br />Acompanham acess&oacute;rios para montagem.<br />Profundidade do teto: P + 70mm.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto E - pag_1531472030.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:05:36','usuario_update' => 'adminprocan'),
        array('id' => '187','nome_pt' => 'Reguladores','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'reguladores','descricao_pt' => '<p>Reguladores</p>
        <p>&nbsp;</p>
        <p>Os reguladores s&atilde;o dispositivos que permitem a regulagem das placas de montagens em qualquer posi&ccedil;&atilde;o, no sentido da profundidade.</p>
        <p>S&atilde;o fabricados em chapa de a&ccedil;o zincada.</p>
        <p>Fornecimento: Conjunto com 4 pe&ccedil;as.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto F - pagA11_1637387113.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:20:54','usuario_update' => 'adminprocan'),
        array('id' => '188','nome_pt' => 'Limitador de Abertura','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'limitador-de-abertura','descricao_pt' => '<p>Limitador de Abertura</p>
        <p>Para limitar e manter a porta aberta na posi&ccedil;&atilde;o m&aacute;xima.<br />Confeccionado em a&ccedil;o inox 304.</p>
        <p>Fornecimento: 01 pe&ccedil;a.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto G - pagA11_948502138.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:25:25','usuario_update' => 'adminprocan'),
        array('id' => '189','nome_pt' => 'Suporte de fixação em parede','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suporte-de-fixacao-em-parede','descricao_pt' => '<p>Suporte de fixa&ccedil;&atilde;o em parede</p>
        <p>Para fixa&ccedil;&atilde;o das caixas em parede. Confeccionado em a&ccedil;o galvanizado 2,65mm. <br />Fornecimento: Conjunto com 4 pe&ccedil;as.<br />S&atilde;o aparafusados na traseira da caixa.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto H - pagA12_605102843.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:29:23','usuario_update' => 'adminprocan'),
        array('id' => '190','nome_pt' => 'Suporte de fixação em poste','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suporte-de-fixacao-em-poste','descricao_pt' => '<p>Suporte de fixa&ccedil;&atilde;o em poste</p>
        <p>Para fixa&ccedil;&atilde;o das caixas em poste. <br />Confeccionado em a&ccedil;o zincado trivalente. &Eacute; fixado ao poste atrav&eacute;s de cintas met&aacute;licas.<br />Formado por duas pe&ccedil;as de encaixe de f&aacute;cil remo&ccedil;&atilde;o.<br />Fornecimento: Conjunto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto I - pagA12_519023264.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:33:15','usuario_update' => 'adminprocan'),
        array('id' => '191','nome_pt' => 'Caixa CMCD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'caixa-cmcd','descricao_pt' => '<p>Caixa CMCD</p>
        <p>Conjunto composto por uma caixa tipo CM com uma moldura interna de montagem. <br />A moldura de montagem recebe espelhos cegos e/ou vazados para receber disjuntores tipo DIN, suportes para fixa&ccedil;&atilde;o de disjuntores tipo DIN e/ou bornes.<br />Com flange superior e inferior.<br />N&atilde;o acompanha placa de montagem.</p>
        <p>A moldura interna de montagem pode ser executada na bancada e instalada, posteriormente na caixa.</p>
        <p>O visor das portas &eacute; de policarbonato 3mm incolor.</p>
        <p>A moldura de arremate de parede (opcional) &eacute; de fixa&ccedil;&atilde;o externa para dar acabamento quando for embuti- da.<br />Quando a caixa for embutida a fabrica&ccedil;&atilde;o do fundo da caixa &eacute; em chapa de a&ccedil;o galvanizado. Neste caso adicionar a letra &laquo;G&raquo; ao c&oacute;digo.<br />Grau de Prote&ccedil;&atilde;o:<br /> Externa: IP54 p/ P=220mm<br /> IP40 p/ P=120mm</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto N - pagA13_1741926201.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:38:13','usuario_update' => 'adminprocan'),
        array('id' => '192','nome_pt' => 'Espelho CMCD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'espelho-cmcd','descricao_pt' => '<p>Espelhos CMCD</p>
        <p>Os espelhos tem como finalidade proteger o acesso &agrave;s partes energizadas dos componentes.<br />S&atilde;o fornecidos cegos ou vazados para disjuntores tipo DIN de fixa&ccedil;&atilde;o r&aacute;pida em perfil DIN. Este tem capacidade para 21 m&oacute;dulos de 18 mm.<br />Para disjuntores em caixa moldada, os espelhos s&atilde;o cegos. <br />Espelhos de 300mm podem ser fornecidos com rebaixo de 40mm para permitir a coloca&ccedil;&atilde;o de dispositivos de manobra com altura superior a 50mm.<br />Selo para fechamento de espa&ccedil;o de disjuntor. Para mais detalhes, confira na se&ccedil;&atilde;o "Cat&aacute;logos" em www.qtequipamentos.com.br</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto R - pagA13_1731166941.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:45:12','usuario_update' => 'adminprocan'),
        array('id' => '193','nome_pt' => 'Suporte CMCD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suporte-cmcd','descricao_pt' => '<p>Suportes CMCD</p>
        <p>Os suportes s&atilde;o fornecidos em dois tamanhos:<br />Para fixa&ccedil;&atilde;o de disjuntores tipo DIN, em perfil DIN e caixa moldada.<br />Os suportes permitem ajuste de profundidade.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto S - pagA13_2079891395.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-19 15:48:25','usuario_update' => 'adminprocan'),
        array('id' => '197','nome_pt' => 'Espelhos Internos','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'espelhos-internos','descricao_pt' => '<p>Espelhos Internos</p>
        <p>Fornecidos em dois modelos:<br />Articul&aacute;veis com dobradi&ccedil;as e fechos, fixados por parafusos.<br />Fabricados em chapa de a&ccedil;o #18 (1,2mm). Pintados na cor RAL7035 em poli&eacute;ster p&oacute;.</p>
        <p>Para o uso dos espelhos devem ser especificados os suportes e/ou placas de montagem.</p>
        <p>Selo para fechamento de espa&ccedil;o de disjuntor veja na p&aacute;gina A56.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto A - pag A16_1408050165.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 11:12:49','usuario_update' => 'adminprocan'),
        array('id' => '212','nome_pt' => 'Suportes Horizontais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suportes-horizontais','descricao_pt' => '<p>Suportes horizontais</p>
        <p>Suportes com perfil DIN para fixa&ccedil;&atilde;o de dispositivos DIN. S&atilde;o fabricados em chapa de a&ccedil;o galvanizado #18 (1,2mm).<br />Fornecimento: conjunto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto K - pag A16_1539131180.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 16:01:55','usuario_update' => 'adminprocan'),
        array('id' => '213','nome_pt' => 'Cavalete para canaletas plásticas','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'cavalete-para-canaletas-plasticas','descricao_pt' => '<p>Cavalete para canaletas pl&aacute;sticas</p>
        <p>Cavaletes para canaletas. S&atilde;o fabri- cados em chapa de a&ccedil;o galvanizado #14 e #18 (1,9 e1,2mm).<br />Fornecimento: conjunto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 1 - pag A17_755535424.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 16:19:09','usuario_update' => 'adminprocan'),
        array('id' => '214','nome_pt' => 'Série GF','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'serie-gf','descricao_pt' => '<p>Os Gabinetes QTTA - S&Eacute;RIE GF s&atilde;o gabinetes de solo para uso abrigado e preparados para receber disjuntores tipo DIN, caixa moldada e dispositivos de controle e monitoramento. <br />Capacidade da coluna de at&eacute; 800A - 25 KA.<br />S&atilde;o desmont&aacute;veis podendo ser fornecidos em forma de kit.<br />S&atilde;o acessados pelas laterais e as colunas de 400 mm de profundidade tem acesso traseiro. As colunas de 300 mm n&atilde;o tem acesso traseiro.<br />Possuem flange superior e inferior .</p>
        <p>Testes Realizados:</p>
        <p>1- Grau de Prote&ccedil;&atilde;o IP<br />2- Resist&ecirc;ncia ao Impacto<br />3- Eleva&ccedil;&atilde;o de Temperatura<br />4- Impulso El&eacute;trico<br />5- Propriedades Diel&eacute;tricas<br />6- Dist&acirc;ncia de Escoamento e Isola&ccedil;&atilde;o<br />7- Acionamento Mec&atilde;nico<br />8- EMC* ( * em elabora&ccedil;&atilde;o )</p>
        <p>Especifica&ccedil;&otilde;es:</p>
        <p>Estrutura desmont&aacute;vel confeccionada em chapa de a&ccedil;o 1,2 (#18) 1,5(#16)mm de espessura.<br />Pintura p&oacute; eletrost&aacute;tica cinza RAL 7035.<br />Grau de prote&ccedil;&atilde;o: Externo IP53 - IK 10.<br /> Interno IP20</p>
        <p>Fornecimento Standard:</p>
        <p>Estrutura:</p>
        <p>Os gabinetes com 300 e 400mm de profundidade acompanham porta cega ou visor de policarbonato.<br />Fechamento traseiro, base soleira e placa de fixa&ccedil;&atilde;o dos suportes dos dispositivos.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto A - pagA19_2100997145.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 16:26:36','usuario_update' => 'adminprocan'),
        array('id' => '211','nome_pt' => 'Suportes Verticais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suportes-verticais','descricao_pt' => '<p>Suportes verticais</p>
        <p>Fabricados em chapa de a&ccedil;o galvani- zado tipo &lsquo;B&rsquo; na bitola #14.<br />Com regulagem para fixa&ccedil;&atilde;o dos suportes de disjuntores, placas de montagens e borneiras . <br />Fornecimento: conjunto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto H - pag A16_1811792033.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 15:59:40','usuario_update' => 'adminprocan'),
        array('id' => '208','nome_pt' => 'Série 400 - IP55/65','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'serie-400-ip5565','descricao_pt' => '<p>CW - S&eacute;rie 400 - IP 55/65</p>
        <p>-&gt; Caixas monobloco;<br />-&gt; F&aacute;cil montagem com modularidades independentes;<br />-&gt; Fornecida com placa dos dispositivos de fixa&ccedil;&atilde;o dos equipamentos;<br />-&gt; Possui flange superior e inferior;<br />-&gt; Fornecimento Standard: corpo em monobloco, porta e placa de fixa&ccedil;&atilde;o;<br />-&gt; As colunas auxiliares possuem porta aparafusada e placa de montagem.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'modelo CW - Série 400 - IP 55-65_414902569.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 15:51:09','usuario_update' => 'adminprocan'),
        array('id' => '209','nome_pt' => 'Série 400 - IP 55/65 - Versão Caixa Vazia','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'serie-400-ip-5565-versao-caixa-vazia','descricao_pt' => '<p>CW - S&eacute;rie 400 - IP 55/65 - Vers&atilde;o Caixa Vazia</p>
        <p>-&gt; Caixa monobloco;<br />-&gt; Sem placas internas;<br />-&gt; Sem placa dos dispositivos de fixa&ccedil;&atilde;o dos equipamentos;<br />-&gt; Sem placa de montagem;<br />-&gt; Possui flange superior e inferior;<br />-&gt; Fornecimento Standard: corpo em monobloco, porta;<br />-&gt; Esse produto pode ser utilizado com os acess&oacute;rios das caixas CM.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'modelo CW - Série 400 - IP 55-65_48933092.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 11:24:27','usuario_update' => 'adminprocan'),
        array('id' => '210','nome_pt' => 'Placas de Montagem','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'placas-de-montagem','descricao_pt' => '<p>Placas de Montagem</p>
        <p>Fabricadas em chapa de a&ccedil;o galvani- zado #14 ( 1,95mm).</p>
        <p>Para fixa&ccedil;&atilde;o da placa de montagem &eacute; necess&aacute;rio o uso dos suporte vertiticais.<br />Para placa de montagem CW 1100.0 usar um par de suportes verticais.<br />Para os demais tamanhos utilizar dois (2) pares de suportes verticais.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto E - pag A16_821535709.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 15:57:31','usuario_update' => 'adminprocan'),
        array('id' => '207','nome_pt' => 'Série 400 - IP40','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'serie-400-ip40','descricao_pt' => '<p>Caixa CW IP40</p>
        <p>-&gt; Fornecida em forma de kit;<br />-&gt; F&aacute;cil montagem com modularidades independentes;<br />-&gt; Fornecida com placa dos dispositivos de fixa&ccedil;&atilde;o dos equipamentos;<br />-&gt; Possui flange superior e inferior;<br />-&gt; Fornecimento: corpo em monobloco, porta e placa de fixa&ccedil;&atilde;o;<br />-&gt; As colunas auxiliares possuem porta aparafusada e placa de montagem.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'modelo CW - Série 400 - IP 40_29835120.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 15:49:51','usuario_update' => 'adminprocan'),
        array('id' => '216','nome_pt' => 'Colunas','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'colunas','descricao_pt' => '<p>Colunas<br />Colunas STD com placa de fixa&ccedil;&atilde;o dos dispositvos para fixa&ccedil;&atilde;o dos equipamentos.<br />Sistema de fechamento atrav&eacute;s de fecho com var&atilde;o instalado na &aacute;rea dos montantes (externos), n&atilde;o havendo interfer&ecirc;ncia com a &aacute;rea de trabalho.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_312973553.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 17:20:57','usuario_update' => 'adminprocan'),
        array('id' => '218','nome_pt' => 'Laterais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'laterais','descricao_pt' => '<p>Laterais<br />As laterais s&atilde;o em chapa a&ccedil;o #18 (1,2 mm)<br />Fornecimento: PE&Ccedil;A</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel 800x600_999173472.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:42:38','usuario_update' => 'adminprocan'),
        array('id' => '219','nome_pt' => 'Conjunto de Fixação Interna','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'conjunto-de-fixacao-interna','descricao_pt' => '<p>Conjunto de fixa&ccedil;&atilde;o interna<br />O conjunto de fixa&ccedil;&atilde;o interna comp&otilde;e:<br />Placa para fixa&ccedil;&atilde;o dos suportes dos dispositivos e travessas de fixa&ccedil;&atilde;o, suporte para fixa&ccedil;&atilde;o dos espelhos.<br />Item j&aacute; incluso na linha GF. Aplica-se as linhas GL, GT e GP.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_2059386355.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:06:58','usuario_update' => 'adminprocan'),
        array('id' => '220','nome_pt' => 'Espelhos Internos','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'espelhos-internos','descricao_pt' => '<p>Espelhos Internos<br />Os espelhos s&atilde;o fabricados em chapa de a&ccedil;o #18 (1,2mm), pintados na cor RAL7035 poli&eacute;ster p&oacute;.<br />Os espelhos s&atilde;o articulados e fixados por parafusos.<br />Selo para fechamento de espa&ccedil;o de disjuntor, veja em Acess&oacute;rios para as Linhas / Fechos</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_2042983211.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 17:32:40','usuario_update' => 'adminprocan'),
        array('id' => '221','nome_pt' => 'Placas de Montagem','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'placas-de-montagem','descricao_pt' => '<p>Placas de Montagem<br />Fabricadas em chapa de a&ccedil;o galvanizado #14 ( 1,95mm).</p>
        <p>Para fixa&ccedil;&atilde;o da placa de montagem s&atilde;o necess&aacute;rios o uso dos suporte verticais.<br />Para placa de montagem CW1100.0 usar um par de suportes verticais.<br />Para os demais tamanhos utilizar dois (2) pares de suportes verticais.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_1922280140.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:08:55','usuario_update' => 'adminprocan'),
        array('id' => '222','nome_pt' => 'Acessórios para Coluna Auxiliar','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'acessorios-para-coluna-auxiliar','descricao_pt' => '<p>Acess&oacute;rios para Coluna Auxiliar</p>
        <p>Suporte para Borneiras:<br />Fornecimento: conjunto.</p>
        <p>Placa de Montagem:<br />Fabricada em chapa de a&ccedil;o galvanizado tipo B.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_853513178.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 17:37:05','usuario_update' => 'adminprocan'),
        array('id' => '223','nome_pt' => 'Suportes Verticais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suportes-verticais','descricao_pt' => '<p>Suportes verticais</p>
        <p>Fabricados em chapa de a&ccedil;o galvanizado tipo &lsquo;B&rsquo; na bitola #14.<br />Com regulagem para fixa&ccedil;&atilde;o dos suportes de disjuntores, placas de montagens e borneiras . <br />Fornecimento: conjunto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_1711411228.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 17:39:57','usuario_update' => 'adminprocan'),
        array('id' => '224','nome_pt' => 'Suportes Horizontais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suportes-horizontais','descricao_pt' => '<p>Suportes horizontais</p>
        <p>Suportes com perfil DIN para fixa&ccedil;&atilde;o de dispositivos DIN. S&atilde;o fabricados em chapa de a&ccedil;o galvanizado #18 (1,2mm).<br />Fornecimento: conjunto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_355754982.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 17:41:17','usuario_update' => 'adminprocan'),
        array('id' => '225','nome_pt' => 'Cavalete para canaletas plásticas','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'cavalete-para-canaletas-plasticas','descricao_pt' => '<p>Cavalete para canaletas pl&aacute;sticas</p>
        <p>Os cavaletes para canaletas s&atilde;o fabricados em chapa de a&ccedil;o galvanizado #14 e #18 (1,9 e1,2mm).<br />Fornecimento: conjunto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel_650288032.png','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-20 17:42:36','usuario_update' => 'adminprocan'),
        array('id' => '240','nome_pt' => 'Traseiras','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'traseiras','descricao_pt' => '<p>Os fechamentos traseiros s&atilde;o do tipo basculante, com dobradi&ccedil;as em um dos lados e parafusos de fixa&ccedil;&atilde;o no outro.<br />Constru&iacute;das em chapa de a&ccedil;o 1,95 e 1,5 mm de espessura.<br />Pintura eletrost&aacute;tica p&oacute; cinza RAL 7035.</p>
        <p>Fornecimento: 01 pe&ccedil;a.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel 800x600_11297994.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:41:39','usuario_update' => 'adminprocan'),
        array('id' => '241','nome_pt' => 'Laterais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'laterais','descricao_pt' => '<p>As laterais s&atilde;o fixadas na estrutura atrav&eacute;s de parafuso.<br />Constru&iacute;das em chapa de a&ccedil;o 1,95 e 1,5 mm de espessura.<br />Pintura eletrost&aacute;tica p&oacute; cinza RAL 7035.</p>
        <p>Fornecimento: 01 pe&ccedil;a.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel 800x600_670050841.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:42:10','usuario_update' => 'adminprocan'),
        array('id' => '242','nome_pt' => 'Placa de Montagem Acesso Frontal STD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'placa-de-montagem-acesso-frontal-std','descricao_pt' => '<p>Placa de Montagem Acesso Frontal STD</p>
        <p>As placas de montagem de ACESSO FRONTAL n&atilde;o ocupam toda a largura do gabinete. Para que toda largura do gabinete seja ocupada, no momento da acoplagem, utilizar as entre placas.<br />Constru&iacute;das em chapa de a&ccedil;o galvanizado 2,65mm tipo &lsquo;&rsquo;Z 275&rsquo;&rsquo;.<br />As placas de montagens para coluna auxiliares (L=410mm) s&atilde;o fabricadas em chapa de a&ccedil;o #14 (1,95mm) galvanizados Z 275.</p>
        <p>Os perfis de fixa&ccedil;&atilde;o laterais s&atilde;o do tipo &lsquo;&lsquo;Z&rsquo;&rsquo; que permitem o acesso direto da placa de montagem atrav&eacute;s do v&atilde;o da porta.<br />Possuem apoios deslizantes.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_61433568.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:03:10','usuario_update' => 'adminprocan'),
        array('id' => '237','nome_pt' => 'Base Soleira','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'base-soleira','descricao_pt' => '<p>Base Soleira</p>
        <p>Constru&iacute;da em chapa de a&ccedil;o 2,70 mm de espessura, pintura eletrost&aacute;tica p&oacute; preta RAL 9011 .<br />Altura da base: 100 mm.<br /> <br />Acompanham 04 p&eacute;s pl&aacute;sticos de prote&ccedil;&atilde;o.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_241881221.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 10:49:51','usuario_update' => 'adminprocan'),
        array('id' => '238','nome_pt' => 'Porta','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'porta','descricao_pt' => '<p>Porta</p>
        <p>Constru&iacute;da em chapa de a&ccedil;o com fecho escamote&aacute;vel e dobradi&ccedil;as.<br />Pintura eletrost&aacute;tica p&oacute; cinza RAL 7035.<br />Fecho lift, quatro dobradi&ccedil;as em a&ccedil;o inox e quatro pontos de fixa&ccedil;&atilde;o, em a&ccedil;o inox, no lado do fecho.<br />Exceto portas bipartidas.<br />Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_625786848.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 10:50:56','usuario_update' => 'adminprocan'),
        array('id' => '234','nome_pt' => 'Série GL','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'serie-gl','descricao_pt' => '<p>As estruturas QTTA - S&Eacute;RIE GL s&atilde;o autoportantes apoiados no solo de uso interno que apresentam facilidade de montagem com modularidade independente.<br />S&atilde;o desmont&aacute;veis, podendo ser fornecidos em forma de kit e ser acessados pelas laterais e traseira.<br />Atendem as Normas NBR 5410, NBR - IEC 62208.</p>
        <p>Especifica&ccedil;&otilde;es:<br />Estrutura desmont&aacute;vel confeccionada em chapa de a&ccedil;o 1,5 (#16) 1,2(#18)mm de espessura, com fura&ccedil;&atilde;o de 9mm e passo de 40mm.</p>
        <p>Acabamento:<br />Pintura p&oacute; eletrost&aacute;tica cinza RAL 7035.</p>
        <p>Fornecimento Standard:<br />Estrutura e um par de perfis laterais flange cego.<br />Fecho de porta tipo Lift com quatro fechamentos.<br />Ferragens da porta em a&ccedil;o inox 430.</p>
        <p>Prote&ccedil;&atilde;o:<br />IP 54.<br />IK 10.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_249946568.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 10:42:16','usuario_update' => 'adminprocan'),
        array('id' => '235','nome_pt' => 'Série GT','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'serie-gt','descricao_pt' => '<p>Os Gabinetes QTTA - S&Eacute;RIE GT s&atilde;o autoportantes monoblocos, apoiados no solo, que apresentam facilidade de montagem com modularidade independente.<br />Podem ser acessados pelas laterais e traseira.</p>
        <p>Atendem as Normas NBR 5410, NBR - IEC 62208.</p>
        <p>Especifica&ccedil;&otilde;es:<br />Estrutura confeccionada em chapa de a&ccedil;o 1,95 (#14) mm de espessura com fura&ccedil;&atilde;o de 9mm e passo de 40mm.<br />Para larguras maiores de 810 mm, porta dupla com montante divisor fixo.</p>
        <p>Acabamento:<br />Pintura p&oacute; eletrost&aacute;tica cinza RAL 7035.</p>
        <p>Fornecimento Standard:<br />Estrutura com porta frontal cega, fechamento traseiro, teto e fundo com flange.<br />Perfis laterais para fixa&ccedil;&atilde;o da placa de montagem.<br />Fecho da porta tipo Lift com quatro fechamentos.<br />Ferragens da porta em a&ccedil;o inox 430.</p>
        <p>Prote&ccedil;&atilde;o:<br />IP 66<br />IK 10.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_446096148.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 10:44:28','usuario_update' => 'adminprocan'),
        array('id' => '236','nome_pt' => 'Série GP','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'serie-gp','descricao_pt' => '<p>Gabinetes Modulares - S&eacute;rie GP</p>
        <p>As estruturas modulares s&eacute;rie GP linha EXTRA pesada s&atilde;o totalmente desmont&aacute;veis, podendo ser fornecidas em forma de kit e acessadas por todos os lados.<br />Os gabinetes s&eacute;rie GP permitem o uso de porta frontal/ traseira ou traseira basculante.<br />Na parte inferior com flange bi ou tri partidos.<br />As portas possuem fecho escamote&aacute;vel com quatro pontos de fixa&ccedil;&atilde;o, externo &agrave; parte de trabalho do gabinete.</p>
        <p>Especifica&ccedil;&otilde;es:<br />Estrutura em chapa de a&ccedil;o 2,25mm de espessura, com fura&ccedil;&atilde;o de 9mm e passo de 40mm.<br />Pintura eletrost&aacute;tica poli&eacute;ster p&oacute; cinza RAL 7035.</p>
        <p>Fornecimento Standard:<br />Estrutura com um par de perfis laterais sem flange. (opcional).<br />Fecho da porta tipo Lift com quatro fechamentos, exceto portas bipartidas.<br />Ferragens da porta em a&ccedil;o inox 430.<br />Na coluna auxiliar est&aacute; incluso porta frontal, tampa traseira, flange do fundo e base soleira. Fechamentos em chapa #16-1,5 mm.</p>
        <p>Prote&ccedil;&atilde;o:<br />IP 54 <br />IP 55 - Com teto protetor para a s&eacute;rie G;<br />IK 10 - Para todos os modelos.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_1665371345.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 10:46:34','usuario_update' => 'adminprocan'),
        array('id' => '239','nome_pt' => 'Porta Interna','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'porta-interna','descricao_pt' => '<p>Porta Interna</p>
        <p>Constru&iacute;da em chapa de a&ccedil;o.<br />Fixada diretamente nos suportes laterais do quadro, permitindo regulagem ao longo da profundidade, facilitando a instala&ccedil;&atilde;o dos dispositivos.<br />Pintura eletrost&aacute;tica p&oacute; cinza RAL 7035.</p>
        <p>Fornecimento: <br />Conjunto com acess&oacute;rios de fixa&ccedil;&atilde;o.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_1611480274.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:10:01','usuario_update' => 'adminprocan'),
        array('id' => '243','nome_pt' => 'Placa de Montagem Acesso Frontal - Estendida','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'placa-de-montagem-acesso-frontal-estendida','descricao_pt' => '<p>Placa de Montagem Acesso Frontal - ESTENDIDA</p>
        <p>As placas de montagem ocupam toda a largura do gabinete. <br />Constru&iacute;das em chapa de a&ccedil;o galvanizada 2,65 mm tipo &lsquo;&rsquo;Z 275&rsquo;&rsquo;.</p>
        <p>Para a placa de montagem ESTENDIDA:<br />A placa de montagem &eacute; fixada diretamente nos perfis laterais tipo "U".<br />N&atilde;o permite o uso de entre placas.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_773972713.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:06:22','usuario_update' => 'adminprocan'),
        array('id' => '244','nome_pt' => 'Placa de Montagem Segmentada','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'placa-de-montagem-segmentada','descricao_pt' => '<p>Placa de Montagem Segmentada</p>
        <p>As placas de montagem SEGMENTADAS (Longarinas) s&atilde;o confeccionadas em chapa de a&ccedil;o de 2,70 mm galvanizadas tipo &lsquo;&lsquo;Z 275&rsquo;&rsquo;. <br />S&atilde;o fixadas diretamente nos perfis laterais tipo "U" (n&iacute;veis diferentes) ou no perfil vertical (no mesmo n&iacute;vel).<br />Fornecimento: Placa de montagem segmentada e um par de fixadores.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_737768658.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:44:33','usuario_update' => 'adminprocan'),
        array('id' => '245','nome_pt' => 'Perfil Vertical','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'perfil-vertical','descricao_pt' => '<p>Perfil Vertical</p>
        <p>O perfil vertical &eacute; utilizado para fixa&ccedil;&atilde;o das PLACAS DE MONTAGEM SEGMENTADAS, em um mesmo n&iacute;vel.<br />( veja na p&aacute;gina A31 item 4.12 ).<br />Constru&iacute;do em chapa de a&ccedil;o galvanizado tipo "Z 275" de 1,95 mm de espessura. Uma face fura&ccedil;&atilde;o quadrado 9 x 9mm e outra de di&acirc;metro 9 e 5mm com passo de 25 mm.</p>
        <p>Unidade: par</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_1774461397.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:09:53','usuario_update' => 'adminprocan'),
        array('id' => '246','nome_pt' => 'Entre Placas','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'entre-placas','descricao_pt' => '<p>Entre placas</p>
        <p>As ENTRE PLACAS s&atilde;o utilizadas para complementar o espa&ccedil;o gerado entre as placas de montagem tipo STD, quando os gabinetes s&atilde;o acoplados. <br />Com largura de 88mm, s&atilde;o constru&iacute;das em chapa de a&ccedil;o 1,95mm galvanizada tipo "Z 275".</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_231598789.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:11:09','usuario_update' => 'adminprocan'),
        array('id' => '247','nome_pt' => 'Perfis','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'perfis','descricao_pt' => '<p>Perfis</p>
        <p>Para fixa&ccedil;&atilde;o placas de montagem STD.<br />Permite o uso de entre placas.<br />Montagem no sentido da profundidade.<br />Fornecimento: PAR</p>
        <p>Para fixa&ccedil;&atilde;o placas de montagem com<br />largura ESTENDIDA e segmentadas.<br />N&Atilde;O permite o uso de entre placas.<br />Montagem no sentido da profundidade.<br />Fornecimento: PAR</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1_902168955.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:16:15','usuario_update' => 'adminprocan'),
        array('id' => '248','nome_pt' => 'Perfil de Fundo','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'perfil-de-fundo','descricao_pt' => '<p>Para fixa&ccedil;&atilde;o de equipamentos pesados.<br />Dimens&otilde;es: 35 x 60 x 35mm.<br />Chapa: #12 AWG galvanizada.<br />Montagem no sentido da largura.<br />Fornecimento:.PE&Ccedil;A</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto_635402594.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:17:52','usuario_update' => 'adminprocan'),
        array('id' => '249','nome_pt' => 'Perfil para Isoladores','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'perfil-para-isoladores','descricao_pt' => '<p>Para fixa&ccedil;&atilde;o de isoladores.<br />Dimens&otilde;es: 18 x 80 x 18mm.<br />Chapa: #12 AWG galvanizada.<br />Montagem no sentido da largura, fixado entre perfis tipo "U".<br />Fornecimento: PE&Ccedil;A.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto perfil peça 2_1676728663.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:21:00','usuario_update' => 'adminprocan'),
        array('id' => '250','nome_pt' => 'Perfil de Apoio','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'perfil-de-apoio','descricao_pt' => '<p>Para fixa&ccedil;&atilde;o e apoio de disjuntores, <br />inversores, sof starts, etc.<br />Chapa: #12 AWG galvanizada<br />Montagem no sentido da largura, fixado entre perfis tipo "U".<br />Fornecimento:PE&Ccedil;A</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto perfil peça 3_147223875.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:22:14','usuario_update' => 'adminprocan'),
        array('id' => '251','nome_pt' => 'Limitador de Abertura','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'limitador-de-abertura','descricao_pt' => '<p>Para limitar e manter a porta aberta na posi&ccedil;&atilde;o m&aacute;xima.<br />Confeccionada em chapa de inox 304.<br />Acompanha kit de fixa&ccedil;&atilde;o.<br />Limite de abertura de 120 graus.<br />Fornecimento: uma pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto1_468273796.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:33:14','usuario_update' => 'adminprocan'),
        array('id' => '252','nome_pt' => 'Suporte Capacitores','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suporte-capacitores','descricao_pt' => '<p><br />S&atilde;o aplicadas para fixa&ccedil;&atilde;o de capacitores.<br />Os suportes s&atilde;o fixados entre os perfis laterais. <br />As bandeja para capacitores s&atilde;o fixadas entre dois perfis laterais.<br />As bandejas possuem trilhos deslizantes, fura&ccedil;&atilde;o que permitem a fixa&ccedil;&atilde;o de v&aacute;rios tipos e tamanhos de capacitores.<br />Acompanham parafusos para fixa&ccedil;&atilde;o.<br />Fornecimento: pe&ccedil;a</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1- Suporte Capacitores_51901266.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:37:23','usuario_update' => 'adminprocan'),
        array('id' => '253','nome_pt' => 'Tampa (Flange) Inferior (sem borracha)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'tampa-flange-inferior-sem-borracha','descricao_pt' => '<p>As tampas inferiores fecham a parte inferior dos gabinetes da s&eacute;rie &ldquo;G&rdquo;.<br />Chapa de a&ccedil;o #16 -1,5 mm.</p>
        <p>Tipo A: cegas</p>
        <p>Para profundidades de 400mm s&atilde;o bipartidas assim&eacute;tricas.</p>
        <p>Para profundidades de 600 e 800mm s&atilde;o tripartidas assim&eacute;tricas.</p>
        <p>*N&Atilde;O SE APLICA NA LINHA GT</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1 - Sem borracha_375989909.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-03-21 11:47:35','usuario_update' => 'adminprocan'),
        array('id' => '254','nome_pt' => 'Tampa (Flange) Inferior (com borracha)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'tampa-flange-inferior-com-borracha','descricao_pt' => '<p>As tampas inferiores fecham a parte inferior dos gabinetes da s&eacute;rie &ldquo;G&rdquo;.<br />Chapa de a&ccedil;o #16 -1,5 mm.</p>
        <p>Tipo B: Com veda&ccedil;&atilde;o em borracha na passagem dos cabos.</p>
        <p>Para profundidades de 400mm s&atilde;o bipartidas assim&eacute;tricas.<br />Para profundidades de 600 e 800mm s&atilde;o tripartidas assim&eacute;tricas.</p>
        <p>*N&Atilde;O SE APLICA NA LINHA GT</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1 - Tipo B - com borracha_1449025108.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 11:46:55','usuario_update' => 'adminprocan'),
        array('id' => '255','nome_pt' => 'Porta com Visor Policarbonato','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'porta-com-visor-policarbonato','descricao_pt' => '<p>Recorte preenchido com policarbonato 4mm, fixado com borracha resistente &agrave;s intemp&eacute;ries.</p>
        <p>A= 100 mm ( standard ).</p>
        <p>Porta dupla: Consultar.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1 - Porta com Visor Policarbonato_1290573003.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 13:53:09','usuario_update' => 'adminprocan'),
        array('id' => '256','nome_pt' => 'Teto com Ventilação Lateral','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'teto-com-ventilacao-lateral','descricao_pt' => '<p>Constru&iacute;do em chapa de a&ccedil;o 1,95 mm com pintura RAL 7035.<br />Altura do teto de 100 mm.<br />Grau de prote&ccedil;&atilde;o IP 40.</p>
        <p>*N&Atilde;O SE APLICA A LINHA GT"</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1 - 4 16 - Teto com Ventilação Lateral_1819300482.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 13:58:46','usuario_update' => 'adminprocan'),
        array('id' => '257','nome_pt' => 'Teto Protetor','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'teto-protetor','descricao_pt' => '<p>Constru&iacute;do em chapa de a&ccedil;o 1,95mm de espessura, pintura eletrost&aacute;tica p&oacute; RAL 7035. <br />Dimens&atilde;o da aba:<br /> Laterais e Traseira: 100mm.<br /> Frontal: 200mm.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1 - Teto Protetor_2086950111.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '21','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-03-21 21:14:42','usuario_update' => 'rafaeldusantos'),
        array('id' => '258','nome_pt' => 'Blindagem de Barramento','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'blindagem-de-barramento','descricao_pt' => '<p>A blindagem de barramento &eacute; confeccionada em chapa de a&ccedil;o galvanizado com 1,95mm de espessura. &Eacute; instalada internamente no gabinete, ocupando espa&ccedil;o de 225mm na altura, reduzindo a altura da placa de montagem em 300 mm.<br />Permite montagens tipos 1, 2A, 2B e 3A - NBR 6139-1.<br />Permite sa&iacute;da dos barramentos de distribui&ccedil;&atilde;o lateral ou traseira.</p>
        <p>OBS: Aplicado somente ao modelo GP.<br />*N&Atilde;O SE APLICA A LINHA GT.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1 - Blindagem de Barramento_1234067887.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 14:24:20','usuario_update' => 'adminprocan'),
        array('id' => '259','nome_pt' => 'Moldura Rack 19','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'moldura-rack-19','descricao_pt' => '<p>Constru&iacute;da em chapa de a&ccedil;o 1,95mm de espessura podendo ser utilizada em gabinetes da s&eacute;rie G com largura de 800mm.<br />Pintura eletrost&aacute;tica p&oacute; cinza RAL 7035.<br />1 U/A = 44,45mm.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto1 - Moldura Rack 19 - Articulável_1586438200.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:37:11','usuario_update' => 'adminprocan'),
        array('id' => '260','nome_pt' => 'Suportes / Tiretas','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suportes-tiretas','descricao_pt' => '<p>Suportes / Tiretas</p>
        <p>Os suportes / tiretas para diversos tipos de fixa&ccedil;&otilde;es s&atilde;o constru&iacute;dos em chapa de a&ccedil;o zincada.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 2 - pagA37_1869951582.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:47:27','usuario_update' => 'adminprocan'),
        array('id' => '261','nome_pt' => 'Mesa de Porta','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'mesa-de-porta','descricao_pt' => '<p>Mesa de Porta</p>
        <p>Constru&iacute;da em chapa de a&ccedil;o com 1,95mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7035.<br />Quando aberta permite a coloca&ccedil;&atilde;o de laptop e ferramentas.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 1 - pagA38_2093265070.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 15:04:23','usuario_update' => 'adminprocan'),
        array('id' => '262','nome_pt' => 'Luminárias','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'luminarias','descricao_pt' => '<p>Lumin&aacute;rias</p>
        <p>A lumin&aacute;ria completa &eacute; provida de tomada, chave liga/desliga, porta-fus&iacute;vel, chave comutadora de voltagem 110/220V, l&acirc;mpada de 20W e cabo de 3 m.</p>
        <p>Na vers&atilde;o compacta, l&acirc;mpada eletr&ocirc;nica de 20 W, bocal E27 com chave liga desliga sem reten&ccedil;&atilde;o.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 3 - pagA38_2055910274.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 15:05:54','usuario_update' => 'adminprocan'),
        array('id' => '263','nome_pt' => 'Porta Documentos','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'porta-documentos','descricao_pt' => '<p>Porta documentos</p>
        <p>Em PVC, no formato A4 na cor laranja.<br />Fixa&ccedil;&atilde;o: Autoadesivo.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 4 - págA38_635973048.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 15:12:49','usuario_update' => 'adminprocan'),
        array('id' => '264','nome_pt' => 'Exaustores','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'exaustores','descricao_pt' => '<p>Exaustores</p>
        <p>Dispositivos destinados a permitir a transfer&ecirc;ncia do ar quente interno para o exterior.</p>
        <p>Grau de prote&ccedil;&atilde;o IP54: Quando for necess&aacute;rio a coloca&ccedil;&atilde;o de filtros de entrada de ar e ventiladores de teto para retirada de ar.</p>
        <p>Aplicam-se a todos os tipos de gabinetes, caixas, racks, etc.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 5 - págA38_88274487.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 15:14:46','usuario_update' => 'adminprocan'),
        array('id' => '265','nome_pt' => 'Argola de Suspensão','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'argola-de-suspensao','descricao_pt' => '<p>Argola de Suspens&atilde;o</p>
        <p>As argolas de suspens&atilde;o s&atilde;o forjadas em a&ccedil;o com acabamento bicromatizado, ou inox com acabamento natural.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 1 - págA39_763659873.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 15:19:22','usuario_update' => 'adminprocan'),
        array('id' => '266','nome_pt' => 'Argola de Suspensão','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'argola-de-suspensao','descricao_pt' => '<p>Argola de Suspens&atilde;o</p>
        <p>As argolas de suspens&atilde;o s&atilde;o forjadas em a&ccedil;o com acabamento bicromatizado, ou inox com acabamento natural.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 1 - págA39_1983926529.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 15:19:44','usuario_update' => 'adminprocan'),
        array('id' => '267','nome_pt' => 'Conjunto de Isoladores para Barramento horizontal','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'conjunto-de-isoladores-para-barramento-horizontal','descricao_pt' => '<p>Conjunto de Isoladores para Barramento horizontal (Opcional)</p>
        <p>Conjunto formado por tr&ecirc;s ou quatro isoladores em ep&oacute;xi para at&eacute; QUATRO barras por fase. <br />Os isoladores em conjunto met&aacute;lico de a&ccedil;o galvanizado atendem at&eacute; 3200 A e 85 KA.<br />Os isoladores em ep&oacute;xi sem ferragem atendem at&eacute; 3200 A - 30 KA.<br />Fornecimento: 1 conjunto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 2 - págA39_1243987211.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 15:23:52','usuario_update' => 'adminprocan'),
        array('id' => '268','nome_pt' => 'Isoladores','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'isoladores','descricao_pt' => '<p>Isoladores (Opcional)</p>
        <p>Isoladores cil&iacute;ndricos em poli&eacute;ster destinados a montagem de barramentos na posi&ccedil;&atilde;o deitada.<br />Fornecimento: Pe&ccedil;a</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 6 - págA39_1308790300.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-21 15:27:17','usuario_update' => 'adminprocan'),
        array('id' => '269','nome_pt' => 'Barramento de Cobre','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'barramento-de-cobre','descricao_pt' => '<p>Barramento de Cobre</p>
        <p>Barras de cobre com cantos arredondados ou cantos retos.<br />Fornecimento: barras de 6 metros.<br />(confirmar comprimento da barra).</p>
        <p>C&oacute;digo com R no final indica cantos arredondados.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel 800x600_245419302.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:41:06','usuario_update' => 'adminprocan'),
        array('id' => '270','nome_pt' => 'Moldura CD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'moldura-cd','descricao_pt' => '<p>Moldura CD</p>
        <p>-&gt; &Eacute; composta por uma moldura de montagem, onde s&atilde;o fixados espelhos cegos e/ou vazados para receber disjuntores tipo DIN, suportes para fixa&ccedil;&atilde;o de disjuntores tipo DIN e/ou bornes.<br />-&gt; Para disjuntores de caixa moldada os espelhos n&atilde;o s&atilde;o vazados.<br />-&gt; A montagem pode ser feita na bancada e colocada posteriormente no gabinete.<br />-&gt; Possui dois modelos, um para gabinetes de 610mm de largura e outro para gabinetes de 810mm de largura.<br />-&gt; As molduras s&atilde;o fixadas diretamente nos perfis laterais tipo "Z".<br />-&gt; Permite regulagem na profundidade.<br />-&gt; Fornecido em chapa de a&ccedil;o pintada em poli&eacute;ster p&oacute;, na cor RAL 7035.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Foto 1 - págA40_1369109582.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '1','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-03-21 21:25:08','usuario_update' => 'rafaeldusantos'),
        array('id' => '271','nome_pt' => 'Caixas AS 1000','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'caixas-as-1000','descricao_pt' => '<p>Caixas utilizadas para montagem de instala&ccedil;&otilde;es diversas. Baixo custo, modulares, compactas, desmont&aacute;veis e compon&iacute;veis.<br />Com flanges remov&iacute;veis laterais, superiores e inferiores.<br />Atendem as Normas NBR 5410 e NBR - IEC 60439-1/2/3.</p>
        <p>Especifica&ccedil;&otilde;es:</p>
        <p>Caixa - Constru&iacute;das em chapa de a&ccedil;o de 1,95mm de espessura. Pintura eletrost&aacute;tica p&oacute; cinza RAL 7032.</p>
        <p>Fecho - Do tipo r&aacute;pido com manopla de baquelite.</p>
        <p>Fornecimento Standard - Fornecidas em embalagem &uacute;nica na forma de Kit contendo: caixa, porta, fechos e acess&oacute;rios para montagem.</p>
        <p>Prote&ccedil;&atilde;o - IP 40</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 1 - págA46_1791540713.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:44:46','usuario_update' => 'adminprocan'),
        array('id' => '272','nome_pt' => 'Tampa Flange','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'tampa-flange','descricao_pt' => '<p>Tampa Flange</p>
        <p>Para fechamento lateral superior e inferior. Constru&iacute;da em chapa de a&ccedil;o <br />1,50mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7032.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 1 - págA49_416427982.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:50:52','usuario_update' => 'adminprocan'),
        array('id' => '273','nome_pt' => 'Placa de Montagem','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'placa-de-montagem','descricao_pt' => '<p>Placa de Montagem<br />Constru&iacute;da em chapa de a&ccedil;o 1,95mm de espessura, pintura eletrost&aacute;tica p&oacute; laranja RAL 2003.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 2 - págA49_839497521.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:52:05','usuario_update' => 'adminprocan'),
        array('id' => '274','nome_pt' => 'Chapa de Instrumentos','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'chapa-de-instrumentos','descricao_pt' => '<p>Chapa de Instrumentos</p>
        <p>Constru&iacute;da em chapa de a&ccedil;o 1,95mm <br />de espessura, pintura eletrost&aacute;tica p&oacute; laranja RAL 2003.<br />Aplica-se na moldura da porta para fixa&ccedil;&atilde;o de instrumentos e/ou elementos de controle.<br />Utilizada em conjunto com as cantoneiras de fixa&ccedil;&atilde;o AS 8030.0.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 3 - págA49_332123747.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:53:39','usuario_update' => 'adminprocan'),
        array('id' => '275','nome_pt' => 'Chapa de Montagem','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'chapa-de-montagem','descricao_pt' => '<p>Chapa de Montagem</p>
        <p>Constru&iacute;da em chapa de a&ccedil;o 1,95mm de espessura, pintura eletrost&aacute;tica p&oacute; <br />laranja RAL 2003.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 4 - págA49_107783233.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:54:37','usuario_update' => 'adminprocan'),
        array('id' => '276','nome_pt' => 'Porta Interna','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'porta-interna','descricao_pt' => '<p>Porta Interna</p>
        <p>Constru&iacute;da em chapa de a&ccedil;o 1,2mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7032.<br />As medidas A e L referem-se as especifica&ccedil;&otilde;es das caixas AS 1000.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 5 - págA49_1230342087.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:55:52','usuario_update' => 'adminprocan'),
        array('id' => '277','nome_pt' => 'Base Soleira Monobloco','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'base-soleira-monobloco','descricao_pt' => '<p>Base Soleira Monobloco</p>
        <p>Constru&iacute;da em chapa de a&ccedil;o 1,95mm de espessura, pintura eletrost&aacute;tica p&oacute; preta RAL 9011.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 6 - págA50_361685614.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:56:56','usuario_update' => 'adminprocan'),
        array('id' => '278','nome_pt' => 'Cantoneiras de Fixação','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'cantoneiras-de-fixacao','descricao_pt' => '<p>Cantoneiras de Fixa&ccedil;&atilde;o</p>
        <p>-&gt; Constru&iacute;das em chapa de a&ccedil;o 1,5mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7032. <br />-&gt; Usadas para fixa&ccedil;&atilde;o das chapas de instrumentos AS 4015.0 ou AS 4016.0.<br />-&gt; Fixadas nas fura&ccedil;&otilde;es dos flanges.<br />-&gt; Fornecimento: 02 pe&ccedil;as.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 7 - págA50_2039475963.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:58:10','usuario_update' => 'adminprocan'),
        array('id' => '279','nome_pt' => 'Suporte Universal','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suporte-universal','descricao_pt' => '<p>Suporte Universal</p>
        <p>-&gt; Suporte com regulagem no sentido da profundidade. Para montagem de disjuntores, seccionadoras com acionamento fixo na porta.<br />-&gt; Fornecimento: 02 pe&ccedil;as<br />-&gt; Acabamento: Pintura eletrost&aacute;tica p&oacute; laranja RAL 2003.<br />-&gt; Regulagem: 120 &agrave; 145mm. </p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 8 - págA50_738595786.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 08:59:12','usuario_update' => 'adminprocan'),
        array('id' => '280','nome_pt' => 'Fecho Rápdo','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-rapdo','descricao_pt' => '<p>Fecho R&aacute;pido</p>
        <p>Do tipo r&aacute;pido com manopla de baquelite preto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 9 - págA50_1113857693.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 09:15:50','usuario_update' => 'adminprocan'),
        array('id' => '281','nome_pt' => 'Vedação','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'vedacao','descricao_pt' => '<p>Veda&ccedil;&atilde;o</p>
        <p>Fita autocolante de espuma de poliuretano em rolo de 5 (cinco) metros.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 10 - págA50_1857084181.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '10','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 09:27:41','usuario_update' => 'adminprocan'),
        array('id' => '282','nome_pt' => 'Consoles','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'consoles','descricao_pt' => '<p>Consoles</p>
        <p>-&gt; Mesas met&aacute;licas modulares e compos&iacute;veis fabricadas em a&ccedil;o carbono e a&ccedil;o inox 304/316/430.<br />-&gt; Larguras de 600 a 1200mm.<br />-&gt; Grau de Prote&ccedil;&atilde;o: IP 54 / IP 55.<br />-&gt; Pintura eletrost&aacute;tica p&oacute; poli&eacute;ster.</p>
        <p>Consoles met&aacute;licos compon&iacute;veis para atender as necessidades de aplica&ccedil;&atilde;o. Fabricados em chapa de a&ccedil;o 1,95/1,5mm com acabamento em p&oacute; RAL 7032.</p>
        <p>Atende as normas NBR 5410 e NBR-IEC 60439.</p>
        <p>Dispon&iacute;veis em a&ccedil;o e inox.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 1 - pág A43_538370928.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '1','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-03-23 09:44:27','usuario_update' => 'adminprocan'),
        array('id' => '283','nome_pt' => 'Módulo Superior','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'modulo-superior','descricao_pt' => '<p>M&oacute;dulo Superior<br />-&gt; Confeccionados em chapa de a&ccedil;o de 1,5mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7032.</p>
        <p>Modelo MF<br />-&gt; Com tampa traseira remov&iacute;vel e tampa frontal fechada.</p>
        <p>Modelo MG<br />-&gt; Com tampa traseira remov&iacute;vel e tampa basculante frontal com limitador de abertura.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 1 - pág A44_1705242740.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:05:33','usuario_update' => 'adminprocan'),
        array('id' => '284','nome_pt' => 'Módulo Mesa','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'modulo-mesa','descricao_pt' => '<p>M&oacute;dulo Mesa</p>
        <p>Confeccionados em chapa de a&ccedil;o de 1,5mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7032.</p>
        <p>M&oacute;dulo MC<br />-&gt; Com tampa da mesa articulada. Fornecida com limitador de abertura de porta. Pode ser utilizada com os m&oacute;dulos MF e MG.</p>
        <p>M&oacute;dulo ME<br />-&gt; M&oacute;dulo monobloco. Pode ser utilizado com os m&oacute;dulos MF e MG.</p>
        <p>M&oacute;dulo MD<br />-&gt; Com tampa da mesa fixa e inteira, n&atilde;o pode ser usada com os modelos MF e MG.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 3 - págA44_1365766875.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:13:18','usuario_update' => 'adminprocan'),
        array('id' => '285','nome_pt' => 'Módulo Base MB','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'modulo-base-mb','descricao_pt' => '<p>M&oacute;dulo Base MB</p>
        <p>Confeccionados em chapa de a&ccedil;o de 1,5mm de espessura, pintura eletrost&aacute;tica p&oacute; cinza RAL 7032. Com tampas traseira e frontal.</p>
        <p>Os flanges s&atilde;o bipartidos assim&eacute;tricos com veda&ccedil;&atilde;o dos cabos com borracha.</p>
        <p>Acompanha placa de montagem e base soleira.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 7 - pág A44_619953518.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:15:33','usuario_update' => 'adminprocan'),
        array('id' => '286','nome_pt' => 'Fecho Lingueta Simples','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-lingueta-simples','descricao_pt' => '<p>Fecho lingueta simples</p>
        <p>-&gt; Cromado, acionamento por chave.<br />-&gt; Material: zamak e chapa de a&ccedil;o bicromatizada.<br />-&gt; Aplica&ccedil;&atilde;o: Caixas s&eacute;rie CM e Caixas AS.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 1 - págA53_1761984815.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:30:12','usuario_update' => 'adminprocan'),
        array('id' => '287','nome_pt' => 'Fecho Lingueta com Regulagem','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-lingueta-com-regulagem','descricao_pt' => '<p>Fecho lingueta com regulagem e ma&ccedil;aneta &ldquo;T&rdquo; com e sem chave, miolo Yale.</p>
        <p>-&gt; Ma&ccedil;aneta, bucha e porca de fixa&ccedil;&atilde;o injetados em zamak. <br />-&gt; Seis discos de regulagem e lingueta confeccionada em a&ccedil;o com 1,5mm. <br />-&gt; Acabamento cromado, porca, lingueta e discos de regulagem zincado trivalente.<br />-&gt; Aplica&ccedil;&atilde;o: Uso Geral.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 2 - pág A53_1428872902.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:37:16','usuario_update' => 'adminprocan'),
        array('id' => '288','nome_pt' => 'Fecho Lingueta (Tipo Click)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-lingueta-tipo-click','descricao_pt' => '<p>Fecho Lingueta (Tipo Click)</p>
        <p>-&gt; Fecho lingueta de baquelite tipo click com ou sem dispositivo para cadeado.<br />-&gt; Aplica&ccedil;&atilde;o: Caixas AS e uso geral.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 3 - pág A53_2081297041.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:39:17','usuario_update' => 'adminprocan'),
        array('id' => '289','nome_pt' => 'Fecho lingueta manopla com trava','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-lingueta-manopla-com-trava','descricao_pt' => '<p>Fecho lingueta manopla com trava para cadeado</p>
        <p>-&gt; Manopla, bucha e porca de fixa&ccedil;&atilde;o injetados em zamak, lingueta em a&ccedil;o de 3,8mm. <br />-&gt; Acabamento: preto ou cromado, porca, lingueta, zincado trivalente.<br />-&gt; Aplica&ccedil;&atilde;o: Linha CCM, CM, QTMAC.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 4 - pág A53_932413362.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:41:07','usuario_update' => 'adminprocan'),
        array('id' => '290','nome_pt' => 'Fecho lingueta em poliamida','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-lingueta-em-poliamida','descricao_pt' => '<p>Fecho lingueta em poliamida</p>
        <p>-&gt; Acabamento preto;<br />-&gt; Altura: 20mm <br />-&gt; Aplica&ccedil;&atilde;o: Linha QTTA - Caixas CW s&eacute;rie 400.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 5 - pág A53_1262525754.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:42:35','usuario_update' => 'adminprocan'),
        array('id' => '291','nome_pt' => 'Mini Fecho (Lingueta em Zamak)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'mini-fecho-lingueta-em-zamak','descricao_pt' => '<p>Mini fecho lingueta em zamak</p>
        <p>-&gt; Acabamento cromado;<br />-&gt; Aplica&ccedil;&atilde;o: Linha QTTA - Caixas CW s&eacute;rie 400, IP40.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 6 - pág A53_935569144.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:44:00','usuario_update' => 'adminprocan'),
        array('id' => '292','nome_pt' => 'Chaves em Zamak e Poliamida','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'chaves-em-zamak-e-poliamida','descricao_pt' => '<p>Chaves em Zamak e em Poliamida</p>
        <p>-&gt; Chave de acionamento</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 7 - pág A54_1595902457.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:46:24','usuario_update' => 'adminprocan'),
        array('id' => '293','nome_pt' => 'Fecho Maçaneta Escamoteável','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-macaneta-escamoteavel','descricao_pt' => '<p>Fecho ma&ccedil;aneta escamote&aacute;vel, cremona com lingueta</p>
        <p>-&gt; Cremona, cavalete e lingueta confeccionados em a&ccedil;o, acabamento zincado trivalente. <br />-&gt; Ma&ccedil;aneta e espelho injetados em poliamida refor&ccedil;ada com fibra de vidro na cor preta. <br />-&gt; Miolo cromado e porca injetados em zamak. <br />-&gt; Pino trava para cadeado de 10mm em a&ccedil;o inox natural.</p>
        <p>-&gt; Aplica&ccedil;&atilde;o: Uso geral.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 8 - pág A54_723570951.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:50:35','usuario_update' => 'adminprocan'),
        array('id' => '294','nome_pt' => 'Fecho Cremona (Maçaneta em "L")','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-cremona-macaneta-em-l','descricao_pt' => '<p>Fecho cremona ma&ccedil;aneta em "L"</p>
        <p>-&gt; Cromado com ou sem chave Yale com lingueta central. <br />-&gt; Material: zamak, chapa de a&ccedil;o bicromatizada.<br />-&gt; Aplica&ccedil;&atilde;o: Uso geral</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 9 - pág A54_1850755288.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:52:22','usuario_update' => 'adminprocan'),
        array('id' => '295','nome_pt' => 'Fecho Cremona (Maçameta em "T")','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-cremona-macameta-em-t','descricao_pt' => '<p>Fecho cremona ma&ccedil;aneta em "T".</p>
        <p>-&gt; Cromado com ou sem chave Yale com lingueta central;<br />-&gt; Material: zamak, chapa de a&ccedil;o bicromatizada;<br />-&gt; Aplica&ccedil;&atilde;o: Uso geral.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 10 - pág A54_1589288573.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 10:56:36','usuario_update' => 'adminprocan'),
        array('id' => '296','nome_pt' => 'Fecho Cremona (Maçaneta em "L") dispositivo para cadeado','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-cremona-macaneta-em-l-dispositivo-para-cadeado','descricao_pt' => '<p>Fecho cremona ma&ccedil;aneta em "L"</p>
        <p>-&gt; Com dispositivo para cadeado com lingueta central.<br />-&gt; Material: zamak e chapa de a&ccedil;o bicromatizada.<br />-&gt; Aplica&ccedil;&atilde;o: Uso geral, cubiculos e CCM.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 11 - pág A54_1727777152.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '11','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 13:54:59','usuario_update' => 'adminprocan'),
        array('id' => '297','nome_pt' => 'Fecho Lift (Maçaneta Escamoteável)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fecho-lift-macaneta-escamoteavel','descricao_pt' => '<p>Fecho lift ma&ccedil;aneta escamote&aacute;vel com ou sem chave Yale</p>
        <p>-&gt; Material: Termopl&aacute;stico, zamak e chapa de a&ccedil;o bicromatizada.<br />-&gt; Aplica&ccedil;&atilde;o: uso em portas Linha QTTA s&eacute;rie G.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 12 - pág A54_774619964.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:00:34','usuario_update' => 'adminprocan'),
        array('id' => '298','nome_pt' => 'Mini Ventiladores 110/220 V','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'mini-ventiladores-110220-v','descricao_pt' => '<p>Mini Ventiladores 110/220 volts</p>
        <p>-&gt; Corpo de alum&iacute;nio fundido e com rolamentos. <br />-&gt; N&iacute;vel de ru&iacute;do menor de 42/46 DB.<br />-&gt; Vaz&atilde;o de ar: 156/180 m&sup3;/h.<br />-&gt; Pot&ecirc;ncia: 20 watts - 2700/3000 rpm.<br />-&gt; Tens&atilde;o: 110/220 Volts 50/60Hz.<br />-&gt; Para maior durabilidade das unidades de ventila&ccedil;&atilde;o utilize o sistema de controle de temperatura e rod&iacute;zio das unidades.</p>
        <p>-&gt; Veja dados complementares no item DISSIPA&Ccedil;&Atilde;O.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 1 - pág A55_879191221.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:04:36','usuario_update' => 'adminprocan'),
        array('id' => '299','nome_pt' => 'Filtros de Ar','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'filtros-de-ar','descricao_pt' => '<p>Filtros de Ar</p>
        <p>-&gt; Conjunto de grelha e filtro de ar, corpo em termopl&aacute;stico auto extingu&iacute;vel (UL94V0);<br />-&gt; Filtro progressivo de fio de poli&eacute;ster descart&aacute;vel. Acabamento cinza RAL 7032, fixa&ccedil;&atilde;o atrav&eacute;s de parafusos, IP 54;<br />-&gt; Outras cores e filtro de reposi&ccedil;&atilde;o, sob consulta;<br />-&gt; Neste modelo pode ser acoplado ventilador;<br />-&gt; Dimensional: 130 x 130mm.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 2 - pág A55_1491091542.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:05:48','usuario_update' => 'adminprocan'),
        array('id' => '300','nome_pt' => 'Kit de Parafusos','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'kit-de-parafusos','descricao_pt' => '<p>Kit de Parafusos</p>
        <p>-&gt; Kit de parafusos, porca quadrada M5 x 12 mm cabe&ccedil;a boleada com fenda cruzada, zincado, com arruelas (conjunto com 50 pe&ccedil;as).</p>
        <p>-&gt; Kit de parafusos, porca quadrada M6 x 12 mm cabe&ccedil;a boleada com fenda cruzada, zincado, com arruelas (conjunto com 50 pe&ccedil;as).</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 31 - pág A56_1076685739.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:15:13','usuario_update' => 'adminprocan'),
        array('id' => '301','nome_pt' => 'Kit para Aterramento','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'kit-para-aterramento','descricao_pt' => '<p>Kit para Aterramento</p>
        <p>Barra de cobre estanhado com 200 x 19 x 4mm, com vinte furos roscados M5, para conectar os cabos/fios terra.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 4 - pág A56_2054947920.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:17:24','usuario_update' => 'adminprocan'),
        array('id' => '302','nome_pt' => 'Kit de Fixação','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'kit-de-fixacao','descricao_pt' => '<p>Kit para Fixa&ccedil;&atilde;o</p>
        <p>Para fixa&ccedil;&atilde;o dos racks e colunas no piso. Possui quatro buchas M10, quatro parafusos rosca soberba, cabe&ccedil;a sextavada e quatro arruelas lisas.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 5 - pág A56_744719216.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:18:29','usuario_update' => 'adminprocan'),
        array('id' => '303','nome_pt' => 'Bloco de Conexão Trifásico','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'bloco-de-conexao-trifasico','descricao_pt' => '<p>Bloco de Conex&atilde;o Trif&aacute;sico</p>
        <p>Os blocos de conex&atilde;o trif&aacute;sica possuem capacidade de 80A. Fornecido em dois modelos: conector tipo garfo e tipo pino.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 6 - pág A56_482388970.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:20:33','usuario_update' => 'adminprocan'),
        array('id' => '304','nome_pt' => 'Selos para Espaços de Disjuntores','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'selos-para-espacos-de-disjuntores','descricao_pt' => '<p>Selos para Espa&ccedil;os de Disjuntores</p>
        <p>-&gt; Os SELOS s&atilde;o para cobrir os espa&ccedil;os n&atilde;o utilizados dos disjuntores. S&atilde;o fabricados em material termopl&aacute;stico na cor cinza.<br />-&gt; Fornecimento em embalagens com 10 pe&ccedil;as.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 7 - pág A56_347914401.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:22:04','usuario_update' => 'adminprocan'),
        array('id' => '305','nome_pt' => 'Suporte para Conectores','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suporte-para-conectores','descricao_pt' => '<p>Suporte para Conectores</p>
        <p>Rod&iacute;zios para fixa&ccedil;&atilde;o em bases ou colunas. S&atilde;o fabricados em a&ccedil;o com a banda de rodagem em material pl&aacute;stico resistente.</p>
        <p>Caracter&iacute;sticas t&eacute;cnicas:<br />-Estrutura met&aacute;lica zincada com rolamento.<br />-Banda de rodagem preta.<br />Capacidade de carga:<br /> Diam&ecirc;tro 4": 50kg.<br /> Di&acirc;metro 3": 35kg.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 81 - pág A57_1990784650.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:24:06','usuario_update' => 'adminprocan'),
        array('id' => '306','nome_pt' => 'Spray Duco','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'spray-duco','descricao_pt' => '<p>Spray Duco</p>
        <p>Spray Duco de secagem r&aacute;pida para aplica&ccedil;&atilde;o em toda linha visando pequenos reparos na pintura.<br />Dispon&iacute;vel nas cores cinza RAL 7032, Laranja RAL 2003, Cinza Munsell N6,5, Preto, Grafite RAL 7024.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 9 - pág A57_1905891808.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:26:46','usuario_update' => 'adminprocan'),
        array('id' => '307','nome_pt' => 'Gerenciador Térmico para Gabinetes','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'gerenciador-termico-para-gabinetes','descricao_pt' => '<p>Gerenciador T&eacute;rmico para Gabinetes</p>
        <p>O Gerenciador T&eacute;rmico controla as opera&ccedil;&otilde;es das unidades de ventila&ccedil;&atilde;o. Controla a temperatura e a sequ&ecirc;ncia de entrada das unidades.<br />Comanda dois blocos de ventiladores ligando cada bloco, quando as temperaturas do gabinete atingirem as temperaturas pr&eacute;-determinadas, e desligando o mesmo quando n&atilde;o for mais necess&aacute;rio fazendo a troca sequencial dos mesmos. Possui uma sa&iacute;da de alarme que &eacute; sinalizada no visor ficando no modo piscantes. Resseta quando pressionado a tecla "A". O gerenciador t&eacute;rmico prolonga a vida &uacute;til das unidades de ventiladores em at&eacute; cinco vezes e reduz o consumo de energia das unidades.<br />Resolu&ccedil;&atilde;o: 0,1 C .<br />Painel Frontal: IP 63.<br />Formato: 32 x 73 x 63 mm.<br />Tens&atilde;o: 110 - 240 - Volts 50/60H.<br />Peso: 150g.<br />O gerenciador t&eacute;rmico pode ser aplicado em qualquer tipo de gabinete.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 101 - pág A57_833039328.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:27:52','usuario_update' => 'adminprocan'),
        array('id' => '308','nome_pt' => 'Alarme Sonoro','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'alarme-sonoro','descricao_pt' => '<p>Alarme Sonoro</p>
        <p>Dispositivo de sinaliza&ccedil;&atilde;o sonora bitonal com intensidade de 80db.<br />Tens&atilde;o de alimenta&ccedil;&atilde;o: 110/220V.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'foto 11 - pág A57_415266784.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-03-23 11:29:26','usuario_update' => 'adminprocan'),
        array('id' => '309','nome_pt' => 'Cubículos Compactos de Média Tensão','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'cubiculos-compactos-de-media-tensao','descricao_pt' => '<p>Os cub&iacute;culos COMPACTOS Metal Clad certificados, modelo QTMAC, fabricados pela QT Equipamentos s&atilde;o unidades met&aacute;licas padronizadas, blindadas para abrigar dispositivos de manobra e controle nos quais os componentes se encontram em compartimentos separados por divis&otilde;es met&aacute;licas &agrave; prova de arco.<br />Destinados a distribui&ccedil;&atilde;o em m&eacute;dia tens&atilde;o com caracter&iacute;sticas &uacute;nicas que determinam o sucesso do conjunto:<br />- Seguran&ccedil;a do sistema e do operador.<br />- Confiabilidade.<br />- F&aacute;cil manuten&ccedil;&atilde;o.<br />- Compactibilidade da montagem.<br />- Uso abrigado IP 40.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_144225440.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '1','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-05 11:28:40','usuario_update' => 'adminprocan'),
        array('id' => '310','nome_pt' => 'Colunas','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'colunas','descricao_pt' => '<p>As colunas QTMAC s&atilde;o modulares, compartimentadas em inv&oacute;lucro met&aacute;lico e s&atilde;o utilizadas nas se&ccedil;&otilde;es das subesta&ccedil;&otilde;es de transforma&ccedil;&atilde;o MT de distribui&ccedil;&atilde;o p&uacute;blica e nas subesta&ccedil;&otilde;es consumidoras ou de distribui&ccedil;&atilde;o MT at&eacute; 24kV.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Página 9 - QT MAC_1878281609.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '2','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:24:20','usuario_update' => 'adminprocan'),
        array('id' => '311','nome_pt' => 'Fornecimentos STD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fornecimentos-std','descricao_pt' => '<p>As colunas QTMAC s&atilde;o fornecidas SEM as caixas de comando/medi&ccedil;&atilde;o. Esta s&atilde;o opcionais.<br />Acompanham a ferragem de montagem (longarinas e suporte p&aacute;ra-raio, nas quantidades especificadas junto com a refer&ecirc;ncia do produto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Página 9 - QT MAC_633916842.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '3','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:22:42','usuario_update' => 'adminprocan'),
        array('id' => '312','nome_pt' => 'Base','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'base','descricao_pt' => '<p>Opcional.<br />Fabricada em chapa de a&ccedil;o #12 ( 2,65 mm ), pintada na cor preta.<br />As dimens&otilde;es s&atilde;o as mesmas das colunas e a altura &eacute; de 50 mm.<br />Fornecimento: Pe&ccedil;a</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1465655936.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '5','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-05 11:32:00','usuario_update' => 'adminprocan'),
        array('id' => '313','nome_pt' => 'Caixas de comando/medição','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'caixas-de-comandomedicao','descricao_pt' => '<p>Opcional. <br />Caixa de comando/ medi&ccedil;&atilde;o com placa de montagem.<br />Quando do uso de caixa com profundidade de 330 mm, usada com desconector Sf6, poder&aacute; ser necess&aacute;rio a extens&atilde;o da chave de acionamento do desconector.</p>
        <p>Fornecimento: Pe&ccedil;a</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_884555973.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '5','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:26:24','usuario_update' => 'adminprocan'),
        array('id' => '314','nome_pt' => 'Laterais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'laterais','descricao_pt' => '<p>As laterais s&atilde;o fornecidas em conjunto contendo 2 partes. Um conjunto faz o fechamento externo de um lado do equipamento.<br />As laterais de uso - kit - externo recebem pintura RAL 7032 segundo N2841.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_224950753.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '6','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-05 11:38:21','usuario_update' => 'adminprocan'),
        array('id' => '315','nome_pt' => 'Flange','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'flange','descricao_pt' => '<p>O flange destina-se a fazer o fechamento terminal do duto de barramento.<br />Fabricado em chapa de a&ccedil;o galvanizado #12 ( 2,75mm ) tipo Z275.<br />Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1306772549.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '6','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:27:39','usuario_update' => 'adminprocan'),
        array('id' => '316','nome_pt' => 'Suporte Lateral','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suporte-lateral','descricao_pt' => '<p>Fabricado em chapa de a&ccedil;o galvanizado #12 ( 2,75mm ).<br />Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1776082097.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '7','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-05 11:35:48','usuario_update' => 'adminprocan'),
        array('id' => '317','nome_pt' => 'Colunas','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'colunas','descricao_pt' => '<p>As colunas QTMAC s&atilde;o modulares, compartimentadas em inv&oacute;lucro me- t&aacute;lico e s&atilde;o utilizadas nas se&ccedil;&otilde;es das subesta&ccedil;&otilde;es de transforma&ccedil;&atilde;o MT de distribui&ccedil;&atilde;o p&uacute;blica e nas subesta- &ccedil;&otilde;es consumidoras ou de distribui&ccedil;&atilde;o MT at&eacute; 36kV.</p>
        <p>AFLR - Acesso Frontal Lateral e Traseiro 36kV</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_285620140.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '1','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:14:15','usuario_update' => 'adminprocan'),
        array('id' => '318','nome_pt' => 'Fornecimento STD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'fornecimento-std','descricao_pt' => '<p>As colunas QTMAC s&atilde;o fornecidas SEM as caixas de comando/medi&ccedil;&atilde;o. Estas s&atilde;o opcionais.<br />Acompanham a ferragem de montagem (longarinas e suporte p&aacute;ra raio) nas quantidades especificadas junto com a refer&ecirc;ncia do produto.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel 800x600_331711781.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '2','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:25:13','usuario_update' => 'adminprocan'),
        array('id' => '319','nome_pt' => 'Base','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'base','descricao_pt' => '<p>Opcional.<br />Fabricada em chapa de a&ccedil;o #12 (2,65 mm ), pintada na cor preta.<br />As dimens&otilde;es s&atilde;o as mesmas da coluna e com altura de 70 mm.</p>
        <p>Fornecimento: Pe&ccedil;a</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1961204532.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-05 15:12:42','usuario_update' => 'adminprocan'),
        array('id' => '320','nome_pt' => 'Caixas de comando/medição','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'caixas-de-comandomedicao','descricao_pt' => '<p>Opcional. <br />Caixa de comando/ medi&ccedil;&atilde;o com placa de montagem.<br />Quando do uso de caixa com profundidade de 330mm, usada com desco- nector Sf6, poder&aacute; ser necess&aacute;rio a extens&atilde;o da chave de acionamento do desconector.</p>
        <p>Fornecimento: Pe&ccedil;a</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_573431276.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:26:48','usuario_update' => 'adminprocan'),
        array('id' => '321','nome_pt' => 'Laterais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'laterais','descricao_pt' => '<p>As laterais s&atilde;o fornecidas em con- junto contendo 2 partes. Um conjunto faz o fechamento externo de um lado do equipamento.<br />As laterais de uso - kit - externo recebem pintura RAL 7032 segundo N2841.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1178823920.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-05 15:16:40','usuario_update' => 'adminprocan'),
        array('id' => '322','nome_pt' => 'Flange','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'flange','descricao_pt' => '<p>O flange destina-se a fazer o fechamento terminal do duto de barramento.<br />Fabricado em chapa de a&ccedil;o galvanizado #12 ( 2,75mm ) tipo Z275.</p>
        <p>Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1789234784.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:28:04','usuario_update' => 'adminprocan'),
        array('id' => '323','nome_pt' => 'Longarina Lateral','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarina-lateral','descricao_pt' => '<p>Fabricada em chapa de a&ccedil;o galva- nizado #12 ( 2,75mm ).</p>
        <p>Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1070536067.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-05 15:23:30','usuario_update' => 'adminprocan'),
        array('id' => '324','nome_pt' => 'Duto Superior Extra','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'duto-superior-extra','descricao_pt' => '<p>Duto Superior Extra permite trafegar com barramento extra na parte superior da coluna.<br />Possui flap traseiro de descompress&atilde;o.<br />Fabricado em chapa de a&ccedil;o galvanizado tipo &lsquo;&lsquo;B&rsquo;&rsquo; #12 ( 2,75mm ).<br />A lateral de acabamento &eacute; pintada na cor da coluna.</p>
        <p>Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_553600976.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:29:27','usuario_update' => 'adminprocan'),
        array('id' => '325','nome_pt' => 'Kits Uso Externo (Carenagem)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'kits-uso-externo-carenagem','descricao_pt' => '<p>Os kits para uso externo (carenagem) s&atilde;o para linha QTMAC tipo AFL sem duto extra de barramento superior.</p>
        <p>Fabricados em chapa de a&ccedil;o #12 e #14 com pintura p&oacute; poli&eacute;ster RAL 7032. <br />O teto &eacute; pintado conforme norma N2841.<br />Os parafusos, porcas, arruelas s&atilde;o de a&ccedil;o inox 304.</p>
        <p>Grau de prote&ccedil;&atilde;o: O kit uso externo (carenagem) garante o grau de prote&ccedil;&atilde;o IP 54 para o conjunto QTMAC.</p>
        <p>Para agrupamento de colunas de 24 kV, verifique as composi&ccedil;&otilde;es abaixo.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_568732743.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-05 16:37:27','usuario_update' => 'adminprocan'),
        array('id' => '326','nome_pt' => 'Módulo Disjuntor - Uso Interno','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'modulo-disjuntor-uso-interno','descricao_pt' => '<p>Os m&oacute;dulos met&aacute;licos certificados tipo QTSIEM e QTCLAD s&atilde;o produzidos para atender a todos os tipos de disjuntores fixos e/ou extra&iacute;veis.</p>
        <p>Fornecimento<br />O fornecimento standard &eacute; composto de:<br />-Uma estrutura com fechamento trasei-ro. <br />- Caixa de comando frontal superior.<br />- Suporte para fixa&ccedil;&atilde;o das mufas.<br />- Suporte para fixa&ccedil;&atilde;o dos p&aacute;ra raios.<br />- Dois suportes para fixa&ccedil;&atilde;o da barra de terra.<br />- Suportes para TC e TP.<br />- Duto vertical para passagem de cabos de comando.<br />- Duto defletor de gases p/ 31.5 e 40kA.<br />- Espera da estrutura para interliga&ccedil;&atilde;o dos m&oacute;dulos.<br />Os m&oacute;dulos QTCLAD acompanham o sub cub&iacute;culo sem frame de inser&ccedil;&atilde;o do disjuntor. Os m&oacute;dulos QTSIEM s&atilde;o fornecidos sem o sub cub&iacute;culo.</p>
        <p>Grau de Prote&ccedil;&atilde;o<br />IP 40 - Uso abrigado.<br />IP 43 - Uso interno com kit IP 43.<br />IP 54 - uso externo com kit uso externo.</p>
        <p>Para locais de instala&ccedil;&atilde;o onde a altura da laje do teto for igual ou maior que 3,5m, n&atilde;o &eacute; necess&aacute;rio o uso de dutos defletores de gases para os n&iacute;veis de Arco Interno de 31,5 e 40kA.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem principal_436549142.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '1','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:32:34','usuario_update' => 'adminprocan'),
        array('id' => '327','nome_pt' => 'Módulo Disjuntor - Uso Interno','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'modulo-disjuntor-uso-interno','descricao_pt' => '<p>Os m&oacute;dulos met&aacute;licos QTCLAD para 24 e 36 kV s&atilde;o destinados a atender todos os tipos de disjuntores fixos e /ou extra&iacute;veis.<br />O conjunto porta/alv&eacute;olo externo est&aacute; incluso no fornecimento, exceto para os disjuntores tipo SION da Siemens.</p>
        <p>Fornecimento<br />O fornecimento standard &eacute; composto de:<br />- Uma estrutura com fechamento traseiro.<br />- Caixa de comando frontal superior.<br />- Suporte para fixa&ccedil;&atilde;o das mufas.<br />- Suporte para fixa&ccedil;&atilde;o dos p&aacute;ra raios<br />- Dois suportes para fixa&ccedil;&atilde;o da barra de terra.<br />- Suportes para TC e TP.<br />- Duto vertical para passagem de cabos de comando.<br />- Duto defletor de gases p/ 31.5 e 40kA.<br />- Espera da estrutura para interliga&ccedil;&atilde;o dos m&oacute;dulos.<br />- Subcub&iacute;culo do disjuntor com trava certificada, exceto para disjuntores SION da Siemens.</p>
        <p>Grau de Prote&ccedil;&atilde;o<br />IP 40 - Uso abrigado.<br />IP 43 - Uso interno com kit IP 43.<br />IP 54 - uso externo com kit uso externo.</p>
        <p>Para locais de instala&ccedil;&atilde;o onde a altura da laje do teto for igual ou maior que 3,5m, n&atilde;o &eacute; necess&aacute;rio o uso de dutos defletores de gases para os n&iacute;veis de Arco Interno de 31,5 e 40kA.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1883401899.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:31:34','usuario_update' => 'adminprocan'),
        array('id' => '328','nome_pt' => 'Módulo Seccionadora - Uso Interno','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'modulo-seccionadora-uso-interno','descricao_pt' => '<p>Os m&oacute;dulos met&aacute;licos tipo QTSIEM/ QTCLAD para uso de chaves seccionadoras de acionamento, sem e com carga, s&atilde;o fornecidos com acess&oacute;rios para fixa&ccedil;&atilde;o das mesmas.</p>
        <p>Fornecimento<br />O fornecimento standard &eacute; composto de:<br />-Uma estrutura com fechamento traseiro.<br />-Caixa de comando frontal superior.<br />-Tampa frontal da seccionadora <br />-Tampa frontal do compartimento inferior. <br />-Suporte para fixa&ccedil;&atilde;o da chave seccionadora.<br />-Suportes para fixa&ccedil;&atilde;o das mufas.<br />-Suporte para fixa&ccedil;&atilde;o dos p&aacute;ra-raios.</p>
        <p>Grau de Prote&ccedil;&atilde;o<br />IP 40 - Uso abrigado.<br />IP 43 - Uso interno com kit IP 43<br />IP 54 - uso externo com kit uso externo.</p>
        <p>NBI - 95 kV - p/ 17,5 kV - STD.<br />NBI -115 kV - p/ 17,5 kV - Sob consulta.<br />NBI - 125 kV - p/ 24 kV.<br />NBI - 175 kV - p/ 36 kV.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_256547860.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:33:47','usuario_update' => 'adminprocan'),
        array('id' => '329','nome_pt' => 'Módulo Auxiliar - Uso Obrigado','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'modulo-auxiliar-uso-obrigado','descricao_pt' => '<p>Os m&oacute;dulos AUXILIARES s&atilde;o aplicados como m&oacute;dulos de entrada, de transfer&ecirc;ncia de barras, auxiliares para coloca&ccedil;&atilde;o de dispositivos ativos ou passivos e como m&oacute;dulos para montagens METAL ENCLOSED.<br />S&atilde;o fornecidos com fechamentos &agrave; prova de arco interno.<br />Para transfer&ecirc;ncias de barras atentar para a largura. </p>
        <p>Fornecimento Standard</p>
        <p>-Tampas frontal e traseira aparafusadas, sem caixa de comando.</p>
        <p>Grau de Prote&ccedil;&atilde;o<br />IP 40 - Uso abrigado<br />IP 43 - Uso interno com kit IP43 <br />IP 54 - Uso externo com kit uso externo.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_577915005.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-12 11:34:48','usuario_update' => 'adminprocan'),
        array('id' => '330','nome_pt' => 'Módulo Medição - Uso Interno','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'modulo-medicao-uso-interno','descricao_pt' => '<p>Os m&oacute;dulos para medi&ccedil;&atilde;o s&atilde;o forneci- dos com fechamentos &agrave; prova de arco interno, nicho para coloca&ccedil;&atilde;o dos equi- pamentos de medi&ccedil;&atilde;o da concessio- n&aacute;ria e acess&oacute;rios para fixa&ccedil;&atilde;o dos dispositivos a serem instalados. <br />Possui dispositivo para lacre.</p>
        <p>Fornecimento<br />No fornecimento STD n&atilde;o est&aacute; incluso a caixa de comando, que &eacute; opcional.</p>
        <p>S&atilde;o fornecidos suportes para fixa&ccedil;&atilde;o de Tc&rsquo;s e Tp&rsquo;s, na parte inferior (assoalho), al&eacute;m de dois suportes para cada lateral para fixa&ccedil;&atilde;o dos isoladores.</p>
        <p>NBI - 95 Kv: Para 17,5 kV - STD.<br />NBI -115 kV: Para 17,5kV - sob consulta<br />NBI -125kV: Para 24kV <br />NBI -175kV: Para 36kV</p>
        <p>Grau de Prote&ccedil;&atilde;o<br />IP 40 - Uso abrigado.<br />IP 44 - Uso externo.<br />IP 54 - Consultar.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1825870504.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 10:11:50','usuario_update' => 'adminprocan'),
        array('id' => '331','nome_pt' => 'Carenagem para Trafo','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'carenagem-para-trafo','descricao_pt' => '<p>M&oacute;dulo para abrigar transfor- mador de pot&ecirc;ncia.<br />Devem ser verificadas as dis- t&acirc;ncias entre fase, e fase e ter- ra, que dependem da tens&atilde;o e do NBI, bem como dos dimensionais dos transformadores forneci- dos pelos fabricantes.<br />Fornecido com base soleira com frontal remov&iacute;vel para entrada do transformador.</p>
        <p>Pintura<br />Para IP 20: Fabricado em chapa de a&ccedil;o carbono nas bitolas #12 e #14, pintura p&oacute; poliester com espessura de 60-80 micras.<br />Para IP 22: Fabricado em chapa de a&ccedil;o galvanizada tipo &laquo;B&raquo; nas bitolas #12 e #14, pintura p&oacute; poli&eacute;ster conforme N-2841, com espessura m&iacute;nima de 195 micras.</p>
        <p>Grau de Prote&ccedil;&atilde;o<br />IP 20 e IP 22 - IK 10.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem 2_469143063.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-06 10:18:45','usuario_update' => 'adminprocan'),
        array('id' => '332','nome_pt' => 'Tampa do Duto de Barramentos','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'tampa-do-duto-de-barramentos','descricao_pt' => '<p>O duto de barramentos dos m&oacute;dulos QTMC possuem as laterais, esquerda e direita, abertas para dar continuidade as barras. Podem ser cegas (terminais) ou para instala&ccedil;&atilde;o de buchas, quando se quer estanqueidade entre m&oacute;dulos, para fazer transfer&ecirc;ncia de barra ou acessar o m&oacute;dulo de medi&ccedil;&atilde;o.<br />Unidade: 01 pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_910535425.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 10:26:31','usuario_update' => 'adminprocan'),
        array('id' => '333','nome_pt' => 'Tampa Lateral','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'tampa-lateral','descricao_pt' => '<p>Estas laterais s&atilde;o para dar acabamento de finaliza&ccedil;&atilde;o dos cub&iacute;culos.</p>
        <p>Unidade: Uma lateral.</p>
        <p>Uma Lateral &eacute; composta por: <br />3 pe&ccedil;as para m&oacute;dulos de 1900mm de profundidade.<br />4 pe&ccedil;as para profundidade de 2200/ 2400 mm. <br />5 pe&ccedil;as para profundidade de 3000mm.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_2130578278.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:15:42','usuario_update' => 'adminprocan'),
        array('id' => '334','nome_pt' => 'Base Soleira','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'base-soleira','descricao_pt' => '<p>Constru&iacute;da em chapa de a&ccedil;o de #12 (2,75 mm) e pintada na cor preta.<br />Possui acesso para empilhadeira.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem1_956025834.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 10:28:30','usuario_update' => 'adminprocan'),
        array('id' => '335','nome_pt' => 'Caixa de Comando - Baixa Tensão','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'caixa-de-comando-baixa-tensao','descricao_pt' => '<p>Os m&oacute;dulos QTSIEM e QTCLAD podem ser providos de caixas de comando de BT que s&atilde;o as mesmas para qualquer m&oacute;dulo dos cub&iacute;culos de 25kA e 17,5kV (para a mesma largura).<br />A caixa de comando &eacute; fornecida standard para os m&oacute;dulos de disjuntor.<br />Para os m&oacute;dulos seccionadora, transfer&ecirc;ncia de barra, &eacute; opcional.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_2047343839.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:17:04','usuario_update' => 'adminprocan'),
        array('id' => '336','nome_pt' => 'Grelha a prova de arco interno para entrada de ar','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'grelha-a-prova-de-arco-interno-para-entrada-de-ar','descricao_pt' => '<p>A prote&ccedil;&atilde;o para entrada de ar com ou sem o uso de ventilador, com ou sem o uso de filtro, permite a ventila&ccedil;&atilde;o por convec&ccedil;&atilde;o ou for&ccedil;ada das colunas, sem risco aos operadores.<br />Instalada na parte frontal e ou traseira inferior.<br />Aconselhado o uso do gerenciador t&eacute;rmico para controle t&eacute;rmico e dos ventiladores.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1305359710.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 10:54:55','usuario_update' => 'adminprocan'),
        array('id' => '337','nome_pt' => 'Kit IP 43','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'kit-ip-43','descricao_pt' => '<p>O KIT para aumentar o grau de prote&ccedil;&atilde;o para IP 43, uso interno, para linha QTSIEM e QTCLAD, &eacute; aplicado na parte superior externa do teto.<br />Formado por conjunto com dois flaps, sendo que cada cub&iacute;culo tem no m&iacute;nimo dois conjuntos.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_387182694.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '3','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:32:25','usuario_update' => 'adminprocan'),
        array('id' => '338','nome_pt' => 'Carro para Extração de Disjuntores','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'carro-para-extracao-de-disjuntores','descricao_pt' => '<p>Os carros para extra&ccedil;&atilde;o de disjuntores possuem alturas regul&aacute;veis e trava de seguran&ccedil;a.<br />Os modelos atendem as necessidades de cada fabricante.<br />Exclusivo para linha QTSIEM QTCLAD.</p>
        <p>XX = SI -&gt; Siemens<br /> AB -&gt; ABB<br /> SC -&gt; Schneider<br /> IT -&gt; Iton</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1108365263.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:18:04','usuario_update' => 'adminprocan'),
        array('id' => '339','nome_pt' => 'Carro TP Extraível','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'carro-tp-extraivel','descricao_pt' => '<p>O conjunto carro para TP extra&iacute;vel pode ser para entrada e/ou sa&iacute;da.<br />Para posi&ccedil;&atilde;o sa&iacute;da at&eacute; 24 kV pode ser instalado na parte inferior do disjuntor.<br />Para entrada deve ser instalado no local do disjuntor.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1157373570.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:18:27','usuario_update' => 'adminprocan'),
        array('id' => '340','nome_pt' => 'Kit Uso Externo','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'kit-uso-externo','descricao_pt' => '<p>Para uso ao tempo, os m&oacute;dulos QTSIEM e QTCLAD necessitam de um kit para uso externo.<br />Este kit &eacute; constitu&iacute;do de um prolongamento frontal de 200mm com porta dupla, teto com dispositivo de descompress&atilde;o para gases, moldura traseira e acess&oacute;rios para fixa&ccedil;&atilde;o.<br />O kit mant&eacute;m inalteradas as demais dimens&otilde;es, caracter&iacute;sticas mec&acirc;nicas e el&eacute;tricas do cub&iacute;culo.<br />S&atilde;o fabricados com chapa de a&ccedil;o galvanizado tipo &laquo;B&raquo; e recebem aplica&ccedil;&atilde;o de pintura dupla, espec&iacute;fica para uso ao tempo (N2841) com espessura m&iacute;nima de 195 micras.</p>
        <p>Grau de Prote&ccedil;&atilde;o: IP54 - IK 10.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1039510296.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:19:40','usuario_update' => 'adminprocan'),
        array('id' => '341','nome_pt' => 'Tampa Lateral - Uso Externo','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'tampa-lateral-uso-externo','descricao_pt' => '<p>Os cub&iacute;culos QTSIEM e QTCLAD necessitam da coloca&ccedil;&atilde;o de tampas laterais para finalizar os m&oacute;dulos.<br />Acompanham todos os acess&oacute;rios para fixa&ccedil;&atilde;o.<br />Fabricadas com chapa de a&ccedil;o galvanizado tipo &laquo;B&raquo; na espessura de 1,95mm (#14). Recebem aplica&ccedil;&atilde;o de pintura segundo a N-2841para uso ao tempo, com espessura m&iacute;nima de 195 micras.<br />Para uso externo em regi&otilde;es agressivas e mar&iacute;tima, consultar sobre o tipo de pintura a ser aplicada.</p>
        <p>Unidade: Uma lateral (conjunto ).</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1557932694.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 11:23:09','usuario_update' => 'adminprocan'),
        array('id' => '342','nome_pt' => 'Tampa Lateral - Uso Externo','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'tampa-lateral-uso-externo','descricao_pt' => '<p>Os cub&iacute;culos QTSIEM e QTCLAD necessitam da coloca&ccedil;&atilde;o de tampas laterais para finalizar os m&oacute;dulos.<br />Acompanham todos os acess&oacute;rios para fixa&ccedil;&atilde;o.<br />Fabricadas com chapa de a&ccedil;o galvanizado tipo &laquo;B&raquo; na espessura de 1,95mm (#14). Recebem aplica&ccedil;&atilde;o de pintura segundo a N-2841para uso ao tempo, com espessura m&iacute;nima de 195 micras.<br />Para uso externo em regi&otilde;es agressivas e mar&iacute;tima, consultar sobre o tipo de pintura a ser aplicada.</p>
        <p>Unidade: Uma lateral (conjunto ).</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_355593222.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 11:24:02','usuario_update' => 'adminprocan'),
        array('id' => '343','nome_pt' => 'Longarinas de Montagem Tipo A (uso vertical)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-de-montagem-tipo-a-uso-vertical','descricao_pt' => '<p>Fabricadas em chapa de a&ccedil;o de #12 (2,65mm ) galvanizadas tipo &laquo;B&raquo;.<br />As longarinas tipo &laquo;A&raquo; s&atilde;o usadas no sentido vertical dos cub&iacute;culos para fixa&ccedil;&atilde;o das longarinas horizontais, sendo que, sua fixa&ccedil;&atilde;o independe da largura e da profundidade do cub&iacute;culo.<br />As dimens&otilde;es s&atilde;o conforme tabela de refer&ecirc;ncia.<br />Fornecimento: Par.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1243461623.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '11','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:26:20','usuario_update' => 'adminprocan'),
        array('id' => '344','nome_pt' => 'Longarinas de Montagem Tipo B (uso horizontal frontal)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-de-montagem-tipo-b-uso-horizontal-frontal','descricao_pt' => '<p>Fabricadas em chapa de a&ccedil;o de # 12 <br />(2,65mm) galvanizadas tipo &laquo;B&raquo;. As longarinas tipo &laquo;B&raquo; s&atilde;o usadas no sentido horizontal dos cub&iacute;culos, e s&atilde;o fixadas nas longarinas verticais, sendo que seu comprimento varia de acordo com a largura do cub&iacute;culo.<br />As dimens&otilde;es s&atilde;o conforme tabela de refer&ecirc;ncia.<br />Fornecimento: Pe&ccedil;a.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1577100590.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '12','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:25:20','usuario_update' => 'adminprocan'),
        array('id' => '345','nome_pt' => 'Longarinas de Montagem Tipo C (uso horizontal frontal)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-de-montagem-tipo-c-uso-horizontal-frontal','descricao_pt' => '<p>Fabricadas em chapa de a&ccedil;o de #12 ( 2,65mm ), galvanizadas tipo &laquo;B&raquo;.<br />As longarinas tipo &laquo;C&raquo; s&atilde;o usadas no sentido horizontal dos cub&iacute;culos, e s&atilde;o fixadas diretamente nas laterais do mesmo. Seu comprimento depende da largura do cub&iacute;culo.<br />As dimens&otilde;es s&atilde;o conforme tabela de refer&ecirc;ncia.<br />Fornecimento: Pe&ccedil;a.</p>
        <p>Para fixar este perfil utilize parafusos<br />M6x16mm, tipo Allen, cabe&ccedil;a chata,<br />para evitar interfer&ecirc;ncia<br />nos acoplamentos das colunas.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_2143574068.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '13','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:24:29','usuario_update' => 'adminprocan'),
        array('id' => '346','nome_pt' => 'Longarinas de Montagem Tipo D e E (uso horizontal frontal)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-de-montagem-tipo-d-e-e-uso-horizontal-frontal','descricao_pt' => '<p>Fabricadas em chapa de a&ccedil;o de #12 ( 2,65mm), galvanizadas tipo &laquo;B&raquo;.<br />As longarinas tipo &laquo;D&raquo; e &laquo;E&raquo; s&atilde;o usadas no sentido horizontal frontal dos cub&iacute;culos, e fixadas diretamente nas abas internas do fundo do cub&iacute;culo. Seu comprimento depende da largura do mesmo.<br />As dimens&otilde;es s&atilde;o conforme tabela ao lado.<br />Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem 1_1080994037.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 14:28:31','usuario_update' => 'adminprocan'),
        array('id' => '347','nome_pt' => 'Longarinas de Montagem Tipo F (uso horizontal)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-de-montagem-tipo-f-uso-horizontal','descricao_pt' => '<p>Fabricadas em chapa de a&ccedil;o de #12 ( 2,65mm ), galvanizadas tipo &laquo;B&raquo;.<br />As longarinas tipo &laquo;F&raquo; s&atilde;o usadas no sentido da profundidade dos cub&iacute;culos, e s&atilde;o fixadas diretamente nas paredes do mesmo. Seu comprimento depende da largura do cub&iacute;culo.<br />As dimens&otilde;es s&atilde;o conforme tabela ao lado.<br />Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem 1_1166758933.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:20:19','usuario_update' => 'adminprocan'),
        array('id' => '348','nome_pt' => 'Longarinas de Montagem Tipo G (uso profundidade)','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-de-montagem-tipo-g-uso-profundidade','descricao_pt' => '<p>Fabricadas em chapa de a&ccedil;o de #12 ( 2,65mm ), galvanizadas tipo &laquo;B&raquo;.<br />As longarinas tipo &laquo;G&raquo; s&atilde;o usadas no sentido da profundidade dos cub&iacute;culos, e s&atilde;o fixadas diretamente nas paredes do mesmo. Seu comprimento depende da largura do cub&iacute;culo.<br />As dimens&otilde;es s&atilde;o conforme tabela ao lado.<br />Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem 1_599610758.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-18 10:21:17','usuario_update' => 'adminprocan'),
        array('id' => '349','nome_pt' => 'Cubículos QT ME - Metal Enclosed','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'cubiculos-qt-me-metal-enclosed','descricao_pt' => '<p>Os cub&iacute;culos QTME - Metal Enclosed da Q&amp;T Equipamen-tos destinam-se a montagens de acionamento e mano- bra de dispositivos de m&eacute;dia tens&atilde;o.<br />S&atilde;o modulares, compon&iacute;veis e compat&iacute;veis com os cub&iacute;culos certificados Metal Clad.<br />Trava de porta tipo cofre, o mesmo sistema utilizado no cub&iacute;culo QTSIEM.<br />Uso interno.</p>
        <p>Caracter&iacute;sticas Mec&acirc;nicas<br />Estrutura em chapa de a&ccedil;o #12 ( 2,65 mm ) na cor RAL 7032.<br />Basesoleira em chapa de a&ccedil;o #12 ( 2,65 mm) na cor RAL 2003<br />Tampa traseira e porta traseira em chapa de a&ccedil;o #14<br />(1,95mm ) na cor RAL 7032.<br />Laterais internas em chapa galvanizada #14 (1,95 mm).<br />Porta frontal e porta da caixa de comando em chapa de a&ccedil;o<br />#14 (1,95 mm ) na cor RAL 7032.<br />Caixa de comando com placa de montagem em chapa de a&ccedil;o #14 ( 1,95 mm ) na cor RAL 7032.<br />Porta frontal com fechamento tipo cofre certificado.<br />Camada m&iacute;nima de pintura p&oacute; poli&eacute;ster com 80 micras.<br />Uso interno.<br />Para uso externo e regi&otilde;es mar&iacute;timas, informar ap&oacute;s o c&oacute;digo:<br />PPZ</p>
        <p>Fornecimento Standard<br />1. Estrutura.<br />2. Tampa superior com janela de descompress&atilde;o.<br />3. Base soleira.<br />4. Porta frontal com fechamento m&uacute;ltiplo tipo cofre padr&atilde;o QTCLAD certificado.<br />5. Tampa traseira.<br />6. Tampa frontal superior.<br />7. Argola de suspens&atilde;o.</p>
        <p>Grau de Prote&ccedil;&atilde;o<br />Grau de Prote&ccedil;&atilde;o: IP 43.<br />Para uso do cub&iacute;culo ao tempo, usar teto protetor.<br />Atende &agrave;s normas NBR 5410 e NBR IEC 62208.</p>
        <p>Fornecimento Opcional<br />Caixa de comando.<br />Teto protetor.<br />Laterais.<br />Fundo.<br />Ferragem vertical. <br />Ferragem horizontal frontal.<br />Ferragem horizontal lateral.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_304900787.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 14:44:51','usuario_update' => 'adminprocan'),
        array('id' => '350','nome_pt' => 'Caixa de Comando','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'caixa-de-comando','descricao_pt' => '<p>Constru&iacute;da em chapa de a&ccedil;o #14 (1,95mm) &eacute; fixada diretamente na estrutura frontal do cub&iacute;culo. <br />Possui profundidade de 400mm e acompanha a placa de montagem.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_400996850.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 14:55:28','usuario_update' => 'adminprocan'),
        array('id' => '351','nome_pt' => 'Kit Uso Externo','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'kit-uso-externo','descricao_pt' => '<p>Constru&iacute;do em chapa de a&ccedil;o #14 (1,95mm) galvanizada, com pintura poli&eacute;ster na cor RAL 7032, conforme norma N2841.</p>
        <p>Teto possui bordas 200mm e dispo- sitivo para al&iacute;vio de press&atilde;o.</p>
        <p>Porta frontal reserva com espa&ccedil;o livre de 180mm entre a porta interna e a porta externa.</p>
        <p>Os parafusos de montagem s&atilde;o de a&ccedil;o inox 304.</p>
        <p>Grau de prote&ccedil;&atilde;o: IP54</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1891169100.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 14:56:53','usuario_update' => 'adminprocan'),
        array('id' => '352','nome_pt' => 'Porta de Proteção Interna','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'porta-de-protecao-interna','descricao_pt' => '<p>Constru&iacute;da em chapa perfurada/ cega de #14(1,95 mm), pintada em poli&eacute;ster p&oacute;, na cor laranja RAL 2003.<br />Os acess&oacute;rios s&atilde;o fixados diretamen- te nas pe&ccedil;as estruturais do cub&iacute;culo.<br />Acompanham acess&oacute;rios de insta- la&ccedil;&atilde;o.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_366809684.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 14:58:43','usuario_update' => 'adminprocan'),
        array('id' => '353','nome_pt' => 'Portas Traseiras','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'portas-traseiras','descricao_pt' => '<p>As portas traseiras possuem as mesmas configura&ccedil;&otilde;es da porta frontal.<br />O fechamento &eacute; do tipo multiponto tipo cofre, certificado nos ensaios do CEPEL para 25kA -1 sec.<br />S&atilde;o constru&iacute;das em chapa de a&ccedil;o # 14 (1,95mm) e pintadas na cor bege RAL 7032.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1819868391.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 15:33:26','usuario_update' => 'adminprocan'),
        array('id' => '354','nome_pt' => 'Lateral Acabamento Externa','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'lateral-acabamento-externa','descricao_pt' => '<p>As laterais para uso interno s&atilde;o constru&iacute;das em chapa de a&ccedil;o #14 (1,95 mm) e pintadas na cor do cub&iacute;culo RAL 7032. <br />S&atilde;o fixadas diretamente na estrutura do cub&iacute;culo e divididas no sentido vertical.</p>
        <p>As laterais de acabamento para uso <br />externo (junto com o kit frontal uso externo) s&atilde;o fabricadas em chapa de a&ccedil;o #14 galvanizada com pintura p&oacute; poli&eacute;ster RAL 7032, conforme a norma N2841.<br />Parafusos, porcas e arruelas de fixa&ccedil;&atilde;o s&atilde;o em a&ccedil;o inox 304.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1814504179.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 15:36:05','usuario_update' => 'adminprocan'),
        array('id' => '355','nome_pt' => 'Lateral Interna e Terminais','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'lateral-interna-e-terminais','descricao_pt' => '<p>As laterais internas e terminais s&atilde;o destinadas:<br />1 - A fazer a segrega&ccedil;&atilde;o entre m&oacute;du- los.<br />2 - Fechamento terminal interno. (obrigat&oacute;rio)<br />S&atilde;o constru&iacute;das em chapa de a&ccedil;o galvanizado # 14 (1,95mm) .<br />S&atilde;o fixadas diretamente nos perfis estruturais do cub&iacute;culo e divididas no sentido horizontal para permitir a entrada das buchas e barramentos de MT.</p>
        <p>Fornecimento: Uma lateral (conjunto de quatro pe&ccedil;as para fechamento de um lado).</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_271454483.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 15:45:35','usuario_update' => 'adminprocan'),
        array('id' => '356','nome_pt' => 'Piso Metálico','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'piso-metalico','descricao_pt' => '<p>Constru&iacute;do em chapa de a&ccedil;o #12 (2,65mm), pintado na cor laranja RAL 2003, destinado ao fechamento inferior. Possui flange para entrada e sa&iacute;da de cabos.<br />Acompanham acess&oacute;rios para fixa&ccedil;&atilde;o.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_148361869.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 15:48:14','usuario_update' => 'adminprocan'),
        array('id' => '357','nome_pt' => 'Longarinas Tipo A','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-tipo-a','descricao_pt' => '<p>Constru&iacute;das em chapa de a&ccedil;o de #12 (2,70mm) galvanizadas tipo &lsquo;&rsquo;Z275&rsquo;&rsquo; para serem utilizadas nas montagens internas horizontais frontais, fixadas de topo ou nas laterais dos perfis tipo &lsquo;&rsquo;B&rsquo;&rsquo;.<br />Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_2072257768.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 15:49:29','usuario_update' => 'adminprocan'),
        array('id' => '358','nome_pt' => 'Longarinas Tipo B','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-tipo-b','descricao_pt' => '<p>Constru&iacute;das em chapa de a&ccedil;o de #12 (2,70mm), galvanizadas tipo &lsquo;&rsquo;Z275", para serem utilizadas nas montagens internas verticais. S&atilde;o fixadas nas abas internas dos perfis estruturais do cub&iacute;culo e para fixar as longarinas tipo &lsquo;&rsquo;A&rsquo;&rsquo;.<br />Fornecimento: Par.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_144914895.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 16:21:06','usuario_update' => 'adminprocan'),
        array('id' => '359','nome_pt' => 'Longarinas Tipo C','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-tipo-c','descricao_pt' => '<p>Constru&iacute;das em chapa de a&ccedil;o de #12 (2,70mm), galvanizadas tipo "Z 275" para serem utilizadas nas montagens internas horizontais frontais, fixadas nas abas internas dos perfis estrutu- rais do cub&iacute;culo ou nas laterais dos perfis tipo &laquo;B&raquo;.</p>
        <p>Fornecimento: pe&ccedil;a</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1123894890.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 16:22:38','usuario_update' => 'adminprocan'),
        array('id' => '360','nome_pt' => 'Longarinas Tipo Ômega','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'longarinas-tipo-omega','descricao_pt' => '<p>Constru&iacute;das em chapa de a&ccedil;o de #12 (2,70mm), galvanizadas tipo &lsquo;&rsquo;Z275&rsquo;&rsquo;, para serem utilizadas nas montagens internas. <br />Estas longarinas s&atilde;o de uso geral.<br />Fornecimento: Pe&ccedil;a.</p>
        <p>&nbsp;</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_109561190.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 16:23:38','usuario_update' => 'adminprocan'),
        array('id' => '361','nome_pt' => 'Carro para Disjuntor','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'carro-para-disjuntor','descricao_pt' => '<p>Carro para instala&ccedil;&otilde;es abertas em substa&ccedil;&otilde;es de alvenaria que permite a coloca&ccedil;&atilde;o Tc&acute;s, Tp&acute;s, fus&iacute;veis, no break, etc, para v&aacute;- rias marcas de disjuntores.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_2030243386.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 16:27:05','usuario_update' => 'adminprocan'),
        array('id' => '362','nome_pt' => 'Gerenciador Térmico','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'gerenciador-termico','descricao_pt' => '<p>O GERENCIADOR atua para grupos de, no m&iacute;nimo, dois ventiladores acionando cada um em n&iacute;veis de temperatura programada, alternando os mesmo em cada partida.<br />Isto leva ao aumento da vida &uacute;til dos ventiladores.<br />A&eacute;m disso tem alarme progra- mado de temperatura com can- celamento presencial.<br />Possui sa&iacute;da RS 232 para visualiza&ccedil;&atilde;o remota.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1845016513.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 16:28:19','usuario_update' => 'adminprocan'),
        array('id' => '363','nome_pt' => 'Isoladores de EPOXI','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'isoladores-de-epoxi','descricao_pt' => '<p>Os isoladores de epoxi s&atilde;o forneci- dos com os parafusos de fixa&ccedil;&atilde;o.<br />Fornecimento: Pe&ccedil;a.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'Imagem Principal_1760509304.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'editado' => '0','data_update' => '2018-04-06 16:29:58','usuario_update' => 'adminprocan'),
        array('id' => '364','nome_pt' => 'Barramento de Cobre','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'barramento-de-cobre','descricao_pt' => '<p>Barras de cobre com canto arredon- dado e com canto reto.</p>
        <p>Fornecimento: Barras de 6 metros<br />(confirmar comprimento da barra).</p>
        <p>C&oacute;digos com R no final indica cantos arredondados.</p>','descricao_es' => NULL,'descricao_en' => NULL,'img_principal' => 'imagem indisponivel 800x600_1595491158.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-09 10:40:09','usuario_update' => 'adminprocan'),
        array('id' => '366','nome_pt' => 'Suportes CD','nome_es' => '0','nome_en' => NULL,'link_compra' => '','nome_seo' => 'suportes-cd','descricao_pt' => '<p>Suportes CD</p>
        <p>-&gt; S&atilde;o fornecidos para fixa&ccedil;&atilde;o de disjuntores tipo DIN, em perfil DIN e para fixa&ccedil;&atilde;o de disjuntor em caixa moldada.<br />-&gt; Os suportes permitem ajuste de profundidade.<br />-&gt; Fornecidos em chapa de a&ccedil;o zincada.</p>','descricao_es' => '<p>dasdas</p>','descricao_en' => NULL,'img_principal' => 'Imagem Principal_1621340651.jpg','id_categoria' => '0','lancamento' => '0','ordem' => '0','status' => '1','seo_title' => '','seo_description' => '','seo_keywords' => '','editado' => '1','data_update' => '2018-04-16 19:07:16','usuario_update' => 'rafaeldusantos')
    );

    foreach ($produtos as $produto)
    {
        publish_products_from_old_db($produto);
    }
}

/**
 * upload by url
 * 
 */
function upload_thumbnail($url, $post_id)
{
    // If outside admin area
    if (!is_admin()){
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
    }

    // If the function it's not available, require it.
    if ( ! function_exists( 'download_url' ) ) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }


    /**
     * Download by url and upload to wordpress
     */
    $image = "";
    $attachmentId = "";
    if(!empty($url)) {
        
        $file = array();
        $file['name'] = $url;
        $file['tmp_name'] = download_url($url);

        if (is_wp_error($file['tmp_name'])) {
            @unlink($file['tmp_name']);
            var_dump( $file['tmp_name']->get_error_messages( ) );
        } else {
            $attachmentId = media_handle_sideload($file, $post_id);

            if ( is_wp_error($attachmentId) ) {
                @unlink($file['tmp_name']);
                var_dump( $attachmentId->get_error_messages( ) );
            }

            $image = wp_get_attachment_url( $attachmentId );
        }
    }
    
    if (!empty($attachmentId)) :
        return $attachmentId;
    else :
        var_dump($attachmentId);
    endif;
}

/**
 * Add cronjobs
 */
function import_old_products_base($schedules)
{

    $schedules['import_products'] = array(
        'interval'  => 'daily',
        'display'   => esc_html__( 'Uma vez por dia' ),
    );

    return $schedules;
}

# CRON JOB
add_filter('cron_schedules', 'import_old_products_base');
if ( ! wp_next_scheduled( 'import_products_from_old_db' ) ) :
    wp_schedule_event( time(), 'daily', 'import_products_from_old_db' );
endif;
add_action('import_products_from_old_db', 'import_read_and_publish_products');


/**
 * Custom filter by categories with ajax shortcode
 * 
 * @link https://rudrastyh.com/wordpress/ajax-post-filters.html
 */
function custom_filter_ajax_by_categories()
{
    $args = array(
        'taxonomy'          => 'categorias',
        'orderby'           => 'name',
        'hierarchical'      => true,
        'hide_empty'        => false,
    );
    $terms = get_terms($args);

    // echo '<pre>';
    // print_r($terms);
    // echo '</pre>';
    $super_parents_ids = array();
    $parents_ids = array();
    ?>

    <script type="text/javascript">

        // Show parents
        function show_parents(el)
        {
            var sp_id = el.attr('data-parent');
            var filter = jQuery('.filter__parents');
            var childrens_sp = jQuery('.filter__parents').children();
            
            filter.addClass('filter--show');

            childrens_sp.each(function(index)
            {
                if (jQuery(this).attr('data-parent') == sp_id)
                {
                    jQuery(this).show();
                }
                else
                {
                    jQuery(this).hide();
                }
            });

            console.log(childrens_sp);
        }

        // Show childnres
        function show_childrens(el)
        {
            var p_id = el.attr('data-children');
            var filter = jQuery('.filter__childrens');
            var childrens = jQuery('.filter__childrens').children();

            filter.addClass('filter--show');

            childrens.each(function(index)
            {
                if (jQuery(this).attr('data-parent') == p_id)
                {
                    jQuery(this).show();
                }
                else
                {
                    jQuery(this).hide();
                }
            })
        }
    </script>

    <form action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST" id="filter_ajax">
        <div class="filter__container">
                <div class="filter filter__superParents" id="">        
                    <?php 
                    foreach ($terms as $term) : 
                        if ($term->parent == '0') : 
                            $super_parents_ids[] = $term->term_id;?>
                            <div data-parent="<?php echo $term->term_id; ?>" class="filter__item" onclick="show_parents(jQuery(this))">
                                <span class="filter__text"><strong><?php echo $term->name ?></strong></span>
                                <span class="filter__text"><?php echo $term->description ?></span>
                            </div>
                        <?php 
                        endif;
                    endforeach; ?>
                </div>
                
                <div class="filter filter__parents" id="">
                    <?php
                    foreach ($terms as $term) :
                        if (!in_array($term->term_id, $super_parents_ids)) : 
                            $parents_ids[] = $term->term_id; ?>
                            <span data-parent="<?php echo $term->parent; ?>" data-children="<?php echo $term->term_id; ?>" class="filter__text filter__text--hover" onclick="show_childrens(jQuery(this))"><?php echo $term->name ?></span>
                        <?php 
                        endif;
                    endforeach; ?>
                </div>
                
                <div class="filter filter__childrens" id="">
                <?php
                foreach ($terms as $term) :
                    if (in_array($term->parent, $parents_ids)) : ?>
                        <span data-parent="<?php echo $term->parent; ?>" class="filter__text filter__text--hover"><?php echo $term->name ?></span>
                    <?php 
                    endif;
                endforeach; ?>
                </div>
        </div>
    </form>
    <?php
}
add_shortcode('filter_ajax_by_categories', 'custom_filter_ajax_by_categories');