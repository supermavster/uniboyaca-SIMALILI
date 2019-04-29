<?php

/**
 * Content - Form SignUp
 **/

//Sign Up
$divPosition = new HTMLTag('div'
//, array ("class" => "col-md-10 ml-auto mr-auto")
);
//FORM
$form = new HTMLTag('form', array(
    "method" => "POST",
    "id" => "registro",
    "action" => "",
    "accept-charset" => "utf-8",
    "class" => "form"
));
$inputUser = new HTMLTag('input', array(
    "type" => "text",
    "id" => "userRegistro",
    "name" => "userRegistro",
    "class" => "registro form-control",
    "autocomplete" => "off",
    "maxlength" => "20",
    "placeholder" => LOGIN['SINGUP-USER-TITLE']
));
$inputEmail = new HTMLTag('input', array(
    "type" => "email",
    "id" => "email_address",
    "name" => "email_address",
    "placeholder" => LOGIN['SINGUP-SUBEMAIL'],
    "class" => "form-control"
));
$inputPassword = new HTMLTag('input', array(
    "type" => "password",
    "id" => "passRegistro",
    "name" => "passRegistro",
    "class" => "registro form-control",
    "autocomplete" => "off",
    "maxlength" => "60",
    "placeholder" => LOGIN['SINGUP-PASSWORD-TITLE']
));
$inputRepeatPassword = new HTMLTag('input', array(
    "type" => "password",
    "id" => "repeat_password",
    "name" => "repeat_password",
    "placeholder" => LOGIN['SINGUP-PASSWORD-REPEAT'],
    "class" => "form-control"
));
//button
$button = new HTMLTag('button', array(
    "type" => "submit",
    "name" => "registro",
    "class" => "btn btn-social btn-round btn-fill btn-github"
));
$button->innerHTML(LOGIN['SINGUP-NOW']);

$form->innerHTML('
<div class="card-body">
				<div class="form-group">
				  <div class="input-group">
					<div class="input-group-prepend">
					  <div class="input-group-text">
					  	<i class="' . THEME_ICON . ' fa-user-shield"></i>
					  </div>
					</div>
					' . $inputUser->asHTML() . '
					</div>
				</div>

			  <div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
					<div class="input-group-text">
						<i class="' . THEME_ICON . ' fa-envelope"></i>
					</div>
				  </div>
					  ' . $inputEmail->asHTML() . '
				  </div>
			  </div>

			  <div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
					<div class="input-group-text">
						<i class="' . THEME_ICON . ' fa-lock"></i>
					</div>
				  </div>
				  ' . $inputPassword->asHTML() . '
				  </div>
			  </div>

			  <div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
					<div class="input-group-text">
						<i class="' . THEME_ICON . ' fa-lock"></i>
					</div>
				  </div>
				  ' . $inputRepeatPassword->asHTML() . '
				  </div>
			  </div>

			  </div>
			<div class="modal-footer justify-content-center">
			' . $button->asHTML() . '
			</div>
');

$divPosition->appendInnerHTML('
<div class="" id="signupModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-signup" role="document" style="margin-top: 7%;">
  	<div class="modal-content">
		<div class="card card-signup card-plain">
	  	<div class="modal-header">
				<h5 class="modal-title card-title text-center">' . LOGIN['SINGUP-TITLE'] . '</h5>
	  	</div>
	  	<div class="modal-body">
				<div class="row">
		  		<div class="col-md-5 mr-auto">
						' . $form->asHTML() . '
		  		</div>
				</div>
	  	</div>
		</div>
  </div>
</div>
');
$body->appendChild($divPosition);