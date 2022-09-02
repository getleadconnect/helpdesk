@extends('layouts.base')
<style type="text/css">
    .help-block{
        color:#ef5350;
    }
</style>
<style>
    #cracker {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: fixed;
        /* z-index:10; */
    }
    .field_icon {
        position: absolute;
        top: 27%;
        right: 2%;
        color: rgba(8, 7, 12, 0.6);
    }
</style>
@section('content')
<section class="login-wrap">
    @if(session('flash_notification'))
    <input type="hidden" name="" value="{{ session('flash_notification') }}" id="flash-notis">
    @endif
    <div class="container pad-xs-0">
        <div class="d-flex row-wrap login-container ">
            
            
            <div class="col-lg-6 bg-grey login-bg row-wrap">
                <!-- <div id="cracker"></div> -->
                <div>
                    <h4>Welcome</h4>
                    <p>Don’t have an account? Create your account, it takes less than a minute.</p>
                </div>
                
                <div class="d-flex justify-content-center">
                    <img src="{{ url('backend/images/sign_up-left-bg.png') }}">
                </div>
            </div>
            <div class="col-lg-6 pad-0">
                <div class="login-form">
                    
                    <img src="{{ url('backend/images/logo-getlead.png') }}">
                    <h4>Started With <span>GetLead </span><span class="fill">Create your account</span></h4>
                    
                        <form method="POST" action="{{ route('login-user') }}" class="form mg-tp25">
                        @csrf
                        <div class="d-flex row-wrap">
                            <div class="form-feild-row  country-code-row text-left">
                                <div class="cc-picker cc-picker-code-select-enabled"><div class="cc-picker-flag in"></div><span class="cc-picker-code">91</span> </div><input type="text" maxlength="10" id="phoneField1" name="number" autocomplete="off" class="phone-field text-input " required="" placeholder="Mobile Number... "><input type="hidden" id="phoneField1_phoneCode" name="email_phoneCode" value="91">
                                <input type="hidden" id="country_code" value="IN">
                            </div>
                            
                            <!-- <div class="form-feild-row d-flex row-wrap ">
                                <input autocomplete="off" class='text-input' name=' ' required type='email' placeholder="Email ID...">
                            </div> -->
                            <div class="form-feild-row d-flex row-wrap ">
                                <input autocomplete="off" class="text-input" name="password" id="passwordIcon" required="" type="password" placeholder="Password...">
                                <span id="toggle_pwd" class="fa fa-fw fa-eye-slash field_icon"></span>
                            </div>
                            <!-- <div class="form-feild-row d-flex row-wrap ">
                                <input autocomplete="off" class='text-input' name=' ' required type='password' placeholder="Confirm Password...">
                            </div> -->
                            <div class="d-flex justify-content-between fill align-items-center mg-tp15">
                                <button class="button" type="submit">LOGIN</button>
                                <a href="https://app.getlead.co.uk/verification" class="login">Sign up </a>
                            </div>
                        </div>
                    </form>
                    <div class=" mt-4 d-flex justify-content-between">
                        <a class="text-left" href="https://www.getlead.co.uk"><small>&nbsp; &larr; Back to homepage</small></a>
                        <a class="text-right" href="{{url('/forgotpassword')}}"><small>&nbsp;  Forgot password? &rarr;</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var botmanWidget = {
        // aboutText: 'ssdsd',
        introMessage: `✋ This is Getlead Chat Bot`,
        
    };
    
</script>
<script src="https://unpkg.com/fireworks-js@latest/dist/fireworks.js"></script>
<script>
    const cracker = document.getElementById('cracker')
    const fireworks = new Fireworks(cracker)
    fireworks.start()
</script>
<script type="text/javascript">
    $(function () {
        $("#toggle_pwd").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var type = $(this).hasClass("fa-eye") ? "text" : "password";
            $("#passwordIcon").attr("type", type);
        });
    });
</script>
<!-- <script src="{{url('js/botman.js')}}"></script> -->

@endsection
