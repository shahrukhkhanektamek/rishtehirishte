<?php 

$routes->group('user', ['namespace' => 'App\Controllers\User', 'filter'=>'UserAuth',] ,function ($routes) {
    
    // $routes->add('user/(:any)', 'Home::all/$1');

    $routes->get('dashboard', 'UserDashboardController::index', ['as' => 'user.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'UserProfileController::index', ['as' => 'user.profile.index']);
        $routes->post('update', 'UserProfileController::update', ['as' => 'user.profile.update']);

        $routes->post('step1', 'UserProfileController::step1', ['as' => 'user.profile.step1']);
        $routes->post('step2', 'UserProfileController::step2', ['as' => 'user.profile.step2']);
        $routes->post('step3', 'UserProfileController::step3', ['as' => 'user.profile.step3']);
        $routes->post('step4', 'UserProfileController::step4', ['as' => 'user.profile.step4']);
        $routes->post('step5', 'UserProfileController::step5', ['as' => 'user.profile.step5']);

        $routes->get('complete-profile', 'UserProfileController::complete_profile', ['as' => 'user.profile.complete-profile']);

        $routes->post('update-profile-image', 'UserProfileController::update_profile_image', ['as' => 'user.profile.update-profile-image']);
    });

    $routes->group('member', function($routes) {
        $routes->get('/', 'UserMemberController::index', ['as' => 'user.member.index']);
        $routes->get('advance_data', 'UserMemberController::advance_data', ['as' => 'user.member.advance_data']);
        $routes->get('quick_data', 'UserMemberController::quick_data', ['as' => 'user.member.quick_data']);
        $routes->get('profile/(:any)', 'UserMemberController::profile/$1', ['as' => 'user.member.profile']);

        $routes->post('send_interest', 'UserMemberController::send_interest', ['as' => 'user.member.send_interest']);
        $routes->post('accept_interest', 'UserMemberController::accept_interest', ['as' => 'user.member.accept_interest']);
        $routes->post('decline_interest', 'UserMemberController::decline_interest', ['as' => 'user.member.decline_interest']);
        $routes->post('view_contact', 'UserMemberController::view_contact', ['as' => 'user.member.view_contact']);
    });
    $routes->group('my-matches', function($routes) {
        $routes->get('/', 'UserMyMatchesController::index', ['as' => 'user.my-matches.index']);
        $routes->get('load_data', 'UserMyMatchesController::load_data', ['as' => 'user.my-matches.load_data']);
    });
    $routes->group('viewed-profiles', function($routes) {
        $routes->get('/', 'UserViewedProfilesController::index', ['as' => 'user.viewed-profiles.index']);
        $routes->get('load_data', 'UserViewedProfilesController::load_data', ['as' => 'user.viewed-profiles.load_data']);
    });
    $routes->group('viewed-contacts', function($routes) {
        $routes->get('/', 'UserViewedContactsController::index', ['as' => 'user.viewed-contacts.index']);
        $routes->get('load_data', 'UserViewedContactsController::load_data', ['as' => 'user.viewed-contacts.load_data']);
    });
    $routes->group('inbox', function($routes) {
        $routes->get('/', 'UserInboxController::index', ['as' => 'user.inbox.index']);
        $routes->get('load_data', 'UserInboxController::load_data', ['as' => 'user.inbox.load_data']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'UserPasswordController::index', ['as' => 'user.password.index']);
        $routes->post('update', 'UserPasswordController::update', ['as' => 'user.password.update']);
    });


    $routes->group('advocates', function($routes) {
        $routes->get('/', 'UserAdvocatesController::index', ['as' => 'user.advocates.list']);
        $routes->get('load_data', 'UserAdvocatesController::load_data', ['as' => 'user.advocates.load_data']);
        $routes->get('view/(:any)', 'UserAdvocatesController::view/$1', ['as' => 'user.advocates.view']);
        $routes->post('scratch', 'UserAdvocatesController::scratch', ['as' => 'user.advocates.scratch']);
    });


    $routes->group('package', function($routes) {
        $routes->get('/', 'UserPackageController::index', ['as' => 'user.package.list']);
        $routes->get('load_data', 'UserPackageController::load_data', ['as' => 'user.package.load_data']);
        $routes->post('get_package', 'UserPackageController::get_package', ['as' => 'user.package.get_package']);

    });

    $routes->group('package-history', function($routes) {
        $routes->get('/', 'UserPackageHistoryController::index', ['as' => 'user.package-history.list']);
        $routes->get('load_data', 'UserPackageHistoryController::load_data', ['as' => 'user.package-history.load_data']);
    });


    $routes->group('review', function($routes) {
        $routes->get('/', 'UserReviewController::index', ['as' => 'user.review.list']);
        $routes->get('load_data', 'UserReviewController::load_data', ['as' => 'user.review.load_data']);
        $routes->post('delete', 'UserReviewController::delete', ['as' => 'user.review.delete']);
        $routes->post('add', 'UserReviewController::add', ['as' => 'user.review.add']);
    });

    $routes->group('lead', function($routes) {
        $routes->get('/', 'UserLeadController::index', ['as' => 'user.lead.list']);
        $routes->get('load_data', 'UserLeadController::load_data', ['as' => 'user.lead.load_data']);
    });

    $routes->group('appointment', function($routes) {
        $routes->get('/', 'UserAppointmentController::index', ['as' => 'user.appointment.list']);
        $routes->get('load_data', 'UserAppointmentController::load_data', ['as' => 'user.appointment.load_data']);
        $routes->post('book', 'UserAppointmentController::book', ['as' => 'user.review.book']);
    });



});

