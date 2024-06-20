<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="ru">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="UTF-8">
<link rel="preconnect" href="https://fonts.gstatic.com">
<meta name="theme-color" content="#12139e">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<link rel="preconnect" href="https://www.googletagmanager.com">
<link rel="dns-prefetch" href="https://www.google-analytics.com">
<link rel="dns-prefetch" href="https://mc.yandex.ru">
<link rel="dns-prefetch" href="https://pagead2.googlesyndication.com">
<link rel="dns-prefetch" href="https://cdn.teleportapi.com">
<link rel="preload" href="/wp-content/themes/epicris/style.css" as="style">
<link rel="icon" type="image/png" href="/favicons/favicon.png">
<link rel="icon" type="image/svg+xml" href="/favicons/favicon.svg">
<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon-180x180.png">
<link rel="canonical" href="<?php echo get_permalink(); ?>">
<title><?php the_title(); ?><?php if ( in_category('promokod')) {?> — Купоны <?php echo date_i18n('F Y');?> года<?php } else {} ?></title>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="Epicris">
<meta property="vk:image" content="<?php the_post_thumbnail_url( ); ?>">
<meta property="twitter:image" content="<?php the_post_thumbnail_url( ); ?>">
<meta property="og:image" content="<?php the_post_thumbnail_url( ); ?>">
<meta property="og:title" content="<?php the_title(); ?><?php if ( in_category('promokod')) {?> — Купоны <?php echo date_i18n('F Y');?> года<?php } else {} ?>">
<meta property="twitter:title" content="<?php the_title(); ?><?php if ( in_category('promokod')) {?> — Купоны <?php echo date_i18n('F Y');?> года<?php } else {} ?>">
<meta property="og:type" content="website">
<meta property="og:description" content="<?php echo apply_filters('the_content', get_post_meta($post->ID, 'description', true)); ?>">
<meta property="twitter:description" content="<?php echo apply_filters('the_content', get_post_meta($post->ID, 'description', true)); ?>">
<meta name="description" content="<?php echo apply_filters('the_content', get_post_meta($post->ID, 'description', true)); ?>">
<meta property="og:url" content="<?php echo get_permalink(); ?>">
<meta property="twitter:url" content="<?php echo get_permalink(); ?>">
<link rel="image_src" href="<?php the_post_thumbnail_url();?>">
<meta name="twitter:card" content="summary_large_image">
<link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#21c300">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://epicris.ru/wp-content/themes/epicris/style.css">
<?php if ( in_category('promokod')) {?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><?php } else {?><script defer="" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><?php } ?>
<script defer="" src="/js/main.js"></script>
</head>
<body>
	<header class="menu_header">
		<div class="main_menu_container">
			<div class="main_menu_content">
				<div class="main_menu_center">
					<div class="navbar_btn"><span class="navbar_btn_flex"><span><div class="icon_bar"></div><div class="icon_bar"></div><div class="icon_bar"></div></span></span></div>
					<div class="main_menu_logo"><a class="main_menu_link_logo" href="/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.76 8.79" width="140" height="30"><defs><style>.cls-1{fill:#201600;stroke:#201600;}.cls-1,.cls-2{stroke-miterlimit:10;stroke-width:0.5px;}.cls-2{fill:#2abd00;stroke:#2abd00;}</style></defs><path class="cls-1" d="M1.94,6.93h3.6v1.4H.28V.55h5.2V1.93H1.94V3.68H5L4.8,5.05H1.94Z"/><path class="cls-1" d="M11.72.87a2.24,2.24,0,0,1,1,.89,2.39,2.39,0,0,1,.34,1.29,2.72,2.72,0,0,1-.35,1.38,2.37,2.37,0,0,1-1.07,1,3.92,3.92,0,0,1-1.73.34h-1V8.33H7.28V.55H10A4,4,0,0,1,11.72.87Zm-.8,3.2a1.11,1.11,0,0,0,.41-1A1.08,1.08,0,0,0,11,2.21a1.62,1.62,0,0,0-1-.29h-1V4.35h.83A2,2,0,0,0,10.92,4.07Z"/><path class="cls-1" d="M19,7.39a4.44,4.44,0,0,1-.9-2.91,5,5,0,0,1,.5-2.4A3,3,0,0,1,19.89.76a4.25,4.25,0,0,1,1.88-.4,5.12,5.12,0,0,1,1.34.17,5.49,5.49,0,0,1,1.23.54L23.7,2.33a3.34,3.34,0,0,0-1.86-.55c-1.36,0-2,.86-2,2.6a3,3,0,0,0,.57,2A2,2,0,0,0,22,7a2.93,2.93,0,0,0,.93-.14,4.39,4.39,0,0,0,.83-.39l.67,1.2a6.15,6.15,0,0,1-1.27.58,4,4,0,0,1-1.31.2A3.55,3.55,0,0,1,19,7.39Z"/><path class="cls-1" d="M32.19,8.23v.1H30.28l-2-2.84h-.65V8.33H26V.55h2.6a4.18,4.18,0,0,1,1.73.32,2.25,2.25,0,0,1,1,.86A2.29,2.29,0,0,1,31.71,3a2.42,2.42,0,0,1-.41,1.41,2.41,2.41,0,0,1-1.2.89Zm-4.51-4h.74a2,2,0,0,0,1.14-.28A1,1,0,0,0,30,3a1,1,0,0,0-.36-.83,1.62,1.62,0,0,0-1-.27h-.93Z"/><path class="cls-1" d="M37.29,7.49l.77-1.19A4,4,0,0,0,40.24,7a2.26,2.26,0,0,0,1.07-.21.71.71,0,0,0,.39-.65.76.76,0,0,0-.12-.44,1.22,1.22,0,0,0-.45-.34c-.21-.11-.53-.24-1-.41l-.28-.11a9.2,9.2,0,0,1-1.23-.57,2.32,2.32,0,0,1-.75-.71,2,2,0,0,1-.27-1.1,1.78,1.78,0,0,1,.42-1.21A2.48,2.48,0,0,1,39.15.54a4.32,4.32,0,0,1,1.4-.22,4.62,4.62,0,0,1,1.39.22,5.3,5.3,0,0,1,1.36.65l-.77,1.18a6.42,6.42,0,0,0-1-.51,2.91,2.91,0,0,0-.95-.15,1.61,1.61,0,0,0-.87.19.6.6,0,0,0-.29.51.61.61,0,0,0,.12.37,1.23,1.23,0,0,0,.43.33,9.44,9.44,0,0,0,.89.37l.27.1a9.59,9.59,0,0,1,1.23.54,2.18,2.18,0,0,1,.79.72,2.06,2.06,0,0,1,.33,1.21,2.14,2.14,0,0,1-.41,1.32,2.4,2.4,0,0,1-1.11.79,4.42,4.42,0,0,1-1.59.27A5,5,0,0,1,37.29,7.49Z"/><rect class="cls-2" x="33.86" y="0.55" width="1.66" height="1.63"/><rect class="cls-1" x="14.74" y="0.55" width="1.66" height="7.78"/><rect class="cls-1" x="33.86" y="3.57" width="1.66" height="4.75"/></svg></a></div>
				<div class="search_field_m"></div>
					<div class="search_field_block">
						<div class="navbar_btn_search"><svg class="icon" width="24" height="24" xmlns="http://www.w3.org/2000/svg"><svg viewBox="0 0 16 18" width="100%" height="100%"><path d="M11.9,10.9c0.9-1.1,1.5-2.8,1.5-4.4c0-3.7-3-6.5-6.7-6.5C3,0,0,2.9,0,6.5s3,6.5,6.7,6.5c1.6,0,3-0.6,4.1-1.5l4.1,4.4 l1.1-1.1L11.9,10.9z M6.7,11.6c-2.8,0-5.2-2.3-5.2-5.1s2.4-5.1,5.2-5.1s5.2,2.3,5.2,5.1S9.5,11.6,6.7,11.6z"></path></svg></svg>
						</div>
					</div>
<div class="main_search_field"><div class="main_menu_search_new"><div class="main_menu_link_new"><form role="search" method="get" class="search_form_new" action="<?php echo home_url('/') ?>"><svg class="icon_search_new" width="19" height="19" xmlns="http://www.w3.org/2000/svg"><svg viewBox="0 0 15 15" width="100%" height="100%"><path d="M11.9,10.9c0.9-1.1,1.5-2.8,1.5-4.4c0-3.7-3-6.5-6.7-6.5C3,0,0,2.9,0,6.5s3,6.5,6.7,6.5c1.6,0,3-0.6,4.1-1.5l4.1,4.4 l1.1-1.1L11.9,10.9z M6.7,11.6c-2.8,0-5.2-2.3-5.2-5.1s2.4-5.1,5.2-5.1s5.2,2.3,5.2,5.1S9.5,11.6,6.7,11.6z"></path></svg></svg><input type="search" class="search_input" placeholder="Поиск" maxlength="150" value="" name="s" required></form></div></div></div>
				</div>
			</div>
		</div>
	</header>
<div class="guide"><div class="scrim"></div><div class="content_container"><div class="guide_wrapper"><nav><a class="main_menu_link" href="https://epicris.ru/category/promokod"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/promokod.svg" class="category_image" width="28" height="28" loading="lazy" alt="Промокоды и купоны"></div><div class="tags_container_name">Промокоды</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/food-delivery"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/food-delivery.svg" class="category_image" width="28" height="28" loading="lazy" alt="Еда и продукты"></div><div class="tags_container_name">Еда и продукты</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/home-and-repair"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/home-and-repair.svg" class="category_image" width="28" height="28" loading="lazy" alt="Дом и ремонт"></div><div class="tags_container_name">Дом и ремонт</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/elektronika"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/elektronika.svg" class="category_image" width="28" height="28" loading="lazy" alt="Электроника"></div><div class="tags_container_name">Электроника</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/clothes-shoes-accessories"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/clothes-shoes-accessories.svg" class="category_image" width="28" height="28" loading="lazy" alt="Одежда и обувь"></div><div class="tags_container_name">Одежда и обувь</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/hobbies-and-entertainment"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/hobbies-and-entertainment.svg" class="category_image" width="28" height="28" loading="lazy" alt="Хобби и развлечения"></div><div class="tags_container_name">Хобби и развлечения</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/flowers-and-gifts"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/flowers-and-gifts.svg" class="category_image" width="28" height="28" loading="lazy" alt="Цветы и подарки"></div><div class="tags_container_name">Цветы и подарки</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/services"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/services.svg" class="category_image" width="28" height="28" loading="lazy" alt="Сервисы и услуги"></div><div class="tags_container_name">Сервисы и услуги</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/beauty-and-perfume"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/beauty-and-perfume.svg" class="category_image" width="28" height="28" loading="lazy" alt="Красота и парфюмерия"></div><div class="tags_container_name">Красота и парфюмерия</div></div></a><a class="main_menu_link" href="https://epicris.ru/category/tourism"><div class="menu_link-tab"><div class="tags_container_icon"><img src="/images/tourism.svg" class="category_image" width="28" height="28" loading="lazy" alt="Путешествия"></div><div class="tags_container_name">Путешествия</div></div></a><a class="main_menu_link" href="/categories"><div class="menu_link-tab menu_link-last">Все категории</div></a></nav><footer class="sid_footer"><section><a href="/about">Реклама и контакты</a><a href="/privacy-policy">Политика конфиденциальности</a></section></footer></div></div></div>