<div class="footer">
    <div class="content-site">
        <div class="footer-panel fl fl-jc-sb">
            <div class="footer-logo footer-item">
                <div class="logo">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'logo-footer']); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-info"> 
                    © <?= date('Y'); ?> <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'legal-info']); ?>
                        <?php endif; ?>
                </div>
            </div>
            <div class="footer-product footer-item">
                <div class="footer-heading">Каталог</div>
                    <?php $this->widget('application.modules.store.widgets.CategoryWidget', ['depth' => 1]); ?>
            </div>
            <div class="footer-menu footer-item">
                <div class="footer-heading">Покупателям</div>
                <?php if (Yii::app()->hasModule('menu')) : ?>
                    <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
                <?php endif; ?>
            </div>
            
            <div class="footer-contacts footer-item ">
                <div class="footer-heading">Мы на связи</div>
                <div class="footer-contacts-item">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
                    <?php endif; ?>
                </div>

                <div class="footer-contacts-item">
                    <button class="btn btn-orange" data-toggle="modal" data-target="#callbackModal" tabindex="0">Перезвоните мне</button>
                </div>

                <div class="footer-contacts-item footer-contacts-email">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                    <?php endif; ?>
                </div>

                <div class="footer-contacts-item">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-contacts-item">
                    <div class="footer-social fl fl-ai-c">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom fl fl-ai-c fl-jc-sb">
            <div class="footer-info footer-info-bottom"> 
                © <?= date('Y'); ?> <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'legal-info']); ?>
                        <?php endif; ?>
            </div>
            <div class="dc56 fl fl-ai-c">
                <a href="https://dcmedia.ru/"></a>
                <p>Создание и продвижение сайтов</p>
            </div>
        </div>
    </div>
</div>
