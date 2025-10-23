
<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Menu</span></li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('admin.dashboard'))?>">
        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboard">Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#manageuser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="manageuser">
        <i class="ri-contacts-line"></i> <span data-key="t-dashboards">Manage User</span>
    </a>
    <div class="collapse menu-dropdown" id="manageuser">
        <ul class="nav nav-sm flex-column">

            <li class="nav-item">
                <a href="<?=base_url(route_to('admin-user.list')).'?type=2'?>" class="nav-link" data-key="t-analytics"> Users </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('admin-featured-profile.list'))?>" class="nav-link" data-key="t-analytics"> Featured Profile </a>
            </li>

        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#manageLeads" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="manageLeads">
        <i class="ri-contacts-line"></i> <span data-key="t-dashboards">Manage Lead</span>
    </a>
    <div class="collapse menu-dropdown" id="manageLeads">
        <ul class="nav nav-sm flex-column">

            <li class="nav-item"><a href="<?=base_url(route_to('contact-enquiry.list'))?>" class="nav-link" data-key="t-analytics"> Contact Leads </a></li>

        </ul>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('success-story.list'))?>">
        <i class="ri-wallet-line"></i> <span data-key="t-transaction">Success Stories</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('transaction.list'))?>">
        <i class="ri-wallet-line"></i> <span data-key="t-transaction">Payment History</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link menu-link" href="#services" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="services">
        <i class="ri-message-2-line"></i> <span data-key="t-dashboards">Services</span>
    </a>
    <div class="collapse menu-dropdown" id="services">
        <ul class="nav nav-sm flex-column">
            <!-- <li class="nav-item">
                <a href="<?=base_url(route_to('service-category.list'))?>" class="nav-link" data-key="t-analytics">Category </a>
            </li> -->
            <li class="nav-item">
                <a href="<?=base_url(route_to('service.list'))?>" class="nav-link" data-key="t-analytics"> Service </a>
            </li>
        </ul>
    </div>
</li>



<li class="nav-item">
    <a class="nav-link menu-link" href="#membership" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="membership">
        <i class="ri-inbox-line"></i> <span data-key="t-dashboards">Membership</span>
    </a>
    <div class="collapse menu-dropdown" id="membership">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('package.list'))?>" class="nav-link" data-key="t-analytics"> Packages </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('user-package.list'))?>" class="nav-link" data-key="t-analytics"> History </a>
            </li>
        </ul>
    </div>
</li>



<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Manage Country/State</span></li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('country.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Country</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('state.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">State</span>
    </a>
</li>

<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Manage Education</span></li>

<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('education-category.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Category</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('education.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Education</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('occupation.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Occupation</span>
    </a>
</li>



<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Religion/Caste</span></li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('religion.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Religion</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('caste.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Caste</span>
    </a>
</li>






<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Website</span></li>

<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('banner.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Banner</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('client-logo.list'))?>">
        <i class="ri-markup-line"></i> <span data-key="t-transaction">Client Logo</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('testimonial.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Testimonial</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('faq.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Faq's</span>
    </a>
</li>



<li class="nav-item">
    <a class="nav-link menu-link" href="#blog" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="blog">
        <i class="ri-newspaper-line"></i> <span data-key="t-dashboards">Manage Blog</span>
    </a>
    <div class="collapse menu-dropdown" id="blog">
        <ul class="nav nav-sm flex-column">
            <!-- <li class="nav-item">
                <a href="<?=base_url(route_to('blog-category.list'))?>" class="nav-link" data-key="t-analytics"> Category </a>
            </li> -->
            <li class="nav-item">
                <a href="<?=base_url(route_to('blog.list'))?>" class="nav-link" data-key="t-analytics"> Blog/News </a>
            </li>
        </ul>
    </div>
</li>









<li class="nav-item">
    <a class="nav-link menu-link" href="#setting" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="setting">
        <i class="ri-settings-3-line"></i> <span data-key="t-dashboards">Settings</span>
    </a>
    <div class="collapse menu-dropdown" id="setting">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('meta-tag.list'))?>" class="nav-link"> Meta Tags </a>
            </li>
            <!-- <li class="nav-item">
                <a href="<?=base_url(route_to('script.index'))?>" class="nav-link"> Script </a>
            </li> -->
            <li class="nav-item">
                <a href="<?=base_url(route_to('setting.about'))?>" class="nav-link"> About Us </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('setting.policy'))?>" class="nav-link"> Policies </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('setting.main'))?>" class="nav-link"> Contact Detail </a>
            </li>
        </ul>
    </div>
</li>
