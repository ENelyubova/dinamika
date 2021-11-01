<div class="header" >
  <div class="header-top">
    <div class="content-site">
      <div class="header-content fl fl-ai-c fl-jc-sb">
        <div class="header__item fl fl-ai-c">
          <div class="header-logo">
            <a href="/">
              <?php if (Yii::app()->hasModule('contentblock')) : ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'logo']); ?>
              <?php endif; ?>
            </a>
          </div><!-- logo --> 
          
          <div class="header-address">
            <div class="header-address__point">
              <?php if (Yii::app()->hasModule('contentblock')) : ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
              <?php endif; ?>
            </div>
            <div class="header-address__btn fl fl-ai-c">
              <a class="btn btn-white address-btn-map" data-fancybox="" data-type="iframe" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2467.2475456107686!2d55.14908795155169!3d51.80163729686765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x417bf6e1efe81095%3A0xc7f9555dec6012a8!2z0YPQuy4g0JzQvtC90YLQsNC20L3QuNC60L7QsiwgMjIvMSwg0J7RgNC10L3QsdGD0YDQsywg0J7RgNC10L3QsdGD0YDQs9GB0LrQsNGPINC-0LHQuy4sIDQ2MDA0OA!5e0!3m2!1sru!2sru!4v1607936319844!5m2!1sru!2sru" href=" javascript:;"="">На карте</a>
              <a href="#" class="btn btn-white" data-toggle="modal" data-target="#operatingModeModal">Режим работы</a>
            </div>
          </div><!-- address -->
        </div>
        
        <div class="header__item fl fl-ai-c fl-jc-sb">
          <div class="header-phone">
            <?php if (Yii::app()->hasModule('contentblock')) : ?>
                <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
            <?php endif; ?>
          </div><!-- phone -->
          
          <div class="header-callback fl fl-ai-c">
            <a href="#callbackModal" data-toggle="modal" class="btn btn-orange btn-callback btn-callback-hidden-mobile">Перезвоните мне <i class="fa fa-phone" aria-hidden="true"></i></a>

            <div class="select-wrap fl fl-ai-c">
              <a href="#selectionModal" data-toggle="modal" class="select__btn btn btn-blue">Подбор оборудования</a>
              <div class="select-form">
                <div class="select-form__btn btn-select btn btn-blue">
                  <img src="<?= $this->mainAssets . '/images/icon/down.svg' ?>" alt="">
                </div>
                <div class="select-form__body">
                  <?php $this->widget('application.modules.store.widgets.CatalogWidget', [
                      'view' => 'modal-select-category'
                  ]); ?>
                </div>
              </div>
            </div><!-- select-wrap -->
          </div><!-- callback -->

          <div class="mobile-panel mobile-hidden">
            <div class="m-menu-button">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <div class="mobile-menu ">
                <div class="m-menu-buttons">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
                <div class="mobile-content">
                  <?php if (Yii::app()->hasModule('menu')) : ?>
                    <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
                  <?php endif; ?>

                  <div>
                    <div class="header-address__point">
                      <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                      <?php endif; ?>
                    </div>
                    <div class="header-address__btn fl fl-ai-c">
                      <a class="btn btn-white address-btn-map" data-fancybox="" data-type="iframe" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2467.2475456107686!2d55.14908795155169!3d51.80163729686765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x417bf6e1efe81095%3A0xc7f9555dec6012a8!2z0YPQuy4g0JzQvtC90YLQsNC20L3QuNC60L7QsiwgMjIvMSwg0J7RgNC10L3QsdGD0YDQsywg0J7RgNC10L3QsdGD0YDQs9GB0LrQsNGPINC-0LHQuy4sIDQ2MDA0OA!5e0!3m2!1sru!2sru!4v1607936319844!5m2!1sru!2sru" href=" javascript:;"="">На карте</a>
                      <a href="#" class="btn btn-white" data-toggle="modal" data-target="#operatingModeModal">Режим работы</a>
                    </div>
                  </div><!-- address -->
                </div>
            </div>
          </div><!-- mobile-panel -->
        </div>
      </div>
    </div>
  </div><!-- header-top -->
  
  <div class="header-bottom">
    <div class="content-site">
      <div class="header-content header-content-mobile fl fl-ai-c fl-jc-sb">
        <div class="catalog-menu">
          <div class="wrapper-dropdown dropdown-cat"> 
            <div class="wrapper-dropdown__header">Каталог</div> 
            <div class="wrapper-dropdown__body">
               <div class="content-site">
                 <?php $this->widget('application.modules.store.widgets.CatalogWidget', [
                  'view' => 'catalog-menu']); ?>
               </div>
            </div>
          </div>
        </div><!-- catalog-menu -->

        <div class="header-menu fl fl-ai-c">
          <?php if (Yii::app()->hasModule('menu')) : ?>
              <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
          <?php endif; ?>
        </div><!-- menu -->

        <div class="header-search fl fl-ai-c">
          <?php $this->widget('application.modules.store.widgets.SearchProductWidget', ['view' => 'search-product-form']); ?>

          <div class="header-search-mobile">
            <a class="fl fl-ai-c fl-jc-c" data-toggle="modal" data-target="#search-form-Modal" href="#">
              <img src="<?= $this->mainAssets . '/images/icon/search-white.svg' ?>" alt="">
            </a>
          </div><!-- header-search-mobile -->

          <div class="header-callback-mobile">
            <a href="#callbackModal" data-toggle="modal" class="btn btn-orange btn-callback">Перезвоните мне <i class="fa fa-phone" aria-hidden="true"></i></a>
          </div>

          <div class="mobile-panel mobile-visible">
            <div class="m-menu-button">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <div class="mobile-menu ">
                <div class="m-menu-buttons">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
                <div class="mobile-content">
                  <ul>
                    <li>
                      <a href="/store">Каталог</a>
                    </li>
                  </ul>
                  <?php if (Yii::app()->hasModule('menu')) : ?>
                    <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
                  <?php endif; ?>

                  <div class="">
                    <div class="header-address__point">
                      <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                      <?php endif; ?>
                    </div>
                    <div class="header-address__btn fl fl-ai-c">
                      <a class="btn btn-white address-btn-map" data-fancybox="" data-type="iframe" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2467.2475456107686!2d55.14908795155169!3d51.80163729686765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x417bf6e1efe81095%3A0xc7f9555dec6012a8!2z0YPQuy4g0JzQvtC90YLQsNC20L3QuNC60L7QsiwgMjIvMSwg0J7RgNC10L3QsdGD0YDQsywg0J7RgNC10L3QsdGD0YDQs9GB0LrQsNGPINC-0LHQuy4sIDQ2MDA0OA!5e0!3m2!1sru!2sru!4v1607936319844!5m2!1sru!2sru" href=" javascript:;"="">На карте</a>
                      <a href="#" class="btn btn-white" data-toggle="modal" data-target="#operatingModeModal">Режим работы</a>
                    </div>
                  </div><!-- address -->
                </div>
            </div>
          </div><!-- mobile-panel -->
        </div><!-- header-search -->
      </div>  
    </div>
  </div>
</div>