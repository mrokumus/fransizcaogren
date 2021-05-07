<x-frontend-layout>
    @section('css')
        <link rel="stylesheet" href="{{ url('app-assets/css/pages/page-profile.min.css') }}">
    @endsection
    @section('js')
    @endsection
    @section('title',$user->name)
    @section('content')
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div id="user-profile">
                    <!-- profile header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-header mb-2">
                                <!-- profile cover photo -->
                                <img class="card-img-top"
                                     src="{{ url('storage/users' .'/' . $user->preferences->wall_photo) }}"
                                     alt=""/>
                                <!--/ profile cover photo -->

                                <div class="position-relative mb-3">
                                    <!-- profile picture -->
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="{{ url('storage/avatars' .'/' . $user->profile_photo_path) }}"
                                                 class="rounded img-fluid"
                                                 alt="Card image"/>
                                        </div>
                                        <!-- profile title -->
                                        <div class="profile-title ml-3">
                                            <h2 class="text-white">{{ $user->name }}</h2>
                                            <p class="text-white">{{'@'. $user->preferences->username }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile header -->

                    <!-- profile info section -->
                    <section id="profile-info">
                        <div class="row">
                            <!-- left profile info section -->
                            <div class="col-lg-3 col-12 order-2 order-lg-1">
                                <!-- about -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-75">{{ __('About') }}</h5>
                                        <p class="card-text">
                                            {{$user->preferences->bio}}
                                        </p>
                                        <div class="mt-2">
                                            <h5 class="mb-75">{{ __('Joined') }}</h5>
                                            <p class="card-text">{{ \Carbon\Carbon::parse($user->created_at )->diffForHumans() }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">{{ __('Lives') }}</h5>
                                            <p class="card-text">{{$user->preferences->city}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ about -->
                            </div>
                            <!--/ left profile info section -->
                        {{-- Todo: User Activity Section--}}

                        <!-- center profile info section -->
                            <div class="col-lg-6 col-12 order-1 order-lg-2">
                                <!-- post 1 -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <!-- avatar -->
                                            <div class="avatar mr-1">
                                                <img
                                                        src="../../../app-assets/images/portrait/small/avatar-s-18.jpg"
                                                        alt="avatar img"
                                                        height="50"
                                                        width="50"
                                                />
                                            </div>
                                            <!--/ avatar -->
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Leeanna Alvord</h6>
                                                <small class="text-muted">12 Dec 2018 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a
                                            photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for
                                            the perfect fit.
                                        </p>
                                        <!-- post img -->
                                        <img
                                                class="img-fluid rounded mb-75"
                                                src="../../../app-assets/images/profile/post-media/2.jpg"
                                                alt="avatar img"
                                        />
                                        <!--/ post img -->

                                        <!-- like share -->
                                        <div class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                                <a href="javascript:void(0)"
                                                   class="d-flex align-items-center text-muted text-nowrap">
                                                    <i data-feather="heart"
                                                       class="profile-likes font-medium-3 mr-50"></i>
                                                    <span>1.25k</span>
                                                </a>

                                                <!-- avatar group with tooltip -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-group ml-1">
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Trina Lynes"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-1.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Lilian Nenez"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-2.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Alberto Glotzbach"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="George Nordic"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Vinnie Mostowy"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-4.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)"
                                                       class="text-muted text-nowrap ml-50">+140 more</a>
                                                </div>
                                                <!-- avatar group with tooltip -->
                                            </div>

                                            <!-- share and like count and icons -->
                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                                <a href="javascript:void(0)" class="text-nowrap">
                                                    <i data-feather="message-square"
                                                       class="text-body font-medium-3 mr-50"></i>
                                                    <span class="text-muted mr-1">1.25k</span>
                                                </a>

                                                <a href="javascript:void(0)" class="text-nowrap">
                                                    <i data-feather="share-2"
                                                       class="text-body font-medium-3 mx-50"></i>
                                                    <span class="text-muted">1.25k</span>
                                                </a>
                                            </div>
                                            <!-- share and like count and icons -->
                                        </div>
                                        <!-- like share -->

                                        <!-- comments -->
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 mr-75">
                                                <img
                                                        src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"
                                                        alt="Avatar"
                                                        height="34"
                                                        width="34"
                                                />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="javascript:void(0)">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables
                                                    users to search quickly.</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 mr-75">
                                                <img
                                                        src="../../../app-assets/images/portrait/small/avatar-s-8.jpg"
                                                        alt="Avatar"
                                                        height="34"
                                                        width="34"
                                                />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Jackey Potter</h6>
                                                    <a href="javascript:void(0)">
                                                        <i data-feather="heart"
                                                           class="profile-likes font-medium-3"></i>
                                                        <span class="align-middle text-muted">61</span>
                                                    </a>
                                                </div>
                                                <small>
                                                    Unlimited color🖌 options allows you to set your application
                                                    color as per your branding 🤪.
                                                </small>
                                            </div>
                                        </div>
                                        <!--/ comments -->

                                        <!-- comment box -->
                                        <fieldset class="form-label-group mb-75">
                                                <textarea class="form-control" id="label-textarea" rows="3"
                                                          placeholder="Add Comment"></textarea>
                                            <label for="label-textarea">Add Comment</label>
                                        </fieldset>
                                        <!--/ comment box -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 1 -->

                                <!-- post 2 -->
                                <div class="card">
                                    <div class="card-body">
                                        <!-- avatar image and title -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img
                                                        src="../../../app-assets/images/portrait/small/avatar-s-22.jpg"
                                                        alt="avatar img"
                                                        height="50"
                                                        width="50"
                                                />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Rosa Walters</h6>
                                                <small class="text-muted">11 Dec 2019 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <!--/ avatar image and title -->
                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a
                                            photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for
                                            the perfect fit.
                                        </p>
                                        <!-- post img -->
                                        <img
                                                class="img-fluid rounded mb-75"
                                                src="../../../app-assets/images/profile/post-media/25.jpg"
                                                alt="avatar img"
                                        />
                                        <!--/ post img -->

                                        <!-- like share -->
                                        <div class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                                <a href="javascript:void(0)"
                                                   class="d-flex align-items-center text-muted text-nowrap">
                                                    <i data-feather="heart"
                                                       class="profile-likes font-medium-3 mr-50"></i>
                                                    <span>1.25k</span>
                                                </a>

                                                <!-- avatar group with tooltip -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-group ml-1">
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Trina Lynes"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-1.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Lilian Nenez"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-2.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Alberto Glotzbach"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="George Nordic"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Vinnie Mostowy"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-4.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)"
                                                       class="text-muted text-nowrap ml-50">+271 more</a>
                                                </div>
                                                <!-- avatar group with tooltip -->
                                            </div>

                                            <!-- share and like count and icons -->
                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                                <a href="javascript:void(0)" class="text-nowrap">
                                                    <i data-feather="message-square"
                                                       class="text-body font-medium-3 mr-50"></i>
                                                    <span class="text-muted mr-1">1.25k</span>
                                                </a>

                                                <a href="javascript:void(0)" class="text-nowrap">
                                                    <i data-feather="share-2"
                                                       class="text-body font-medium-3 mx-50"></i>
                                                    <span class="text-muted">1.25k</span>
                                                </a>
                                            </div>
                                            <!-- share and like count and icons -->
                                        </div>
                                        <!-- like share -->

                                        <!-- comments -->
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 mr-50">
                                                <img
                                                        src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"
                                                        alt="Avatar"
                                                        height="34"
                                                        width="34"
                                                />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="javascript:void(0)">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables
                                                    users to search quickly. </small>
                                            </div>
                                        </div>
                                        <!--/ comments -->

                                        <!-- comment text area -->
                                        <fieldset class="form-label-group mb-75">
                                                <textarea class="form-control" id="label-textarea2" rows="3"
                                                          placeholder="Add Comment"></textarea>
                                            <label for="label-textarea2">Add Comment</label>
                                        </fieldset>
                                        <!--/ comment text area -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 2 -->

                                <!-- post 3 -->
                                <div class="card">
                                    <div class="card-body">
                                        <!-- avatar image title -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img
                                                        src="../../../app-assets/images/portrait/small/avatar-s-15.jpg"
                                                        alt="avatar img"
                                                        height="50"
                                                        width="50"
                                                />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Charles Watson</h6>
                                                <small class="text-muted">12 Dec 2019 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <!--/ avatar image title -->

                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a
                                            photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for
                                            the perfect fit.
                                        </p>

                                        <!-- video -->
                                        <iframe
                                                src="https://www.youtube.com/embed/6stlCkUDG_s"
                                                class="w-100 rounded border-0 height-250 mb-50"
                                        ></iframe>
                                        <!--/ video -->

                                        <!-- like share -->
                                        <div class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                                <a href="javascript:void(0)"
                                                   class="d-flex align-items-center text-muted text-nowrap">
                                                    <i data-feather="heart"
                                                       class="profile-likes font-medium-3 mr-50"></i>
                                                    <span>1.25k</span>
                                                </a>

                                                <!-- avatar group with tooltip -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-group ml-1">
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Vinnie Mostowy"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Elicia Rieske"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Julee Rossignol"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-10.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Darcey Nooner"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-8.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                        <div
                                                                data-toggle="tooltip"
                                                                data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Elicia Rieske"
                                                                class="avatar pull-up"
                                                        >
                                                            <img
                                                                    src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                                    alt="Avatar"
                                                                    height="26"
                                                                    width="26"
                                                            />
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)"
                                                       class="text-muted text-nowrap ml-50">+264 more</a>
                                                </div>
                                                <!-- avatar group with tooltip -->
                                            </div>

                                            <!-- share and like count and icons -->
                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                                <a href="javascript:void(0)" class="text-nowrap">
                                                    <i data-feather="message-square"
                                                       class="text-body font-medium-3 mr-50"></i>
                                                    <span class="text-muted mr-1">1.25k</span>
                                                </a>

                                                <a href="javascript:void(0)" class="text-nowrap">
                                                    <i data-feather="share-2"
                                                       class="text-body font-medium-3 mx-50"></i>
                                                    <span class="text-muted">1.25k</span>
                                                </a>
                                            </div>
                                            <!-- share and like count and icons -->
                                        </div>
                                        <!-- like share -->

                                        <!-- comment -->
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 mr-50">
                                                <img
                                                        src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"
                                                        alt="Avatar"
                                                        height="34"
                                                        width="34"
                                                />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-content-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="javascript:void(0)">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables
                                                    users to search quickly.</small>
                                            </div>
                                        </div>
                                        <!-- comment -->

                                        <!-- comment text area -->
                                        <fieldset class="form-label-group mb-75">
                                                <textarea class="form-control" id="label-textarea3" rows="3"
                                                          placeholder="Add Comment"></textarea>
                                            <label for="label-textarea3">Add Comment</label>
                                        </fieldset>
                                        <!-- comment text area -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 3 -->
                            </div>
                            <!--/ center profile info section -->
                        </div>

                        <!-- reload button -->
                        {{-- Todo: Load More--}}
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-sm btn-primary block-element border-0 mb-1">
                                    Load More
                                </button>
                            </div>
                        </div>
                        <!--/ reload button -->
                    </section>
                    <!--/ profile info section -->
                </div>

            </div>
        </div>
    @endsection
</x-frontend-layout>
