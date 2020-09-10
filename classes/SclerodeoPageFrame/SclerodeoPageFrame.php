<?php

final class SclerodeoPageFrame {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBPageFrameCatalog::install(__CLASS__);
    }

    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return ['CBPageFrameCatalog'];
    }

    /**
     * @param function $renderContent
     *
     * @return void
     */
    static function CBPageFrame_render(callable $renderContent): void {
        CBView::render((object)[
            'className' => 'SclerodeoPageHeaderView',
        ]);

        $renderContent();

        CBView::render((object)[
            'className' => 'SclerodeoPageFooterView',
        ]);
    }
}
