	<!--begin::Aside-->
	<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto " id="kt_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand">
						<!--begin::Logo-->
						<a href="{{route('Admin.home')}}" class="brand-logo">
							<img alt="Logo" class="img-fluid ml-5"  style="width: 75px; height :60px" src="{{asset('uploads/logo.png')}}" />
						</a>
						<!--end::Logo-->
						<!--begin::Toggle-->
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</button>
						<!--end::Toolbar-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">



                                <li class="menu-item  menu-item-active" aria-haspopup="true">
                                    <a href="{{route('Admin.home')}}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot"  aria-haspopup="true">
                                            <span></span>
                                        </i>
                                        <span class="menu-text ">{{__('dashboard.dashboard')}}</span>
                                    </a>
                                </li>



                                    {{-- start ecommerce --}}
                                    <li class="menu-item menu-item-submenu
                                        {{request()->is(app()->getLocale().'/product*') ? 'menu-item-open':''}}
                                        {{request()->is(app()->getLocale().'/order*') ? 'menu-item-open':''}}"
                                        {{request()->is(app()->getLocale().'/Promocode*') ? 'menu-item-open':''}}
                                        aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                                            <span class="svg-icon menu-icon">
                                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>

                                            <span class="menu-text">{{__('dashboard.ecommerce')}}</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">
                                                @can('show_orders')
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{route('Admin.order.index',1)}}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">{{__('dashboard.orders')}}</span>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('show_products')
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{route('Admin.product.index')}}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('dashboard.products')}}</span>
                                                    </a>
                                                </li>
                                                @endcan


                                            </ul>
                                        </div>
                                    </li>
                                   {{-- end ecommerce --}}

                                    @can('show_promocode')
                                        <li class="menu-item  " aria-haspopup="true">
                                            <a href="{{route('Admin.Promocode.index')}}" class="menu-link">
                                                <span class="svg-icon menu-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M13,5 L15,5 L15,20 L13,20 L13,5 Z M5,5 L5,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,6 C2,5.44771525 2.44771525,5 3,5 L5,5 Z M16,5 L18,5 L18,20 L16,20 L16,5 Z M20,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,19 C22,19.5522847 21.5522847,20 21,20 L20,20 L20,5 Z" fill="#000000"/>
                                                        <polygon fill="#000000" opacity="0.3" points="9 5 9 20 7 20 7 5"/>
                                                    </g>
                                                </svg>
                                                </span>
                                                <span class="menu-text ">{{__('dashboard.promo_code')}}</span>
                                            </a>
                                        </li>
                                    @endcan


                                   @can('show_campaigns')
                                          {{-- start campaigns --}}
                                          <li class="menu-item menu-item-submenu {{request()->is(app()->getLocale().'/campaigns*') ? 'menu-item-open':''}}" aria-haspopup="true" data-menu-toggle="hover">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="svg-icon menu-icon">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)" />
                                                            <path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-text">{{__('dashboard.campaigns')}}</span>
                                                <i class="menu-arrow"></i>
                                            </a>
                                            <div class="menu-submenu">
                                                <i class="menu-arrow"></i>
                                                <ul class="menu-subnav">

                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{route('Admin.campaigns',1)}}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">{{__('dashboard.campaigns')}}</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{route('Admin.campaigns',6)}}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">{{__('dashboard.distinct_campaigns')}}</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{route('Admin.campaigns',7)}}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">{{__('dashboard.delete_requests')}}</span>
                                                        </a>
                                                    </li>


                                                    <li class="menu-item" aria-haspopup="true">
                                                        <a href="{{route('Admin.campaigns',8)}}" class="menu-link">
                                                            <i class="menu-bullet menu-bullet-dot">
                                                                <span></span>
                                                            </i>
                                                            <span class="menu-text">{{__('dashboard.cancel_requests')}}</span>
                                                        </a>
                                                    </li>




                                                </ul>
                                            </div>
                                        </li>
                                       {{-- end campaigns --}}
                                       @endcan




                                       @can('show_companies')

                                       {{-- start companies --}}
                                                <li class="menu-item menu-item-submenu {{request()->is(app()->getLocale().'/companies*') ? 'menu-item-open':''}}  " aria-haspopup="true" data-menu-toggle="hover">
                                                    <a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                                                    <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                                    <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="menu-text">{{__('dashboard.companies')}}</span>
                                                        <i class="menu-arrow"></i>
                                                    </a>
                                                    <div class="menu-submenu">
                                                        <i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">

                                                            <li class="menu-item" aria-haspopup="true">
                                                                <a href="{{route('Admin.companies',1)}}" class="menu-link">
                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="menu-text">{{__('dashboard.companies')}}</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item" aria-haspopup="true">
                                                                <a href="{{route('Admin.companies.pending',0)}}" class="menu-link">
                                                                    <i class="menu-bullet menu-bullet-dot">
                                                                        <span></span>
                                                                    </i>
                                                                    <span class="menu-text">{{__('dashboard.pending_companies')}}</span>
                                                                </a>
                                                            </li>




                                                        </ul>
                                                    </div>
                                                </li>
                                        {{-- end companies --}}

                                        @endcan








                                @can('show_barcode')
                                <li class="menu-item  " aria-haspopup="true">
                                    <a href="{{route('Admin.barcodes','pending')}}" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M13,5 L15,5 L15,20 L13,20 L13,5 Z M5,5 L5,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,6 C2,5.44771525 2.44771525,5 3,5 L5,5 Z M16,5 L18,5 L18,20 L16,20 L16,5 Z M20,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,19 C22,19.5522847 21.5522847,20 21,20 L20,20 L20,5 Z" fill="#000000"/>
                                                <polygon fill="#000000" opacity="0.3" points="9 5 9 20 7 20 7 5"/>
                                            </g>
                                        </svg>
                                        </span>
                                      <span class="menu-text ">{{__('dashboard.barcode')}}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('show_omravisa')

                                <li class="menu-item  " aria-haspopup="true">
                                    <a href="{{route('Admin.omravisas','pending')}}" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M21,5.5 L21,17.5 C21,18.3284271 20.3284271,19 19.5,19 L4.5,19 C3.67157288,19 3,18.3284271 3,17.5 L3,14.5 C3,13.6715729 3.67157288,13 4.5,13 L9,13 L9,9.5 C9,8.67157288 9.67157288,8 10.5,8 L15,8 L15,5.5 C15,4.67157288 15.6715729,4 16.5,4 L19.5,4 C20.3284271,4 21,4.67157288 21,5.5 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text ">{{__('dashboard.omra_visa')}}</span>
                                    </a>
                                </li>

                                @endcan

                                @can('show_users')

                                    <li class="menu-item  " aria-haspopup="true">
                                        <a href="{{route('Admin.users')}}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <span class="menu-text ">{{__('dashboard.users')}}</span>
                                        </a>
                                    </li>

                                @endcan

                                {{-- <li class="menu-item  " aria-haspopup="true">
                                    <a href="{{route('Admin.users')}}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot"  aria-haspopup="true">
                                            <span></span>
                                        </i>
                                        <span class="menu-text ">adds</span>
                                    </a>
                                </li> --}}




                                @can('show_employees')
                                <li class="menu-item  " aria-haspopup="true">
                                    <a href="{{route('Admin.employee.index')}}" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text ">{{__('dashboard.employees')}}</span>
                                    </a>
                                </li>
                                @endcan



                                @can('show_countries')
                                    <li class="menu-item  " aria-haspopup="true">
                                        <a href="{{route('Admin.countries.index')}}" class="menu-link">
                                            <i class="fa-solid fa-earth-americas"></i>
                                            <span class="menu-text ml-5">{{__('dashboard.countries')}}</span>
                                        </a>
                                    </li>
                                @endcan





                                @can('show_roles')
                                <li class="menu-item  " aria-haspopup="true">
                                    <a href="{{route('Admin.permissions.index')}}" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
                                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text ">{{__('dashboard.permissions')}}</span>
                                    </a>
                                </li>
                                @endcan


                                @can('show_banks')
                                <li class="menu-item  " aria-haspopup="true">
                                    <a href="{{route('Admin.bank.account')}}" class="menu-link">
                                        <i class="fa-sharp fa-solid fa-building-columns"></i>
                                        <span class="menu-text ml-3">{{__('dashboard.bank_acounts')}}</span>
                                    </a>
                                </li>
                                @endcan

                                @can('show_transfares')
                                <li class="menu-item  " aria-haspopup="true">
                                    <a href="{{route('Admin.bank.transfare','order')}}" class="menu-link">
                                        <i class="fa-solid fa-money-bill-transfer"></i>
                                        <span class="menu-text ml-3">{{__('dashboard.transfares')}}</span>
                                    </a>
                                </li>
                                @endcan







                                {{-- start setting --}}
                                @can('show_setting')
                                <li class="menu-item menu-item-submenu {{request()->is(app()->getLocale().'/setting*') ? 'menu-item-open':''}}  " aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                            <i class="fa-sharp fa-solid fa-gear"></i>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">{{__('dashboard.setting')}}</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            @can('show_general_setting')
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="{{route('Admin.setting.general')}}" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">{{__('dashboard.general_setting')}}</span>
                                                </a>
                                            </li>
                                            @endcan
                                            @can('show_campain_setting')
                                            <li class="menu-item" aria-haspopup="true">
                                                <a href="{{route('Admin.setting.campaign')}}" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">{{__('dashboard.campaign_setting')}}</span>
                                                </a>
                                            </li>
                                            @endcan



                                        </ul>
                                    </div>
                                </li>


                                @endcan

                            {{-- end setting --}}





							</ul>
							<!--end::Menu Nav-->
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->
