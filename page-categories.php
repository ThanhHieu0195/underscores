<?php get_header() ?>
<?php
$terms = get_terms( array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
) );

$filter = '';
$query_params = [
  'post_type' => 'product',
  'order' => 'DECS',
  'posts_per_page' => -1
];
if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];
  $query_params['tax_query'] = 
      array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $filter,
            )
      );
}

$posts = get_posts($query_params);
?>
<div class="block-content">
        <div class="container product_section_container">
          <div class="row">
            <div class="col product_section clearfix">
              <!-- Sidebar-->
              <div class="sidebar">
                <div class="sidebar_section">
                  <div class="sidebar_title">
                    <h5>Product Category</h5>
                  </div>
                  <ul class="sidebar_categories">
                    <li><a href="./">All</a></li>
                    <?php 
                    foreach ($terms as $term) {
                      if ($filter == $term->term_id) {
                          echo '<li class="active"><a href="javascript:void(0)"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>'.$term->name.'</a></li>';
                      } else {
                        echo '<li><a href="?filter='.$term->term_id.'">'.$term->name.'</a></li>';
                      }
                    }
                    ?>
                    <!-- <li class="active"><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Women</a></li> -->
                  </ul>
                </div>
              </div>
              <!-- Main Content-->
              <div class="main_content">
                <!-- Products-->
                <div class="products_iso">
                  <div class="row">
                    <div class="col">
                      <!-- Product Sorting-->
                      <div class="product_sorting_container product_sorting_container_top">
                        <ul class="product_sorting">
                          <li><span class="type_sorting_text">Default Sorting</span><i class="fa fa-angle-down"></i>
                            <ul class="sorting_type">
                              <li class="type_sorting_btn" data-isotope-option="{ &quot;sortBy&quot;: &quot;original-order&quot; }"><span>Default Sorting</span></li>
                              <li class="type_sorting_btn" data-isotope-option="{ &quot;sortBy&quot;: &quot;price&quot; }"><span>Price</span></li>
                              <li class="type_sorting_btn" data-isotope-option="{ &quot;sortBy&quot;: &quot;name&quot; }"><span>Product Name</span></li>
                            </ul>
                          </li>
                          <li><span>Show</span><span class="num_sorting_text">6</span><i class="fa fa-angle-down"></i>
                            <ul class="sorting_num">
                              <li class="num_sorting_btn"><span>6</span></li>
                              <li class="num_sorting_btn"><span>12</span></li>
                              <li class="num_sorting_btn"><span>24</span></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                      <!-- Product Grid-->
                      <div class="product-grid">
                        <?php 
                        if (!empty($posts)):
                          foreach($posts as $post):
                            $thumbnail_url = get_the_post_thumbnail_url($post->ID);
                            $price = get_post_meta($post->ID, '_regular_price', true);
                            $saleprice = get_post_meta($post->ID, '_sale_price', true);
                            $type = 1;
                            if (!empty($saleprice)) {
                              $type = 2;
                            }
                        ?>
                         <div class="product-item men">
                          <div class="product discount product_filter">
                            <div class="product_image">
                              <img src="<?= esc_url($thumbnail_url) ?>" alt="">
                            </div>
                            <div class="favorite favorite_left"></div>  
                            <?php if ($type == 2): ?>
                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                              <span>-<?= ($price - $saleprice)/$price*100 ?>%</span>
                            </div>
                          <?php endif; ?>
                            <div class="product_info">
                              <h6 class="product_name"><a href="<?= get_permalink($post->ID) ?>"><?= $post->post_title ?></a></h6>
                              <div class="product-code">123456</div>
                              <?php if ($type == 2): ?>
                              <div class="product_price"><?= number_format(intval($saleprice)) .get_woocommerce_currency_symbol() ?><span><?= number_format(intval($price)) . get_woocommerce_currency_symbol()?></span></div>
                              <?php else: ?>
                              <div class="product_price"><?= number_format(intval($price)) .get_woocommerce_currency_symbol() ?></div>
                              <?php endif ?>
                            </div>
                          </div>
                          <div class="red_button add_to_cart_button">
                            <a href="javascript:void(0)" class="js-bt-add-to-cart" data-product-id="<?= $post->ID ?>">add to cart</a>
                          </div>
                        </div>
                        <?php 
                          endforeach;
                        endif;
                        ?>
                        <!-- Product 1-->
                     
                      </div>
                      <!-- Product Sorting-->
                      <div class="product_sorting_container product_sorting_container_bottom clearfix">
                        <ul class="product_sorting">
                          <li><span>Show:</span><span class="num_sorting_text">04</span><i class="fa fa-angle-down"></i>
                            <ul class="sorting_num">
                              <li class="num_sorting_btn"><span>01</span></li>
                              <li class="num_sorting_btn"><span>02</span></li>
                              <li class="num_sorting_btn"><span>03</span></li>
                              <li class="num_sorting_btn"><span>04</span></li>
                            </ul>
                          </li>
                        </ul><span class="showing_results">Showing 1–3 of 12 results</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="benefit">
          <div class="container">
            <div class="row benefit_row">
              <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                  <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                  <div class="benefit_content">
                    <h6>free shipping</h6>
                    <p>Suffered Alteration in Some Form</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                  <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                  <div class="benefit_content">
                    <h6>cach on delivery</h6>
                    <p>The Internet Tend To Repeat</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                  <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                  <div class="benefit_content">
                    <h6>45 days return</h6>
                    <p>Making it Look Like Readable</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                  <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                  <div class="benefit_content">
                    <h6>opening all week</h6>
                    <p>8AM - 09PM</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php get_footer() ?>