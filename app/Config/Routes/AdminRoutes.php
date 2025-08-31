<?php 

$adminEmployeeRoutes = function ($routes) {
    
    $routes->get('dashboard', 'AdminDashboardController::index', ['as' => 'admin.dashboard']);


    $routes->group('profile', function($routes) {
        $routes->get('/', 'AdminProfileController::index', ['as' => 'admin.profile.index']);
        $routes->post('update', 'AdminProfileController::update', ['as' => 'admin.profile.update']);
        $routes->post('update-profile-image', 'AdminProfileController::update_profile_image', ['as' => 'admin.profile.update-profile-image']);
    });

    $routes->group('password', function($routes) {
        $routes->get('/', 'AdminPasswordController::index', ['as' => 'admin.password.index']);
        $routes->post('update', 'AdminPasswordController::update', ['as' => 'admin.password.update']);
    });

    $routes->group('setting', function($routes) {
        $routes->get('main', 'AdminSettingController::main', ['as' => 'setting.main']);
        $routes->post('main-update', 'AdminSettingController::main_update', ['as' => 'setting.main-update']);

        $routes->get('policy', 'AdminSettingController::policy', ['as' => 'setting.policy']);
        $routes->post('policy-update', 'AdminSettingController::policy_update', ['as' => 'setting.policy-update']);

        $routes->get('logo', 'AdminSettingController::logo', ['as' => 'setting.logo']);
        $routes->post('logo-update', 'AdminSettingController::logo_update', ['as' => 'setting.logo-update']);        
    });

    $routes->group('script', function($routes) {
        $routes->get('/', 'AdminScriptController::index', ['as' => 'script.index']);
        $routes->post('update', 'AdminScriptController::update', ['as' => 'script.update']);
    });

    $routes->group('meta-tag', function($routes) {
        $routes->get('/', 'AdminMetaTagController::index', ['as' => 'meta-tag.list']);
        $routes->get('load_data', 'AdminMetaTagController::load_data', ['as' => 'meta-tag.load_data']);
        $routes->get('add', 'AdminMetaTagController::add', ['as' => 'meta-tag.add']);
        $routes->get('edit/(:any)?', 'AdminMetaTagController::edit/$1', ['as' => 'meta-tag.edit']);
        $routes->get('view/(:any)', 'AdminMetaTagController::view/$1', ['as' => 'meta-tag.view']);
        $routes->post('update', 'AdminMetaTagController::update', ['as' => 'meta-tag.update']);
        $routes->post('delete/(:any)', 'AdminMetaTagController::delete/$1', ['as' => 'meta-tag.delete']);
        $routes->post('block_unblock/(:any)', 'AdminMetaTagController::block_unblock/$1', ['as' => 'meta-tag.block_unblock']);
    });


    $routes->group('country', function($routes) {
        $routes->get('/', 'AdminCountryController::index', ['as' => 'country.list']);
        $routes->get('load_data', 'AdminCountryController::load_data', ['as' => 'country.load_data']);
        $routes->get('add', 'AdminCountryController::add', ['as' => 'country.add']);
        $routes->get('edit/(:any)?', 'AdminCountryController::edit/$1', ['as' => 'country.edit']);
        $routes->get('view/(:any)', 'AdminCountryController::view/$1', ['as' => 'country.view']);
        $routes->post('update', 'AdminCountryController::update', ['as' => 'country.update']);
        $routes->post('delete/(:any)', 'AdminCountryController::delete/$1', ['as' => 'country.delete']);
        $routes->post('block_unblock/(:any)', 'AdminCountryController::block_unblock/$1', ['as' => 'country.block_unblock']);
    });

    $routes->group('state', function($routes) {
        $routes->get('/', 'AdminStateController::index', ['as' => 'state.list']);
        $routes->get('load_data', 'AdminStateController::load_data', ['as' => 'state.load_data']);
        $routes->get('add', 'AdminStateController::add', ['as' => 'state.add']);
        $routes->get('edit/(:any)?', 'AdminStateController::edit/$1', ['as' => 'state.edit']);
        $routes->get('view/(:any)', 'AdminStateController::view/$1', ['as' => 'state.view']);
        $routes->post('update', 'AdminStateController::update', ['as' => 'state.update']);
        $routes->post('delete/(:any)', 'AdminStateController::delete/$1', ['as' => 'state.delete']);
        $routes->post('block_unblock/(:any)', 'AdminStateController::block_unblock/$1', ['as' => 'state.block_unblock']);
    });

    $routes->group('city', function($routes) {
        $routes->get('/', 'AdminCityController::index', ['as' => 'city.list']);
        $routes->get('load_data', 'AdminCityController::load_data', ['as' => 'city.load_data']);
        $routes->get('add', 'AdminCityController::add', ['as' => 'city.add']);
        $routes->get('edit/(:any)?', 'AdminCityController::edit/$1', ['as' => 'city.edit']);
        $routes->get('view/(:any)', 'AdminCityController::view/$1', ['as' => 'city.view']);
        $routes->post('update', 'AdminCityController::update', ['as' => 'city.update']);
        $routes->post('delete/(:any)', 'AdminCityController::delete/$1', ['as' => 'city.delete']);
        $routes->post('block_unblock/(:any)', 'AdminCityController::block_unblock/$1', ['as' => 'city.block_unblock']);
    });
    $routes->group('education', function($routes) {
        $routes->get('/', 'AdminEducationController::index', ['as' => 'education.list']);
        $routes->get('load_data', 'AdminEducationController::load_data', ['as' => 'education.load_data']);
        $routes->get('add', 'AdminEducationController::add', ['as' => 'education.add']);
        $routes->get('edit/(:any)?', 'AdminEducationController::edit/$1', ['as' => 'education.edit']);
        $routes->get('view/(:any)', 'AdminEducationController::view/$1', ['as' => 'education.view']);
        $routes->post('update', 'AdminEducationController::update', ['as' => 'education.update']);
        $routes->post('delete/(:any)', 'AdminEducationController::delete/$1', ['as' => 'education.delete']);
        $routes->post('block_unblock/(:any)', 'AdminEducationController::block_unblock/$1', ['as' => 'education.block_unblock']);
    });
    
    $routes->group('certification', function($routes) {
        $routes->get('/', 'AdminCertificationController::index', ['as' => 'certification.list']);
        $routes->get('load_data', 'AdminCertificationController::load_data', ['as' => 'certification.load_data']);
        $routes->get('add', 'AdminCertificationController::add', ['as' => 'certification.add']);
        $routes->get('edit/(:any)?', 'AdminCertificationController::edit/$1', ['as' => 'certification.edit']);
        $routes->get('view/(:any)', 'AdminCertificationController::view/$1', ['as' => 'certification.view']);
        $routes->post('update', 'AdminCertificationController::update', ['as' => 'certification.update']);
        $routes->post('delete/(:any)', 'AdminCertificationController::delete/$1', ['as' => 'certification.delete']);
        $routes->post('block_unblock/(:any)', 'AdminCertificationController::block_unblock/$1', ['as' => 'certification.block_unblock']);
    });




    $routes->group('admin-user', function($routes) {
        $routes->get('/', 'AdminUserController::index', ['as' => 'admin-user.list']);
        $routes->get('load_data', 'AdminUserController::load_data', ['as' => 'admin-user.load_data']);
        $routes->get('add', 'AdminUserController::add', ['as' => 'admin-user.add']);
        $routes->get('edit/(:any)?', 'AdminUserController::edit/$1', ['as' => 'admin-user.edit']);
        $routes->get('view/(:any)', 'AdminUserController::view/$1', ['as' => 'admin-user.view']);
        $routes->post('update', 'AdminUserController::update', ['as' => 'admin-user.update']);

        $routes->get('change-password/(:any)', 'AdminUserController::change_password/$1', ['as' => 'admin-user.change-password']);
        $routes->post('change-password-action', 'AdminUserController::change_password_action', ['as' => 'admin-user.change-password-action']);

        $routes->post('delete/(:any)', 'AdminUserController::delete/$1', ['as' => 'admin-user.delete']);
        $routes->post('block_unblock/(:any)', 'AdminUserController::block_unblock/$1', ['as' => 'admin-user.block_unblock']);
    });



    $routes->group('kyc', function($routes) {
        $routes->get('/', 'AdminKycController::index', ['as' => 'kyc.list']);
        $routes->get('load_data', 'AdminKycController::load_data', ['as' => 'kyc.load_data']);
        $routes->get('add', 'AdminKycController::add', ['as' => 'kyc.add']);
        $routes->get('edit/(:any)?', 'AdminKycController::edit/$1', ['as' => 'kyc.edit']);
        $routes->get('view/(:any)', 'AdminKycController::view/$1', ['as' => 'kyc.view']);
        $routes->post('update', 'AdminKycController::update', ['as' => 'kyc.update']);

        $routes->get('change-password/(:any)', 'AdminKycController::change_password/$1', ['as' => 'kyc.change-password']);
        $routes->post('change-password-action', 'AdminKycController::change_password_action', ['as' => 'kyc.change-password-action']);

        $routes->post('delete/(:any)', 'AdminKycController::delete/$1', ['as' => 'kyc.delete']);
        $routes->post('block_unblock/(:any)', 'AdminKycController::block_unblock/$1', ['as' => 'kyc.block_unblock']);
    });

  

    $routes->group('transaction', function($routes) {
        $routes->get('/', 'AdminTransactionController::index', ['as' => 'transaction.list']);
        $routes->get('load_data', 'AdminTransactionController::load_data', ['as' => 'transaction.load_data']);
        $routes->get('add', 'AdminTransactionController::add', ['as' => 'transaction.add']);
        $routes->get('edit/(:any)?', 'AdminTransactionController::edit/$1', ['as' => 'transaction.edit']);
        $routes->get('view/(:any)', 'AdminTransactionController::view/$1', ['as' => 'transaction.view']);
        $routes->post('update', 'AdminTransactionController::update', ['as' => 'transaction.update']);
        $routes->post('delete/(:any)', 'AdminTransactionController::delete/$1', ['as' => 'transaction.delete']);
        $routes->post('block_unblock/(:any)', 'AdminTransactionController::block_unblock/$1', ['as' => 'transaction.block_unblock']);
    });

    $routes->group('vendor-package', function($routes) {
        $routes->get('/', 'AdminVendorPackageController::index', ['as' => 'vendor-package.list']);
        $routes->get('load_data', 'AdminVendorPackageController::load_data', ['as' => 'vendor-package.load_data']);
        $routes->get('add', 'AdminVendorPackageController::add', ['as' => 'vendor-package.add']);
        $routes->get('edit/(:any)?', 'AdminVendorPackageController::edit/$1', ['as' => 'vendor-package.edit']);
        $routes->get('view/(:any)', 'AdminVendorPackageController::view/$1', ['as' => 'vendor-package.view']);
        $routes->post('update', 'AdminVendorPackageController::update', ['as' => 'vendor-package.update']);
        $routes->post('delete/(:any)', 'AdminVendorPackageController::delete/$1', ['as' => 'vendor-package.delete']);
        $routes->post('block_unblock/(:any)', 'AdminVendorPackageController::block_unblock/$1', ['as' => 'vendor-package.block_unblock']);
    });

    $routes->group('banner', function($routes) {
        $routes->get('/', 'AdminBannerController::index', ['as' => 'banner.list']);
        $routes->get('load_data', 'AdminBannerController::load_data', ['as' => 'banner.load_data']);
        $routes->get('add', 'AdminBannerController::add', ['as' => 'banner.add']);
        $routes->get('edit/(:any)?', 'AdminBannerController::edit/$1', ['as' => 'banner.edit']);
        $routes->get('view/(:any)', 'AdminBannerController::view/$1', ['as' => 'banner.view']);
        $routes->post('update', 'AdminBannerController::update', ['as' => 'banner.update']);
        $routes->post('delete/(:any)', 'AdminBannerController::delete/$1', ['as' => 'banner.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBannerController::block_unblock/$1', ['as' => 'banner.block_unblock']);
    });

    $routes->group('package', function($routes) {
        $routes->get('/', 'AdminPackageController::index', ['as' => 'package.list']);
        $routes->get('load_data', 'AdminPackageController::load_data', ['as' => 'package.load_data']);
        $routes->get('add', 'AdminPackageController::add', ['as' => 'package.add']);
        $routes->get('edit/(:any)?', 'AdminPackageController::edit/$1', ['as' => 'package.edit']);
        $routes->get('view/(:any)', 'AdminPackageController::view/$1', ['as' => 'package.view']);
        $routes->post('update', 'AdminPackageController::update', ['as' => 'package.update']);
        $routes->post('delete/(:any)', 'AdminPackageController::delete/$1', ['as' => 'package.delete']);
        $routes->post('block_unblock/(:any)', 'AdminPackageController::block_unblock/$1', ['as' => 'package.block_unblock']);
    });


    $routes->group('service-category', function($routes) {
        $routes->get('/', 'AdminServiceCategoryController::index', ['as' => 'service-category.list']);
        $routes->get('load_data', 'AdminServiceCategoryController::load_data', ['as' => 'service-category.load_data']);
        $routes->get('add', 'AdminServiceCategoryController::add', ['as' => 'service-category.add']);
        $routes->get('edit/(:any)?', 'AdminServiceCategoryController::edit/$1', ['as' => 'service-category.edit']);
        $routes->get('view/(:any)', 'AdminServiceCategoryController::view/$1', ['as' => 'service-category.view']);
        $routes->post('update', 'AdminServiceCategoryController::update', ['as' => 'service-category.update']);
        $routes->post('delete/(:any)', 'AdminServiceCategoryController::delete/$1', ['as' => 'service-category.delete']);
        $routes->post('block_unblock/(:any)', 'AdminServiceCategoryController::block_unblock/$1', ['as' => 'service-category.block_unblock']);
    });


    $routes->group('service', function($routes) {
        $routes->get('/', 'AdminServiceController::index', ['as' => 'service.list']);
        $routes->get('load_data', 'AdminServiceController::load_data', ['as' => 'service.load_data']);
        $routes->get('add', 'AdminServiceController::add', ['as' => 'service.add']);
        $routes->get('edit/(:any)?', 'AdminServiceController::edit/$1', ['as' => 'service.edit']);
        $routes->get('view/(:any)', 'AdminServiceController::view/$1', ['as' => 'service.view']);
        $routes->post('update', 'AdminServiceController::update', ['as' => 'service.update']);
        $routes->post('delete/(:any)', 'AdminServiceController::delete/$1', ['as' => 'service.delete']);
        $routes->post('block_unblock/(:any)', 'AdminServiceController::block_unblock/$1', ['as' => 'service.block_unblock']);
    });


   
    



    $routes->group('blog-category', function($routes) {
        $routes->get('/', 'AdminBlogCategoryController::index', ['as' => 'blog-category.list']);
        $routes->get('load_data', 'AdminBlogCategoryController::load_data', ['as' => 'blog-category.load_data']);
        $routes->get('add', 'AdminBlogCategoryController::add', ['as' => 'blog-category.add']);
        $routes->get('edit/(:any)?', 'AdminBlogCategoryController::edit/$1', ['as' => 'blog-category.edit']);
        $routes->get('view/(:any)', 'AdminBlogCategoryController::view/$1', ['as' => 'blog-category.view']);
        $routes->post('update', 'AdminBlogCategoryController::update', ['as' => 'blog-category.update']);
        $routes->post('delete/(:any)', 'AdminBlogCategoryController::delete/$1', ['as' => 'blog-category.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBlogCategoryController::block_unblock/$1', ['as' => 'blog-category.block_unblock']);
    });
    $routes->group('blog-sub-category', function($routes) {
        $routes->get('/', 'AdminBlogSubCategoryController::index', ['as' => 'blog-sub-category.list']);
        $routes->get('load_data', 'AdminBlogSubCategoryController::load_data', ['as' => 'blog-sub-category.load_data']);
        $routes->get('add', 'AdminBlogSubCategoryController::add', ['as' => 'blog-sub-category.add']);
        $routes->get('edit/(:any)?', 'AdminBlogSubCategoryController::edit/$1', ['as' => 'blog-sub-category.edit']);
        $routes->get('view/(:any)', 'AdminBlogSubCategoryController::view/$1', ['as' => 'blog-sub-category.view']);
        $routes->post('update', 'AdminBlogSubCategoryController::update', ['as' => 'blog-sub-category.update']);
        $routes->post('delete/(:any)', 'AdminBlogSubCategoryController::delete/$1', ['as' => 'blog-sub-category.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBlogSubCategoryController::block_unblock/$1', ['as' => 'blog-sub-category.block_unblock']);
    });
    $routes->group('blog', function($routes) {
        $routes->get('/', 'AdminBlogController::index', ['as' => 'blog.list']);
        $routes->get('load_data', 'AdminBlogController::load_data', ['as' => 'blog.load_data']);
        $routes->get('add', 'AdminBlogController::add', ['as' => 'blog.add']);
        $routes->get('edit/(:any)?', 'AdminBlogController::edit/$1', ['as' => 'blog.edit']);
        $routes->get('view/(:any)', 'AdminBlogController::view/$1', ['as' => 'blog.view']);
        $routes->post('update', 'AdminBlogController::update', ['as' => 'blog.update']);
        $routes->post('delete/(:any)', 'AdminBlogController::delete/$1', ['as' => 'blog.delete']);
        $routes->post('block_unblock/(:any)', 'AdminBlogController::block_unblock/$1', ['as' => 'blog.block_unblock']);
    });

    $routes->group('testimonial', function($routes) {
        $routes->get('/', 'AdminTestimonialController::index', ['as' => 'testimonial.list']);
        $routes->get('load_data', 'AdminTestimonialController::load_data', ['as' => 'testimonial.load_data']);
        $routes->get('add', 'AdminTestimonialController::add', ['as' => 'testimonial.add']);
        $routes->get('edit/(:any)?', 'AdminTestimonialController::edit/$1', ['as' => 'testimonial.edit']);
        $routes->get('view/(:any)', 'AdminTestimonialController::view/$1', ['as' => 'testimonial.view']);
        $routes->post('update', 'AdminTestimonialController::update', ['as' => 'testimonial.update']);
        $routes->post('delete/(:any)', 'AdminTestimonialController::delete/$1', ['as' => 'testimonial.delete']);
        $routes->post('block_unblock/(:any)', 'AdminTestimonialController::block_unblock/$1', ['as' => 'testimonial.block_unblock']);
    });


    
    



    $routes->group('client-logo', function($routes) {
        $routes->get('/', 'AdminClientLogoController::index', ['as' => 'client-logo.list']);
        $routes->get('load_data', 'AdminClientLogoController::load_data', ['as' => 'client-logo.load_data']);
        $routes->get('add', 'AdminClientLogoController::add', ['as' => 'client-logo.add']);
        $routes->get('edit/(:any)?', 'AdminClientLogoController::edit/$1', ['as' => 'client-logo.edit']);
        $routes->get('view/(:any)', 'AdminClientLogoController::view/$1', ['as' => 'client-logo.view']);
        $routes->post('update', 'AdminClientLogoController::update', ['as' => 'client-logo.update']);
        $routes->post('delete/(:any)', 'AdminClientLogoController::delete/$1', ['as' => 'client-logo.delete']);
        $routes->post('block_unblock/(:any)', 'AdminClientLogoController::block_unblock/$1', ['as' => 'client-logo.block_unblock']);
    });



    /*enquiry statrt*/      

        $routes->group('contact-enquiry', function($routes) {
            $routes->get('/', 'AdminContactEnquiryController::index', ['as' => 'contact-enquiry.list']);
            $routes->get('load_data', 'AdminContactEnquiryController::load_data', ['as' => 'contact-enquiry.load_data']);
            $routes->get('view/(:any)', 'AdminContactEnquiryController::view/$1', ['as' => 'contact-enquiry.view']);
            $routes->post('delete/(:any)', 'AdminContactEnquiryController::delete/$1', ['as' => 'contact-enquiry.delete']);
        });

        $routes->group('lead-enquiry', function($routes) {
            $routes->get('/', 'AdminLeadEnquiryController::index', ['as' => 'lead-enquiry.list']);
            $routes->get('load_data', 'AdminLeadEnquiryController::load_data', ['as' => 'lead-enquiry.load_data']);
            $routes->post('time_line', 'AdminLeadEnquiryController::time_line', ['as' => 'lead-enquiry.time_line']);
            $routes->post('transfer_now', 'AdminLeadEnquiryController::transfer_now', ['as' => 'lead-enquiry.transfer_now']);
            $routes->post('update', 'AdminLeadEnquiryController::update', ['as' => 'lead-enquiry.update']);
            $routes->post('assign', 'AdminLeadEnquiryController::assign', ['as' => 'lead-enquiry.assign']);
            $routes->get('view/(:any)', 'AdminLeadEnquiryController::view/$1', ['as' => 'lead-enquiry.view']);
            $routes->post('delete/(:any)', 'AdminLeadEnquiryController::delete/$1', ['as' => 'lead-enquiry.delete']);
        });

        $routes->group('booking-enquiry', function($routes) {
            $routes->get('/', 'AdminBookingEnquiryController::index', ['as' => 'booking-enquiry.list']);
            $routes->get('load_data', 'AdminBookingEnquiryController::load_data', ['as' => 'booking-enquiry.load_data']);
            $routes->post('transfer_now', 'AdminBookingEnquiryController::transfer_now', ['as' => 'booking-enquiry.transfer_now']);
            $routes->get('view/(:any)', 'AdminBookingEnquiryController::view/$1', ['as' => 'booking-enquiry.view']);
            $routes->post('delete/(:any)', 'AdminBookingEnquiryController::delete/$1', ['as' => 'booking-enquiry.delete']);
        });

        $routes->group('blog-enquiry', function($routes) {
            $routes->get('/', 'AdminBlogEnquiryController::index', ['as' => 'blog-enquiry.list']);
            $routes->get('load_data', 'AdminBlogEnquiryController::load_data', ['as' => 'blog-enquiry.load_data']);
            $routes->get('view/(:any)', 'AdminBlogEnquiryController::view/$1', ['as' => 'blog-enquiry.view']);
            $routes->post('delete/(:any)', 'AdminBlogEnquiryController::delete/$1', ['as' => 'blog-enquiry.delete']);
        });

    /*enquiry end*/

};



$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter'=>'AdminAuth',], $adminEmployeeRoutes);


