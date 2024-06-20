<?php
	
	if (!empty($_POST['post_id'])) { $post_id = $_POST['post_id']; }
	// если мы получили id posta, то продолжаем
	if($post_id) {
		$offers_id = get_post_meta($post_id, 'wpcf-offers_id', true); // получаем id нужного оффера для нужного поста и подставляем значение в URL
		$url = 'https://epicris.ru/wp-content/themes/epicris/functions/xmls/cupons.xml'; // получили URL адрес для скачивания RSS фида с промокодами для нужного арендодателя
		
		$xml = simplexml_load_file($url); // проверяем существование этого фида
		
		// если RSS feed существует, то продолжаем
		if($xml) {
			// разбираем фид и извлекаем промокоды
			foreach ($xml->xpath('coupons/coupon') as $coupon) {
				if($coupon) {
				// если удалось извлечь купоны, то записываем полученные данные в строку
					if($coupon->advcampaign_id == $offers_id ) {
						$coupon_str .= '<div data-coupon-id="'.$coupon->attributes()->id.'" rel="nofollow noopener noreferrer" class="get-price" onclick="yaCounter48613856.reachGoal('."'promo'".'); return true;">';
						$coupon_str .= '<div class="coupon">';
						$coupon_str .= '<div class="discount_card"><div class="discount_card_bord"><span>Скидка</span>'.$coupon->discount.'</div></div><div class="discount_desc">';
					if($coupon->date_end == 'None') {	
						$coupon_str .= '<p class="coupon_data">Заканчивается через 3 дня</p>';
					} else {
						$coupon_str .= '<p>Промокод активен до '.$coupon->date_end.'</p></div>';
					}	
						$coupon_str .= '<h3>'.$coupon->name.'</h3>';
						$coupon_str .= '</div>';
					if($coupon->promocode == 'Не нужен') {
						$coupon_str .= '<div class="coupon_button">Открыть акцию</div></div>';
					} else {	
						$coupon_str .= '<div class="coupon_promocode">*******</div><div class="coupon_button">Получить промокод</div></div>';
					}	
						$coupon_str .= '</div>';
					if($coupon->promocode == 'Не нужен') {
						$coupon_str .= '<script>$(function() {
							$("body").on("click", "[data-coupon-id='.$coupon->attributes()->id.']", function(e) {
								e.preventDefault(), window.open("'.$coupon->gotolink.'", "_blank")
							})
						});
						</script>';	
					} else {
						$coupon_str .= '<script>$(function() {
							$("body").on("click", "[data-coupon-id='.$coupon->attributes()->id.']", function(e) {
								e.preventDefault(), window.open("#code-'.$coupon->attributes()->id.'", "_blank").addEventListener("DOMContentLoaded", function(e) {
								this.document.body.style.overflow = "hidden";
								this.document.querySelector(".modal-blocks").innerHTML = "<div class=\'modal_overlay\'><div class=\'modal_dialog\'><div class=\'modal_content\'><h3>'.$coupon->name.'</h3><span class=\'modal_lable\'>Скопируйте и вставьте этот промокод при оформлении заказа</span><div class=\'coupon_code_wrapper\'><input id=\'copied_promokode\' type=\'text\' readonly=\'readonly\' value='.$coupon->promocode.' class=\'coupon_code_input\'><button id=\'copied_code\' class=\'coupon_code_button\'>Копировать</button><a target=\'_blank\' href='.$coupon->gotolink.' class=\'coupon_button\'>Перейти в магазин</a><button class=\'close_button_modal\'><svg xmlns=\'http://www.w3.org/2000/svg\' width=\'28\' height=\'28\' viewBox=\'0 0 24 24\' role=\'presentation\'><g fill=\'currentColor\'><path fill-rule=\'evenodd\' clip-rule=\'evenodd\' d=\'M24 1.4L22.6 0L12 10.6L1.40002 0L0 1.4L10.6 12L0 22.6L1.40002 24L12 13.4L22.6 24L24 22.6L13.4 12L24 1.4Z\' fill=\'black\'></path></g></svg></button></div></div></div></div>"
								this.document.querySelector(".coupon_promocode").innerHTML = "'.$coupon->promocode.'"
								}), setTimeout(function() {
										window.location = ""
									}, 0)
								
							})
						});
$(function() {						
		$(".close_button_modal").on("click", function (e) {
            document.body.style.overflow = "auto";
			document.querySelector(".modal-blocks").innerHTML = ""
        });
});	
						</script>';
					}
					} else { $e =''; $error = '<div style="padding: 50px; border: 1px dashed #888; margin: 25px 0;text-align: center;">Промокоды для этого магазина временно недоступны';}
			
				} else {
					$error = '<div style="text-align: center; width: 100%;padding: 15px;">Извините, промокоды для этого магазина временно отсутствуют</div>';
				}			
			}
		} else { $error = 'XML не получен';}
			echo $coupon_str;
	} else { echo 'POST_ID не получен';}
?>