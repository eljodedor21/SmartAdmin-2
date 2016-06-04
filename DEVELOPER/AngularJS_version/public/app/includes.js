define([
    // account
    'auth/module',
    'auth/models/User',

    // layout

    'layout/module',
    'layout/actions/minifyMenu',
    'layout/actions/toggleMenu',
    'layout/actions/fullScreen',
    'layout/actions/resetWidgets',
    'layout/actions/resetWidgets',
    'layout/actions/searchMobile',
    'layout/directives/demo/demoStates',
    'layout/directives/smartInclude',
    'layout/directives/smartDeviceDetect',
    'layout/directives/smartFastClick',
    'layout/directives/smartLayout',
    'layout/directives/smartSpeech',
    'layout/directives/smartRouterAnimationWrap',
    'layout/directives/smartFitAppView',
    'layout/directives/radioToggle',
    'layout/directives/dismisser',
    'layout/directives/smartMenu',
    'layout/directives/bigBreadcrumbs',
    'layout/directives/stateBreadcrumbs',
    'layout/directives/smartPageTitle',
    'layout/directives/hrefVoid',
    'layout/service/SmartCss',
    'modules/widgets/directives/widgetGrid',
    'modules/widgets/directives/jarvisWidget',


    // dashboard
    'dashboard/module',


    //components
    'components/language/Language',
    'components/language/languageSelector',
    'components/language/language-controller',

    'components/projects/Project',
    'components/projects/recentProjects',

    'components/activities/activities-controller',
    'components/activities/activities-dropdown-toggle-directive',
    'components/activities/activities-service',

    'components/shortcut/shortcut-directive',

    'components/calendar/module',
    'components/calendar/models/CalendarEvent',
    'components/calendar/directives/fullCalendar',
    'components/calendar/directives/dragableEvent',
    'components/calendar/controllers/CalendarCtrl',

    'components/inbox/module',
    'components/inbox/models/InboxConfig',
    'components/inbox/models/InboxMessage',

    'components/todo/TodoCtrl',
    'components/todo/models/Todo',
    'components/todo/directives/todoList',

    // chat
    'components/chat/module',

    // graphs
    'modules/graphs/module',


    // tables
    'modules/tables/module',

    // forms
    'modules/forms/module',

    // ui
    'modules/ui/module',

    // widgets
    'modules/widgets/module',

    // widgets
    'modules/maps/module',

    // appViews
    'modules/app-views/module',

    // misc
    'modules/misc/module',

    // smartAdmin
    'modules/smart-admin/module'

], function () {
    'use strict';
});
