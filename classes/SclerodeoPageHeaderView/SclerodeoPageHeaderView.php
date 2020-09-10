<?php

final class SclerodeoPageHeaderView {

    /**
     * @param model $model
     *
     * @return void
     */
    static function CBView_render(stdClass $model): void {
        $selectedMainMenuItemName = CBModel::valueToString(
            CBHTMLOutput::pageInformation(),
            'selectedMainMenuItemName'
        );

        ?>

        <header class="SclerodeoPageHeaderView CBDarkTheme">
            <?php

            CBView::render((object)[
                'className' => 'CBMenuView',
                'menuID' => SclerodeoMenu_main::ID(),
                'selectedItemName' => $selectedMainMenuItemName,
            ]);

            ?>
        </header>

        <?php
    }
}
