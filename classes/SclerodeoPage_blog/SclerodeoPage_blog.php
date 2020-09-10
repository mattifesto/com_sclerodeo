<?php

final class SclerodeoPage_blog {

    /**
     * @return void
     */
    static function CBInstall_configure(): void {
        SclerodeoPage_blog::installPage();
        SclerodeoPage_blog::installMenuItem();
    }

    /**
     * @return ID
     */
    static function ID(): string {
        return 'a37c31bb959a68f84e660781a6e05c56aebbed0e';
    }

    /**
     * @return void
     */
    private static function installMenuItem(): void {
        $updater = CBModelUpdater::fetch(
            (object)[
                'ID' => SclerodeoMenu_main::ID(),
            ]
        );

        $menuSpec = $updater->working;

        CBMenu::addOrReplaceItem(
            $menuSpec,
            (object)[
                'className' => 'CBMenuItem',
                'name' => 'blog',
                'text' => 'Blog',
                'URL' => '/blog/',
            ]
        );

        CBModelUpdater::save($updater);
    }

    /**
     * @return void
     */
    private static function installPage(): void {
        $updater = CBModelUpdater::fetch(
            CBModelTemplateCatalog::fetchLivePageTemplate(
                (object)[
                    'ID' => SclerodeoPage_blog::ID(),
                    'classNameForKind' => 'SclerodeoGeneratedPageKind',
                    'isPublished' => true,
                    'selectedMenuItemNames' => 'blog',
                    'title' => 'Blog',
                    'URI' => 'blog',
                ]
            )
        );

        $pageSpec = $updater->working;

        /* publicationTimeStamp */

        if (CBModel::valueAsInt($pageSpec, 'publicationTimeStamp') === null) {
            $pageSpec->publicationTimeStamp = time();
        }

        /* page title and description view */

        $sourceID = '86c596e4ecd30d377bd8f454bcd2cbbc950df90d';

        CBSubviewUpdater::unshift(
            $pageSpec,
            'sourceID',
            $sourceID,
            (object)[
                'className' => 'CBPageTitleAndDescriptionView',
                'sourceID' => $sourceID,
            ]
        );

        /* page list view */

        $sourceID = '6cc1d6d56258c7d3dfabd0cd1a3dfc1fdc7d1806';

        CBSubviewUpdater::push(
            $pageSpec,
            'sourceID',
            $sourceID,
            (object)[
                'className' => 'CBPageListView2',
                'classNameForKind' => 'SclerodeoBlogPostPageKind',
                'sourceID' => $sourceID,
            ]
        );

        /* save */

        CBModelUpdater::save($updater);
    }
}
