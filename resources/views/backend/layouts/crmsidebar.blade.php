<aside class="sidebar">
    <div class="aside-menu">
        <h5>Leads</h5>
        <ul>
            <li class="{{ request()->is('user/crm-dashboard') ? 'active' : '' }}">
                <a href="{{url('/user/crm-dashboard')}}"> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
            </li>
            <li class="{{ request()->is('user/enquiries') ? 'active' : '' }}">
                <a href="{{url('/user/enquiries')}}"> <i>
<svg xmlns="http://www.w3.org/2000/svg" width="12px" viewBox="0 0 16.09 18.37"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M2.59,0l.33.09a2.27,2.27,0,0,1-.28,4.42A2.29,2.29,0,0,1,.05,2.7,2.29,2.29,0,0,1,1.83,0L2,0Zm.87,2.27A1.18,1.18,0,0,0,2.29,1.08a1.19,1.19,0,1,0,0,2.37A1.17,1.17,0,0,0,3.46,2.27Z"/><path class="cls-1" d="M14.15,0l.35.11a2.28,2.28,0,0,1,1.58,2.34,2.28,2.28,0,0,1-4.51.21A2.28,2.28,0,0,1,13.4,0l.1,0ZM12.63,2.26a1.19,1.19,0,1,0,2.37,0,1.2,1.2,0,0,0-1.18-1.19A1.18,1.18,0,0,0,12.63,2.26Z"/><path class="cls-1" d="M8.05,6.92h6.26a1.69,1.69,0,1,1,.12,3.37.87.87,0,0,0-.68.29c-1.29,1.31-2.59,2.6-3.89,3.9a.38.38,0,0,0-.13.3c0,.61,0,1.22,0,1.83a.6.6,0,0,1-.37.59L7.18,18.3a.54.54,0,0,1-.82-.52c0-1,0-2,0-3a.41.41,0,0,0-.13-.32l-4-4a.57.57,0,0,0-.47-.19,1.63,1.63,0,0,1-1.5-.78A1.59,1.59,0,0,1,.21,7.83a1.56,1.56,0,0,1,1.42-.9c1.33,0,2.67,0,4,0ZM3.64,10.31l0,0a1,1,0,0,1,.16.12L7.2,13.91a.78.78,0,0,1,.24.58c0,.75,0,1.5,0,2.26V17c.38-.18.72-.36,1.07-.52a.24.24,0,0,0,.15-.25c0-.55,0-1.11,0-1.66a.75.75,0,0,1,.25-.62l3.44-3.44.14-.15ZM8.05,8H1.7a.61.61,0,0,0-.57.81.62.62,0,0,0,.64.41H14.43A.61.61,0,0,0,15,8.79.61.61,0,0,0,14.35,8Z"/><path class="cls-1" d="M5.78,3.41A2.27,2.27,0,1,1,8,5.7,2.27,2.27,0,0,1,5.78,3.41ZM8,4.6A1.17,1.17,0,0,0,9.23,3.43a1.19,1.19,0,0,0-2.37,0A1.17,1.17,0,0,0,8,4.6Z"/></g></g></svg></i> Leads</a>
            </li>
            <li class="{{ request()->is('user/follow-up-leads') ? 'active' : '' }}">
                <a href="{{url('/user/follow-up-leads?follow_up_leads=yes')}}"> <i class="fa fa-handshake-o"
                                                                                   style="font-size: 13px;"
                                                                                   aria-hidden="true"></i> Followup
                </a>
            </li>
            <!-- <li class="{{ request()->is('user/yet-to-contact') ? 'active' : '' }}">
                <a href="{{url('/user/yet-to-contact?yet_to_contacts=yes')}}"> <i class="fa fa-phone-square"
                                                                                  aria-hidden="true"></i> Yet to Contact
                </a>
            </li> -->
            <li class="{{ request()->is('user/daily-activity') ? 'active' : '' }}">
                <a href="{{url('/user/daily-activity')}}"> <i class="fa fa-calendar" aria-hidden="true"></i>
                    Activity</a>
            </li>
            <li class="{{ request()->is('user/facebook-leads') ? 'active' : '' }}">
                <a href="{{url('/user/facebook-leads')}}">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    Facebook Leads
                </a>
            </li>
            <li class="{{ request()->is('user/crm-calendar') ? 'active' : '' }}">
                <a href="{{ url('user/crm-calendar') }}"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    Calendar</a>
            </li>
            <li class="{{ request()->is('user/group') ? 'active' : '' }}">
                <a href="{{url('/user/group')}}"><i class="fa  fa-group" aria-hidden="true"></i> Group</a>
            </li>
            <!-- <li class="{{ request()->is('user/automation') ? 'active' : '' }}">
                <a href="{{url('/user/automation')}}"><i class="fa  fa-tasks" aria-hidden="true"></i> Automation</a>
            </li> -->
            <li>
                <a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> Reports</a>
                <ul>
                @if(Auth::user()->int_role_id==\App\User::USERS || Auth::user()->is_co_admin==1)
                    <!-- <li class="{{ request()->is('user/agent-summary-report') ? 'active' : '' }}">
                            <a href="{{ url('user/agent-summary-report') }}"><i style="color:#6167e6" class="fa fa-list"
                                                                                aria-hidden="true"></i>
                                Agent Summary Report</a>
                        </li> -->
                        <li class="{{ request()->is('user/status-summary-report') ? 'active' : '' }}">
                            <a href="{{ url('user/status-summary-report') }}"><i style="color:#6167e6"
                                                                                 class="fa fa-list"
                                                                                 aria-hidden="true"></i>
                                Status wise Report</a>
                        </li>
                    @endif
                    <!-- <li class="{{ request()->is('user/call-tasks-report') ? 'active' : '' }}">
                        <a href="{{url('/user/call-tasks-report')}}"> <i style="color:#6167e6" class="fa fa-calendar"
                                                                      aria-hidden="true"></i>
                            Daily Summary</a>
                    </li> -->
                    <li class="{{ request()->is('user/export-enquiry') ? 'active' : '' }}">
                        <a href="{{url('/user/export-enquiry')}}"> <i style="color:#6167e6" class="fa fa-download"
                                                                      aria-hidden="true"></i>
                            Export</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
                <ul>
                    
                    <!-- <li class="{{ request()->is('user/lead-campaigns') ? 'active' : '' }}">
                        <a href="{{ url('user/lead-campaigns') }}"><i style="color:#6167e6" class="fa fa-paste"
                                                                      aria-hidden="true"></i>
                            Lead Campaign</a>
                    </li> -->
                   
                    <li class="{{ request()->is('user/enquiry-source') ? 'active' : '' }}">
                        <a href="{{url('/user/enquiry-source')}}"><i style="color:#6167e6" class="fa fa-paste"
                                                                     aria-hidden="true"></i>
                            Lead Source</a>
                    </li>
                    <li class="{{ request()->is('user/enquiry-purpose') ? 'active' : '' }}">
                        <a href="{{url('/user/enquiry-purpose')}}"><i style="color:#6167e6" class="fa fa-paste"
                                                                      aria-hidden="true"></i>
                            Lead Purpose</a>
                    </li>
                    <li class="{{ request()->is('user/enquiry-feedback-status') ? 'active' : '' }}">
                        <a href="{{url('/user/enquiry-feedback-status')}}"><i style="color:#6167e6" class="fa fa-edit"
                                                                              aria-hidden="true"></i>
                            Lead Status</a>
                    </li>
                    <li class="{{ request()->is('user/enquiry-stages') ? 'active' : '' }}">
                        <a href="{{url('/user/enquiry-stages')}}"><i style="color:#6167e6" class="fa fa-filter"
                                                                     aria-hidden="true"></i>
                            Lead Stages</a>
                    </li>

                    <li class="{{ request()->is('user/lead-types') ? 'active' : '' }}">
                        <a href="{{url('/user/lead-types')}}"><i style="color:#6167e6" class="fa fa-edit"></i>Lead Types</a>
                    </li>
                    
                    

                    <li class="{{ request()->is('user/email-template') ? 'active' : '' }}">
                        <a href="{{url('/user/email-template')}}"><i style="color:#6167e6" class="fa fa-reply-all"></i>Email
                            Template</a>
                    </li>
                    <li class="{{ request()->is('user/additional-fields-lead') ? 'active' : '' }}">
                        <a href="{{url('/user/additional-fields-lead')}}"><i style="color:#6167e6"
                                                                             class="fa fa-edit"></i>Additional
                            Fields</a>
                    </li>


                    <li class="{{ request()->is('user/districts') ? 'active' : '' }}">
                        <a href="{{url('/user/districts')}}"><i style="color:#6167e6" class="fa fa-globe"
                                                                aria-hidden="true"></i>
                            Districts</a>
                    </li>
                    <li class="{{ request()->is('user/excel-upload-enquiries-list') ? 'active' : '' }}">
                        <a href="{{url('/user/excel-upload-enquiries-list')}}"><i style="color:#6167e6"
                                                                                  class="fa fa-list"
                                                                                  aria-hidden="true"></i>
                            Import History</a>
                    </li>
                    @if(auth()->user()->pk_int_user_id != 901)
                        @if(auth()->user()->pk_int_user_id == 880)
                            <li class="{{ request()->is('user/taluks') ? 'active' : '' }}">
                                <a href="{{url('/user/taluks')}}"><i style="color:#6167e6" class="fa fa-globe"
                                                                     aria-hidden="true"></i>
                                    Add Taluks</a>
                            </li>
                            <li class="{{ request()->is('user/model') ? 'active' : '' }}">
                                <a href="{{url('/user/model')}}"><i style="color:#6167e6" class="fa fa-car"
                                                                    aria-hidden="true"></i>
                                    Add Model</a>
                            </li>
                            <li class="{{ request()->is('user/competing-model') ? 'active' : '' }}">
                                <a href="{{url('/user/competing-model')}}"><i style="color:#6167e6" class="fa fa-car"
                                                                              aria-hidden="true"></i>
                                    Add Competing Model</a>
                            </li>
                        @endif
                    @else
                        <li class="{{ request()->is('user/districts') ? 'active' : '' }}">
                            <a href="{{url('/user/lom')}}"><i style="color:#6167e6" class="fa fa-globe"
                                                              aria-hidden="true"></i>
                                Add Lom</a>
                        </li>
                        <li class="{{ request()->is('user/taluks') ? 'active' : '' }}">
                            <a href="{{url('/user/zone')}}"><i style="color:#6167e6" class="fa fa-globe"
                                                               aria-hidden="true"></i>
                                Add Zone</a>
                        </li>
                    @endif
                </ul>
            </li>


            {{--  <li class="{{ request()->is('user/view-email') ? 'active' : '' }}">
                <a href="{{url('/user/view-email')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</a>
            </li> --}}

            {{-- <li class="{{ request()->is('user/show-gl-website-contacts') ? 'active' : '' }}">
                <a href="{{url('/user/show-gl-website-contacts')}}"> <i class="fa fa-ravelry" aria-hidden="true"></i> Website Contacts API</a>
            </li> --}}
            {{-- <li class="{{ request()->is('user/notifications') ? 'active' : '' }}">
                <a href="{{url('/user/notifications')}}"> <i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</a>
            </li> --}}

            {{-- <li>
                <a href="#"><i class="fa fa-building" aria-hidden="true"></i> Companies</a>
                <ul>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">Graphs</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-tasks"></i>Tasks </a>
                <ul>
                    <li><a href="#">Today's tasks</a></li>
                    <li>
                        <a href="#">DrillDown </a>
                        <ul>
                            <li><a href="#">Today's tasks</a></li>
                            <li><a href="#">Urgent</a></li>
                            <li>
                                <a href="#">Overdues</a>
                                <ul>
                                    <li><a href="#">Today's tasks</a></li>
                                    <li><a href="#">Urgent</a></li>
                                    <li><a href="#">Overdues</a></li>
                                    <li><a href="#">Recurring</a></li>
                                    <li><a href="#">Settings</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Recurring</a></li>
                            <li><a href="#">Settings</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Overdues</a>
                        <ul>
                            <li><a href="#">Today's tasks</a></li>
                            <li><a href="#">Urgent</a></li>
                            <li><a href="#">Overdues</a></li>
                            <li><a href="#">Recurring</a></li>
                            <li><a href="#">Settings</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Recurring</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</aside>