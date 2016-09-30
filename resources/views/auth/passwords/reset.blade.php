<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/assets/admin/images/favicon.ico">
    <title>Laravel Manager | Resetar senha</title>
    <link rel="stylesheet" href="/assets/admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="/assets/admin/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="/assets/admin/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/admin/css/neon-core.css">
    <link rel="stylesheet" href="/assets/admin/css/neon-theme.css">
    <link rel="stylesheet" href="/assets/admin/css/neon-forms.css">
    <link rel="stylesheet" href="/assets/admin/css/custom.css">
    <script src="/assets/admin/js/jquery-1.11.3.min.js"></script>
    <!--[if lt IE 9]><script src="/assets/admin/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body login-page login-form-fall">
<div class="login-container">
    <div class="login-header login-caret">
        <div class="login-content"></div>
    </div>
    <div class="login-form">
        <div class="login-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-steps">
                    <div class="step current" id="step-1">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" data-mask="email" autocomplete="off" value="{{ $email or old('email') }}" />
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Senha" >
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar senha" >
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block btn-login">
                                Trocar a senha
                                <i class="entypo-right-open-mini"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bottom scripts (common) -->
<script src="/assets/admin/js/gsap/TweenMax.min.js"></script>
<script src="/assets/admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="/assets/admin/js/bootstrap.js"></script>
<script src="/assets/admin/js/joinable.js"></script>
<script src="/assets/admin/js/resizeable.js"></script>
<script src="/assets/admin/js/neon-api.js"></script>
<script src="/assets/admin/js/jquery.validate.min.js"></script>
<script src="/assets/admin/js/neon-forgotpassword.js"></script>
<script src="/assets/admin/js/jquery.inputmask.bundle.js"></script>
<!-- JavaScripts initializations and stuff -->
<script src="/assets/admin/js/neon-custom.js"></script>
<!-- Demo Settings -->
<script src="/assets/admin/js/neon-demo.js"></script>
</body>
</html>
