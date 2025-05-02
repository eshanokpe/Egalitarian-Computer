<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\AdminController;

 
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/manage/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/manage/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
       
    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
        
   
        Route::post('/settings/update-password', [AdminLoginController::class, 'updatePassword'])->name('admin.password.update');
        Route::get('/settings/show-password', [AdminLoginController::class, 'showChangePasswordForm'])->name('admin.show.password');
        // Menu
        Route::get('/menu/create', [MenuController::class, 'creatMenu'])->name('admin.menu.create');
        Route::get('/manage/menu/index', [MenuController::class, 'indexMenu'])->name('admin.menu.index');
        Route::post('/menu', [MenuController::class, 'storeMenu'])->name('admin.menu.store');
        Route::get('/menu/{id}/edit', [MenuController::class, 'editMenu'])->name('admin.menu.edit');
        Route::put('/menu/{id}', [MenuController::class, 'updateMenu'])->name('admin.menu.update');
        Route::get('/menu/{id}', [MenuController::class, 'destroyMenu'])->name('admin.menu.destroy');
        //Slider 
        Route::get('/manage/sliderIndex', [SliderController::class, 'index'])->name('admin.slider.index');
        Route::get('/manage/sliderCreate', [SliderController::class, 'create'])->name('admin.slider.create');
        Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::put('/slider/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
        Route::get('/slider/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
        //Why choose us 
        Route::get('/settings/content', [SettingsController::class, 'WhyChooseUs'])->name('admin.settings.content');
        Route::post('/settings/store/why-choose-us', [SettingsController::class, 'storeWhyChooseUs'])->name('admin.settings.store_why_choose_us');
        Route::put('/settings/update/why-choose-us/{id}', [SettingsController::class, 'updateWhyChooseUs'])->name('admin.settings.update_why_choose_us');
         
        //User
        Route::name('admin.')->group(function () {
            Route::resource('users', UserController::class);
        }); 
       
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('courses', CoursesController::class);
        });

        Route::name('admin.')->group(function () {
            Route::resource('recognition', RecognitionController::class);
        });
        Route::name('admin.')->group(function () {
            Route::resource('advisory', AdvisoryController::class);
        });
        
       
        //About us
        Route::get('/settings/about-us', [SettingsController::class, 'getAboutUs'])->name('admin.settings.aboutUs');
       
        // Governance-board
        Route::get('/about-us', [AboutUsController::class, 'index'])->name('admin.about-us');
        Route::post('/about-us/store', [AboutUsController::class, 'store'])->name('admin.aboutus.store');
        Route::put('/update/about-us/{id}', [AboutUsController::class, 'update'])->name('admin.aboutus.update');
       
       
        
      
        //Testimonials
        Route::get('testimonials/index', [TestimonialsController::class, 'index'])->name('admin.testimonials.index');
        Route::get('testimonials/create', [TestimonialsController::class, 'create'])->name('admin.testimonials.create');
        Route::post('testimonials/post', [TestimonialsController::class, 'store'])->name('admin.testimonials.store');
        Route::get('testimonials/{id}/edit', [TestimonialsController::class, 'edit'])->name('admin.testimonials.edit');
        Route::put('testimonials/{id}/post', [TestimonialsController::class, 'update'])->name('admin.testimonials.update');
        Route::get('testimonials/{id}', [TestimonialsController::class, 'destroy'])->name('admin.testimonials.destroy');


        //Contact
        Route::get('/contact-form/index', [ContactFormController::class, 'index'])->name('admin.contactForm.index');
        Route::get('/contact-form/show/{id}', [ContactFormController::class, 'show'])->name('admin.contactForm.show');
        Route::get('/contact-form/destroy/{id}', [ContactFormController::class, 'destroy'])->name('admin.contactForm.destroy');
       
    
        
    });  
});
