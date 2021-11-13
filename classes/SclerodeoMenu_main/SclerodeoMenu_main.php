<?php

final class
SclerodeoMenu_main {

    /**
     * @return void
     */
    static function
    CBInstall_install(
    ): void {
        $updater = CBModelUpdater::fetch(
            (object)[
                'className' => 'CBMenu',
                'ID' => SclerodeoMenu_main::ID(),
                'title' => 'Website',
                'titleURI' => '/',
            ]
        );

        CBModelUpdater::save(
            $updater
        );

        CB_StandardPageFrame::setDefaultMainMenuModelCBID(
            SclerodeoMenu_main::ID()
        );
    }
    /* CBInstall_install() */



    /**
     * @return [string]
     */
    static function
    CBInstall_requiredClassNames(
    ): array {
        return [
            'CB_StandardPageFrame',
            'CBMenu',
            'CBModelUpdater',
        ];
    }
    /* CBInstall_requiredClassNames() */



    /**
     * @return ID
     */
    static function
    ID(
    ): string {
        return '495535e5ac48b2b68a83aea9b2789e8bda968807';
    }
    /* ID() */

}
