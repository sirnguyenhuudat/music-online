<!-- Modal -->
<div class="ms_register_popup">
    <div id="myModal" class="modal  centered-modal" role="dialog">
        <div class="modal-dialog register_dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <div class="ms_register_img">
                        <img src="{{ asset(config('bower.home_images') . '/register_img.png') }}" alt="" class="img-fluid"/>
                    </div>
                    <div class="ms_register_form">
                        <h2>{{ trans('home_index.register_signup') }}</h2>
                        <div class="form-group">
                            <input type="text" placeholder="{{ trans('home_index.enter_your_name') }}" class="form-control">
                            <span class="form_icon">
                                <i class="fa_icon form-user" aria-hidden="true"></i>
							</span>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="{{ trans('home_index.enter_your_email') }}" class="form-control">
                            <span class="form_icon">
                                <i class="fa_icon form-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="{{ trans('home_index.enter_password') }}" class="form-control">
                            <span class="form_icon">
                                <i class="fa_icon form-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="{{ trans('home_index.confirm_password') }}" class="form-control">
                            <span class="form_icon">
                                <i class=" fa_icon form-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <a href="#" class="ms_btn">{{ trans('home_index.register_now') }}</a>
                        <p>
                            {{ trans('home_index.already_account') }}<a href="#myModal1" data-toggle="modal" class="ms_modal hideCurrentModel">{{ trans('home_index.login_here') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Popup Start -->
    <div id="myModal1" class="modal  centered-modal" role="dialog">
        <div class="modal-dialog login_dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <div class="ms_register_img">
                        <img src="{{ asset(config('bower.home_images') . '/register_img.png') }}" alt="" class="img-fluid"/>
                    </div>
                    <div class="ms_register_form">
                        <h2>{{ trans('home_index.login_signin') }}</h2>
                        <div class="form-group">
                            <input type="email" placeholder="{{ trans('home_index.enter_your_email') }}" class="form-control">
                            <span class="form_icon">
                                <i class="fa_icon form-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="{{ trans('home_index.enter_password') }}" class="form-control">
                            <span class="form_icon">
                                <i class="fa_icon form-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="remember_checkbox">
                            <label>{{ trans('home_index.keep_me_signed_in') }}
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <a href="profile.html" class="ms_btn" target="_blank">{{ trans('home_index.login_now') }}</a>
                        <div class="popup_forgot">
                            <a href="#">{{ trans('home_index.forgot_password') }}</a>
                        </div>
                        <p>
                            {{ trans('home_index.dont_have_account') }}<a href="#myModal" data-toggle="modal" class="ms_modal1 hideCurrentModel">{{ trans('home_index.register_here') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Language Selection Modal -->
<div class="ms_lang_popup">
    <div id="lang_modal" class="modal  centered-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <h1>{{ trans('home_index.language_selection') }}</h1>
                    <p>{{ trans('home_index.content_select_lang') }}</p>
                    <ul class="lang_list">
                        <li>
                            <label class="lang_check_label">
                                {{ trans('home_index.english') }}
                                <input type="checkbox" name="check">
                                <span class="label-text"></span>
                            </label>
                        </li>
                        <li>
                            <label class="lang_check_label">
                                {{ trans('home_index.vietnamese') }}
                                <input type="checkbox" name="check">
                                <span class="label-text"></span>
                            </label>
                        </li>
                    </ul>
                    <div class="ms_lang_btn">
                        <a href="#" class="ms_btn">{{ trans('home_index.apply') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Queue Clear Model -->
<div class="ms_clear_modal">
    <div id="clear_modal" class="modal  centered-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <h1>{{ trans('home_index.clear_content') }}</h1>
                    <div class="clr_modal_btn">
                        <a href="#">{{ trans('home_index.clear_all') }}</a>
                        <a href="#">{{ trans('home_index.cancel') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
